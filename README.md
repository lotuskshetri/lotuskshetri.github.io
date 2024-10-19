# TechTonic

## Description

Simple Laravel E-Commerce application built using Laravel-10 framework. Utilized Filament for the development of admin panel and Livewire for the user side. Implemented tailwind css for an effective design. Integrated Stripe API for payment and Mailtrap for mail services.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [License](#license)
- [Contact](#contact)

## Installation

* Simply clone or zip download the repo.
* Make sure you have php, composer, node, and npm installed.
* Edit the .env file and add secret key for Stripe and Mailtrap.
* Run `composer install` to install all required dependecies for laravel itself.
* Run `npm install` for all tailwind and node related dependencies.
* After installation, run `php artisan migrate`. 
* After installation, run `php artisan serve`. 
* Since image are stored directly in the storage of the server and are accessed from the public folder, run a code `php artisan storage:link` to maintain the link.

> **Note:** While editing the .env, make sure to change APP_URL to complete url, ie. rather than `http://127.0.0.1` make it `http://127.0.0.1:8000`, as the `http://127.0.0.1` may sometimes not load the images properly.


## Usage

* To access the admin panel, you need to run a database seeder, `php artisan db:seed`, a new user will be created with the following credential:
    * Name: `Admin`
    * Email: `admin@techtonic.com`
    * Password: `admin`

* You can login to admin panel from the url `localhost/admin/login`.
* Add the categories, brands, and products in the admin panel.
* Then, go to `localhost` to observe the 'TechTonic' e-commerce platform.


## Features

* Complete admin panel with full features and order detail widget.
* Interactive front end with a SPA(Single Page Application) format.
* Complete feature for sorting, filtering, adding to cart, and placing the order.
* Integration of Stripe gateway for payment.
* User panel with the list of all the orders and features to observe details of each order.


## License

The project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Contact

Contact information for the project maintainer.
