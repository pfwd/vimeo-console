# Vimeo Symfony Console

Vimeo console commands

## Requirements
- Docker version
- docker-compose
- docker-machine
- Vimeo API credentials

## Install
```
composer require pfwd/vimeo-console
```

## Configure
```
$ cp .env.dist .env
```
Update the API credentials in .env

# Build Docker Containers
```
$ docker-machine create vimeo-console
$ docker-machine env vimeo-console
$ eval $(docker-machine env vimeo-console)
$ docker-compose up -d --build
```

## Console Commands
See the scripts [index page](docs/scripts/index.md) for a list of available console commands

## Uninstall
```
$ docker-machine rm vimeo-console
```