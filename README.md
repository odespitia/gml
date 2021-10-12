## About API OscarE

-   Framework Laravel [versión 7](https://laravel.com/docs/7.x#server-requirements).
-   Motor de base de datos MySql.
-   Uso de: Migraciones, Models, Controllers, Events, Listeners, Requests, Mailables, Rules, Blade, etc.
## Pasos y Comandos Iniciales

-   Asegurarse contar con los módulos de php a continuación: php-imap php-gmp php-curl php-bz2
-   Crear archivo .env en base al .env.example, escribir datos de accesos BD, redis y servidor email.
-   composer install
-   php artisan key:generate
-   php artisan jwt:secret
-   npm install && npm run dev
-   php artisan migrate:fresh --seed (crea categorias y usuarios por defecto)
-   sudo chmod -R 777 storage/
-   php artisan storage:link
-   php artisan serve --host="**mi-ip**" (Solo si no se tiene ejecutando en un host virtual)
-   composer dump-autoload  (Para actualizar la información del cargador automatico de clases)


## Otros comandos

-   Crear models a partir de la BD [(Reliese)](https://github.com/reliese/laravel)

-   php artisan code:models --schema=**name_db**

-   Documentación autenticación [JWT](https://jwt-auth.readthedocs.io/en/develop/laravel-installation/#generate-secret-key)

-   php artisan make:controller NoteController

-   php artisan optimize
-   php artisan cache:clear
-   php artisan config:clear
-   php artisan route:clear

---

## License

Copyright OscarE 2021
