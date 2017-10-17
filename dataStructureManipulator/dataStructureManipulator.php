<?
/**
* dataStructureManipulator is a sample class for demonstrating the manipulation of data structure.
* at the moment, it only implement a function that flat and array of integers
*
*  
* @package  dataStructureManipulator
* @author   Antonio Farina <ant.farina@gmail.com>
* @version  $Revision: 1.0 $
* @license GPL-3.0
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @access   public
*/
namespace dataStructureManipulator;
class dataStructureManipulator {

  /**
  * A summary informing the user what the associated element does.
  *
  * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
  * and to provide some background information or textual references.
  *
  * @param array $inputArray. The function expect an (also nested) array of integers
  * valid inputs are
  * - array (1,2,3)
  * - array (1,array(2),3)
  * - array (1,'2',3)
  * - array (1,array('2'),3)
  * - array (1,'',3)
  * - array (1,array(),3)
  * - array (1,array(null),3)
  *
  * @param array flattedArray. passed by reference contains the result flattered array
  *
  * @return void
  */
    public static function flatIntegerArray ($inputArray=null, &$flattedArray=null) {
        if (!is_array($inputArray)){
            throw new \RuntimeException("The input is not an array.");
        }

        if (empty($inputArray)) {
            return $inputArray;
        }


        foreach ($inputArray as  $key => $item) {
            if (is_integer($item)){
                $flattedArray[]=$item;
                continue;
            }

            if (is_null($item) or empty($item)){
                continue;
            }

            if (is_numeric($item) and ((float)$item==(int)$item)){
                $flattedArray[]=(int)$item;
                continue;
            }

            if (is_array($item)){
                self::flatIntegerArray($item,$flattedArray);
                continue;
            }
            throw new \RuntimeException("The element at position $key is not an integer\n ". print_r($item,true)."\n");
        }
    }

}
