# Introduction

Used Laravel Lume for Web services

[Lumen website](http://lumen.laravel.com/docs)

There is an API folder for Web Services in Lumen, with complete Web Services architecture.

Root folder contains the code which is consuming web servies.

**Note: Its not complete but web service structure is ready**

## Istallation

Create a folder `voucherpool` into your `www` or `htdocs` directory.

Copy whole code into newly created directory i.e `voucherpool`

go to `api` folder.

Change the database setting from `.env` file in `voucherpool/api` directory

Now create a database `voucherpool`

Import `/db/voucherpool.sql` file into `voucherpool` database

**Note: you can also use command `php artisan migrate` but then you have to data manually into database, as database seeding is not added** 


run this command:

> php -S localhost:8000 -t public

if `8000` port is busy you can change the port to `8200`

**Note: If you change the port you have to change the post on line number `18` in
`includes/_header.php` file** 

> var apiUrl = "http://localhost:8000/api/";

Now access your project using `http://localhost/voucherpool/recipients.php`
