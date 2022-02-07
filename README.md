# joshq95/linktree-coding-challenge
![Tests](https://github.com/cborgas/toy-robot/workflows/Tests/badge.svg)
[![codecov](https://codecov.io/gh/cborgas/toy-robot/branch/master/graph/badge.svg)](https://codecov.io/gh/cborgas/toy-robot)

A REST API with the intention of returning links for a specific user, with the ability to update them.

## How to setup the project
1. Ensure you have [Docker](https://www.docker.com/products/docker-desktop) installed.
2. Clone the project.
3. Navigate to the root directory of the project and run ```docker-compose up -d --build``` to build the containers.
4. Run ```docker-compose exec php /bin/bash``` to shell into the php container.
5. Now run ```composer install``` to install the dependencies.
6. Run ```bin/console doctrine:mongodb:schema:create``` to build the schema.
7. Run ```bin/console doctrine:mongodb:fixtures:load --no-interaction``` to load the fixtures to see the test
8. Navigate to [http://localhost:8080/api/users/1](http://localhost:8080/api/users/1) to see the project.

## Using the API
- There is the following endpoint with two methods on it (GET & PUT): [http://localhost:8080/api/users/{id}](http://localhost:8080/api/users/{id})


## Design Decisions

- **Database Choice** - This was a choice that I tossed between using a Relational Database and a NoSQL database.
NoSQL databases implementations in Symfony are far outside my comfort zone, but given that
the requirement to allow for various types of links, using a NoSQL database made the most sense. 
This allows us to have a schema that is flexible moving forward and query performance to be quick when retrieving a user and their links.


- **Serializer usage** - The Symfony Serializer has been used here to handle the normalization, serialization, deserialization and decoding of data.
  This decision was fairly easy to make as this allows for the conversion and manipulation of JSON data to be handled within these classes.
  The hardest part about using the serializer is the large amount of constructor dependencies required to support object normalization,
  however thanks to autowiring, we are able to slim down our constructors to:
  ```php
     /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }
  ```
  

- **Abstractions** - To allow for new links to be implemented easily, an abstraction for the base link class (AbstractLink) made the most sense.


- **Factories** - The Abstract Factory pattern was another easy decision to make due to the nature of the requirements and the creation of new links of different types.
   
