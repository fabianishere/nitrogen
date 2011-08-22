<?php
if (!defined('FaabBB'))
	exit();

/**
 * The {@link String} class provides the built-in PHP string functions wrapped
 * 	in a class.
 * 
 * @TODO Finish this.
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, Oracle
 * @author Fabian M. 
 */
final class String extends Object {
	
	/**
	 * The <code>string</code> value of this instance.
	 */
	private $string = "";
	
	/**
	 * Constructs a new String.
	 * 
	 * @param $string The <code>string</code> value.
	 */
	public function __construct($string = null) {
		$this->string = $string;
	}
	
	/**
	 * Returns the character at the specified index. 
	 * An index ranges from 0 to length() - 1. 
	 * The first character of the sequence is at index 0, the next at index 1, and so on, as for array indexing.
	 * 
	 * @param $index The index of the character.
	 * @return The character at the specified index of this string. The first character is at index 0.
	 */
	public function charAt($index) {
		return $this->string[$index];
	}
	
	/**
	 * Concatenates the specified string to the end of this string.
	 * If the length of the argument string is 0, then this String object is returned. Otherwise, 
	 * 	a new String object is created, representing a character sequence that is the concatenation 
	 * 	of the character sequence represented by this String object and 
	 * 	the character sequence represented by the argument string.
	 * Examples:
	 *	<code>new String("cares")->concat("s") returns "caress"</code>
 	 *	<code>new String("to")->concat("get").concat("her") returns "together"</code>
	 * 
	 * @param $str The String that is concatenated to the end of this String.
	 * @return a string that represents the concatenation of this object's 
	 * 			characters followed by the string argument's characters.
	 */
	public function concat($str) {
		$anotherStringObject = $str instanceof String ? 
			$str : new String($str);
		return new String($this->string . $anotherStringObject);
	}
	
	/**
	 * Returns <code>true</code> if and only if this string contains 
	 * 	the specified sequence of char values.
	 * @param $s The sequence to search for.
	 * @return <code>true</code> if this string contains <code>s</code>, 
	 * 			<code>false otherwise</code>
	 */
	public function contains($s) {
		$anotherStringObject = $s instanceof String ? 
			$s : new String($s);
		return strpos($this->string, $anotherStringObject) !== false ? true 
			: false;
	}
	/**
	 * Compares this string to the specified object.
	 * The result is <code>true</code> if and only if the argument is not null and is a String object 
	 * 	that represents the same sequence of characters as this object.
	 * 
	 * @param $anObject The object to compare this {@link String} against.
	 * @return <code>true</code> if the String are equal; <code>false</code> otherwise.
	 */
	public function equals($anObject) {
		return $this->string == $anObject;
	}
	
	/**
	 * Compares this {@link String} to another {@link String}, ignoring case considerations.
	 * Two strings are considered equal ignoring case if they are of the same length, 
	 * 	and corresponding characters in the two strings are equal ignoring case. 
	 * Two characters c1 and c2 are considered the same, ignoring case if at least one of the following is true:
	 * <ul>
	 * 	 <li>The two characters are the same (as compared by the == operator).</li>
	 *	 <li>Applying the method {@link String#toUppercase} to each {@link String} produces the same result.</li>
	 * 	 <li>Applying the method Character.toLowerCase(char) to each character produces the same result.</li>
	 * </ul>
	 * 
	 * @param $anotherString The {@link String} to compare this {@link String} against.
	 * @return <code>true</code> if the argument is not null and the Strings are equal, 
	 * 	ignoring case; <code>false</code> otherwise.
	 */
	function equalsIgnoreCase($anotherString) {
		$anotherStringObject = $anotherString instanceof String ? 
			$anotherString : new String($anotherString);
		return $this->toLowercase()->equals($anotherStringObject->toLowerCase());
	}
}