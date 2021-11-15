Page guide extension WIP
====================
Ability to add guide or assistant to pages for better user orientation or explaining functionality to user

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

#### 2. Add to modules in your web.php

```php 
'pageGuide' => [
    'class' => \matejch\pageGuide\PageGuide::class,
]

```

#### 3. Add widget on pages you want to use page guide on

By default it is rendered in place you put widget on

```php
 <?= \matejch\pageGuide\widget\PageAssist::widget() ?>
```

If you want it to be positioned on right top side, use widget option **_'btnPositionCss'_**

```php 
<?= \matejch\pageGuide\widget\PageAssist::widget(['btnPositionCss' => 'position: fixed;top: 100px;right: -2px;']) ?>

```

Usage
-----
Access index and form for creation of rules with 

```php 
{key_of_module_you_use_in_web.php}/page-guide/index
```
#### 1. Create new set of rules

Insert url on your yii web page into first input

Press button go to page that opens url in new window

From this window drag and drop elements you want to use into previous window

You can also set it by hand, just add step number, element id and text

check image of page guide form
![](readme/Create%20page%20guide.png)


#### 2. Add widget to the page you want to use it on

When you are in creator mode, every draggable element is highlighted with blue dashed border

By default, in creator mode all visible input elements on page are set as draggable, and if form is detected on page

also, all elements with form-group class are set.

------

With widget option _**'selectors'**_ (array), you can set multiple class names or ids or other valid _css selectors_

for picking draggable elements in creator mode.

```php 
<?= \matejch\pageGuide\widget\PageAssist::widget(['selectors' => ['.guide','#selectable_id']]) ?>

```