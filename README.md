# Vimeo Symfony Console

Vimeo console commands

## Requirements
- Docker version
- docker-compose
- docker-machine
- Vimeo API credentials

## Install
```
composer require pfwd/vimeo-scripts
```

## Configure
```
$ cp .env.dist .env
```
Update the API credentials in .env

# Build Docker Containers
```
$ docker-machine create vimeo-scripts
$ docker-machine env vimeo-scripts
$ eval $(docker-machine env vimeo-scripts)
$ docker-compose up -d --build
```

## Console Commands
See the scripts [index page](docs/scripts/index.md) for a list of available console commands

## Uninstall
```
$ docker-machine rm vimeo-scripts
```