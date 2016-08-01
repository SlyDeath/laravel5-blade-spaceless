# Минификация шаблонов Blade для Laravel 5
[![Latest Stable Version](https://poser.pugx.org/slydeath/laravel5-blade-spaceless/v/stable)](https://packagist.org/packages/slydeath/laravel5-blade-spaceless)
[![Total Downloads](https://poser.pugx.org/slydeath/laravel5-blade-spaceless/downloads)](https://packagist.org/packages/slydeath/laravel5-blade-spaceless)
[![License](https://poser.pugx.org/slydeath/laravel5-blade-spaceless/license)](https://packagist.org/packages/slydeath/laravel5-blade-spaceless)

## Установка

Добавить пакет в composer.json:

```bash
composer require slydeath/laravel5-blade-spaceless
```

Открыть `config/app.php` и добавить сервис провайдера в массив `providers`:

```php
SlyDeath\Spaceless\SpacelessServiceProvider::class,
```

Для размещения файла конфигурации выполнить:

```bash
php artisan vendor:publish --provider="SlyDeath\Spaceless\SpacelessServiceProvider" --tag=config
```

## Как использовать?

Обрамить в директивы `@spaceless` и `@endspaceless` тот кусок HTML, из которого нужно удалить лишние пробелы. Обычно это начало и конец лэйаута, то есть весь шаблон:

```html
@spaceless
<!DOCTYPE html>
<html>
    <head></head>
    <body></body>
</html>
@endspaceless
```
