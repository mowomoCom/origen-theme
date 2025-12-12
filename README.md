# Mowomo WordPress Skeleton

Base de código para iniciar nuevos proyectos de WordPress en Mowomo - una plantilla lista para usar que acelera el desarrollo.

Este proyecto contiene un tema personalizado y varios plugins de uso común instalados mediante composer.

#### Desarrollo Local con DDEV

[Consulta la documentación de inicio de DDEV para más información](https://ddev.com/get-started/).

```bash
git clone [URL-DEL-REPOSITORIO] wp-content
composer install
ddev config --project-type=wordpress
ddev start
ddev wp core install --url='$DDEV_PRIMARY_URL' --title='Mowomo Project' --admin_user=admin --admin_password=admin --admin_email=admin@mowomo.com
```
