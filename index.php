<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<SCRIPT SRC="http://code.jquery.com/jquery-1.9.1.js"></SCRIPT>
	<script>
	/**
	 * Accepts digits
	 * @param {event} e The keypress event
	 */
	function digitOnly(e) {
		var digitsOnly = /\d/;
		if (!e) var e = window.event
		if (e.keyCode) code = e.keyCode;
		else if (e.which) code = e.which;
		var character = String.fromCharCode(code);

		// if they pressed esc, remove focus from field
		if (code==27) { this.blur(); return false; }
		// if the key is backspace or tab
		if (!e.ctrlKey && code!=9 && code!=8) {
			if (character.match(digitsOnly)) {
				return true;
			} else {
				return false;
			}
		}
	}
	/**
	 * Check empty fields and range
	 */
	function validate(){
		//Empty the result field
		$( "#result" ).empty();
		
		var range1 = parseInt(document.forms['rangeForm']['range1'].value);
		var range2 = parseInt(document.forms['rangeForm']['range2'].value);
		//Check if the 2 inputs are empty
		if((range1=='')||(range2=='')){
			alert('The two values should not be empty.');
			return false;
		//Check if the first input is less than the second input
		}else if(range1 > range2){
			alert('The first range should not be greater than the second');
			return false;
		}
		//Process the range
		ajaxCall(range1,range2);
	}
	/**
	 * Do the ajax call
	 * @param {Integer} $r1 The first value of the range
	 * @param {Integer} $r2 The second value of the range
	 */
	function ajaxCall(r1,r2){
	$.ajax({
		url: "getData.php",
		data: {
			range1: r1,
			range2: r2
			},
		success: function( data ) {
			$( "#result" ).html(data);
			}
		});
	}
	</script>
</head>
<body>
<form name='range' id='rangeForm'>
	<label name='range1Label'>From</label><input type='text' name='range1' id='range1' onkeypress='return digitOnly(event)' size=10 />
	<label name='range2Label'>To<label><input type='text'name= 'range2' id='range2' onkeyPress='return digitOnly(event)' size=10/>
	<input type='button' value='submit' onClick="return validate()"/>
</form>
<div id="result"></div>
</body>
</html>

