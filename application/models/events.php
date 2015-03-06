<?php

class Events extends MY_Model
{

	// Constructor
    public function __construct()
    {
        parent::__construct('events', 'id');
    }

	public function add_event($record)
	{
		$record->id = $this->highest() + 1;
		$record->created = date('Y-m-d');
		$record->modified = date('Y-m-d');

		$this->add($record);
	}

	public function edit_event($record)
	{
		$record->modified = time();

		$this->update($record);
	}
}
