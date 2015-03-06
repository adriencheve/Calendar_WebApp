<?php

class Events extends MY_Model
{

	// Constructor
    public function __construct()
    {
        parent::__construct('events', 'id');
    }

	public function create_event($record)
	{
		$record->id = $this->highest() + 1;
		$record->created = time();
		$record->modified = time();

		$this->add($record);
	}

	public function edit_event($record)
	{
		$record->modified = time();

		$this->update($record);
	}
}
