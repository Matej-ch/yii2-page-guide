Page guide extension
====================
Ability to add guide to pages for user orientation

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist matejch/yii2-page-guide "dev-master"
```

or add

```
"matejch/yii2-page-guide": "dev-master"
```

to the require section of your `composer.json` file.

Setup
-----

#### 1. First migrate table

it is necessary for saving rules on pages

```php 
./yii migrate --migrationPath=@vendor/matejch/yii2-page-guide/src/migrations
```

#### 2. Add to module to your web.php to module part

```php 
'pageGuide' => [
    'class' => \matejch\pageGuide\PageGuide::class,
]

```

#### 3. Add widget on pages you want to use page guide on

```php
 <?= \matejch\pageGuide\widget\PageAssist::widget() ?>
```

Usage
-----
You can access index and form for creation with 

```php 
{key_of_module_you_use_in_web.php}/page-guide/index
```



