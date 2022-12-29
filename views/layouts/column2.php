<?php
/**
 *
 *   Copyright © 2010-2018 by xhost.ch GmbH
 *
 *   All rights reserved.
 *
 **/
?>

<?php
if (Yii::app()->user->isGuest && (Yii::app()->controller->id == "site"))
    return $this->renderPartial('//layouts/mini', array('content'=>$content));

$this->beginContent('//layouts/main');
?>
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0"><?php $pname = explode('- ', $this->pageTitle); echo $pname[1]; ?></h6>
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
		    			<?php echo $content; ?>
		    		</div>
				</div>
			</div>
		</div>
	</div>
<?php $this->endContent(); ?>
