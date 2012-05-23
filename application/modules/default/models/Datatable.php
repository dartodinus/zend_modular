<?php

class Default_Model_Datatable extends Zend_Db_Table_Abstract
{

	// some generic things database handlers, like these...

	final public function save()
	{
		
		if (null === ($this->id)) {
			$id = $this->insert($this->_data);
		} else {
			$this->update($this->_data, array('id = ?' => $this->id));
			$id = $this->id;
		}

		return $id;
	}

}