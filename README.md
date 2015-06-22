Backstretch Yii2 Extension
==========================
This yii2 extension is a wrapper around the [jQuery Backstretch Plugin](http://srobbin.com/jquery-plugins/backstretch/).

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist raoul2000/yii2-backstretch-widget "*"
```

or add

```
"raoul2000/yii2-backstretch-widget": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code like for instance in the examples below.

**Start a slideshow on the background of element #elementId**. 

Note that the images are defined as local or remote. The second argument of *pluginOptions* contains the plugin
initialization settings that can be redefined if the default ones are not what you want.

```php
	raoul2000\widget\backstretch\Backstretch::widget([
		'selector' => '#elementId',
		'pluginOptions' => [
			[
				'path/to/image1.jpg',
				'http://hostname1/path/to/image2.jpg',
				'http://hostname2/path/to/image3.jpg'
			],
			[
				'duration' => 3000,
				'fade' => 'slow',
				'centeredX' => true,
				'centeredY' => true
			]
		]
	]);
```

**To attach Backstretch as the body's background**

In its simplest form, attach an image to the background of the body element. Default settings are used to initialize 
the plugin. 

```php
	raoul2000\widget\backstretch\Backstretch::widget([
		'pluginOptions' => 'path/to/image1.jpg'
	]);
```

For complete documentation please refer to the [jquery-backstretch Github page](https://github.com/srobbin/jquery-backstretch)

**If this plugin did not convinced you, have a look to the [Background Switcher Plugin](https://github.com/raoul2000/yii2-bgswitcher-widget)**

License
-------

**yii2-backstretch-widget** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.
