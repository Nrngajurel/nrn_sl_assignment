<!-- Illustrate local, global and static variables in PHP with the help of an example. -->

<?php
$x = 5; // global scope

function localGlobalTest1() {
  // using x inside this function will generate an error
  echo "<p>Variable x inside function is: $x</p>";
}
localGlobalTest1();

echo "<p>Variable x outside function is: $x</p>";
?>

<?php
function localGloabalTest2() {
  $x = 5; // local scope
  echo "<p>Variable x inside function is: $x</p>";
}
localGlobalTest1();

// using x outside the function will generate an error
echo "<p>Variable x outside function is: $x</p>";
?>


<?php
$x = 5;
$y = 10;

function localGlobalTest3() {
  global $x, $y;
  $y = $x + $y;
}

localGlobalTest3();
echo $y; // outputs 15
?>

<?php
$x = 5;
$y = 10;

function localGloabalTest4() {
  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
}

localGloabalTest4();
echo $y; // outputs 15
?>


<?php
function staticVariableTest() {
  static $x = 0;
  echo $x;
  $x++;
}

staticVariableTest();
staticVariableTest();
staticVariableTest();
?>