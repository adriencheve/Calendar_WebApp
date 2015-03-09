<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weekly extends Application {

	public function index($id)
	{
        // set the static page elements
        $this->data['title'] = 'Calendar - Weekly';
		$this->data['pagebody'] = 'weekly';
        $this->data['monthly'] = '<a href="' . base_url('monthly/index/' . $id) . '">Monthly View</a>';
        $this->data['create'] = '<a href="' . base_url('create/index/' . $id) . '">Create Event</a>';

        // if (($id = $this->session->cookie->userdata('user_id')) == null) $id = 1;

		$this->generateCalendar($id);
	}

    public function generateCalendar($id)
    {
        $this->data['month'] = $this->getMonth((int)date("m"));
        $this->data['weekName'] = "1 to 7";

        $events = $this->events->events_date_order($id); // get all the events for this user, in order of date

        if (count($events) < 1) // if 0 events, fill with a blank calender
        {
            $this->fillWeeks(1);
            $this->render();
            return 0;
        }

        $p = array
        (
            "week" => "week",    // which week is being generated
            "openCell" => true,  // if there is an open <td>
            "openList" => false, // if there is an open <ul>
            "eDay" => 1,         // the number date of the next event
            "bDay" => 1,         // the number date of the current calendar box
            "eDayMax" => 7,
            "bDayMax" => 7,
            "index" => 0         // the index of the events array
        );

        $p['index'] = $this->generateWeek($p, $events); // generate the week
        $this->render();
    }

    private function generateWeek($p, $events)
    {
        $week = $p['bDay'] . "";
        $date = date("ymd");
        $days = 1;

        while ($p['index'] < count($events)) // do not increment index automatically, only when event printed
        {
            if (($p['eDay'] > $p['eDayMax']) || ($p['bDay'] > $p['eDayMax'])) break; // break if past the max for this week

            if ($p['eDay'] > $p['bDay']) // if the event isn't in this box, skip this box
            {
                if ($p['openCell'] == true) // if open, close tag
                {
                    $week = $week . "</td>";
                    $p['openCell'] = false;
                }
                else $week = $week . "<td>" . $p['bDay'] . "</td>";

                $p['bDay']++;
                $days++;
                continue;
            }
            else if ($p['bDay'] > $p['eDay']) break; // break if the last event was before the current calender box

            // this if detects if the next event is on a different day, and sets $date and eDay to that event
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

            // actually adds an event to the string
            $week = $week . '<li class="event"><a href="' . base_url('edit/index/' . $events[$p['index']]->id) . '">' . $events[$p['index']]->name . "</a></li>";
            $p['index']++;
        }

        if ($p['openCell'] == true) // make sure the tag is closed
        {
            $week = $week . "</td>";
            $p['bDay']++;
            $days++;
        }

        while ($days <= 7) // if the last event was before the end of the week, then populate the rest of the week
        {
            $week = $week . "<td>" . $p['bDay'] . "</td>";
            $p['bDay']++;
            $days++;
        }

        $this->data[$p['week']] = $week;

        return $p['index']; // return the current index in the events array
    }

    // returns a string month from a number
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

