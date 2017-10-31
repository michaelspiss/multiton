# Multiton
A trait to implement the Multiton design pattern without any dependencies.

[![Build Status](https://travis-ci.org/michaelspiss/multiton.svg?branch=master)](https://travis-ci.org/michaelspiss/multiton)
[![Coverage Status](https://coveralls.io/repos/github/michaelspiss/multiton/badge.svg?branch=master)](https://coveralls.io/github/michaelspiss/multiton?branch=master)

## Installation

```
$ composer require michaelspiss/multiton
```
## Basic Usage
One line is enough to turn a class into a multiton:
```php
<?php

class DatabaseAccess {
    
    use MichaelSpiss\DesignPatterns\Multiton;
    
    ...
}
```
To retrieve the multiton instance, simply call ::getInstance() with a unique identifier:
```php
$instance = DatabaseAccess::getInstance('ID');
```
Another instance can be retrieved by doing the exact same with another ID.

During initialization the constructor is called with the identifier as argument.
You can change the __construct() method as you wish, as long as it only requires
the identifier as attribute and it's visibility is ```protected```, to prevent
instantiations via the ```new``` operator.

## PHP Requirements
* PHP >= 5.4

## License
MIT
