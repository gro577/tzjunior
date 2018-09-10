<?php
namespace frontend\modules\api\models;

use frontend\modules\api\interfaces\MailInterface;
use yii\base\Model;
use Yii;

class Order extends Model implements MailInterface
{
    private $number;

    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }

    public function setNumber($number){
        $this->number=$number;
    }
    public function sendMail()
    {
        Yii::$app->mailer->compose('order',['number'=>$this->number])
            ->setTo(\Yii::$app->params['supportEmail'])
            ->setFrom('igor5777@yandex.ru')
            ->setSubject("письмо с заказом")
            ->send();

        return true;
    }
}