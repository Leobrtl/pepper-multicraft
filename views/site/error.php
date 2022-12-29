<?php
/**
 *
 *   Copyright © 2010-2018 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
$this->pageTitle=Yii::app()->name . ' - '.Yii::t('mc', 'Error');
$this->breadcrumbs=array(
    Yii::t('mc', 'Error'),
);
?>
<style>
.error-page{
    position: fixed;
    z-index: 10000;
    left: 0;
    right: 0;
    bottom: 0;
    padding-left: 45em;
    padding-top: 10em;
    padding-right: 45em;
    top: 0;
    color: white;
    text-align: center;
    background: #131313;
    border: 30px solid #007bff;
}
.error-page h2{
	font-size: 5rem;
    color: white;
    font-weight: 200;
    border-left: 5px solid #0059b9;
    border-right: 5px solid #0059b9;
    padding-bottom: 10px;
    background: #ffffff0a;
    box-shadow: 15px 0px 0px -10px #005fc5, -15px 0px 0px -10px #005fc5, 35px 0px 0px -25px #0060c7, -35px 0px 0px -25px #0060c7;
}
.error-page .error{
font-weight: 100;
    font-size: 20px;
    padding-top: 5em;
}
</style>
<div class="col-md-12 col-md-offset-3 col-toppad error-page">
<h2><?php echo Yii::t('mc', 'Error') ?> <?php echo $code; ?></h2>

<div class="error">
<?php
if ($type == 'RawHttpException')
    echo $message;
else
    echo CHtml::encode($message);
?>
</div>
</div>
