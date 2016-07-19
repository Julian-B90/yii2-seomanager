Seo Manager
===========
Seo Manager for every Site

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist julian-b90/yii2-seomanager "*"
```

or add

```
"julian-b90/yii2-seomanager": "*"
```

to the require section of your `composer.json` file.

###Migration


Run the following command in Terminal for database migration:

Linux/Unix:
```
yii migrate/up --migrationPath=@vendor/julian-b90/yii2-seomanager/migrations
```

Windows:
```
yii.bat migrate/up --migrationPath=@vendor/julian-b90/yii2-seomanager/migrations
```


Usage
-----

Overrite Controller
```php
use julianb90\seomanager\component\Controller;

class SiteController extends Controller
{

}
```

Ad to modules
```php
    'modules' => [
        'seomanager' => [
            'class' => 'julianb90\seomanager\Module',
        ],
    ]
```

for example http://localhost.local/seomanager/seomanager/index.html


### content

To get content to every page you can use in the seomanger the content field.
To print out the content you must you this in your view.

```php
<?php
/** @var Module $module */
$module = Yii::$app->getModule('seomanager');
$conten = $module->getContent();

if ($conten !== null): ?>
    <div class="container">
        <?= $conten; ?>
    </div>
<?php endif; ?>
```
