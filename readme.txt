El adminer se abre de la siguiente manera :  http://localhost:8080
Los datos que poner para poder acceder en el adminer son los siguientes:
    -Sistema: MySQL
    -Servidor: mysql_db (nombre del contenedor de MySQL)
    -Usuario: laravel_user
    -Contraseña: secret
    -Base de datos: laravel

Las migraciones se ejecutan en el siguiente orden:
    -php artisan migrate --path=database/migrations/2014_10_12_000000_create_users_table.php
    -php artisan migrate --path=database/migrations/2014_10_12_100000_create_password_reset_tokens_table.php
    -php artisan migrate --path=database/migrations/2019_08_19_000000_create_failed_jobs_table.php
    -php artisan migrate --path=database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php
    -php artisan migrate --path=database/migrations/2025_01_28_100348_create_games.php
    -php artisan migrate --path=database/migrations/2025_01_28_103231_create_reviews.php
    -php artisan migrate --path=database/migrations/2025_01_28_103941_create_categories.php
    -php artisan migrate --path=database/migrations/2025_01_28_104109_create_purchases.php
    -php artisan migrate --path=database/migrations/2025_01_28_120852_create_platforms.php
    -php artisan migrate --path=database/migrations/2025_01_28_121346_create_games_platforms.php
    -php artisan migrate --path=database/migrations/2025_01_28_164235_create_games_categories.php
    -php artisan migrate --path=database/migrations/2025_01_27_110239_create_reservations.php


