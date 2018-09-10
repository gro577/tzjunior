<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$js = <<<JS
    $('form').on('beforeSubmit', function(){
        var data = new Object();
        data['order']=$('#order').val();
        data['api_token']=$('#api_token').val();
        console.log(data);
        var json= JSON.stringify(data);
        $.ajax({
            url: 'order',
            type: 'POST',
            data: 'json='+json,
            success: function(res){
               alert('Письмо отправлено');
            },
            error: function(){
                alert('Error!');
            }
        });
        return false;
    });
JS;

$this->registerJs($js);
?>

    <?php $form = ActiveForm::begin(); ?>

Номер заказа:<?= Html::input('text','order',"",['id'=>"order"])?>
<?= Html::hiddenInput('api_token',Yii::$app->request->cookies->get('api_token'),['id'=>"api_token"])?>

<?= Html::submitButton('Отправить',['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
</div>