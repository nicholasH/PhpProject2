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
                
        foreach ($_REQUEST as $x)
        {
            echo  $x ;
            echo "<br>";
        }


        $data = $_REQUEST["request"];
        $offest = $_REQUEST["offset"];
        $limit = $_REQUEST['limit'];
        echo '<br>test';
        echo $data;
        echo '<br>test';
        echo $offest;
        echo $limit;
        
        ?>
    </body>
</html>
