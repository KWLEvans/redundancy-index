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

        function enumerateAll($input)
        {
          $input = $this->countRepeatsParse($input);
          $input = explode(" ", $input);
          $word_counts = [];

          foreach($input as $word) {
              if(array_key_exists($word, $word_counts)) {
                $word_counts[$word]++;
              } else {
                $word_counts[$word] = 1;
              }
          }
          return $this->sortResultsNumerically($word_counts);
        }

        function sortResultsNumerically($word_counts) {
            $counts_by_number = [];
            foreach($word_counts as $word => $count) {
                if(array_key_exists($count, $counts_by_number)) {
                  array_push($counts_by_number[$count], $word);
                  sort($counts_by_number[$count]);
                } else {
                  $counts_by_number[$count] = [$word];
                }
            }
            krsort($counts_by_number);
            return $counts_by_number;
        }

        function sortResultsAlphabetically($word_counts) {
            $counts_by_letter = [];
            foreach($word_counts as $word => $count) {
                if(array_key_exists($word[0], $counts_by_letter)) {
                  $counts_by_letter[$word[0]][$word] = $count;
                  arsort($counts_by_letter[$word[0]]);
                } else {
                  $counts_by_letter[$word[0]] = [];
                  $counts_by_letter[$word[0]][$word] = $count;
                  arsort($counts_by_letter[$word[0]]);
                }
            }
            ksort($counts_by_letter);
            return $counts_by_letter;
        }

        function countRepeatsParse($input)
        {
          $input = strtolower($input);
          $input = str_replace($this->punctuation, "", $input);
          return $input;
        }

        function save() {
          $_SESSION["word-count"] = $this;
        }

        static function getActiveWordCount() {
          return $_SESSION["word-count"];
        }

        static function clearActiveWordCount() {
          $_SESSION["word-count"] = "";
        }
    }

?>
