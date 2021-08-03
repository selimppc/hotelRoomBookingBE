# hotelRoomBookingBE

## Assets Encore
    $ yarn encore dev
    $ yarn encore dev --watch
    $ yarn encore production

## Database Validation
    $ php bin/console doctrine:schema:validate

## Metadata
    $ php bin/console doctrine:cache:clear-metadata

## Migration File
    $ php bin/console doctrine:migrations:diff

## Migrate database
    $ php bin/console doctrine:migrations:execute "verion"
    $ php bin/console doctrine:migrations:migrate

## Fixture Load
    $ php bin/console doctrine:fixtures:load

## Usage
    $ composer install
    $ symfony serve

## RUN PHP UNIT TEST
    $ ./vendor/bin/simple-phpunit tests/

## RUN DOCKER
    $ docker-compose up -d --build
    $ docker exec -it <containerName> bash
    $ docker exec -it php8-hrb bash

    ## command outside of bash 
    $ docker-compose run --rm php8-service-hrb php bin/console doctrine:database:create

    ## RUN COMPOSER INSTALL 
    $ docker-compose run --rm php8-service-hrb composer install

    ## RUN ENCORE
    $ docker-compose run --rm node-service-hrb npm install @symfony/webpack-encore --save-dev
    $ docker-compose run --rm node-service-hrb npm run dev

## PHP ALLOCATED MEMORY
    // check memory
    $ php -r "echo ini_get('memory_limit').PHP_EOL;"
    
    //set new
    # echo 'memory_limit = 256M' >> /usr/local/etc/php/conf.d/docker-php-ram-limit.ini
    
    # php -r "echo ini_get('memory_limit').PHP_EOL;" 
