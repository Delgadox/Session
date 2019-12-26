<?php

/* @var $this yii\web\View */

use yii\{helpers\Html,
    bootstrap\ActiveForm,
    captcha\Captcha
};
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div>
        <div class="output">
            <?php foreach ($items as $item){
                echo '
                    <div class="">
                        <div>'.$item['name'].'</div>
                        <div>'.$item['text'].'</div>
                    </div>
                ';
            };?>
            <div class="input">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name') ?>

                    <?= $form->field($model, 'text')->textarea(['rows' => 3]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
