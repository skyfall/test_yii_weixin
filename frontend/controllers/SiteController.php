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
	
	
	public function actionWxMessage(){
		/**
		 * @var weixin $weixin
		 */
		$weixin = \Yii::$app->weixin;

		$weixin->getMessageTxtArr();
		
		if (!$weixin->MsgType){
			return \Yii::$app->request->get('echostr');
		}
		$ResponseText = $weixin->getResponse()->getResponseText();
		$ResponseText->Content = time();
		return $ResponseText->getResponse();
	}
}
