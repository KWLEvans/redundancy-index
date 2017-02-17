<?php

    class RepeatCounter
    {
        function countRepeats($needle, $haystack)
        {
            $number_of_instances = 0;
            $needle = strtolower($needle);
            $haystack = strtolower($haystack);
            $words_array = explode(" ", $haystack);
            foreach ($words_array as $word) {
                if ($needle == $word) {
                    $number_of_instances++;
                }
            }
            return $number_of_instances;
        }
    }

?>
