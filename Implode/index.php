<?php

$elements = array('a', 'b', 'c');

echo "<ul><li>" . implode("</li><li>", $elements) . "</li></ul>";

$a1 = array("1","2","3");
$a2 = array("a");
$a3 = array();

echo "a1 is: '".implode("','",$a1)."'<br>";
echo "a2 is: '".implode("','",$a2)."'<br>";
echo "a3 is: '".implode("','",$a3)."'<br>";

class Foo
{
    protected $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function __toString()
    {
        return $this->title;
    }
}

$array = [
  new Foo('foo'),
  new Foo('bar'),
  new Foo('qux')
];

echo implode('; ', $array);

var_dump(implode('',array(true, true, false, false, true)));


# ==== quite handy in INSERT statements: ====
// array containing data
$array = array(
  "name" => "John",
  "surname" => "Doe",
  "email" => "j.doe@intelligence.gov"
);

// build query...
$sql  = "INSERT INTO table";

// implode keys of $array...
$sql .= " (`".implode("`, `", array_keys($array))."`)";

// implode values of $array...
$sql .= " VALUES ('".implode("', '", $array)."') ";

// execute query...
$result = mysql_query($sql) or die(mysql_error());

# ==== handier if you use the following: =
$id_nums = array(1,6,12,18,24);
$id_nums = implode(", ", $id_nums);
$sqlquery = "Select name,email,phone from usertable where user_id IN ($id_nums)";
// $sqlquery becomes "Select name,email,phone from usertable where user_id IN (1,6,12,18,24)"


# null values are imploded too. You can use array_filter() to sort out null values.
$ar = array("hello", null, "world");
print(implode(',', $ar)); // hello,,world
print(implode(',', array_filter($ar, function($v){ return $v !== null; }))); // hello,world