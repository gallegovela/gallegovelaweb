# Página: Contacto

## Objetivo

Crear una página sencilla, elegante y profesional.

El objetivo es facilitar el contacto.

No debe parecer un formulario genérico.

Debe seguir exactamente el mismo lenguaje visual de la Home.

---

## Referencia visual

design/contact-page.png

Esta imagen define completamente el diseño.

---

## Hero

Heredar de hero interno.

Eyebrow: "/ Contacto"
Título: Hablemos de tu próximo proyecto.

---

## Formulario

Campos:

Nombre

Email

Empresa

Teléfono

Asunto

Mensaje

Checkbox RGPD

Botón:

Enviar mensaje

Integrado con Contact Form 7: formulario "Contacto Gallegovela"
(`wp-admin → Contact → Contact Forms`), embebido en la página vía
shortcode `[contact-form-7 id="fbee3b2" title="Contacto Gallegovela" html_class="gv-ct-form"]`
(ver `specs/pages/html/contacto.html`). `html_class="gv-ct-form"` hace
que el `<form>` generado por CF7 herede el CSS ya existente
(`assets/css/pages/contacto.css`) sin cambios.

Todos los mensajes de validación/respuesta del formulario (envío
correcto, campo obligatorio, email inválido, etc.) están en español
(pestaña "Messages" del formulario en wp-admin).

Anti-spam: Cloudflare Turnstile, vía la integración nativa de Contact
Form 7 (requiere CF7 ≥ 6.1, ver `specs/theme.md`). El tag `[turnstile]`
ya está en el formulario, colocado entre el checkbox RGPD y el botón
de envío. El widget no se renderiza hasta que se configuren el Site
Key y el Secret Key de Cloudflare en `wp-admin → Contact → Integration
→ Turnstile` (paso manual, requiere la cuenta de Cloudflare del
cliente).

---

## Información adicional

Cuatro tarjetas:

Ubicación

Trabajo en remoto

Horario

Redes sociales

---

## Footer

Idéntico al resto del sitio.

---

## Responsive

Desktop:

Dos columnas.

Tablet:

Formulario debajo del texto.

Mobile:

Una sola columna.
