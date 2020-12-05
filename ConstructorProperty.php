<?php 


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
}

$var = new Point(10,20,30);

echo $var->hi();