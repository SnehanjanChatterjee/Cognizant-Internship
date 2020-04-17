<?php
    $array1 = array("mohammad" => Array("physics" => Array("volume1" => Array("part1" => "101","part2" => "102"),"volume2" => "31"),"maths" => "31","chemistry" => "40"),"qadir" => Array("physics" => "31","maths" => "33","chemistry" => "30"),"zara" => Array("physics" => "32","maths" => "23","chemistry" => "40"));

    function traverse_array($array, $level = 0)
    {
        foreach($array as $key => $value)
        {
            if(is_array($value))
            {
                for($i = 0;$i < $level; $i++)
                    echo '...';
                echo ' ' . $key . '<br>';
                traverse_array($value,$level+1);
            } 
            else
            {
                for($i = 0; $i < $level; $i++)
                    echo '...';
                echo ' ' . $key . ' has value ' . $value . '<br>';
            }
        }
    }
    traverse_array($array1);
?>