<?php

// $arr = array(
//   "foo" => "bar",
//   42 => 42,
//   "multi" => array(
//     "dimensional" => array(
//       "array" => "foo"
//     )
//   )
// );


// var_dump($arr["foo"]);
// var_dump($arr[42]);
// var_dump($arr["multi"]["dimensional"]["array"]);

// function getArray()
// {
//   return array(1,2,3);
// }

// echo $secondElem = getArray()[1];
// echo "<br>";
// // or
// list(, ,$secondElem1) = getArray();
// echo $secondElem1;


// $arr = array(5 => 1, 12 => 2);
// $arr[] = 56;

// $arr['x'] = 42;

// var_dump($arr);

// unset($arr[5]);

// var_dump($arr);

// unset($arr);
// var_dump(isset($arr) ? $arr : '');


// Create a simple array.
// $array = array(1, 2, 3, 4, 5);
// print_r($array);

// // Now delete every item, but leave the array itself intact:
// foreach ($array as $i => $value) {
//   unset($array[$i]);
// }
// print_r($array);

// // Append an item (note that the new key is 5, instead of 0).
// $array[] = 6;
// print_r($array);

// // Re-index:
// $array = array_values($array);
// $array[] = 7;
// print_r($array);

# ===== Example #14 Recursive and multi-dimensional arrays ===== 
// $fruits = array (
//   "fruits" => array("a" => "orange", "b" => "banana", "c" => "apple"),
//   "numbers" => array(1, 2, 3, 4, 5, 6),
//   "holes" => array("first", 5 => "second", "third")
//   );

//   // Some examples to address values in the array above 
// echo $fruits["holes"][5];    // prints "second"
// echo $fruits["fruits"]["a"]; // prints "orange"
// unset($fruits["holes"][0]);  // remove "first"

// // Create a new multi-dimensional array
// $juices["apple"]["green"] = "good"; 


// $arr1 = array(2, 3);
// $arr2 = $arr1;
// $arr2[] = 4; // $arr2 is changed,
//              // $arr1 is still array(2, 3)

// var_dump([$arr2, $arr1]);

// $arr3 = &$arr1;
// $arr3[] = 4;
// var_dump([$arr3, $arr1]);

# ==== Wrappers for (array), returns array with normalize keys (without prefix): ====
function to_array_recursive($value) : array 
{
  if (!is_object($value)) {
    return (array)$value;
  }
  $class = get_class($value);
  $arr = [];
  foreach((array)$value as $key => $val) {
    $key = str_replace(["\0*\0", "\0{$class}\0"], '', $key);
    $arr[$key] = is_object($val) ? to_array_recursive($val) : $val;
  }
  return $arr;
}

function to_array($value) : array
{
  $arr = (array)$value;
  if (!is_object($value)) {
    return $arr;
  }
  $class = get_class($value);
  $keys = str_replace(["\0*\0", "\0{$class}\0"], '', array_keys($arr));
  return array_combine($keys, $arr);
}


class Test
{
    protected $var = 1;
    protected $var2;
    private $TestVar = 3;
       
    public function __construct($isParent = true)
    {
        if ($isParent) {
            $this->var2 = new self(!$isParent);
        }
    }
}

$obj = new Test();
var_dump((array) $obj, to_array_recursive($obj));















