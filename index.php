<?php
echo phpinfo();
class Point {
  public function __construct(
    public float $x = 0.0,
    public float $y = 0.0,
    public float $z = 0.0
  ) 
  {
  }

  function hi() {
    return "Helo World";
  }

  public function multipleEntries()
  {
    return $x + $y + $z;
  }
}

$var = new Point(10,20,30);

echo $var->hi() . "<br>";
echo $var->multipleEntries() . "<br>";