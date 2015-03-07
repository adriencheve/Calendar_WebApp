<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monthly extends Application
{
    function __construct()
    {
        parent::__construct();
    }

	public function index($id)
	{
        $this->data['title'] = "Calendar - Monthly";
		$this->data['pagebody'] = 'monthly';

        $this->generateCalendar($id);
	}

    private function generateCalendar($id)
    {

        $foo = 0;
        $openCell = true;
        $openList = false;
        $weekOne = "";
        $weekTwo = "";
        $weekThree = "";
        $weekFour = "";
        $weekFive = "";

        $days = 1;

        $this->data['month'] = "January";

        $events = $this->events->events_date_order($id);

        if (count($events) < 1)
        {
            $this->fillWeeks(1);
            $this->render();
            return 0;
        }

        $p = array
        (
            "week" => "weekOne",
            "openCell" => true,
            "openList" => false,
            "test" => 0,
            "eDay" => 1,
            "bDay" => 1,
            "eDayMax" => 7,
            "bDayMax" => 7,
            "index" => 0
        );

        $this->generateWeek($p, $events);

        if ($p['index'] >= count($events))
        {
            $this->fillWeeks(2);
            $this->render();
            return 0;
        }

        $p['week'] = "weekTwo";
        $p['openCell'] = false;
        $p['openList'] = false;
        $p['eDay'] = 8;
        $p['bDay'] = 8;
        $p['eDayMax'] = 14;
        $p['bDayMax'] = 14;

        $this->generateWeek($p, $events);

        if ($p['index'] >= count($events))
        {
            $this->fillWeeks(3);
            $this->render();
            return 0;
        }

        $p['week'] = "weekThree";
        $p['openCell'] = false;
        $p['openList'] = false;
        $p['eDay'] = 15;
        $p['bDay'] = 15;
        $p['eDayMax'] = 21;
        $p['bDayMax'] = 21;

        $this->generateWeek($p, $events);

        if ($p['index'] >= count($events))
        {
            $this->fillWeeks(4);
            $this->render();
            return 0;
        }

        $p['week'] = "weekFour";
        $p['openCell'] = false;
        $p['openList'] = false;
        $p['eDay'] = 22;
        $p['bDay'] = 22;
        $p['eDayMax'] = 28;
        $p['bDayMax'] = 28;

        $this->generateWeek($p, $events);

        if ($p['index'] >= count($events))
        {
            $this->fillWeeks(5);
            $this->render();
            return 0;
        }

        $p['week'] = "weekFive";
        $p['openCell'] = false;
        $p['openList'] = false;
        $p['eDay'] = 29;
        $p['bDay'] = 29;
        $p['eDayMax'] = 35;
        $p['bDayMax'] = 35;

        $this->generateWeek($p, $events);

        $this->render();
    }

    private function generateWeek($p, $events)
    {
        $week = "";
        $date = date("ymd");
        $days = 1;
        $var = 0;

        while ($p['index'] < count($events)) // do not increment index automatically
        {
            if (($p['eDay'] > $p['eDayMax']) || ($p['bDay'] > $p['eDayMax'])) break; // calendar is 7 x 5 boxes
            if ($p['eDay'] > $p['bDay']) // if the event isn't in this box, skip this box
            {
                $p['bDay']++;
                if ($p['openCell'] == true)
                {
                    $week = $week . "</td>";
                    $p['openCell'] = false;
                }
                else $week = $week . "<td></td>";

                $days++;
                $var++;
                var_dump($var);
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
                }

                $date = $events[$p['index']]->start_date;
                $p['eDay'] = (int)date("d", strtotime($date));
                $p['bDay']++;

                continue;
            }

            if ($p['openCell'] == false)
            {
                $week = $week . "<td>";
                $p['openCell'] = true;
            }
            if ($p['openList'] == false)
            {
                $week = $week . "<ul>";
                $p['openList'] = true;
            }

            $week = $week . "<li>" . $events[$p['index']]->name . "</li>";
            $p['index']++;
            $days++;
        }

        if ($p['openCell'] == true)
            $week = $week . "</td>";

        while ($days < 7)
        {
            $week = $week . "<td></td>";
            $days++;
        }

        $this->data[$p['week']] = $week;

        //var_dump($p);
        var_dump("<br>");
    }

    private function fillWeeks($weekNum)
    {
        switch($weekNum)
        {
            case 1:
                $this->data['weekOne'] = "</td><td></td><td></td><td></td><td></td><td></td><td></td>";
            case 2:
                $this->data['weekTwo'] = "</td><td></td><td></td><td></td><td></td><td></td><td></td>";
            case 3:
                $this->data['weekThree'] = "</td><td></td><td></td><td></td><td></td><td></td><td></td>";
            case 4:
                $this->data['weekFour'] = "</td><td></td><td></td><td></td><td></td><td></td><td></td>";
            case 5:
                $this->data['weekFive'] = "</td><td></td><td></td><td></td><td></td><td></td><td></td>";
                break;
        }
    }
}
