<?php
/**
 *
 *   Copyright © 2010-2018 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('mc', 'Reset Password');
$this->breadcrumbs=array(
    Yii::t('mc', 'Reset Password'),
);

?>

<?php if (!strlen($l)): ?>
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
<div class="form">
<?php echo CHtml::beginForm() ?>

    <div class="row">
        <?php echo CHtml::label(Yii::t('mc', 'Token'), 'l') ?>
        <?php echo CHtml::textField('l', $l) ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton(Yii::t('mc', 'Continue')); ?>
    </div>

<?php echo CHtml::endForm() ?>
</div>

<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'reset-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('autocomplete'=>'off'),
)); ?>

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

    <div class="form-group buttons">
        <?php echo CHtml::hiddenField('l', $l) ?>
        <?php echo CHtml::submitButton(Yii::t('mc', 'Reset Password')); ?>
    </div>

<?php $this->endWidget(); ?>
</div>

<?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>