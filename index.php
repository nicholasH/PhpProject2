<?php
//gets the inputs from the url 
$file = filter_input(INPUT_GET, 'request');
$offset = filter_input(INPUT_GET, 'offset');
$limit = filter_input(INPUT_GET, 'limit');

if(!is_numeric($offset) or ! is_numeric($limit)){
    $offset = 0;
    $limit = 0;
}

$row = 1;
//the return array that will hold the all the wanted data
$rArray = [];
$myJSON;


//open files from where the data is stored 
if (($handle = fopen("data/$file.csv", "r")) !== FALSE) {
    //gets the columns names from the first line on the cvs
    $columns = fgetcsv($handle, 100, ",");

    //loops through the data
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
//return the data
echo $myJSON;
return $myJSON;


