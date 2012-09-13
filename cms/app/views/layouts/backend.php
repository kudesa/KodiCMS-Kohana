<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' ); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo __( ucfirst( $controller ) ); ?> &ndash; <?php echo Setting::get( 'admin_title' ); ?></title>
		<base href="<?php echo ADMIN_RESOURCES; ?>" />
		<link href="<?php echo ADMIN_RESOURCES; ?>favicon.ico" rel="favourites icon" />

		<?php echo View::factory('layouts/blocks/jsvars'); ?>

		<?php
		echo HTML::style( ADMIN_RESOURCES . 'libs/bootstrap/css/bootstrap.css' ) . "\n";
		echo HTML::style( ADMIN_RESOURCES . 'stylesheets/backend.css' ) . "\n";
		echo HTML::style( ADMIN_RESOURCES . 'libs/jquery-ui/jquery-ui-1.8.12.css' ) . "\n";
		echo HTML::style( ADMIN_RESOURCES . 'libs/jgrowl/jquery.jgrowl.css' ) . "\n";

		echo HTML::script( ADMIN_RESOURCES . 'libs/jquery-1.7.2.min.js' ) . "\n";
		echo HTML::script( ADMIN_RESOURCES . 'libs/jquery-ui/jquery-ui-1.8.12.js' ) . "\n";
		echo HTML::script( ADMIN_RESOURCES . 'libs/bootstrap/js/bootstrap.min.js' ) . "\n";
		echo HTML::script( ADMIN_RESOURCES . 'libs/jgrowl/jquery.jgrowl_minimized.js' ) . "\n";
		echo HTML::script( ADMIN_RESOURCES . 'javascripts/backend.js' ) . "\n";
		?>

		<?php echo $messages; ?>

		<?php
		foreach ( Plugins::$javascripts as $javascript )
		{
			echo HTML::script( $javascript ) . "\n";
		}
		foreach ( Plugins::$stylesheets as $stylesheet )
		{
			echo HTML::style( $stylesheet ) . "\n";
		}
		?>

<?php Observer::notify( 'layout_backend_head' ); ?>
	</head>
	<body id="body_<?php echo $page_body_id; ?>">

		<?php echo View::factory('layouts/blocks/navigation'); ?>
		
		<?php foreach ( Model_Navigation::get() as $nav_name => $nav ): ?>
		<?php if($nav->is_current AND count($nav->items) > 1):?>
		<div id="subnav" class="navbar navbar-static-top">
			<div class="navbar-inner">
				<ul class="nav">
					<?php foreach ( $nav->items as $item ): ?>
					<li class="<?php if($item->is_current): ?>active<?php endif; ?>">
						<?php echo HTML::anchor( URL::site( $item->uri ), $item->name ); ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
		<?php endforeach; ?>

		<div class="container-fluid">
			<?php if(isset($breadcrumbs)): ?>
			<?php echo View::factory('layouts/blocks/breadcrumbs', array(
				'breadcrumbs' => $breadcrumbs
			)); ?>
			<?php endif; ?>
			
			<div id="content" class="well" >
			<?php echo $content; ?>
			</div> <!--/#content-->
		</div>
		
		<?php echo $modal; ?>
		
		<?php if ( Setting::get( 'profiling' ) == 'yes' ): ?>
		<hr />
		<?php echo View::factory( 'profiler/stats' ) ?>
		<?php endif; ?>
	</body>
</html>