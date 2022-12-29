<?php
/**
 *
 *   Copyright © 2010-2018 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('mc', 'Register');
$this->breadcrumbs=array(
    Yii::t('mc', 'Register'),
);
?>

<div class="header col-md-12 col-lg-12 bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><?php echo CHtml::encode(Yii::app()->name); ?><br><small><?php echo Yii::t('mc', 'Minecraft Server Manager') ?></small></h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12">
                <div class="card bg-white">
                    <div class="card-body">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'register-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('autocomplete'=>'off'),
)); ?>

<?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name'); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'confirmPassword'); ?>
        <?php echo $form->passwordField($model,'confirmPassword'); ?>
        <?php echo $form->error($model,'confirmPassword'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

<br/>

<?php if(extension_loaded('gd')): ?>
<div class="simple">
        <?php echo $form->labelEx($model, 'verifyCode'); ?>
        <div>
        <?php $this->widget('CCaptcha'); ?><br/>
        <?php echo $form->textField($model, 'verifyCode'); ?>
        </div>
        <p class="hint"><?php echo Yii::t('mc', 'Please enter the letters as they are shown in the image above.') ?>
        <br/><?php echo Yii::t('mc', 'Letters are not case-sensitive.') ?></p>
</div>
<?php endif; ?>

<div class="action">
<?php echo CHtml::submitButton(Yii::t('mc', 'Register')); ?>
</div>

<?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>