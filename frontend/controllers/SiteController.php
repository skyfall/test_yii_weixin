<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use sunlsoft\yiiweixin\weixin;

/**
 * Site controller
 */
class SiteController extends Controller
{
	public $enableCsrfValidation = false;
	
	
	public function acionWxMessage(){
		/**
		 * @var weixin $weixin
		 */
		$weixin = \Yii::$app->weixin;
		
		$ResponseText = $weixin->getResponse()->getResponseText();
		$ResponseText->Content = time();
		return $ResponseText->getResponse();
	}
}
