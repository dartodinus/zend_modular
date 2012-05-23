<?php

class Admin_Model_Keywords extends Default_Model_Datatable
{

    protected $_name = 'keywords';


	// construct a new competwition object.
	// this should be passed a url or ID for initialisation
	// if it isn't, it will return a blank object to save information into
	public function __construct($id = '')
	{

		parent::__construct();

		if(is_numeric($id))
		{
			$keywords = $this->getById($id);
		}

	}
	
}

