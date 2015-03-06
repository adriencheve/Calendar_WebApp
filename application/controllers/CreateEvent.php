<?php

/**
 * The Login controller. Allows the user to log into this application.
 *
 * @programmer Julian Brandrick
 * @designer James Parry
 */
class CreateEvent extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['title'] = 'Create Event';
        $this->data['pagebody'] = 'createevent';
        $this->render();
    }

    function validation()
    {
        $this->form_validation->set_rules('eventname', 'Event Name', 'required');
        $this->form_validation->set_rules('eventdescription', 'Description', 'required');
        $this->form_validation->set_rules('startdate', 'Start Date', 'required');
        $this->form_validation->set_rules('enddate', 'End Date', 'required');

        var_dump($this->form_validation->run());
        if ($this->form_validation->run() == FALSE)
		{
            redirect('createevent');
		}
		else
		{
            $record = $this->events->create();

            $record->user_id = 0;
            $record->name = set_value('eventname');
            $record->image = set_value('image');
            $record->start_date = set_value('startdate');
            $record->end_date = set_value('enddate');
            $record->description = set_value('eventdescription');

            $this->events->add_event($record);

	        redirect('calendar');
		}
    }
}
