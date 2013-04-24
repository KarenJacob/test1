<?
/**
 * Class that check for multiple by 3 and 5 in the range
 * @author KarenJ
 */
class multiple{
	/**
	 * The first value of range
	 * @type Integer
	 */
	public $range1;
	/**
	 * The second value of range
	 * @type Integer
	 */
	public $range2;
	/**
	 * The container of the range
	 * @type Array
	 */
	protected $myArray;
	/**
	 * Initialize the ranges
	 * @params {Integer} $r1 The first value of the range
	 * @params {Integer} $r2 The second value of the range
	 */
	public function __construct($r1, $r2){
		$this->range1 = $r1;
		$this->range2 = $r2;
		//Put the range into array
		$this->rangeToArray();
	}
	/**
	 * Put the range in an array
	 */
	protected function rangeToArray(){
		$this->myArray = array();

		for($x = $this->range1; $x<=$this->range2;$x++){
			$result = '';
			//Check if the value is divisible by 3
			if($this->divisible($x,3))
				$result = 'Fizz';
			//Check if the value is divisible by 5
			if($this->divisible($x,5))
				$result = $result.'Buzz';
			
			if($result == ''){
				//Check if there is a consecutive Fizz/Buzz
				if($this->isConsecutive($x))
					$result = 'Bazz';
				//Else just return the integer
				else
					$result = $x;
			}
			//Put the result in an array
			$this->myArray[$x] = $result;
		}
	}
	/**
	 * Check if the value is in multiple by $muliply parameter
	 * @param {Integer} $value The value of 
	 * @param {Integer} $multiple The integer to check for multiples
	 * @return {Boolean} 
	 */
	public function divisible($value, $multiple){
		$result = $value % $multiple;
		return ($result == 0) ? true : false; 
	}
	/**
	 * Check if there is a consecutive Fizz/Buzz
	 * @param {Integer} The index of the array to check
	 * @return {Boolean}
	 */
	protected function isConsecutive($index){
		//If the last integer is FizzBuzz, return true
		if($this->myArray[$index-1]== 'FizzBuzz')
			return true;
		//If the last 2 integer are Fizz/Buzz, return true, else return false
		else if($this->isFizzBuzz($this->myArray[$index-1])){
			if($this->isFizzBuzz($this->myArray[$index-2]))
				return true;
			else
				return false;
		}else
			return false;
	}
	/**
	 * Returns the range in array form
	 * @return {Array} The array of the range
	 */
	public function myList(){
		return $this->myArray;
	}
	/**
	 * Check if the value is Fizz or Buzz
	 * @params {Integer/String} $value The value to compare
	 */
	public function isFizzBuzz($value){
		$fizzBuzzArray = array('Fizz','Buzz');
		if(in_array($value, $fizzBuzzArray))
			return true;
		else
			return false;
	}
}
?>