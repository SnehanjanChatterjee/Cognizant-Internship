<?php
    $array1 = array(array(77, 87), array(23, 45));
    $array2 = array("Drupal Community", "com");
    function merge_arrays_by_index($x, $y)
    {
        $result = array(); 
        $result[] = $x;
        foreach($y as $key => $val){
            $result[] = $val;
        }
        // print_r($result);
        //echo "hi <br><br>";
        return $result;
    }
    print_r(array_map('merge_arrays_by_index',$array2, $array1));
?>