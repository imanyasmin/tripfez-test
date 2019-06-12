## http://localhost:8888/tripfez-test/public/

## Backend PHP Test

1)PHP Crud
Login & Registration
- Since I’m using Laravel, I just use the following command to scaffold all of the routes and views ##php artisan make:auth

Database MySQL
- Laravel migration: database/migrations/2014_10_12_000000_create_users_table.php

- MySQL:
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
)

- CRUD Form : resources/views/auth/login.blade.php

2)	app/CustomClass/Test.php
3)	app/CustomClass/Car.php

## Engineering - Logic Test

1)	Controller: app/Http/Controllers/RoomController.php
2)	Model: app/Room.php
3)	Migration: database/migrations/2019_05_31_010343_create_rooms_table.php
4)	View: resources/views/room



