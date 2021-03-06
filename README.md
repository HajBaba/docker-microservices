# docker-microservices
some light service for university automation
here we have four web service that can use in docker or Separately :
- GUI (just interface)
- EDU (Educational)
- LIB (Librarianship)
- FOOD (Nutrition)

for *Authentication service* we used anothe web service that you can see [here](https://github.com/makbn/authentication-service).

all these services developed by php so you can simply understand how they works.
## GUI service
first task of this service is providing the interface that you will see in run time.
second task is to send curl requests to other services, and Showing result. all requests send by curl and all responses formatted in json.

## EDU service
displays the offered courses.

## FOOD service
displays Food plan and selection feature.

## LIB service
displays the reserved and borrowed books and search for a specific book

# Running
we offer two method for up and running these services.
- normal method with docker run
- fast method with docker-compose

but first we should build our own web server
## build a new image
we need a dockerfile and place these instructions in it :
```
FROM php:7.2-apache
COPY config/php.ini /usr/local/etc/php/
```
this will use your custom php.ini. you can install more packages with ```RUN``` command. (if you need)
two build a image from docker file you should use this ```docker build -f "dockerfile-location" -t "simple_gui:tag" . ``` command.

## 1. docker run method
Follow the instructions below :

```
docker run --name db_service -e MYSQL_ROOT_PASSWORD=qwer1234 -d mysql:5.7
```
create a container with mysql image for DB service.

```
docker cp cc_project_database.sql db_service:/cc_project_database.sql
```
copies some sql scripts that will create the tables and few records for testing.

```
docker exec -it db_service mysql -u root -p
```
with this command you can go to the container file system.

```
mysql> create database cc_project_database;
mysql> CREATE USER 'auth_service_user'@'%' IDENTIFIED BY 'Auth_service@1397';
mysql> GRANT ALL ON cc_project_database.* TO 'auth_service_user'@'%';
mysql> source cc_project_database.sql;
```


```
docker run --name auth_service -d -it --link db_service:db_service_host -p 8080:8080 makbn/cc-authentication-service:v2 sleep 1000000000
```
running auth_service and linking it to db_service.

```
PHPMYADMIN//docker run --name myadmin -d --link db_service:db -p 81:80 phpmyadmin/phpmyadmin:4.7
```
it's optional you can ignore phpmyadmin, this container linked to your db_service and providing a web-based user interface.


and running the services : 

```
docker run -d -p 80:80 --name GUI -v /home/reza/GUI:/var/www/html php:ctm
docker run -d -p 82:80 --name EDU --link db_service:db_service_host -v /home/reza/EDU:/var/www/html php:ctm
docker run -d -p 83:80 --name LIB --link db_service:db_service_host -v /home/reza/LIB:/var/www/html php:ctm
docker run -d -p 84:80 --name FOOD --link db_service:db_service_host -v /home/reza/FOOD:/var/www/html php:ctm
```
these command will binding a specific directory in host file system to a directory in container file system. so you can manage your code in your own OS and changes are made in the container.

## 2. docker-compose method
in this method we can run multiple container with one command. we can use ```docker-compose up```. this command will automaticly run and manage the container we mentioned in a docker-compose.yml 

it works simply and if you want to remove the containers you can use ```docker-compose down```. it will stop and remove containers. docker-compose is like rum method but you can use it many times.

there is one more problem in this method. if you see the yml file you find out there is no definition for database or tables. to solve this problem you can build a new image from mysql image and before run compose file run querys on that.



