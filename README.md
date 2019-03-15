# Vimeo Console

Console commands that interact with the Vimeo API. Can be used as a project dependency or as a standalone CLI application 

## Requirements
- docker-compose
- docker-machine
- Vimeo API credentials

## Install as a project dependency
```
composer require pfwd/vimeo-console
```

## Install as a standalone application

```
$ git clone git@github.com:pfwd/vimeo-console.git vimeo-console.git
```
### Build Docker Containers
```
$ docker-machine create vimeo-console
$ docker-machine env vimeo-console
$ eval $(docker-machine env vimeo-console)
$ docker-compose up -d --build
```

## Configure
```
$ cp .env.dist .env
```
Update the API credentials in .env

## Console Commands
See the scripts [index page](docs/scripts/index.md) for a list of available console commands

## Uninstall
```
$ docker-machine rm vimeo-console
```