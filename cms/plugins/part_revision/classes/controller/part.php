<?php defined( 'SYSPATH' ) or die( 'No direct access allowed.' );

class Controller_Part extends Controller_System_Backend
{
	public function before()
	{
		parent::before();
		
		$this->breadcrumbs
			->add(__('Pages'), Route::url('backend', array('controller' => 'page')));
	}
	
	public function action_revision()
	{
		Assets::js('diff_text_tool', ADMIN_RESOURCES . 'libs/diff_match_patch.js', 'global');
		Assets::js('part_revision', ADMIN_RESOURCES . 'js/controller/part_revision.js', 'global');
		
		$part_id = (int) $this->request->param('id');
		$part = Record::findByIdFrom('Model_Page_Part', $part_id);
		if(empty($part->id)) 
		{
			Messages::errors( __( 'Part not found!' ) );
			$this->go(array(
				'controller' => 'page'
			));
		}

		$page = Record::findByIdFrom( 'Model_Page', $part->page_id );
		
		$this->breadcrumbs
			->add($page->title, Route::url('backend', array(
				'controller' => 'page',
				'action' => 'edit',
				'id' => $page->id
			)))
			->add(__('Revision for part :name', array(':name' => $part->name)));
		
		$this->template->content = View::factory('part/revision', array(
			'part' => $part,
			'parts' => DB::select()
				->from('part_revision')
				->where('part_id', '=', $part_id)
				->order_by('created_on', 'desc')
				->as_object()
				->execute()
		));
	}
	
	public function action_revert()
	{
		$revision_id = (int) $this->request->param('id');
		
		$revision = DB::select()
			->from('part_revision')
			->where('id', '=', $revision_id)
			->limit(1)
			->as_object()
			->execute()
			->current();

		$part = Record::findByIdFrom('Model_Page_Part', $revision->part_id);
		$part->setFromData(array('content' => $revision->content))->save();
		
		DB::delete('part_revision')->where('id', '=', $revision_id)->execute();
		Cache::instance()->delete_tag('page_parts');

		$this->go_back();
	}
}