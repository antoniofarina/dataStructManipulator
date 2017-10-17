<?php
/**
* dataStructureManipulatorTest is the test suite for the dataStructureManipulator class
*
*  
* @package  dataStructureManipulator
* @author   Antonio Farina <ant.farina@gmail.com>
* @version  $Revision: 1.0 $
* @license GPL-3.0
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* @access   public
*/
namespace dataStructureManipulator\Test;
use \dataStructureManipulator\dataStructureManipulator;



class dataStructureManipulatorTest extends \PHPUnit_Framework_TestCase
{
    /**
    * Private function that abstract the common path for all the assertEqual test cases
    *
    *
    * @param array $originalInput. The unflatted input
    *
    * @param array $expectedResult. The flatted array that we expect to obtain in case of success
    *
    * @return void
    */
    private function __assertEqual($originalInput,$expectedResult){
        $flatArrayResult=array();
        dataStructureManipulator::flatIntegerArray($originalInput,$flatArrayResult);
        $this->assertEquals($expectedResult, $flatArrayResult);
    }


    /**
    * Test the happy case: the input is a nested array of only integers items
    *
    * @param void
    * @param void
    *
    * @return void
    */
    public function testFlatIntegerArrayReturnsFlattedArray()
    {
        $originalInput = array(1,4,5,array(4,5,6),456,4,2,array(34,5,array(67)));
        $expectedResult = array(1,4,5,4,5,6,456,4,2,34,5,67);
        $this->__assertEqual($originalInput,$expectedResult);
    }

    /**
    * Test if one of the nested array in the input is empty
    *
    * @param void
    * @param void
    *
    * @return void
    */
    public function testFlatIntegerArrayOnEmptyInnerArray(){
        $originalInput=array(1,4,5,array(),456,4,2,array(34,5,6));
        $expectedResult = array(1,4,5,456,4,2,34,5,6);
        $this->__assertEqual($originalInput,$expectedResult);
    }


    /**
    * Test if one of the nested array contains  null element
    *
    * @param void
    * @param void
    *
    * @return void
    */
    public function testFlatIntegerArrayOnNullInnerArray(){
        $originalInput=array(1,4,5,array(null),456,4,2,array(34,5,6));
        $expectedResult = array(1,4,5,456,4,2,34,5,6);
        $this->__assertEqual($originalInput,$expectedResult);
    }


    /**
    * Test if one of the items in the input array is a non numeric string
    * A RuntimeException  is expected
    *
    * @param void
    * @param void
    *
    * @return void
    */
    public function testFlatIntegerArrayOnNonNumericArgument () {
        $originalInput = array(1,4,5,array(4,5,6),'string',4,2,array(34,5,array(67)));
        $this->expectException(\RuntimeException::class);
        dataStructureManipulator::flatIntegerArray($originalInput,$flatArrayResult);
    }

    /**
    * Test if the input is not an array
    * A RuntimeException  is expected
    *
    * @param void
    * @param void
    *
    * @return void
    */
    public function testFlatIntegerArrayOnNonArrayInput () {
        $originalInput = 1;
        $this->expectException(\RuntimeException::class);
        dataStructureManipulator::flatIntegerArray($originalInput,$flatArrayResult);
    }

    /**
    * Test if one of the items in the input array is a  numeric string
    * A RuntimeException  is expected
    *
    * @param void
    * @param void
    *
    * @return void
    */
    public function testFlatIntegerArrayOnNumericStringArgument () {
        $originalInput = array(1,4,5,array(4,5,6),'1234',4,2,array(34,5,array(67)));
        $expectedResult = array(1,4,5,4,5,6,1234,4,2,34,5,67);
        $this->__assertEqual($originalInput,$expectedResult);

    }
}
