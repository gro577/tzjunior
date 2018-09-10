<?php
namespace frontend\modules\api\controllers;

use common\models\User;
use yii\web\Controller;
use frontend\modules\api\models\Order;
use Yii;
/**
 * Created by PhpStorm.
 * User: root
 * Date: 05.09.18
 * Time: 20:51
 */
class V1Controller extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
    public function actionOrder(){
        if (Yii::$app->request->post('json')){
            $event=json_decode(Yii::$app->request->post('json'));
            if(!json_last_error()){
                if(!empty($event->api_token) && User::findByAuthKey($event->api_token)){
                    $order = new Order();
                    $order->setNumber($event->order);
                    $order->sendMail();
                }
            }
        }
    }
}