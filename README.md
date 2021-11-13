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


Usage
-----

First migrate table, neccesary for saving rules on pages

./yii migrate --migrationPath=@vendor/matejch/yii2-page-guide/src/migrations

link to list of rules and form for creating rules is {name of module you use in web.php}/page-guide/index

<?= widget_name::widget(['btnPositionCss' => 'position: fixed;top: 100px;right: 0;']) ?>

