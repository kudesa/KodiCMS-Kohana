<?php defined('SYSPATH') or die('No direct access allowed.');

class DataSource_Hybrid_Field_Source_Array extends DataSource_Hybrid_Field_Source_OneToMany {

	protected $_props = array(
		'isreq' => TRUE,
		'source' => NULL
	);
	
	public function __construct( array $data )
	{
		parent::__construct( $data );
		$this->family = DataSource_Hybrid_Field::FAMILY_SOURCE;
	}
	
	public function create() 
	{
		parent::create();
		
		if( ! $this->id )
		{
			return FALSE;
		}
		
		$ds = Datasource_Data_Manager::load($this->from_ds);		
		$this->update();
		
		return $this->id;
	}
	
	public function remove() 
	{
		$ds = Datasource_Data_Manager::load($this->from_ds);
		parent::remove();
	}
	
	public function onUpdateDocument(DataSource_Hybrid_Document $old_document, DataSource_Hybrid_Document $document) 
	{
		$old_docs = $old_document->get($this->name);
		$new_docs = $document->get($this->name);
		
		$o = empty($old_docs) ? array() : explode(',', $old_docs);
		$n = empty($new_docs) ? array() : explode(',', $new_docs);
		
		$diff = array_diff($o, $n);
		
		if($this->one_to_many AND !empty($diff)) 
		{
			DataSource_Hybrid_Factory::remove_documents($diff);
		}
	}
	
	public function onRemoveDocument( DataSource_Hybrid_Document $doc )
	{
		$ids = explode(',', $doc->get($this->name));
		if($this->one_to_many AND !empty($ids)) 
		{
			DataSource_Hybrid_Factory::remove_documents($doc->get($ids));
		}
	}
	
	/**
	 * @param Model_Widget_Hybrid
	 * @param array $field
	 * @param array $row
	 * @param string $fid
	 * @return mixed
	 */
	public static function fetch_widget_field( $widget, $field, $row, $fid, $recurse )
	{
		$related_widget = NULL;

		if($recurse > 0 AND isset($widget->doc_fetched_widgets[$fid]))
		{
			if(!empty($row[$fid]))
			{
				$related_widget = self::_fetch_related_widget($widget, $row, $fid, $recurse);
			}
		}

		return !empty($related_widget) 
			? $related_widget 
			: (!empty($row[$fid]) ? explode(',', $row[$fid]) : array());
	}
	
	public function fetch_headline_value( $value )
	{
		if( ! empty($value) )
		{
			$docs = explode(',', $value);
			foreach($docs as $i => $id)
			{
				$header = DataSource_Hybrid_Field_Utils::get_document_header($this->from_ds, $id);

				$docs[$i] = HTML::anchor(Route::url('datasources', array(
					'controller' => 'document',
					'directory' => 'hybrid',
					'action' => 'view'
				)) . URL::query(array(
					'ds_id' => $this->from_ds, 'id' => $id
				)), $header, array('target' => 'blank'));
			}
			return implode(', ', $docs);
		}
		
		return parent::fetch_headline_value($value);
	}
	
	public function get_type()
	{
		return 'VARCHAR(255)';
	}
}