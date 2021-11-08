Page guide extension
====================
Ability to add guide to pages for user orientation

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist matej-ch/yii2-page-guide "*"
```

or add

```
"matej-ch/yii2-page-guide": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \matejch\pageGuide\AutoloadExample::widget(); ?>```