# Data Generator

This module arose, because the data supplied
by the panels can not be accessed due to the policies of the
ITCR and problems with the obtaining of the data at the moment,
because as mentioned earlier the process is done
manually For this reason, it was necessary to generate
data from an analysis of the information that we
was provided with respect to each of the investors. The
information is composed of data such as date, serial and
energy production W/h.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

To install the project you will need to have  [Composer](https://getcomposer.org/) and MySQL. [Composer](https://getcomposer.org/) is a tool for dependency management in PHP. For the case of MySQL you can use [XAMPP](https://www.apachefriends.org/es/index.html) or [MySQL Workbench](https://dev.mysql.com/downloads/workbench/)


### Clone DataGenerator
Clone the DataGenerator repository using git:
```
git clone https://github.com/BrayanArrieta/DataGenerator.git
cd DataGenerator
```
### Dependencies
For get the dependencies of the project.
```
composer update
composer install
```
### Installing
Follow these steps to configure the database of the application. First of all you need to create a database with the name "datagenerator"
```
php artisan migrate
php artisan artisan db:seed
```
* Run in the database the file panels_information.sql in the folder called "sql"
* After that, you can run in the database the file procedures_and_events.sql in the folder called "sql"
* Finally, you can run the application with the command **php artisan serve**


## Built With
* [Laravel](https://laravel.com/docs/5.5) - The web framework used
* [MySQL](https://dev.mysql.com/doc/) - Database engine
* [Bootstrap](https://getbootstrap.com/docs/3.3/) - front-end library
* [XAMPP](https://www.apachefriends.org/es/index.html)



## Authors

* **Brayan Arrieta**
* **Felipe Martínez**
* **Andrey Murillo**

See also the list of [contributors](https://github.com/BrayanArrieta/DataGenerator/contributors) who participated in this project.

## License
This project is licensed under the ISC License
