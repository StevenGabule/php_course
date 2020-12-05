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






