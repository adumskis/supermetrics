# Supermetrics task

## Running project locally
### Requiremnts
* Docker ^19;
* Docker Compose ^1.25;

### Steps
* Build containers `make up`;
* Install composer dependencies `make composer_install`;
* Run database migrations `make migrate`;
* Fetch posts `make fetch_posts`;
* Check API endpoints:
    * http://localhost:8080/stats/average-posts-length-by-months
    * http://localhost:8080/stats/longest-posts-by-months
    * http://localhost:8080/stats/posts-count-by-weeks
    * http://localhost:8080/stats/average-posts-count-per-user-by-months

## Used components
* symfony/dependency-injection - to help manage application components;
* guzzlehttp/guzzle - curl requests wrapper for Supermetrics client;
* symfony/yaml & symfony/config - for easier application configuration;
* illuminate/database - database query builder to not write totally raw queries in code;

## Features
* Dependency injection - integrated Symfony DI component;
* Basic router to handle request and call controller methods;
* Basic job to handle request to fake Supermetrics API;
* Implemented DB connection with repositories;
* Implemented cache ending (with Redis driver) for token storage;
* Configuration component;
* Configured local environment on Docker (Docker Compose);
* Makefile - to make life easier;
