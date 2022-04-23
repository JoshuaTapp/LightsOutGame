<?php
$referer = $_SERVER['HTTP_REFERER'];

if($_GET["row"] && $_GET["col"])
{
    extract($_GET);
    $max = $row * $col;
    $min = 1;
    $size = array((int) $row, (int) $col);
    if($max < 5)
    {
        $boxes = array();
        for ($i=0; $i < $max ; $i++) { 
            array_push($boxes, $i);
        }
    }
    else
    {
        $boxes = array();
        for ($i=0; $i < 5; $i++) { 
            $randInt = (int) random_int($min, $max);
            while (in_array($randInt, $boxes, true) ) {
                $randInt = (int) random_int($min, $max);
            }
            array_push($boxes,(int) $randInt);
        }
    }
    $resp = array($size, $boxes);
    echo json_encode($resp);
}
else
{
    echo json_encode("failed to generate game");
}


