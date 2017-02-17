<?php

    class RepeatCounter
    {
        //This array exists as part of my effort to avoid regex
        private $punctuation = [".", ",", ";", ":", "(", ")", "[", "]", "{", "}", "!", "?", "/", "'s"];

        function countRepeats($needle, $haystack)
        {
            $number_of_instances = 0;
            $needle = $this->countRepeatsParse($needle);
            $haystack = $this->countRepeatsParse($haystack);
            $words_array = explode(" ", $haystack);
            foreach ($words_array as $word) {
                if ($needle == $word) {
                    $number_of_instances++;
                }
            }
            return $number_of_instances;
        }

        // function enumerateAll($input)
        // {
        //   $input = $this->countRepeatsParse($input);
        //   $word_counts = [];
        //
        //   foreach($input as $word) {
        //       if($word_counts[$word]) {
        //         $word_counts[$word]++;
        //       } else {
        //         $word_counts[$word] = 1;
        //       }
        //   }
        //   return $word_counts;
        // }
        //
        function countRepeatsParse($input)
        {
          $input = strtolower($input);
          $input = str_replace($this->punctuation, "", $input);
          return $input;
        }
    }

?>
