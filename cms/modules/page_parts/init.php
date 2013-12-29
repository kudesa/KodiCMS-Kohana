<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

Observer::observe('view_page_edit_plugins_top', function($page) {
	echo View::factory('part/items');
});

Observer::observe( 'frontpage_found',  function($page) {
	$layout = $page->get_layout_object();
	
	$widgets = array();

	foreach($layout->blocks() as $block)
	{
		if( ! Model_Page_Part::has_content($page, $block))
		{
			continue;
		}

		$widgets[] = new Model_Widget_Part($block, Model_Page_Part::get($page, $block));
	}
	
	Context::instance()->register_widgets($widgets);
});

Observer::observe(array('controller_before_page_edit', 'controller_before_page_add'), function() {
	Assets::js('controller.parts', ADMIN_RESOURCES . 'js/controller/parts.js', 'global');
});

Observer::observe('page_edit_after_save', function($page) {
	$parts = Arr::get(Request::initial()->post(), 'part_content', array());
	
	foreach ($parts as $id => $content)
	{
		$part = Record::findByIdFrom('Model_Page_Part', (int) $id);

		if($content == $part->content) continue;

		$part
			->setFromData(array('content' => $content))
			->save();
	}
});
			