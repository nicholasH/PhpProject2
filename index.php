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
        $row = 0;
        
        if (($handle = fopen("data/$file.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 100, ",")) !== FALSE) {
                if($row >= $offset && $row < ($limit + $offset)){
                    $num = count($data);
                    for ($c=0; $c < $num; $c++) {
                        
                        echo $data[$c] . "<br />\n";
                    }
                
                    
                    
                }
            $row++;
            }
            fclose($handle);
        }
        

        
        ?>
    </body>
</html>
