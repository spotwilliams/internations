<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>



## About this Laravel test project

This repo was developed for testing purposes 

## Install steps

* Follow installation steps from https://laravel.com/docs/5.8/installation
    * Besides Laravel's installation steps, you should config some SNMTP service for the web App. For testing purspose, I used Mailtrap.io
* After that, execute the migrations with following command
`php artisan migrate --seed` // This will create database and set the admin user
* User with admin powers:
    * user: admin@domain.com
    * pass: 123456789
