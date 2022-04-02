<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Appointment Invoice Module

This model is built in Laravel Framework.They can easily manage the invoice based on appointment services. There are three types of roles in this module Manager, Service Engineer, and customer.

### Manager
- **Manage all Complaints for given customers**
- **View complaint details** 
- **Create new service engineer**
- **View the service engineer**
- **Whatever complaints are pending can be assigned to the engineer**
- **Manage Customer and Service Engineer**

### Service Engineer
- **Engineer manages whatever complaints are assigned to him**
- **Engineer can change status**
- **Engineer Can generate invoice**
- **View and download Invoice**

### Customers
- **Manage all own Complaints**
- **Create new Complaint**
- **View Complaint**
- **Invoice Download and view**


## Installation Process

### Environment
- **PHP 7.4+**
- **My SQl 5.5+**
- **Composer**

### Enable GD Graphics Library/Extension

#### window users using xampp apache server
- Go to php folder in xampp and open the php.ini and php configurations settings file, and change the line ;extension=gd2 or the line ;extension=gd to just extension=gd2
- Then restart your server again, then it will be work properly.

### Start install process

#### Step 1
- Git clone the code 

#### Step 2
- Go to folder and then copy the .env.example file 
- Rename the .env.example into .env file

#### Step 3
- Create a database, and add it to the details .env files of your database. ( default database name - appointment-invoice )
- Check mysql username and password

#### Step 4
- Run the below-given commands one by one on CMD.
- composer update
- php artisan key:generate
- php artisan migrate:fresh
- php artisan db:seed
- Php artisan cache:clear
- php artisan config:clear
- php artisan route:clear

#### Step 5
- php artisan serve if set local server

#### Step 6
- Now to see the front end enter URL like http://127.0.0.1:8000/

## Login Details

### Manager Login 
- manager@gmail.com/manager

### Service Engineer 
- Go to login page 
- Login With manager credentials
- Then Create a new service engineer

### Customer 
- Go to register page

## Author

- Bharat bhokre

## Security

If you discover any security related issues, please email bharatbhokre33@gmail.com instead of using the issue tracker.

## Change log

Please see the [changelog](CHANGELOG.md) for more information on what has changed recently.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
