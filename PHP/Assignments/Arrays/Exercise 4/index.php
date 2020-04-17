<?php
    $x = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");
    echo "Unsorted Array <br>";
    print_r($x);
    echo "<br><br>";

    echo nl2br("Ascending order sort by value \n");
    asort($x);
    print_r($x);
    echo "<br><br>";

    echo nl2br("Ascending order sort by Key \n");
    ksort($x);
    print_r($x);
    echo "<br><br>";

    echo nl2br("Descending order sorting by Value \n");
    arsort($x);
    print_r($x);
    echo "<br><br>";

    echo nl2br("Descending order sorting by Key \n");
    krsort($x);
    print_r($x);
    echo "<br><br>";
?>