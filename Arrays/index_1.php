<?php
// Array representing a possible record set returned from a database
// $records = array(
//   array(
//       'id' => 2135,
//       'first_name' => 'John',
//       'last_name' => 'Doe',
//   ),
//   array(
//       'id' => 3245,
//       'first_name' => 'Sally',
//       'last_name' => 'Smith',
//   ),
//   array(
//       'id' => 5342,
//       'first_name' => 'Jane',
//       'last_name' => 'Jones',
//   ),
//   array(
//       'id' => 5623,
//       'first_name' => 'Peter',
//       'last_name' => 'Doe',
//   )
// );

// $first_names = array_column($records, 'first_name');
// print_r($first_names);

// # Example #2 Get the column of last names from a recordset, indexed by the "id" column
// $last_names = array_column($records, 'last_name', 'id');
// print_r($last_names);
// foreach($last_names as $key => $name) {
//   echo $key . ", " . $name . PHP_EOL;
// }

// class Person
// {
//     private $name;

//     public function __construct(string $name)
//     {
//         $this->name = $name;
//     }

//     public function __get($prop)
//     {
//         return $this->$prop;
//     }

//     public function __isset($prop) : bool
//     {
//         return isset($this->$prop);
//     }
// }

// $people = [
//     new Person('Fred'),
//     new Person('Jane'),
//     new Person('John'),
// ];

// print_r(array_column($people, 'name'));


// echo PHP_EOL;

// print_r(array_combine(Array('a','a','b'), Array(1,2,3)));


// echo PHP_EOL;


// function array_combine_($keys, $values)
// {
//     $result = array();
//     foreach ($keys as $i => $k) {
//         $result[$k][] = $values[$i];
//     }
//     array_walk($result, function($v) {
//       $v = (count($v) == 1) ? array_pop($v) : $v;
//     });
//     return  $result;
// }

// print_r(array_combine_(Array('a','a','b'), Array(1,2,3)));


# Example #1 array_diff() example
// $array1 = array("a" => "green", "red", "blue", "red");
// $array2 = array("b" => "green", "yellow", "red");
// $result = array_diff($array1, $array2);

// print_r($result);

# Example #2 array_diff() example with non-matching types
// This will generate a Notice that an array cannot be cast to a string.
// $source = [1, 2, 3, 4];
// $filter = [3, 4, [5], 6];
// $result = array_diff($source, $filter);

// Whereas this is fine, since the objects can cast to a string.
// class S {
//   private $v;

//   public function __construct(string $v) {
//     $this->v = $v;
//   }

//   public function __toString() {
//     return $this->v;
//   }
// }

// $source = [new S('a'), new S('b'), new S('c')];
// $filter = [new S('b'), new S('c'), new S('d')];

// $result = array_diff($source, $filter);
// print_r($result);

//pass value you wish to delete and the array to delete from
// function array_delete($value, $array)
// {
//     $array = array_diff( $array, array($value) );
//     return $array;
// }

# If you want a simple way to show values that are in either array, but not both, you can use this:
// function arrayDiff($A, $B) {
//   $intersect = array_intersect($A, $B);
//   return array_merge(array_diff($A, $intersect), array_diff($B, $intersect));
// }

// If you just need to know if two arrays' values are exactly the same (regardless of keys and order), 
// then instead of using array_diff, this is a simple method:
function identical_values( $arrayA , $arrayB ) {
  sort( $arrayA );
  sort( $arrayB );
  return $arrayA == $arrayB;
}

$array1 = array( "red" , "green" , "blue" );
$array2 = array( "green" , "red" , "blue" );
$array3 = array( "red" , "green" , "blue" , "yellow" );
$array4 = array( "red" , "yellow" , "blue" );
$array5 = array( "x" => "red" , "y" =>  "green" , "z" => "blue" );

echo identical_values( $array1 , $array2 );  // true
echo identical_values( $array1 , $array3 );  // false
echo identical_values( $array1 , $array4 );  // false
echo identical_values( $array1 , $array5 );  // true


function arrayRecursiveDiff($aArray1, $aArray2) {
  $aReturn = array();

  foreach ($aArray1 as $mKey => $mValue) {
    if (array_key_exists($mKey, $aArray2)) {
      if (is_array($mValue)) {
        $aRecursiveDiff = arrayRecursiveDiff($mValue, $aArray2[$mKey]);
        if (count($aRecursiveDiff)) { 
          $aReturn[$mKey] = $aRecursiveDiff; 
        }
      } else {
        if ($mValue != $aArray2[$mKey]) {
            $aReturn[$mKey] = $mValue;
        }
      }
    } else {
        $aReturn[$mKey] = $mValue;
    }
  }

  return $aReturn;
}