<?php
namespace dataStructureManipulator\Test;


use \dataStructureManipulator\dataStructureManipulator;

class dataStructureManipulatorTest extends \PHPUnit_Framework_TestCase
{
    //

	public function testFlatIntegerArrayReturnsFlattedArray()
    {
        $originalInput = array(1,4,5,array(4,5,6),456,4,2,array(34,5,array(67)));
        $expectedResult = array(1,4,5,4,5,6,456,4,2,34,5,67);

        $dataStructureManipulator = new dataStructureManipulator();
        $flatArrayResult = $dataStructureManipulator->flatIntegerArray($originalInput);
        $this->assertEquals($expectedResult, $flatArrayResult);
    }


}
