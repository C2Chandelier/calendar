<?php

function display_event(array $event)
{
    $date = substr($event['date'], 6) . "-" . substr($event['date'], 4, 2) . "-" . substr($event['date'], 0, 4);
    echo "The \"" . $event['name'] . "\" event will take place on " . $date . " in " . $event['location'] . PHP_EOL;
}

/* display_event ([
    'name' => 'RDV Client Smith',
    'date' => '20191231',
    'location' => 'Nantes'
    ]); */

function display_events_by_month(array $events)
{
    foreach ($events as $key => $value) {
        $date[] = $value['date'];
    }
    sort($date);

    $array = array();

    for ($i = 0; $i < count($events); $i++) {
        for ($j = 0; $j < count($date); $j++) {
            if (array_search($date[$i], $events[$j]) == 'date') {
                if (!in_array($events[$j], $array)) {
                    array_push($array, $events[$j]);
                }
            }
        }
    }

    echo substr($array[0]['date'], 0, 4) . "-" . substr($array[0]['date'], 4, 2) . PHP_EOL;
    echo "The \"" . $array[0]['name'] . "\" event will take place on " . substr($array[0]['date'], 6) . "-" . substr($array[0]['date'], 4, 2) . "-" . substr($array[0]['date'], 0, 4) . " in " . $array[0]['location'] . PHP_EOL;


    for ($i = 1; $i < count($array); $i++) {

        $datefin = substr($array[$i]['date'], 6) . "-" . substr($array[$i]['date'], 4, 2) . "-" . substr($array[$i]['date'], 0, 4);

        if (substr($array[$i - 1]['date'], 4, 2) == substr($array[$i]['date'], 4, 2) && substr($array[$i - 1]['date'], 0, 4) == substr($array[$i]['date'], 0, 4)) {
            echo "The \"" . $array[$i]['name'] . "\" event will take place on " . $datefin . " in " . $array[$i]['location'] . PHP_EOL;
        } else {
            echo substr($array[$i]['date'], 0, 4) . "-" . substr($array[$i]['date'], 4, 2) . PHP_EOL;
            echo "The \"" . $array[$i]['name'] . "\" event will take place on " . $datefin . " in " . $array[$i]['location'] . PHP_EOL;
        }
    }
}


/* display_events_by_month ([
    [
    'name' => 'Reunion Client',
    'date' => '20200505',
    'location' => 'Nantes'
    ] ,
    [
    'name' => 'Affinage sprint 2',
    'date' => '20200705',
    'location' => 'Nantes'
    ] ,
    [
    'name' => 'RDV Pro',
    'date' => '20200705',
    'location' => 'Paris'
    ] ,
    [
    'name' => 'Brainstorming',
    'date' => '20190705',
    'location' => 'Lyon'
    ] ,
    [
    'name' => 'Demonstration client',
    'date' => '20200205',
    'location' => 'Lille'
    ]
    ]) ; */

function display_events_between_months(array $events, string $dateBegin, string $dateEnd)
{

    foreach ($events as $key => $value) {
        $date[] = $value['date'];
    }
    sort($date);

    $array = array();

    for ($i = 0; $i < count($events); $i++) {
        for ($j = 0; $j < count($date); $j++) {
            if (array_search($date[$i], $events[$j]) == 'date') {
                if (!in_array($events[$j], $array)) {
                    if (intval(substr($date[$i], 0, 6)) >= intval($dateBegin) && intval(substr($date[$i], 0, 6)) <= intval($dateEnd)) {
                        array_push($array, $events[$j]);
                    }
                }
            }
        }
    }

    echo substr($array[0]['date'], 0, 4) . "-" . substr($array[0]['date'], 4, 2) . PHP_EOL;
    echo "The \"" . $array[0]['name'] . "\" event will take place on " . substr($array[0]['date'], 6) . "-" . substr($array[0]['date'], 4, 2) . "-" . substr($array[0]['date'], 0, 4) . " in " . $array[0]['location'] . PHP_EOL;


    for ($i = 1; $i < count($array); $i++) {

        $datefin = substr($array[$i]['date'], 6) . "-" . substr($array[$i]['date'], 4, 2) . "-" . substr($array[$i]['date'], 0, 4);

        if (substr($array[$i - 1]['date'], 4, 2) == substr($array[$i]['date'], 4, 2) && substr($array[$i - 1]['date'], 0, 4) == substr($array[$i]['date'], 0, 4)) {
            echo "The \"" . $array[$i]['name'] . "\" event will take place on " . $datefin . " in " . $array[$i]['location'] . PHP_EOL;
        } else {
            echo substr($array[$i]['date'], 0, 4) . "-" . substr($array[$i]['date'], 4, 2) . PHP_EOL;
            echo "The \"" . $array[$i]['name'] . "\" event will take place on " . $datefin . " in " . $array[$i]['location'] . PHP_EOL;
        }
    }
}


