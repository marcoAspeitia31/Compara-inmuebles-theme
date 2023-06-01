[Puedes encontrar una version en español de este readme aquí](./README-es.md)

Compara inmuebles WordPress theme 
===

This WordPress theme is a customized solution for listing properties in the website, it provides a solid base with integrated functionalities to let the users filter among the properties, as well it has another important sections that this kind of website could have to provide good user experience

This theme was developed using an underscore starter theme so it has all the principal features like:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A custom header implementation in `inc/custom-header.php`. Just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/template-functions.php` that can improve your theming experience.
* A script at `js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `functions.php`.
* 2 sample layouts in `sass/layouts/` made using CSS Grid for a sidebar on either side of your content. Just uncomment the layout of your choice in `sass/style.scss`.
Note: `.no-sidebar` styles are automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Installation
---------------

### Requirements
This theme requires

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)
- [PHP 5.6 as minimum](https://www.php.net/downloads.php)
- [WordPress 5.0 as minimum](https://wordpress.org/download/)
- [Compara inmuebles plugin](https://github.com/BrandonVadilloDev/compara-inmuebles-plugin)

### Quick Start

1. Download this repository.
2. In your admin panel, go to Appearance > Themes and click the Add New button.
3. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
4. Click Activate to use your new theme right away.


### Setup

To start using all the tools that come with the theme  you need to install the necessary Node.js and Composer dependencies :

```sh
$ composer install
$ npm install
```

### Available CLI commands

As the theme was developed using underscore starter theme it comes packed with CLI commands tailored for WordPress theme development :

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.

## Live demo
You can see the theme working on [this site](https://comparainmuebles.com/)

## Credits

* Based on Underscores https://underscores.me/, (C) 2012-2020 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2018 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
