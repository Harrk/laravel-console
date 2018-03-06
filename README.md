# Laravel Console
-- WORK IN PROGRESS --

This package simplifies access to Symfony's console package by offering some styled commonly used
output functions.

## Installation
```bash
$ composer require harrk/laravel-console
```

## Usage
Once installed, the console can be accessed through a helper function.
```php
console()->info('Hello World');
```

### Methods
- info
- warning
- danger
- error
- question
- writeLine