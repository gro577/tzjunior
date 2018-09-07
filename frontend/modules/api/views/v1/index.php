<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$js = <<<JS
    $('form').on('beforeSubmit', function(){
        var data = new Object();
        data['order']=$('#order').val();
        var json= JSON.stringify(data);
        $.ajax({
            url: 'order',
            type: 'POST',
            data: 'json='+json,
            success: function(res){
                console.log(res);
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

<?= Html::input('text','order',"",['id'=>"order"])?>
<br>
<?= Html::submitButton('send',['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>
</div>