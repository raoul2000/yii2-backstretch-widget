<?php
namespace raoul2000\widget\backstretch;

use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;

/**
 * This Backstretch widget is a wrapper for the [jQuery Backstretch Plugin](http://srobbin.com/jquery-plugins/backstretch/).
 * For documentation on the plugin option, please refer to [jquery-backstretch Github page](https://github.com/srobbin/jquery-backstretch).
 *
 * @author Raoul <raoul.boulard@gmail.com>
 *
 */
class Backstretch extends Widget
{
	/**
	 * @var string JQuery selector to attach the Backstretch widget to.
	 */
	public $selector;

	/**
	 * @var array Backstretch plugin options
	 */
	public $pluginOptions = [];

	private $_images = [];
	private $_options = [];

	/**
	 * Validate initialisation properties.
	 * @see \yii\base\Object::init()
	 */
	public function init()
	{
		parent::init();

		if ( is_array($this->pluginOptions)) {
			$optionCount = count($this->pluginOptions);
			if ( $optionCount == 0 ) {
				throw new InvalidConfigException('The "pluginOptions" property must define at least an image set.');
			} else {
				$this->initImages($this->pluginOptions[0]);
				if ( $optionCount > 1) {
					if ( ! is_array($this->pluginOptions[1]) ) {
						throw new InvalidConfigException('The "pluginOptions" property must contains an array of options as second element.');
					} else {
						$this->_options = $this->pluginOptions[1];
					}
				}
			}
		} elseif (is_string($this->pluginOptions)) {
			$this->_images = $this->pluginOptions;
		} else {
			throw new InvalidConfigException('The "pluginOptions" property must be an array or a string.');
		}
	}
	/**
	 * Initialize the image set.
	 *
	 * @param array|string $val
	 * @throws InvalidConfigException
	 */
	private function initImages($val)
	{
		if ( ! is_string($val) && ! is_array($val) ) {
			throw new InvalidConfigException('The "pluginOptions" property must contain a string or an array as first element.');
		} else {
			$this->_images = $val;
		}
	}
	/**
	 * @see \yii\base\Widget::run()
	 */
	public function run()
	{
		$this->registerClientScript();
	}

	/**
	 * Generate and register javascript to start the plugin
	 */
	public function registerClientScript()
	{
		$js = '';

		if ( empty($this->selector) ) {
			$js.= '$';
		} else {
			$js.=  '$("'.$this->selector.'")';
		}

		if ( is_string($this->_images) ) {
			$images = $this->_images;
			$js.= '.backstretch("' . $images .'"';
		} elseif (is_array($this->_images)) {
			$js.= '.backstretch(' . Json::encode($this->_images);
		}


		if ( count($this->_options) != 0 ) {
			$js.= ','.Json::encode($this->_options);
		}
		$js.= ');';

		$view = $this->getView();
		BackstretchAsset::register($view);
		$view->registerJs($js);
	}
}
