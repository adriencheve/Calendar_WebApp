<?php

class Edit extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['title'] = 'Edit Event';
        $this->data['pagebody'] = 'edit';
        $this->render();
    }
	
    function edit_event($record)
    {
		{
            $record->name = set_value('eventName');
            $record->start_date = set_value('startingDate');
            $record->end_date = set_value('endDate');
            $record->description = set_value('description');
			$record->modified = date('Y-m-d');

            $this->events->update($record);

	        redirect('monthly');
		}
    }
}
