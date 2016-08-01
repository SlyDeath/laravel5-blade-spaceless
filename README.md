# Минификация шаблонов Blade для Laravel 5

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
