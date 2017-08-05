<?php

$file = filter_input(INPUT_GET, 'request');
$offset = filter_input(INPUT_GET, 'offset');
$limit = filter_input(INPUT_GET, 'limit');
$row = 1;
$rArray = [];
$myJSON;

if (($handle = fopen("data/$file.csv", "r")) !== FALSE) {

    $data = fgetcsv($handle, 100, ",");
    $columns = $data;


    while (($data = fgetcsv($handle, 100, ",")) !== FALSE) {
        if ($row >= $offset && $row < ($limit + $offset)) {
            $num = count($data);
            $xArray;
            for ($c = 0; $c < $num; $c++) {
                $xArray[$columns[$c]] = $data[$c];
            }
            array_push($rArray, $xArray);
        }
        $row++;
    }
    fclose($handle);
}
$myJSON = json_encode($rArray);
echo $myJSON;
return $myJSON;


