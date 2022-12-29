
<div class="site-wrap">

  <nav class="site-nav">

    <div class="name">
      <?php echo CHtml::encode(Yii::app()->name); ?>

    </div>
    <div class="mobile-icon" onclick="showMobileMenu();">
<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" enable-background="new 0 0 512 512" height="32px" viewBox="0 0 512 512" width="32px" class=""><g><g><path d="m174 240h-108c-36.393 0-66-29.607-66-66v-108c0-36.393 29.607-66 66-66h108c36.393 0 66 29.607 66 66v108c0 36.393-29.607 66-66 66zm-108-208c-18.748 0-34 15.252-34 34v108c0 18.748 15.252 34 34 34h108c18.748 0 34-15.252 34-34v-108c0-18.748-15.252-34-34-34z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m446 240h-108c-36.393 0-66-29.607-66-66v-108c0-36.393 29.607-66 66-66h108c36.393 0 66 29.607 66 66v108c0 36.393-29.607 66-66 66zm-108-208c-18.748 0-34 15.252-34 34v108c0 18.748 15.252 34 34 34h108c18.748 0 34-15.252 34-34v-108c0-18.748-15.252-34-34-34z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m392 512c-66.168 0-120-53.832-120-120s53.832-120 120-120 120 53.832 120 120-53.832 120-120 120zm0-208c-48.523 0-88 39.477-88 88s39.477 88 88 88 88-39.477 88-88-39.477-88-88-88z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m174 512h-108c-36.393 0-66-29.607-66-66v-108c0-36.393 29.607-66 66-66h108c36.393 0 66 29.607 66 66v108c0 36.393-29.607 66-66 66zm-108-208c-18.748 0-34 15.252-34 34v108c0 18.748 15.252 34 34 34h108c18.748 0 34-15.252 34-34v-108c0-18.748-15.252-34-34-34z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/></g></g> </svg>
    </div>
<?php


                $items = array();
                if(empty($_GET['r'])){
                  $getpage = '';
                }else{
                  $getpage = explode('/', $_GET['r']);
                }

                function CheckIfPage($p, $gp){
                  if($p == $getpage){
                    return $this->menu;
                  }else{
                    return '';
                  }
                }

                $simple = (Yii::app()->theme && in_array(Yii::app()->theme->name, array('simple', 'mobile', 'platform')));
                $items[] = array('label'=>Yii::t('mc', 'Home'), 'url'=>array('/site/page', 'view'=>'home'),);

                if (@Yii::app()->params['installer'] !== 'show')
                {
                  /* Servers */
                  if(substr(Yii::app()->request->getQuery('r'), 0, strlen('server')) == "server"){
                     if(empty($this->menu)){
                      $showpage = array('0' => array('label' => "Create Server",'url' => array('0' => 'server/create')));
                     }else{
                      $showpage = $this->menu;
                     }
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Servers'),
                        'url'=>array('/server/index', 'my'=>1),
                        'visible'=>(!Yii::app()->user->isGuest || Yii::app()->user->showList),
                        'items'=>$showpage,

                    );
                  }else{
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Servers'),
                        'url'=>array('/server/index', 'my'=>1),
                        'visible'=>(!Yii::app()->user->isGuest || Yii::app()->user->showList),
                    );
                  }
                  /* Users */
                    if(substr(Yii::app()->request->getQuery('r'), 0, strlen('user')) == "user"){
                      $items[] = array(
                        'label'=>Yii::t('mc', 'Users'),
                        'url'=>array('/user/index'),
                        'visible'=>(Yii::app()->user->isStaff()
                            || !(Yii::app()->user->isGuest || (Yii::app()->params['hide_userlist'] === true) || $simple)),
                        'items'=>$this->menu,
                    );
                    }else{
                      $items[] = array(
                          'label'=>Yii::t('mc', 'Users'),
                          'url'=>array('/user/index'),
                          'visible'=>(Yii::app()->user->isStaff()
                              || !(Yii::app()->user->isGuest || (Yii::app()->params['hide_userlist'] === true) || $simple)),
                      );
                    }

                    /* Profile */
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Profile'),
                        'url'=>array('/user/view', 'id'=>Yii::app()->user->id),
                        'visible'=>(!Yii::app()->user->isStaff() && !Yii::app()->user->isGuest
                            && ((Yii::app()->params['hide_userlist'] === true) || $simple)),
                    );
                    /* Settings */
                    if(substr(Yii::app()->request->getQuery('r'), 0, strlen('daemon')) == "daemon"){
                      $items[] = array(
                          'label'=>Yii::t('mc', 'Settings'),
                          'url'=>array('/daemon/index'),
                          'visible'=>Yii::app()->user->isSuperuser(),
                          'items'=>$this->menu,
                      );
                    }else{
                      $items[] = array(
                          'label'=>Yii::t('mc', 'Settings'),
                          'url'=>array('/daemon/index'),
                          'visible'=>Yii::app()->user->isSuperuser(),
                      );
                    }
                    if (!empty(Yii::app()->params['support_url']))
                    {
                        $items[] = array(
                            'label'=>Yii::t('mc', 'Support'),
                            'url'=>Yii::app()->params['support_url'],
                        );
                    }
                    else
                    {
                        $items[] = array(
                            'label'=>Yii::t('mc', 'Support'),
                            'url'=>array('/site/report'),
                            'visible'=>!empty(Yii::app()->params['admin_email']),
                        );
                    }
                }
                if (Yii::app()->user->isGuest)
                {
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Login'),
                        'url'=>array('/site/login'),
                    );
                }
                else
                {
                    $items[] = array(
                        'label'=>Yii::t('mc', 'Logout'),
                        'url'=>array('/site/logout'),
                    );
                }
                
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>$items,
                    'htmlOptions'=>array('class' => 'navbar-nav', 'id' => 'mobilemenu')
                ));
                ?>


  </nav>
  <main>

<script type="text/javascript">
  function showMobileMenu() {
  var x = document.getElementById("mobilemenu");
  if (x.className === "navbar-nav") {
    x.className += " openedmobilemenu";
  } else {
    x.className = "navbar-nav";
  }
}
</script>