# Mowomo WordPress Skeleton

Base de código para iniciar nuevos proyectos de WordPress en Mowomo - una plantilla lista para usar que acelera el desarrollo.

Este proyecto contiene un tema personalizado y varios plugins de uso común instalados mediante composer.

## Desarrollo Local con DDEV

[Consulta la documentación de inicio de DDEV para más información](https://ddev.com/get-started/).

```bash
git clone [URL-DEL-REPOSITORIO] wp-content
composer install
ddev config --update
ddev start
```

## Pasos para copia de base de datos
[Añada los pasos para instalar una copia de la base de datos en local]

## Uso de WP CLI

WP CLI es la herramienta de línea de comandos para WordPress. Con DDEV, puedes ejecutar comandos WP CLI utilizando `ddev wp`.

### Ejemplos básicos
```bash
# Limpiar cache de WordPress
ddev wp cache flush

# Listar todos los plugins instalados
ddev wp plugin list

# Crear un nuevo usuario administrador
ddev wp user create usuario email@example.com --role=administrator
```

Para más información sobre WP CLI, visita la [documentación oficial](https://wp-cli.org/).

