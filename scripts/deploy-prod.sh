#!/usr/bin/env bash
#
# Arranca el contenedor de producción de gallegovela.es con `docker` puro
# (sin docker-compose). Construye la imagen a partir del Dockerfile del
# repo y conecta con una base de datos MySQL externa/gestionada mediante
# las credenciales del fichero de entorno.
#
# Uso:
#   ./scripts/deploy-prod.sh [ruta-al-env-file]
#
# Por defecto usa .env.production (ver .env.production.example como plantilla).

set -euo pipefail

REPO_ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
ENV_FILE="${1:-"$REPO_ROOT/.env.production"}"

if [[ ! -f "$ENV_FILE" ]]; then
  echo "Error: no se encuentra el fichero de entorno '$ENV_FILE'." >&2
  echo "Copia .env.production.example a .env.production y rellena los valores." >&2
  exit 1
fi

set -a
# shellcheck disable=SC1090
source "$ENV_FILE"
set +a

required_vars=(WORDPRESS_DB_HOST WORDPRESS_DB_NAME WORDPRESS_DB_USER WORDPRESS_DB_PASSWORD)
missing_vars=()
for var in "${required_vars[@]}"; do
  if [[ -z "${!var:-}" ]]; then
    missing_vars+=("$var")
  fi
done
if [[ ${#missing_vars[@]} -gt 0 ]]; then
  echo "Error: faltan variables obligatorias en '$ENV_FILE': ${missing_vars[*]}" >&2
  exit 1
fi

IMAGE_NAME="${IMAGE_NAME:-gallegovela-web}"
CONTAINER_NAME="${CONTAINER_NAME:-gallegovela-web}"
HOST_PORT="${HOST_PORT:-80}"
WORDPRESS_TABLE_PREFIX="${WORDPRESS_TABLE_PREFIX:-wp_}"
UPLOADS_HOST_PATH="${UPLOADS_HOST_PATH:-/var/www/gallegovela/uploads}"

echo "==> Construyendo imagen '$IMAGE_NAME'..."
docker build -t "$IMAGE_NAME" "$REPO_ROOT"

echo "==> Preparando carpeta de uploads persistente en '$UPLOADS_HOST_PATH'..."
mkdir -p "$UPLOADS_HOST_PATH"

if docker ps -a --format '{{.Names}}' | grep -Fxq "$CONTAINER_NAME"; then
  echo "==> Deteniendo y eliminando contenedor previo '$CONTAINER_NAME'..."
  docker rm -f "$CONTAINER_NAME" >/dev/null
fi

echo "==> Arrancando contenedor '$CONTAINER_NAME' en el puerto $HOST_PORT..."
docker run -d \
  --name "$CONTAINER_NAME" \
  --restart unless-stopped \
  -p "${HOST_PORT}:80" \
  -e WORDPRESS_DB_HOST="$WORDPRESS_DB_HOST" \
  -e WORDPRESS_DB_NAME="$WORDPRESS_DB_NAME" \
  -e WORDPRESS_DB_USER="$WORDPRESS_DB_USER" \
  -e WORDPRESS_DB_PASSWORD="$WORDPRESS_DB_PASSWORD" \
  -e WORDPRESS_TABLE_PREFIX="$WORDPRESS_TABLE_PREFIX" \
  -v "${UPLOADS_HOST_PATH}:/var/www/html/wp-content/uploads" \
  "$IMAGE_NAME"

echo "==> Listo. Contenedor '$CONTAINER_NAME' corriendo en http://localhost:${HOST_PORT}"
