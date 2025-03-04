<?php
class Calendar {

    private $active_year, $active_month, $active_day;
    private $events = [];

    public function __construct($date = null) {
        $this->active_year = $date != null ? date('Y', strtotime($date)) : date('Y');
        $this->active_month = $date != null ? date('m', strtotime($date)) : date('m');
        $this->active_day = $date != null ? date('d', strtotime($date)) : date('d');
    }

    public function add_event($txt, $date, $days = 1, $color = '') {
        $color = $color ? ' ' . $color : $color;
        $this->events[] = [$txt, $date, $days, $color];
    }

    public function __toString() {
        $num_days = date('t', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day));
        $num_days_last_month = date('j', strtotime('last day of previous month', strtotime($this->active_day . '-' . $this->active_month . '-' . $this->active_year)));
        $days = [0 => 'Sun', 1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat'];
        $first_day_of_week = array_search(date('D', strtotime($this->active_year . '-' . $this->active_month . '-1')), $days);
        
        $html = '<div class="calendar">';
        $html .= '<div class="header"><div class="month-year">' . date('F Y', strtotime($this->active_year . '-' . $this->active_month . '-' . $this->active_day)) . '</div></div>';
        $html .= '<div class="days">';
    
        // Render day names
        foreach ($days as $day) {
            $html .= '<div class="day_name">' . $day . '</div>';
        }
    
        // Add previous month days
        for ($i = $first_day_of_week; $i > 0; $i--) {
            $html .= '<div class="day_num ignore">' . ($num_days_last_month - $i + 1) . '</div>';
        }
    
        // Generate days with events
        for ($i = 1; $i <= $num_days; $i++) {
            $selected = ($i == $this->active_day) ? ' selected' : '';
            $event_class = '';
    
            // Check if this day has an event
            foreach ($this->events as $event) {
                for ($d = 0; $d <= ($event[2] - 1); $d++) {
                    if (date('Y-m-d', strtotime($this->active_year . '-' . $this->active_month . '-' . $i . ' -' . $d . ' day')) == date('Y-m-d', strtotime($event[1]))) {
                        $event_class = $event[3]; // Apply event color class
                    }
                }
            }
    
            // Apply event color as background without displaying text
            $html .= '<div class="day_num ' . $selected . ' ' . $event_class . '"><span>' . $i . '</span></div>';
        }
    
        // Add next month days
        for ($i = 1; $i <= (42 - $num_days - max($first_day_of_week, 0)); $i++) {
            $html .= '<div class="day_num ignore">' . $i . '</div>';
        }
    
        $html .= '</div></div>';
        return $html;
    }
    

}
?>

<style>
    .calendar .days .day_num.green {
    background-color: #51ce57;
}
.calendar .days .day_num.red {
    background-color: #ce5151;
}
.calendar .days .day_num.blue {
    background-color: #518fce;
}
.calendar .days .day_num.yellow {
    background-color: #f7c30d;
}

.calendar {
    display: flex;
    flex-flow: column;
    max-width: 300px; /* Adjust width */
}
.calendar .header .month-year {
    font-size: 16px; /* Smaller font */
    padding: 10px 0;
}
.calendar .days {
    display: flex;
    flex-flow: wrap;
}
.calendar .days .day_name {
    width: calc(100% / 7);
    border-right: 1px solid #2c7aca;
    padding: 10px;
    text-transform: uppercase;
    font-size: 10px;
    font-weight: bold;
    color: #818589;
    color: #fff;
    background-color: #448cd6;
}
.calendar .days .day_name:nth-child(7) {
    border: none;
}
.calendar .days .day_num {
    display: flex;
    flex-flow: column;
    width: calc(100% / 7);
    border-right: 1px solid #e6e9ea;
    border-bottom: 1px solid #e6e9ea;
    padding: 8px;
    font-weight: bold;
    color: #7c878d;
    cursor: pointer;
    font-size: 12px;
    min-height: 60px;
}
.calendar .days .day_num span {
    display: inline-flex;
    width: 20px;
    font-size: 12px;
}
.calendar .days .day_num .event {
    margin-top: 10px;
    font-weight: 500;
    font-size: 14px;
    padding: 3px 6px;
    border-radius: 4px;
    background-color: #f7c30d;
    color: #fff;
    word-wrap: break-word;
}
.calendar .days .day_num .event.green {
    background-color: #51ce57;
}
.calendar .days .day_num .event.blue {
    background-color: #518fce;
}
.calendar .days .day_num .event.red {
    background-color: #ce5151;
}
.calendar .days .day_num:nth-child(7n+1) {
    border-left: 1px solid #e6e9ea;
}
.calendar .days .day_num:hover {
    background-color: #fdfdfd;
}
.calendar .days .day_num.ignore {
    background-color: #fdfdfd;
    color: #ced2d4;
    cursor: inherit;
}
.calendar .days .day_num.selected {
    background-color: #f1f2f3;
    cursor: inherit;
}
</style>