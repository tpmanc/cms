# Nested Sets Behavior for Yii 2

A modern nested sets behavior for the Yii framework utilizing the Modified Preorder Tree Traversal algorithm.

## Install via Composer

Run the following command to install the [Composer Asset Plugin](https://github.com/francoispluchino/composer-asset-plugin):

```bash
$ composer global require "fxp/composer-asset-plugin:1.0.0"
```

Now install aplication

```bash
$ composer create-project --prefer-dist tpmanc/cms /path/to/install/
```


## Migrations

Run the following command

```bash
$ php yii migrate/create
```


## Configuring

Configure DB connection in `common/config/main-local.php`

```php
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=127.0.0.1;dbname=dbname',
            'username' => 'user',
            'password' => 'password',
            'charset' => 'utf8',
        ],
```


# backend


## Пользователи

~~Авторизация~~

~~Регистрация~~

Разделение доступа

Возможность создавать учетки для фриланса

~~Упарвление аккаунтами~~





## Настройка сайта

Настройки сайта

Кастомизация dashboard

~~Создание многоуровневого меню~~

Пункты самовывоза

Обновление остатков

~~Способы доставки~~

~~Способы оплаты~~

Виджет доставки

Цветовые шаблоны админки





## Генераторы

Генератор sitemap.xml (модуль)

Генератор YML (модуль)

Генератор Яндекс.Вебмастер (модуль)

Генератор Google Merchant Center (модуль)

Генератор mail.ru (модуль)

Генератор tiu.ru (модуль)





## Сущности

~~Страницы~~

Статьи (модуль)

Новости (модуль)

~~Категории~~

~~Теги~~ (вместо тегов - категории)

~~Товары~~

~~Связь товара с категориями~~

~~Меню~~

~~Остатки~~

Заказы

Комментарии к заказам

Рекомендации к товарам (модуль)

Изображения

Страницы ошибок

Видео к товарам (модуль)

Характеристики товаров

Фильтры по товарам

Файлы (например, инструкция) (модуль)





## Разное

Рассыльщик писем (модуль)

Поиск по заказам

Редактор баннеров (модуль)

Отзывы о товарах (модуль)

Отзывы о магазине (модуль)

Авторезервирование заказов (модуль)

Сброс кеша (модуль)

Связб товаров с 10med (модуль)

