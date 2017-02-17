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
    }

?>
