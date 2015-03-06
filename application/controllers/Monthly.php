<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monthly extends Application {

	public function index($id)
	{
        $this->data['title'] = "Calendar - Monthly";
		$this->data['pagebody'] = 'monthly';

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

        // ----------
        //  Week Two
        // ----------

        $openCell = false;
        $openList = false;
        $eDay = 8; // number day of the next event
        $bDay = 8; // number day of the box being filled

        for ($index < count($events); ) // do not increment index automatically
        {
            if (($eDay > 14) || ($bDay > 14)) break; // calendar is 7 x 5 boxes
            if ($eDay > $bDay) // if the event isn't in this box, skip this box
            {
                $bDay++;
                $weekTwo = $weekTwo . "<td></td>";
                continue;
            }

            if ($event->start_date != $date) // multiple events on the same day
            {
                if ($openList == true)
                {
                    $weekTwo = $weekTwo . "</ul>";
                    $openList = false;
                }
                if ($openCell == true)
                {
                    $weekTwo = $weekTwo . "</td>";
                    $openCell = false;
                }

                $date = $events[$index]->start_date;
                $eDay = date("d", strtotime($date));
                $bDay++;
                continue;
            }

            if ($openCell == false)
            {
                $weekTwo = $weekTwo . "<td>"
                $openCell = true;
            }
            if ($openList == false)
            {
                $weekTwo = $weekTwo . "<ul>"
                $openList = true;
            }

            $weekTwo = $weekTwo . "<li>" . $events[$index]->name . "</li>";
            $index++;
        }
        if ($openCell == true)
            $weekTwo = $weekTwo . "</td>";

        // ------------
        //  Week Three
        // ------------

        $openCell = false;
        $openList = false;
        $eDay = 15; // number day of the next event
        $bDay = 15; // number day of the box being filled

        for ($index < count($events); ) // do not increment index automatically
        {
            if (($eDay > 21) || ($bDay > 21)) break; // calendar is 7 x 5 boxes
            if ($eDay > $bDay) // if the event isn't in this box, skip this box
            {
                $bDay++;
                $weekThree = $weekThree . "<td></td>";
                continue;
            }

            if ($event->start_date != $date) // multiple events on the same day
            {
                if ($openList == true)
                {
                    $weekThree = $weekThree . "</ul>";
                    $openList = false;
                }
                if ($openCell == true)
                {
                    $weekThree = $weekThree . "</td>";
                    $openCell = false;
                }

                $date = $events[$index]->start_date;
                $eDay = date("d", strtotime($date));
                $bDay++;
                continue;
            }

            if ($openCell == false)
            {
                $weekThree = $weekThree . "<td>"
                $openCell = true;
            }
            if ($openList == false)
            {
                $weekThree = $weekThree . "<ul>"
                $openList = true;
            }

            $weekThree = $weekThree . "<li>" . $events[$index]->name . "</li>";
            $index++;
        }
        if ($openCell == true)
            $weekThree = $weekThree . "</td>";

        // -----------
        //  Week Four
        // -----------

        $openCell = false;
        $openList = false;
        $eDay = 22; // number day of the next event
        $bDay = 22; // number day of the box being filled

        for ($index < count($events); ) // do not increment index automatically
        {
            if (($eDay > 28) || ($bDay > 28)) break; // calendar is 7 x 5 boxes
            if ($eDay > $bDay) // if the event isn't in this box, skip this box
            {
                $bDay++;
                $weekFour = $weekFour . "<td></td>";
                continue;
            }

            if ($event->start_date != $date) // multiple events on the same day
            {
                if ($openList == true)
                {
                    $weekFour = $weekFour . "</ul>";
                    $openList = false;
                }
                if ($openCell == true)
                {
                    $weekFour = $weekFour . "</td>";
                    $openCell = false;
                }

                $date = $events[$index]->start_date;
                $eDay = date("d", strtotime($date));
                $bDay++;
                continue;
            }

            if ($openCell == false)
            {
                $weekFour = $weekFour . "<td>"
                $openCell = true;
            }
            if ($openList == false)
            {
                $weekFour = $weekFour . "<ul>"
                $openList = true;
            }

            $weekFour = $weekFour . "<li>" . $events[$index]->name . "</li>";
            $index++;
        }
        if ($openCell == true)
            $weekFour = $weekFour . "</td>";

        // -----------
        //  Week Five
        // -----------

        $openCell = false;
        $openList = false;
        $eDay = 29; // number day of the next event
        $bDay = 29; // number day of the box being filled

        for ($index < count($events); ) // do not increment index automatically
        {
            if (($eDay > 35) || ($bDay > 35)) break; // calendar is 7 x 5 boxes
            if ($eDay > $bDay) // if the event isn't in this box, skip this box
            {
                $bDay++;
                $weekFive = $weekFive . "<td></td>";
                continue;
            }

            if ($event->start_date != $date) // multiple events on the same day
            {
                if ($openList == true)
                {
                    $weekFive = $weekFive . "</ul>";
                    $openList = false;
                }
                if ($openCell == true)
                {
                    $weekFive = $weekFive . "</td>";
                    $openCell = false;
                }

                $date = $events[$index]->start_date;
                $eDay = date("d", strtotime($date));
                $bDay++;
                continue;
            }

            if ($openCell == false)
            {
                $weekFive = $weekFive . "<td>"
                $openCell = true;
            }
            if ($openList == false)
            {
                $weekFive = $weekFive . "<ul>"
                $openList = true;
            }

            $weekFive = $weekFive . "<li>" . $events[$index]->name . "</li>";
            $index++;
        }
        if ($openCell == true)
            $weekFive = $weekFive . "</td>";

        // replace the templates in the view with weekOne - weekFive

        $this->render();
    }
}
