# Página: Blog

Slug 

/blog

## Objetivo

Esta página tiene el propósito de mostrar todas las entradas del blog.

## Hero

Heredar de hero interno.

Eyebrow: "/ Blog"
Título: Artículos relacionados con mi experiencia profesional

## Layout

Tiene que presentar la estructura siguiente:
- Columna izquierda. 80% ancho. Entradas del blog ordenadas por fecha descendiente, de más recientes a más antiguas. 
- Filtro de entradas.  Padding superior de 50px.
   - Caja de texto para buscar, con botón.
   - Categorías. Se muestran como una nube de tags. El comportamiento y estética es el mismo de secciones anteriores. Cuando se hace click, se quedan marcados como la clase hover. Si están marcados, en el click se resetean.  Cuando una se selecciona o se libera, se actualizan las entradas que se muestran.
   - Etiquetas. Igual que las Categorías.

## Consideraciones
- La carga de los posts debe ser por ajax, se muestran al principio 5, y la carga es dinámica, a medida que avanza el scroll.  Al final de la lista debe aparecer el número de entradas disponible para la búsqueda y el número de items ya cargados. Si hay más, mostrar leyenda "Scroll para mostrar más"
- Las acciones sobre el filtro modifican la lista de entradas que se muestra.
- A medida que se hace scroll en la página, la columna de entradas avanza, pero el filtro se queda anclado justo debajo de la barra de cabecera.


