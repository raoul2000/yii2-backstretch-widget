<?php
namespace raoul2000\widget\backstretch;

use yii\web\AssetBundle;

/**
 * @author Raoul <raoul.boulard@gmail.com>
 */
class BackstretchAsset extends AssetBundle
{

	public $depends = [
		'yii\web\JqueryAsset'
	];
	/**
	 * @see \yii\web\AssetBundle::init()
	 */
	public function init()
	{
		$this->sourcePath = __DIR__.'/assets';
		$this->js = [
			'jquery.backstretch'.( YII_ENV_DEV ? '.js' : '.min.js' )
		];
		return parent::init();
	}
}
