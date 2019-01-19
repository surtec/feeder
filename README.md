# Feeder


> This branch is for Laravel 4.x

An Atom and RSS feed client for the Laravel Framework

## Installation

Add the following line to the `require` section of `composer.json`:

```json
{
    "require": {
        "surtec/feeder": "4.*"
    }
}
```

Run `composer update`.

## Configuration

Publish the package configuration using Artisan.

```
php artisan config:publish surtec/feeder
```

Find the providers key in your app/config/app.php and register the Feed Client Service Provider.

```php
'providers' => array(
    // ...
    'Surtec\Feeder\FeederServiceProvider',
)
```

Find the aliases key in your app/config/app.php and add the Feed Client facade alias.

```php
'aliases' => array(
    // ...
    'Feeder' => 'Surtec\Feeder\FeederFacade'
)
```

Open the configuration file in app/config/packages/surtec/feeder/config.php, and add the feed 
you need to access

```php
<?php
// app/config/packages/surtec/feeder/config.php

return array(
    // The `laravel` key here is used to fetch the feed later. You can specify multiple
    // feeds, just use another key.
    'laravel' => array(
        
        // Feed type, either `atom` or `rss`
        // Required
        // Default: none
        'type'          => 'atom',
        
        // Url of the feed
        // Required
        // Default: none
        'url'           => 'https://github.com/laravel/laravel/commits/master.atom',
        
        // username required to access feed
        // Optional
        // Default: null
        'user'          => null,
        
        // password required to access feed
        // Optional
        // Default: null
        'password'      => null,
        
        // whether or not to cache the feed locally. I would recommend leaving this
        // on, unless you plan on caching it yourself. It will use whatever cache
        // driver you have specified for your application.
        // Optional
        // Default: true
        'cached'        => true,
        
        // time in minutes to cache feed
        // Optional
        // Default: 60
        'cacheTimeout'  => 60
    )
);
```

## Usage

Fetch the client from the Laravel IOC Container and get the feed 
with the key you provided in the configuration file:

```php
$feeder = App::make('feeder');
$feed = $feeder->get('laravel');

// or with the Facade
$feed = Feeder::get('laravel');
```

Access methods to get the information from the feed:

```php
$feed->getTitle(); // Feed Title
$feed->getDescription(); // Feed Description
$feed->getLink(); // Link to feed

$feed_items = $feed->getItems(); // Items in feed

// Feed items are given as a collection of FeedItem objects
foreach($feed_items as $item) {
    $item->getTitle(); // Item Title
    $item->getTime(); // Publication Time as DateTime object
    $item->getLink(); // Get link for Item
    $item->getDescription(); // Item Description
}
```
