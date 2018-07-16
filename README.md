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

## 1. docker run method
Follow the instructions below 


