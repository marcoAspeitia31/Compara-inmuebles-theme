[You can find an english version of this readme here](./README.md)

Compara inmuebles WordPress theme 
===

Este tema de WordPress es una solución personalizada para listar propiedades en un sitio web. Proporciona una base sólida con funcionalidades integradas para que los usuarios puedan filtrar entre las propiedades. Además, incluye otras secciones importantes para mejorar la experiencia del usuario.

Este tema fue desarrollado utilizando un tema inicial de Underscores, por lo que incluye todas las características principales, como:

* Una cantidad de plantillas HTML5 limpias y modernas, bien comentadas.
* Implementación personalizada de encabezado en `inc/custom-header.php`. Solo agrega el fragmento de código que se encuentra en los comentarios de `inc/custom-header.php` a tu plantilla `header.php`.
* Etiquetas de plantilla personalizadas en `inc/template-tags.php` que mantienen tus plantillas limpias y evitan la duplicación de código.
* Pequeñas mejoras en `inc/template-functions.php` que pueden mejorar tu experiencia en la creación del tema.
* Un script en `js/navigation.js` que convierte el menú en un desplegable en pantallas pequeñas (como en dispositivos móviles). Se carga en `functions.php`.
* 2 diseños de ejemplo en `sass/layouts/` utilizando CSS Grid para una barra lateral a cada lado del contenido. Solo descomenta el diseño que elijas en `sass/style.scss`.
Nota: Los estilos `.no-sidebar` se cargan automáticamente.
* Estilos CSS organizados `style.css` que ayudan a iniciar facil y agilmente.
* Compatibilidad total con la integración del complemento "WooCommerce" mediante hooks en `inc/woocommerce.php`. Se sobrescribe el estilo de woocommerce.css con características de galería de productos habilitadas (zoom, deslizamiento, lightbox).
* Bajo licencia GPLv2 o posterior. :) Úsalo para crear algo genial.

Installation
---------------

### Requirements
Este tema requiere:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- [PHP 5.6 como minimo](https://www.php.net/downloads.php)
- [WordPress 5.0 como minimo](https://wordpress.org/download/)
- [Compara inmuebles plugin](https://github.com/BrandonVadilloDev/compara-inmuebles-plugin)

### Quick Start

1. Descarga este repositorio.
2. En tu panel de administración, ve a "Apariencia" > "Temas" y haz clic en el botón "Añadir nuevo".
3. Haz clic en "Subir tema" y selecciona el archivo .zip del tema. Haz clic en "Instalar ahora".
4. Haz clic en "Activar" para utilizar el nuevo tema de inmediato.


### Setup

Para empezar a utilizar todas las herramientas que vienen con el tema, debes instalar las dependencias necesarias de Node.js y Composer:

```sh
$ composer install
$ npm install
```

### Available CLI commands

Como el tema fue desarrollado utilizando Underscores como punto de partida, viene con comandos de CLI adaptados para el desarrollo de temas de WordPress:

- `composer lint:wpcs` :  verifica todos los archivos PHP según los [Estándares de codificación de PHP.](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : verifica si hay errores de sintaxis en todos los archivos PHP.
- `composer make-pot` : genera un archivo .pot en el directorio `languages/`.
- `npm run compile:css` : compila los archivos SASS a CSS.
- `npm run compile:rtl` : genera una hoja de estilos RTL.
- `npm run watch` : observa todos los archivos SASS y los compila a CSS cuando hay cambios.
- `npm run lint:scss` : erifica todos los archivos SASS según los [Estándares de codificación de CSS.](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : verifica todos los archivos JavaScript según los [Estándares de codificación de JavaScript.](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : genera un archivo .zip para distribución, excluyendo archivos de desarrollo y del sistema.

## Live demo
Puedes ver el tema en funcionamiento en [este sitio.](https://comparainmuebles.com/)

## Credits

* Basado en Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 o posterior](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2018 Nicolas Gallagher y Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
