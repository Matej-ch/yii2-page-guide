Page guide extension WIP
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

It can be rendered on the bottom of the page

```php
 <?= \matejch\pageGuide\widget\PageAssist::widget() ?>
```

Or if you want it to be positioned on right top side

```php 
<?= \matejch\pageGuide\widget\PageAssist::widget(['btnPositionCss' => 'position: fixed;top: 100px;right: -2px;']) ?>

```

Usage
-----
You can access index and form for creation with 

```php 
{key_of_module_you_use_in_web.php}/page-guide/index
```

#### 1. Add it to the page you want to use it

#### 2. Create new set of rules

insert url into input

Press button go to page that opens in new window

From this window drag and drop elements you want to use

