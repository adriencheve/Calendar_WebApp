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

    public function events_date_order($id)
    {
        if ($id == 0)
            $events = $this->events->all();
        else
            $events = $this->events->some("user_id", $id);

        $i = 0;

        while ($i < (count($events) - 1))
        {
            if ($events[$i]->start_date > $events[$i + 1]->start_date)
            {
                $temp = $events[$i];
                $events[$i] = $events[$i + 1];
                $events[$i + 1] = $temp;
            }
            $i++;
        }

        return $events;
    }
}
