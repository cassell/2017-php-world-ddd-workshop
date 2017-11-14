# 2017 php[world] Domain-Driven Design Workshop

For the most part you will be fine without any preparation for this workshop.
I will have printouts of most of the code so you can follow along with a pen and paper.
I will make the slides available as soon as the session is over (on Joind.in and here).

The workshop is 2 1/2 hours with a planned short break in the middle.

If you want to follow along on your own computer and IDE I would suggest doing the following before the presentation:
* Install a recent version of Docker and Docker Compose [https://www.docker.com/products/docker](https://www.docker.com/products/docker)
* Download or clone this repo
* If you are on Linux or Mac run "make beer" and that will build the project, otherwise you can use docker compose (Windows users may have the change the slashes in the folder path):
* I will likely not have time to help troubleshoot your setup during the presentation.
* I would suggest pulling changes again right before the presentation (you shouldn't have to rebuild docker) as I might have
changed something during my practice runs of the workshop.


````
make beer
````
or
````
docker-compose build
docker-compose up -d
docker run --rm --interactive --tty --network 2017phpworlddddworkshop_default mariadb mysql -hmariadb -uroot -p64ounces --batch -e "drop database if exists beeriously; create database beeriously;"
docker run --rm --interactive --tty --network 2017phpworlddddworkshop_default --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app 2017phpworlddddworkshop_php-fpm composer install
docker run --rm --interactive --tty --network 2017phpworlddddworkshop_default --volume `pwd`:/app --user $(id -u):$(id -g) --workdir /app 2017phpworlddddworkshop_php-fpm /app/bin/console doctrine:migrations:migrate --no-interaction -v
````

If you can then run and only see testing errors then you are good to go:
````
make unit
make integeration
````
or
````
/app/vendor/bin/phpunit --configuration /app/src/Tests/Unit/phpunit.xml.dist
/app/vendor/bin/phpunit --configuration /app/src/Tests/Integration/phpunit.xml.dist
````


