# Optimus Silex Service Provider
This library provides a Optimus service for the Silex framework.

## Installation
```bash
composer require jaam/silex-optimus-provider
```

## Usage
Full documentartion of the Optimus library can be found in its repository: https://github.com/jenssegers/optimus

Firstly, generate your Prime, Inverse Prime and Random values.
```bash
php vendor/bin/optimus spark
```

Feed these values into the container.
```php
use Jaam\Silex\Provider\OptimusServiceProvider;

$app->register(new OptimusServiceProvider, [
    'optimus.options' => [
        'prime' => YOUR_PRIME
        'inverse' => YOUR_INVERSE
        'random' => YOUR_RANDOM
    ]
]);

$hashId = $app['optimus']->encode($myId);
$myId = $app['optimus']->decode($hashId);
```

#### Twig Extension
If the `twig` service is available, the service provider adds an extension enabling a Twig filter to use in your templates.

```twig
{{ my_id|optimus }}
```

#### Services
The provider exposes a `optimus` service. Please see the [Optimus documentation](https://github.com/jenssegers/optimus) for full usage.