<?php
    $x = array(1, 2, 3, 4, 5);
    echo nl2br("Array before deleting an element : \n");
    print_r($x);
    echo "<br>";
    array_splice($x,2,1);
    echo nl2br("Array after deleting an element : \n");
    print_r($x);
?>
