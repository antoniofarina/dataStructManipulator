<?
namespace dataStructureManipulator;


class dataStructureManipulator {
    public static function flatIntegerArray ($inputArray=null,&$flattedArray=null) {
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
