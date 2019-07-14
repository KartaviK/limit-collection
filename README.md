# Limit typed collection

[![codecov](https://codecov.io/gh/KartaviK/limit-collection/branch/master/graph/badge.svg)](https://codecov.io/gh/KartaviK/limit-collection)
[![Latest Stable Version](https://poser.pugx.org/kartavik/limit-collection/v/stable)](https://packagist.org/packages/kartavik/limit-collection)
[![Total Downloads](https://poser.pugx.org/kartavik/limit-collection/downloads)](https://packagist.org/packages/kartavik/limit-collection)
[![License](https://poser.pugx.org/kartavik/limit-collection/license)](https://packagist.org/packages/kartavik/limit-collection)

Based on [BaseCollection](https://github.com/wearesho-team/base-collection)

## Install

```bash
composer require kartavik/limit-collection
```

## Usage

```php
<?php

use Kartavik\LimitCollection;

class CustomCollection extends LimitCollection
{
    public function type() : string
    {
        return stdClass::class; // see Wearesho\BaseCollection
    }
    
    public function limit() : int
    {
        return 5; // here you can put hardcode limit of collection
    }
}
```

## Author

- [Roman <Kartavik> Varkuta](mailto:roman.varkua@gmail.com)

## License

- [MIT](./LICENSE)
