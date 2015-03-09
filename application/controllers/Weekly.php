<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weekly extends Application {

	public function index($id)
	{
        $this->data['title'] = 'Calendar - Weekly';
		$this->data['pagebody'] = 'weekly';

        // if (($id = $this->session->cookie->userdata('user_id')) == null) $id = 1;

		$this->generateCalendar($id);
	}

    public function generateCalendar($id)
    {
        $this->data['month'] = $this->getMonth((int)date("m"));
        $this->data['weekName'] = "1 to 7";

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

            $week = $week . '<li class="event"><a href="' . base_url('edit/index/' . $events[$p['index']]->id) . '">' . $events[$p['index']]->name . "</a></li>";
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

    private function getMonth($num)
    {
        switch ($num)
        {
            case 1:
                return "January";
            case 2:
                return "February";
            case 3:
                return "March";
            case 4:
                return "April";
            case 5:
                return "May";
            case 6:
                return "June";
            case 7:
                return "July";
            case 8:
                return "August";
            case 9:
                return "September";
            case 10:
                return "October";
            case 11:
                return "November";
            case 12:
                return "December";
            default:
                break;
        }
    }
}

