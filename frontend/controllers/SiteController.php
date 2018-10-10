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
		\Yii::info("发送的数据:".file_get_contents("php://input"));
		if (!$weixin->MsgType){
			return \Yii::$app->request->get('echostr');
		}
		
		$ResponseText = $weixin->getResponse()->getResponseText();
		$ResponseText->Content = "MsgType:".$weixin->MsgType." Event:".$weixin->Event;
		$resStr = $ResponseText->getResponse();
		
		\Yii::info("返回的数据:".$resStr);
		return $resStr;
	}
}
