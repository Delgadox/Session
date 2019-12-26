<?php
/**
 * Created by PhpStorm.
 * User: ClassUser
 * Date: 26.12.2019
 * Time: 11:28
 */
/* @var $this yii\web\View */

use yii\{helpers\Html, bootstrap\ActiveForm, captcha\Captcha};
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
        </div>
        <div class="input">
            <?php //$model['name'] = null; $model['text']= null;?>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'text')->textarea(['rows' => 3]) ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <?php
        echo '
            <div>
            '.$return.'
            </div>
        '?>
    </div>
</div>