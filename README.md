## Description

The application represents a simple data collector.

The data is collected from several sources, combined and send to storage.

There is only one entry point: symfony console command `app:user:collect`

## Prerequisites

* docker compose https://docs.docker.com/compose/

## Run application

```
docker compose build --pull --no-cache
docker compose up -d
docker compose exec php composer install
```

## Run tests

```
docker compose exec php bin/phpunit
```

## Cron job configuration
`* * * * * /var/www/bin/console app:user:collect`
