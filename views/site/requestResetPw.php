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

$this->menu=array(
    array(
        'label'=>Yii::t('mc', 'Back'),
        'url'=>array('site/login'),
        'icon'=>'back',
    ),
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
<?php if (Yii::app()->user->hasFlash('reset-success')): ?>
<div class="flash-success">
    <?php echo Yii::app()->user->getFlash('reset-success'); ?>
</div>
<?php elseif (Yii::app()->user->hasFlash('reset-error')): ?>
<div class="flash-error">
    <?php echo Yii::app()->user->getFlash('reset-error'); ?>
</div>
<?php elseif ($state =='info'): ?>
<div class="flash-error">
    <?php echo Yii::t('mc', 'Invalid request') ?>
</div>
<?php endif ?>

<?php if ($state =='info') return; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'reset-form',
    'enableAjaxValidation'=>false,
)); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton(Yii::t('mc', 'Send Reset Link')); ?>
    </div>

<?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>