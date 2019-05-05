[![Build Status](https://travis-ci.org/sopnopriyo/sopnopriyo-backend.svg?branch=master)](https://travis-ci.org/sopnopriyo/sopnopriyo-backend)
# sopnopriyo
<<<<<<< HEAD
This is the backend of my personal website. Developed using Java, Spring Boot, MySql and Hibernate
=======

This application was generated using JHipster 6.0.0, you can find documentation and help at [https://www.jhipster.tech/documentation-archive/v6.0.0](https://www.jhipster.tech/documentation-archive/v6.0.0).

This is a "gateway" application intended to be part of a microservice architecture, please refer to the [Doing microservices with JHipster][] page of the documentation for more information.

This application is configured for Service Discovery and Configuration with . On launch, it will refuse to start if it is not able to connect to .
>>>>>>> jhipster_upgrade

## Development

To start the application in the dev profile, simply run:

    ./mvnw


For further instructions on how to develop with JHipster, have a look at [Using JHipster in development][].

### Swagger specification
    http://localhost:8080/v2/api-docs

## Building for production

### Packaging as jar

To build the final jar and optimize the sopnopriyo application for production, run:

    ./mvnw -Pprod clean verify

To ensure everything worked, run:

    java -jar target/*.jar


Refer to [Using JHipster in production][] for more details.

### Packaging as war

To package your application as a war in order to deploy it to an application server, run:

    ./mvnw -Pprod,war clean verify

## Testing

To launch the application's tests, run:

    ./mvnw verify

For more information, refer to the [Running tests page][].

<<<<<<< HEAD
=======
### Code quality

Sonar is used to analyse code quality. You can start a local Sonar server (accessible on http://localhost:9001) with:

```
docker-compose -f src/main/docker/sonar.yml up -d
```

You can run a Sonar analysis with using the [sonar-scanner](https://docs.sonarqube.org/display/SCAN/Analyzing+with+SonarQube+Scanner) or by using the maven plugin.

Then, run a Sonar analysis:

```
./mvnw -Pprod clean verify sonar:sonar
```

If you need to re-run the Sonar phase, please be sure to specify at least the `initialize` phase since Sonar properties are loaded from the sonar-project.properties file.

```
./mvnw initialize sonar:sonar
```

or

For more information, refer to the [Code quality page][].

>>>>>>> jhipster_upgrade
## Using Docker to simplify development (optional)

You can use Docker to improve your JHipster development experience. A number of docker-compose configuration are available in the [src/main/docker](src/main/docker) folder to launch required third party services.

For example, to start a mysql database in a docker container, run:

    docker-compose -f src/main/docker/mysql.yml up -d

To stop it and remove the container, run:

    docker-compose -f src/main/docker/mysql.yml down

You can also fully dockerize your application and all the services that it depends on.
To achieve this, first build a docker image of your app by running:

<<<<<<< HEAD
    ./mvnw verify -Pprod dockerfile:build dockerfile:tag@version dockerfile:tag@commit
=======
    ./mvnw -Pprod verify jib:dockerBuild
>>>>>>> jhipster_upgrade

Then run:

    docker-compose -f src/main/docker/app.yml up -d

For more information refer to [Using Docker and Docker-Compose][], this page also contains information on the docker-compose sub-generator (`jhipster docker-compose`), which is able to generate docker configurations for one or several JHipster applications.

## Continuous Integration (optional)

To configure CI for your project, run the ci-cd sub-generator (`jhipster ci-cd`), this will let you generate configuration files for a number of Continuous Integration systems. Consult the [Setting up Continuous Integration][] page for more information.

<<<<<<< HEAD
[JHipster Homepage and latest documentation]: https://www.jhipster.tech
[JHipster 5.1.0 archive]: https://www.jhipster.tech/documentation-archive/v5.1.0

[Using JHipster in development]: https://www.jhipster.tech/documentation-archive/v5.1.0/development/
[Using Docker and Docker-Compose]: https://www.jhipster.tech/documentation-archive/v5.1.0/docker-compose
[Using JHipster in production]: https://www.jhipster.tech/documentation-archive/v5.1.0/production/
[Running tests page]: https://www.jhipster.tech/documentation-archive/v5.1.0/running-tests/
[Setting up Continuous Integration]: https://www.jhipster.tech/documentation-archive/v5.1.0/setting-up-ci/


=======
[jhipster homepage and latest documentation]: https://www.jhipster.tech
[jhipster 6.0.0 archive]: https://www.jhipster.tech/documentation-archive/v6.0.0
[doing microservices with jhipster]: https://www.jhipster.tech/documentation-archive/v6.0.0/microservices-architecture/
[using jhipster in development]: https://www.jhipster.tech/documentation-archive/v6.0.0/development/
[using docker and docker-compose]: https://www.jhipster.tech/documentation-archive/v6.0.0/docker-compose
[using jhipster in production]: https://www.jhipster.tech/documentation-archive/v6.0.0/production/
[running tests page]: https://www.jhipster.tech/documentation-archive/v6.0.0/running-tests/
[code quality page]: https://www.jhipster.tech/documentation-archive/v6.0.0/code-quality/
[setting up continuous integration]: https://www.jhipster.tech/documentation-archive/v6.0.0/setting-up-ci/
[openapi-generator]: https://openapi-generator.tech
[swagger-editor]: http://editor.swagger.io
[doing api-first development]: https://www.jhipster.tech/documentation-archive/v6.0.0/doing-api-first-development/
>>>>>>> jhipster_upgrade
