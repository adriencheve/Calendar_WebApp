<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($id)
	{
        $this->data['title'] = "Calendar - Monthly";
		$this->data['pagebody'] = 'monthly';

        init();
        generateCalendar($id);
	}

    public function init()
    {
        $this->data['numDays'] = 31;
    }

    public function generateCalendar($id)
    {
        $month = "<th>";

        if ($id == 0)
            $events = $this->events->all();
        else
            $events = $this->events->some("user_id", $id);

        ksort($events, "start_date");
        $i = 1;
        $date = date("d");

        foreach ($events as $event)
        {
            if ($i > $this->data['numDays']) break;

            if ($event->start_date != $date)
            {
                $date = $event->start_data;
                $month = $month . "</th>" . "<th>";
            }

            $month = $month . "\n" . $event->name;
        }

        $this->render();
    }
}
