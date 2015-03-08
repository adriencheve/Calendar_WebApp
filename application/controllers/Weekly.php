<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weekly extends Application {

	public function index($id)
	{
        $this->data['title'] = 'Calendar - Weekly';
		$this->data['pagebody'] = 'weekly';

		$this->generateCalendar($id);
	}

    public function generateCalendar($id)
    {
        $openCell = true;
        $openList = false;
        $weekOne = "";
        $weekTwo = "";
        $weekThree = "";
        $weekFour = "";
        $weekFive = "";

        $days = 1;

        $this->data['month'] = "March";

        $events = $this->events->events_date_order($id);

        if (count($events) < 1)
        {
            $this->fillWeeks(1);
            $this->render();
            return 0;
        }

        $p = array
        (
            "week" => "week",
            "openCell" => true,
            "openList" => false,
            "eDay" => 1,
            "bDay" => 1,
            "eDayMax" => 7,
            "bDayMax" => 7,
            "index" => 0
        );

        $p['index'] = $this->generateWeek($p, $events);
        $this->render();
    }

    private function generateWeek($p, $events)
    {
        $week = $p['bDay'] . "";
        $date = date("ymd");
        $days = 1;

        while ($p['index'] < count($events)) // do not increment index automatically
        {
            if (($p['eDay'] > $p['eDayMax']) || ($p['bDay'] > $p['eDayMax'])) break; // calendar is 7 x 5 boxes

            if ($p['eDay'] > $p['bDay']) // if the event isn't in this box, skip this box
            {
                if ($p['openCell'] == true)
                {
                    $week = $week . "</td>";
                    $p['openCell'] = false;
                }
                else $week = $week . "<td>" . $p['bDay'] . "</td>";

                $p['bDay']++;
                $days++;
                continue;
            }
            else if ($p['bDay'] > $p['eDay']) break;

            if (date("ymd", strtotime($events[$p['index']]->start_date)) != date("ymd", strtotime($date))) // multiple events on the same day
            {
                if ($p['openList'] == true)
                {
                    $week = $week . "</ul>";
                    $p['openList'] = false;
                }
                if ($p['openCell'] == true)
                {
                    $week = $week . "</td>";
                    $p['openCell'] = false;
                    $p['bDay']++;
                    $days++;
                }

                $date = $events[$p['index']]->start_date;
                $p['eDay'] = (int)date("d", strtotime($date));
                continue;
            }

            if ($p['openCell'] == false)
            {
                $week = $week . "<td>" . $p['bDay'];
                $p['openCell'] = true;
            }
            if ($p['openList'] == false)
            {
                $week = $week . "<ul>";
                $p['openList'] = true;
            }

            $week = $week . "<li>" . $events[$p['index']]->name . "</li>";
            $p['index']++;
        }

        if ($p['openCell'] == true)
        {
            $week = $week . "</td>";
            $p['bDay']++;
            $days++;
        }

        while ($days <= 7)
        {
            $week = $week . "<td>" . $p['bDay'] . "</td>";
            $p['bDay']++;
            $days++;
        }

        $this->data[$p['week']] = $week;

        return $p['index'];
    }
}

