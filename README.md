# Agrabah Traceability

Agrabah Traceability allows community leaders to trace the delivery of a produce from the farmer to the market.

Agrabah was created to empower Filipino Farmers & Fisherfolks to steadily earn fair profit through online platforms that connect them to partners and consumers.

Products are directly sourced from more than 5,000 farmers and fisherfolks nationwide across the Philippines and growing. Agrabah provides farmers with a stable market channel which allows for inclusive economic growth.

Agrabah knows that with a better marketplace, we can help our Filipino farmers and fisher folks enjoy a sustained and rewarding livelihood.

# Getting Started - Local Development


## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone git@github.com:agrabah-ph/loans.git

Switch to the repo folder

    cd loans

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

**Populate the database with seed data with relationships which includes users, products, loan type, loan provider, loan product and farmer. This can help you to quickly start testing the api or couple a frontend and start using it with ready content.**


Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
