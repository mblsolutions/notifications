# Notifications

This package is for sending messages via a number of channels. Currently implemented is: Microsoft Teams, Mail, Log file

## Installation

The recommended way to install Inspired Deck Larvel is through [Composer](https://getcomposer.org/).

```bash
composer require mblsolutions/notifications
```

## Laravel without auto-discovery

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```php
\MBLSolutions\Notifications\NotificationsServiceProvider::class,
```

## Usage

Copy the package config to your local config with the publish command:

```bash
php artisan vendor:publish --provider="MBLSolutions\Notifications\NotificationsServiceProvider"
```

A new config file will be available in `config/notifications.php`.

The config uses sensible defaults, but you can change these via `.env` variables

```dotenv
NOTIFICATIONS_CHANNEL=stack # Options: stack, log, teams, mail
NOTIFICATIONS_LOG_CHANNEL=single # This should be one of the options in config('logging.channels')
NOTIFICATIONS_TEAMS_WEBHOOK_URL= # You must set this up via following this guide: https://learn.microsoft.com/en-us/microsoftteams/platform/webhooks-and-connectors/how-to/add-outgoing-webhook
NOTIFICATIONS_MAILER=smtp # This should be one of the options in config('mail.mailers')
NOTIFICATIONS_MAIL_FROM_ADDRESS= # The default from mail address
NOTIFICATIONS_MAIL_FROM_NAME= # The default from mail name
NOTIFICATIONS_MAIL_TO_ADDRESS= # The default to mail address
NOTIFICATIONS_MAIL_TO_NAME= # The default to mail name
```
