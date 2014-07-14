<?php
	Yii::app()->clientscript->registerCoreScript( 'jquery' )
		// use it when you need it!
		/*
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/bootstrap-responsive.css' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
		*/

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<base href="<?php echo Yii::app()->baseUrl; ?>">
<meta name="language" content="en" />
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Convergence|Source+Sans+Pro:900italic,400,600' rel='stylesheet' type='text/css'>
<!-- link href='http://fonts.googleapis.com/css?family=Convergence|Oxygen|Varela+Round' rel='stylesheet' type='text/css' -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#"><?php echo Yii::app()->name ?></a>

				<div class="nav-collapse">
                    <ul class="nav pull-right">
                        <?php if (Yii::app()->user->isGuest) { ?><li><a href="<?php echo Yii::app()->baseUrl; ?>/login">Login</a></li> <? } else { ?>
                        <li class="dropdown">
                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Welcome Admin <i class="caret"></i></a>
                            <ul class="dropdown-menu">
                                <?php if (Yii::app()->user->role == 'superadmin') { ?>
                                <li><a tabindex="-1" href="<?php echo Yii::app()->baseUrl; ?>/admin/create">New Admin</a></li>
                                <li class="divider"></li>
                                <?php } ?>
                                <li><a tabindex="-1" href="<?php echo Yii::app()->baseUrl; ?>/admin/update/<?=Yii::app()->user->id; ?>">Edit Profile</a></li>
                                <li><a tabindex="-1" href="<?php echo Yii::app()->baseUrl; ?>/admin/changePassword/<?=Yii::app()->user->id; ?>">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a tabindex="-1" href="<?php echo Yii::app()->baseUrl; ?>/login/logout">Logout</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
					<?php
                    $user = Yii::app()->user;
                    if($user->role == 'agency'){
                        $this->widget('zii.widgets.CMenu',array(
                            'htmlOptions' => array( 'class' => 'nav' ),
                            'activeCssClass' => 'active',
                            'items'=>array(
                                array('label'=>'<i class="icon-picture"></i> UGC', 'url'=>array('/gallery/ugc')),
                            ),
                            'encodeLabel'=>false,
                        ));
                    } else {

                    $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass' => 'active',
						'items'=>array(
                            array('label'=>'<i class="icon-screenshot"></i> Dashboard', 'url'=>array('/dashboard/index'), 'visible' => $user->checkAccess('superadmin')),
                            array('label'=>'<i class="icon-picture"></i> Admin', 'url'=>array('/user/index?role=admin'), 'visible' => $user->checkAccess('superadmin')),
                            array('label'=>'<i class="icon-picture"></i> Gallery', 'url'=>array('/gallery/index')),
                            array('label'=>'<i class="icon-picture"></i> UGC', 'url'=>array('/gallery/ugc')),
                            array('label'=>'<i class="icon-user"></i> User Screening', 'url'=>array('/users/screening')),
                            array('label'=>'<i class="icon-file"></i> Pages', 'url'=>array('/page/index')),
                            array('label'=>'<i class="icon-file"></i> Widgets', 'url'=>array('/widget/index')),
                            array('label'=>'<i class="icon-comment"></i> Social', 'url'=>array('/social/index')),
                            array('label'=>'<i class="icon-user"></i> Users', 'url'=>array('/user/index'), 'visible' => $user->checkAccess('superadmin')),
                            array('label'=>'<i class="icon-user"></i> Subscription', 'url'=>array('/subscription/admin'), 'visible' => $user->checkAccess('superadmin')),
                            array('label'=>'<i class="icon-comment"></i> Phase', 'url'=>array('/phase/index'))
                        ),
                        'encodeLabel'=>false,
					));
                    }
                    ?>
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	
	<div class="cont">
	<div class="container">
	  <?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink'=>false,
				'tagName'=>'ul',
				'separator'=>'',
				'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
				'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
				'htmlOptions'=>array ('class'=>'breadcrumb')
			)); ?>
		<!-- breadcrumbs -->
	  <?php endif?>
	
	<?php echo $content ?>
	
	
	</div><!--/.fluid-container-->
	</div>
	<div class="footer">
	  <div class="container">
		<div class="row">
			<div id="footer-copyright" class="col-md-6">
			</div>
            <!-- /span6 -->
			<div id="footer-terms" class="col-md-6"><i>my</i>Admin © Copyright-2013 | All rights reserved.</div>
            <!-- /.span6 -->
		 </div> <!-- /row -->
	  </div> <!-- /container -->
	</div>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
</body>
</html>
