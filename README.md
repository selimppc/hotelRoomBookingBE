# hotelRoomBookingBE

### Step 1: Build and Run docker

    $ docker-compose up -d --build

### Step 2: Install Composer

    $ docker-compose run --rm php8-service-hrb composer install

### Step 3: Encore Assets

    $ docker-compose run --rm node-service-hrb npm run dev

### Step 4: Database Migration

    $ docker-compose run --rm php8-service-hrb php bin/console doctrine:migrations:migrate

### Step 5: Load Fixtures    

    $ docker-compose run --rm php8-service-hrb php bin/console doctrine:fixtures:load

### Step 6: Run Unit Tests

    $ docker-compose run --rm php8-service-hrb ./vendor/bin/simple-phpunit tests/

# Live 
    
    App: http://localhost:8081


## DOCKER Guide
    $ docker-compose up -d --build
    $ docker exec -it <containerName> bash

    ## command outside of bash 
    $ docker-compose run --rm php8-service-hrb php bin/console doctrine:database:create

    ## RUN COMPOSER INSTALL 
    $ docker-compose run --rm php8-service-hrb composer install


## PHP ALLOCATED MEMORY
    // check memory
    $ php -r "echo ini_get('memory_limit').PHP_EOL;"
    
    //set new
    # echo 'memory_limit = 256M' >> /usr/local/etc/php/conf.d/docker-php-ram-limit.ini
    
    # php -r "echo ini_get('memory_limit').PHP_EOL;" 
