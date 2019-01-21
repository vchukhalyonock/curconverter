# curconverter

## Description

Convert currencies using thirt party service

## Install

- donwlonad
- `composer install`
- `composer dump-autoload -o`
- `cp .env-example .env`
- edit .env file 
- configure your web-server using www as root directory

## Add new provider

Add class in _providers_ folder inherit _Provider_ class. Update RATE_PROVIDER option with new class name.
`composer dump-autoload -o`
