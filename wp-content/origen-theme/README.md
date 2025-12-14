# Tema-Origen

<div  align="center">
<br>
<img src="https://www.mowomo.com/wp-content/uploads/2020/03/logo-origen-theme-1.png"  alt="Logo de Origen">
<br>
<br>
</div>

# 📦 `Tema Origen`

> `Origen` es un tema base creado por `mowomo.com` con ❤️ para el desarrollo de temas para WordPress.

> `Version 0.1.2`

## Configuración VSCODE

Nosotros para desarrollar utilizamos VSCODE con la extensión de **Live Sass Compiler** para poder compilar el SCSS. Si quieres compilar el css en el lugar original que usamos en `Origen` necesitaras la siguiente configuración del setting.json en VSCODE para las versiones 1.x.x de `Origen`:

<pre>
{
    "editor.insertSpaces": false,
    "editor.renderWhitespace": "none",
    "window.zoomLevel": 0,
    "git.autofetch": true,
    "liveSassCompile.settings.formats":[
        // This is Default.
        {
            "format": "expanded",
            "extensionName": ".css",
            "savePath": "~/../"
        },
        // More Complex
        {
            "format": "compressed",
            "extensionName": ".min.css",
            "savePath": "~/../"
        }
    ],
    "git.confirmSync": false,
    "git.enableSmartCommit": true
}
</pre>

## Hooks

Los ganchos son una forma para que una pieza de código interactúe / modifique otra pieza de código. Constituyen la base de cómo interactúan los complementos y los temas con WordPress Core, pero también son utilizados ampliamente por Core.

### Actions

| Hooks                  | Archivo                     | Descripción                                                                                                                                                                                  |
| ---------------------- | --------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| origen_before_header   | header.php                  | Permite añadir contenido antes de la apertura de la etiqeuta header.                                                                                                                         |
| origen_content_header  | header.php                  | Contiene el contenido que conforma el header.                                                                                                                                                |
| origen_after_header    | header.php                  | Permite añadir contenido una vez cerrado el header.                                                                                                                                          |
| origen_before_content  | header.php                  | Añade contenido justo al inicio del contenedor .site-content                                                                                                                                 |
| origen_before_page     | page.php                    | Este hook te permite añadir contenido justo antes de que WordPress imprima el conteido del editor. Este contenido se adaptara dependiendo de como hayamos seleccionado la forma del content. |
| origen_after_page      | page.php                    | Este hook te permite anclar justo despues de que WordPress imprima el contenido. Este contenido se adaptara dependiendo de como hayamos seleccionado la forma del content.                   |
| origen_content_page    | :partials/content-page.php  | Este hook ancla el contenido de WordPress.                                                                                                                                                   |

### Filters

| Hooks                       | Archivo    | Descripción                                                                 |
| --------------------------- | ---------- | --------------------------------------------------------------------------- |
| origen_site_classes         | header.php | Permite modificar o añadir clases al div .site                              |
| origen_header_classes       | header.php | Permite añadir o modificar las clases del header.                           |
| origen_site_content_clasess | header.php |  Permite añadir o modificar las clases de .site-content                     |
| origen_page_main            |  page.php  |  Permite añadir o modificar las clases de la etiqueta main de las páginas.  |

## Funciones

| Funciones               | Archivo                           | Descripción                                                                                        | Parametros               | Return |
| ----------------------- | --------------------------------- | -------------------------------------------------------------------------------------------------- | ------------------------ | ------ |
| origen_setup()          | functions.php                     | Añade todas las configuraciones y soportes necesarios para el funcionamiento del tema.             | -                        | Void   |
| origen_scripts()        | inc/scripts.php                   | Añade todos los scripts y hojas de estilos del tema.                                               | -                        | Void   |
| origen_site_logo()      | inc/origen_template_functions.php |  Imprime el logo que se haya puesto en el tema.                                                    | -                        | Void   |
| origen_principal_menu() | inc/origen_template_functions.php |  Imprime el menu principal.                                                                        | -                        | Void   |
| origen_page_header()    | inc/origen_template_functions.php | Imprime el header del contenido de las páginas, contiene el h1 de la página y la imagen destacada. | -                        |  Void  |
|  wp_body_open()         | inc/origen_template_functions.php |  Compatibiliza wp_body_open con versiones de WordPress anteriores a la 5.2.                        | -                        |  Void  |
| origen_post_thumbnail() | inc/origen_template_functions.php | Imprime la imagen destacada encapsulada entre un figure.                                           | \$size (string) = 'full' | Void   |
| origen_page_content()   | inc/origen_template_functions.php | Imprime el contenido de la página y su paginación si existiera.                                    | -                        | Void   |

### Funciones Hooked

| Hook                  | Funcion                 |
| --------------------- | ----------------------- |
| origen_content_header | origen_site_logo()      |
| origen_content_header | origen_principal_menu() |
| origen_content_page   | origen_page_header()    |
| origen_content_page   | origen_page_content()   |
