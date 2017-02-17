<?php

    class RepeatCounter
    {
        function countRepeats($word, $string)
        {
            $number_of_instances = 0;
            if ($word == $string) {
              $number_of_instances++;
            }
            return $number_of_instances;
        }
    }

?>
