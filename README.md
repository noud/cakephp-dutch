# CakePHP Dutch

Dutch provides inflector rules for the Dutch language.

## Requirements

The master branch has the following requirements:

* CakePHP 2.2.0 or greater.
* PHP 5.3.0 or greater.

## Installation

* Clone/Copy the files in this directory into `app/Plugin/Dutch`
* Ensure the plugin is loaded in `app/Config/bootstrap.php` like so:

```php
CakePlugin::load('Dutch');
include CakePlugin::path('Dutch') . 'Config' . DS . 'inflections.php';
```

### Using

This should give you elementry Dutch inflection rules.
Any comments or additions welcome.