/* display_events_between_months([
    [
        'name' => 'Reunion Client',
        'date' => '20200505',
        'location' => 'Nantes'
    ],
    [
        'name' => 'Affinage sprint 2',
        'date' => '20200705',
        'location' => 'Nantes'
    ],
    [
        'name' => 'RDV Pro',
        'date' => '20200705',
        'location' => 'Paris'
    ],
    [
        'name' => 'Brainstorming',
        'date' => '20190705',
        'location' => 'Lyon'
    ],
    [
        'name' => 'Demonstration client',
        'date' => '20200205',
        'location' => 'Lille'
    ]
], "202005", "202007"); */

function display_calendar(array $events, string $dateBegin, string $dateEnd){

    foreach ($events as $key => $value) {
        $date[] = $value['date'];
    }
    sort($date);

    $array = array();

    for ($i = 0; $i < count($events); $i++) {
        for ($j = 0; $j < count($date); $j++) {
            if (array_search($date[$i], $events[$j]) == 'date') {
                if (!in_array($events[$j], $array)) {
                    if (intval(substr($date[$i], 0, 6)) >= intval($dateBegin) && intval(substr($date[$i], 0, 6)) <= intval($dateEnd)) {
                        array_push($array, $events[$j]);
                    }
                }
            }
        }
    }
    
    echo date("M",strtotime($dateBegin."01")) . " " . date("Y",strtotime($dateBegin."01")) . PHP_EOL;
    echo "Mon   Tue   Wed   Thu   Fri   Sat   Sun" . PHP_EOL;

    $calendar = array();

    $calendar[date("M",strtotime($dateBegin."01"))] = array("Mon" => array(),"Tue" => array(),"Wed" => array(),"Thu" => array(),"Fri" => array(),"Sat" => array(),"Sun" => array());

    $dim = date( "j", mktime(0, 0, 0, date("m",strtotime($dateBegin."01")) + 1, 1, date("Y",strtotime($dateBegin."01"))) - 1 );

    for($i=1;$i <= $dim; $i++){
        if($i < 10){
            $i = "0" . $i;
        }
        if(date("D" , strtotime($dateBegin.$i)) == "Mon"){
            array_push($calendar[date("M",strtotime($dateBegin."01"))]["Mon"],date("d",strtotime($dateBegin.$i)));
        }
        if(date("D" , strtotime($dateBegin.$i)) == "Tue"){
            array_push($calendar[date("M",strtotime($dateBegin."01"))]["Tue"],date("d",strtotime($dateBegin.$i)));
        }
        if(date("D" , strtotime($dateBegin.$i)) == "Wed"){
            array_push($calendar[date("M",strtotime($dateBegin."01"))]["Wed"],date("d",strtotime($dateBegin.$i)));
        }
        if(date("D" , strtotime($dateBegin.$i)) == "Thu"){
            array_push($calendar[date("M",strtotime($dateBegin."01"))]["Thu"],date("d",strtotime($dateBegin.$i)));
        }
        if(date("D" , strtotime($dateBegin.$i)) == "Fri"){
            array_push($calendar[date("M",strtotime($dateBegin."01"))]["Fri"],date("d",strtotime($dateBegin.$i)));
        }
        if(date("D" , strtotime($dateBegin.$i)) == "Sat"){
            array_push($calendar[date("M",strtotime($dateBegin."01"))]["Sat"],date("d",strtotime($dateBegin.$i)));
        }
        if(date("D" , strtotime($dateBegin.$i)) == "Sun"){
            array_push($calendar[date("M",strtotime($dateBegin."01"))]["Sun"],date("d",strtotime($dateBegin.$i)));
        }
    }

    
    
}

display_calendar([
    [
        'name' => 'Reunion Client',
        'date' => '20200505',
        'location' => 'Nantes'
    ],
    [
        'name' => 'Affinage sprint 2',
        'date' => '20200705',
        'location' => 'Nantes'
    ],
    [
        'name' => 'RDV Pro',
        'date' => '20200705',
        'location' => 'Paris'
    ],
    [
        'name' => 'Brainstorming',
        'date' => '20190705',
        'location' => 'Lyon'
    ],
    [
        'name' => 'Demonstration client',
        'date' => '20200205',
        'location' => 'Lille'
    ]
], "202005", "202007");
