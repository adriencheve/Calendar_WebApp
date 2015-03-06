<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weekly extends Application {

	public function index($id)
	{
        $this->data['title'] = 'Calendar - Weekly';
		$this->data['pagebody'] = 'weekly';

		generateCalendar($id);
	}

    public function generateCalendar($id)
    {
        $openCell = false;
        $openList = false;
        $weekOne = "";
        $weekTwo = "";
        $weekThree = "";
        $weekFour = "";
        $weekFive = "";

        if ($id == 0)
            $events = $this->events->all();
        else
            $events = $this->events->some("user_id", $id);

        // ----------
        //  Week One
        // ----------

        ksort($events, "start_date"); // sort the events by date
        $date = date("d");
        $eDay = 1; // number day of the next event
        $bDay = 1; // number day of the box being filled

        for ($index = 0; $index < count($events); ) // do not increment index automatically
        {
            if (($eDay > 7) || ($bDay > 7)) break; // calendar is 7 x 5 boxes
            if ($eDay > $bDay) // if the event isn't in this box, skip this box
            {
                $bDay++;
                $weekOne = $weekOne . "<td></td>";
                continue;
            }

            if ($event->start_date != $date) // multiple events on the same day
            {
                if ($openList == true)
                {
                    $weekOne = $weekOne . "</ul>";
                    $openList = false;
                }
                if ($openCell == true)
                {
                    $weekOne = $weekOne . "</td>";
                    $openCell = false;
                }

                $date = $events[$index]->start_date;
                $eDay = date("d", strtotime($date));
                $bDay++;
                continue;
            }

            if ($openCell == false)
            {
                $weekOne = $weekOne . "<td>"
                $openCell = true;
            }
            if ($openList == false)
            {
                $weekOne = $weekOne . "<ul>"
                $openList = true;
            }

            $weekOne = $weekOne . "<li>" . $events[$index]->name . "</li>";
            $index++;
        }
        if ($openCell == true)
            $weekOne = $weekOne . "</td>";

        $this->render();
    }
}
