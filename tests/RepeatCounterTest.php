<?php
    require_once "src/RepeatCounter.php";

    class RepeatCounterTest extends PHPUnit_Framework_TestCase
    {
        function check($input1, $input2, $expected_result)
        {
            //Arrange
            $test_RepeatCounter = new RepeatCounter;

            //Act
            $result = $test_RepeatCounter->countRepeats($input1, $input2);

            //Assert
            $this->assertEquals($expected_result, $result);
        }

        function test_countRepeats_singleLetter() {
          $this->check("a", "a", 1);
        }

        function test_countRepeats_multiLetter() {
          $this->check("art", "art", 1);
        }

        function test_countRepeats_singleInstanceInString() {
          $this->check("art", "i like art", 1);
        }

        function test_countRepeats_multiInstanceInString() {
          $this->check("art", "i like art because art is cool", 2);
        }

        function test_countRepeats_capitalization() {
          $this->check("Art", "aRT is my favorite because I love ArT", 2);
        }
    }

?>
