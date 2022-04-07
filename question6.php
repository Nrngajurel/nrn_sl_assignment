
 <!-- Illustrate the working of loop control statements (break and continue) with the help of an example. -->

<?php
for ($x = 0; $x < 10; $x++) {
    // jumps out of the loop when x is equal to 4:
  if ($x == 4) {
    break;
  }
  echo "The number is: $x <br>";
}
?>


<?php
for ($x = 0; $x < 10; $x++) {
    //  skips the value of 4:
  if ($x == 4) {
    continue;
  }
  echo "The number is: $x <br>";
}
?>