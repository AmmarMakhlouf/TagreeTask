# TagreeTask
Search for clinics, doctors and services in different cities
## Prerequisites
Laravel Framework 9.25.1
Apache/2.4.51
PHP 8.1.6
MySQL 10.4.22-MariaDB
## Installation
1- Download zip file of this respository.
2- Unzip the file.
3- Update the database connection, username and password info in the file .env
4- Under the main Run the follwowing two commands
php artisan migrate:fresh --seed
php artisan serve --port=8080
5- Now the site is accessable under the link http://127.0.0.1:8080/
Note you can change 8080 to any other port you choose.
