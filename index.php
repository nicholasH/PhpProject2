<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
                if($row >= $offset && $row < ($limit + $offset)){
                    $num = count($data);
                    $xArray;
                    for ($c=0; $c < $num; $c++) {
                        $xArray[$columns[$c]] = $data[$c];
                        
                        echo $data[$c] . "<br />\n";
                    }
                    array_push($rArray,$xArray);
                    
                
                    
                    
                }
            $row++;
            }
            fclose($handle);
        }
        $myJSON = json_encode($rArray);
        echo $myJSON;

        
        ?>
    </body>
</html>
