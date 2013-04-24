<?
require('multiple.php');
//Get the range
$range1 = $_GET['range1'];
$range2 = $_GET['range2'];
//Initialize the class
$values = new multiple($range1,$range2);
//Get the list in array form
$myArray = $values->myList();
//Print the values
foreach($myArray as $value){
	print $value.' ';
}
?>