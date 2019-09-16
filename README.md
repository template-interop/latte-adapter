# template-interop/latte-adapter

[latte/latte](https://github.com/nette/latte) adapter for [template-interop/engine](https://github.com/template-interop/engine).

## Installation

This package is installable and autoloadable via Composer.

```sh
$ composer require template-interop/latte-adapter
```

## Usage

```php
<?php

use Interop\Template\Latte\LatteEngine;
use Interop\Template\TemplateEngineInterface;

$latte = Latte\Engine;
$engine = new LatteEngine($latte, '.latte');
$engine->render('greeting', ['name' => 'John']);
```

You can also use it in conjunction with [template-interop/middleware](https://github.com/template-interop/middleware)
to use it in a HTTP middleware stack application.
