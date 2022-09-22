<?php

function display_event(array $event){
    $date = substr($event['date'],6) . "-" . substr($event['date'],4,2) . "-" . substr($event['date'],0,4);
    echo "The \"" . $event['name'] . "\" will take place on " . $date . " in " . $event['location'] . PHP_EOL;
}

function display_events_by_month(array $events){
    foreach($events as $key => $value){
        $date[] = $value['date'];
    }
    sort($date);

    $array = array();

    for($i=0;$i < count($events);$i++){
        for($j=0;$j < count($date);$j++){
            if(array_search($date[$i],$events[$j]) == 'date'){
                if(!in_array($events[$j],$array)){
                    array_push($array,$events[$j]);
                }
            }
        }
    }

    echo substr($array[0]['date'],0,4) . "-" . substr($array[0]['date'],4,2) . PHP_EOL;
    echo "The \"" . $array[0]['name'] . "\" event will take place on " . substr($array[0]['date'],6) . "-" . substr($array[0]['date'],4,2) . "-" . substr($array[0]['date'],0,4) . " in " . $array[0]['location'] . PHP_EOL;

    
    for($i=1;$i < count($array);$i++){

        $datefin = substr($array[$i]['date'],6) . "-" . substr($array[$i]['date'],4,2) . "-" . substr($array[$i]['date'],0,4);

        if(substr($array[$i-1]['date'],4,2) == substr($array[$i]['date'],4,2) && substr($array[$i-1]['date'],0,4) == substr($array[$i]['date'],0,4)){
            echo "The \"" . $array[$i]['name'] . "\" event will take place on " . $datefin . " in " . $array[$i]['location'] . PHP_EOL;
        }
        else{
            echo substr($array[$i]['date'],0,4) . "-" . substr($array[$i]['date'],4,2) . PHP_EOL;
            echo "The \"" . $array[$i]['name'] . "\" event will take place on " . $datefin . " in " . $array[$i]['location'] . PHP_EOL;
        }
    }

}

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