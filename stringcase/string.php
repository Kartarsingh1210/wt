<?php
 $string= "hello world! Welcome to PHP Programming.";

 $uppercase=strtoupper($string);
 echo "Uppercase: ". $uppercase ."<br>";

 $lowercase=strtolower($string);
 echo "LowerCase: ". $lowercase ."<br>";

 $firstCharUppercase=ucfirst($string);
 echo "FirstCharUpperCase: ". $firstCharUppercase ."<br>";

 $worduppercase=ucwords($string);
 echo "First Character of All Words Uppercase: ". $worduppercase ."<br>";

?>