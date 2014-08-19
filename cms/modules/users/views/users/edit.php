<script type="text/javascript">
	var USER_ID = <?php echo (int) $user->id; ?>;
</script>
	
<?php echo Form::open(Route::get('backend')->uri(array('controller' => 'users', 'action' => $action, 'id' => $user->id)), array(
	'class' => array(Bootstrap_Form::HORIZONTAL, 'panel tabbable')
)); ?>
	<?php echo Form::hidden('token', Security::token()); ?>
	<div class="panel-heading">
		<span class="panel-title"><?php echo __('General information'); ?></span>
	</div>
	<div class="panel-body">
		<div class="form-group form-group-lg">
			<?php echo $user->label('username', array('class' => 'control-label col-md-3')); ?>
			<div class="col-md-4">
				<div class="input-group">
					<?php echo $user->field('username', array(
						'class' => 'form-control',
						'prefix' => 'user'
					)); ?>
					<span class="input-group-addon"><?php echo UI::icon('user'); ?></span>
				</div>
			</div>
			<div class="col-md-offset-3 col-md-9">
				<p class="help-block"><?php echo __('At least :num characters. Must be unique.', array(
					':num' => 3
				)); ?></p>
			</div>
		</div>

		<div class="form-group">
			<?php echo $user->profile->label('name', array('class' => 'control-label col-md-3')); ?>
			<div class="col-md-4">
				<?php echo $user->profile->field('name', array(
					'class' => 'form-control',
					'prefix' => 'profile'
				)); ?>
			</div>
		</div>

		<div class="form-group">
			<?php echo $user->label('email', array('class' => 'control-label col-md-3')); ?>
			<div class="col-md-4">
				<div class="input-group">
					<?php echo $user->field('email', array(
						'class' => 'form-control',
						'prefix' => 'user'
					)); ?>
					<span class="input-group-addon"><?php echo UI::icon('envelope'); ?></span>
				</div>
			</div>
		</div>

		<hr class="panel-wide"/>

		<div class="form-group">
			<?php echo $user->profile->label('locale', array('class' => 'control-label col-md-3')); ?>
			<div class="col-md-4">
				<?php echo $user->profile->field('locale', array(
					'class' => 'form-control',
					'prefix' => 'profile'
				)); ?>	
			</div>
		</div>
	</div>

	<div class="panel-heading">
		<span class="panel-title"><?php echo __('Notifications'); ?></span>
	</div>

	<div class="panel-body">
		<div class="form-group">
			<div class="col-md-offset-3 col-md-9">
				<div class="checkbox">
					<?php echo $user->profile->field('notice', array(
						'prefix' => 'profile',
					)); ?>
				</div>
			</div>
		</div>

		<?php Observer::notify('view_user_edit_notifications', $user->id); ?>
	</div>

	<?php if( ACL::check('users.change_password') OR $user->id == AuthUser::getId() OR !$user->loaded() ): ?>
	<div class="panel-heading">
		<span class="panel-title"><?php echo __('Password'); ?></span>
	</div>
	<?php if($action == 'edit'): ?>
	<div class="note note-warning">
		<?php echo UI::icon('lightbulb-o fa-lg'); ?> <?php echo __('Leave password blank for it to remain unchanged.'); ?>
	</div>
	<?php endif; ?>
	<div class="panel-body">
		<div class="form-group">
			<?php echo $user->label('password', array('class' => 'control-label col-md-3')); ?>
			<div class="col-md-3">
				<?php echo $user->field('password', array(
					'class' => 'form-control',
					'prefix' => 'user',
					'autocomplete' => 'off',
					'placeholder' => __('Password')
				)); ?>	
			</div>
		</div>
		<div class="form-group">
			<?php echo $user->label('password_confirm', array('class' => 'control-label col-md-3')); ?>
			<div class="col-md-3">
				<?php echo $user->field('password_confirm', array(
					'class' => 'form-control',
					'prefix' => 'user',
					'autocomplete' => 'off',
					'placeholder' => __('Confirm Password')
				)); ?>	
			</div>
		</div>
		<?php Observer::notify('view_user_edit_password', $user->id); ?>
	</div>
	<?php endif; ?>

	<?php if (Acl::check( 'users.change_roles') AND ($user->id === NULL OR $user->id > 1)): ?>
	<div class="panel-heading">
		<span class="panel-title"><?php echo __('Roles'); ?></span>
	</div>
	<div class="panel-body">
		<div class="row-fluid">
		<?php 
			echo Form::hidden('user_roles', (int) $user->id, array(
				'class' => 'col-md-12'
			));

			echo Bootstrap_Form_Helper_Help::factory(array(
				'text' => __('Roles restrict user privileges and turn parts of the administrative interface on or off.')
			)); 
		?>
		</div>
	</div>
	<?php endif; ?>

	<?php Observer::notify('view_user_edit_plugins', $user); ?>

	<div class="form-actions panel-footer">
		<?php echo UI::actions($page_name); ?>
	</div>
<?php Form::close(); ?>