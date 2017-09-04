# Flashable
A simple trait to flash when model events are fired, like `created`, `updated`, and `saved`.
Using Jeffrey Way's excellent [Flash](https://github.com/laracasts/flash) package to actually display the flash messages.

## Installation
Begin by pulling in the package through Composer.

```
composer require tonning/flashable
```

Then add the trait to the model you want to automatically flash on crud actions.

```php
use Tonning\Flashable\Flashable;

class Post extends Model
{
    use Flashable;
    
    ...
}
```

## Customization
You can specify the name of the model by adding a `getModelName` method on you model.

```php
public function getModelName() {
  return 'Blog post';
}
```

For even more fine grain control you can add a protected property on the model.

```php
protected $flashable = [
  'created' => 'Your blog post have been created. Good job!',
  'updated' => 'I hope nobody saw those mistakes...',
  'deleted' => 'Be gone blog post!'
]
```
