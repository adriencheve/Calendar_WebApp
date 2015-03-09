<?php
/*
*	Controller for the page that allows user to edit existing events.
*/
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
	
	/*
	*	Takes form data entered by the user and updates the existing record with new data
	*/
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
