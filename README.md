## Laradock usage
1. in the agrabah parent folder, run ```git clone https://github.com/Laradock/laradock.git```
1. add ```127.0.0.1 agrabah.test``` in hosts
1. update agrabah/.env
    ```
    DB_HOST=mysql
    DB_PASSWORD=root
    ```
1. create agrabah.conf in laradock/apache2
    ```
      ServerName agrabah.test
      DocumentRoot /var/www/agrabah/public/
    ```
1. rename laradock/.env.example to .env and update laradock/.env
    ```
    PHP_VERSION=7.3
    ```
1. run ```docker-compose build php-fpm``` and ```docker-compose build workspace```
1. go to laradock folder and run ```docker-compose up -d apache2 mysql```
1. run ```docker-compose exec workspace bash```
1. go to /var/www/agrabah
1. install dependencies with ```composer install```    
1. if database is empty, install migration with ```artisan migrate:install```
1. run migration ```artisan migrate```
1. browse to http://agrabah.test