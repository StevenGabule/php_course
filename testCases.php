<?php

$myString = "foo ";
// $regex = "([A-Z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?";
$regex = "([A-Z\s])";
if (preg_match("/^$regex$/", $myString)) {
  echo true;
} else {
  echo -1;
}