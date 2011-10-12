<?php
namespace php\lang;

if (!defined('FaabBB'))
	exit();
	
use php\lang\Object as Object;

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
		return \strpos($this->string, $anotherStringObject) !== false ? true 
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
	public function equalsIgnoreCase($anotherString) {
		$anotherStringObject = $anotherString instanceof String ? 
			$anotherString : new String($anotherString);
		return $this->toLowercase()->equals($anotherStringObject->toLowerCase());
	}
	
	/**
	 * Returns the index within this <code>string</code> of the first occurrence of the specified character. 
	 * If a character with value <code>ch</code> occurs in the character sequence represented by this {@link String} object, 
	 * 	then the index of the first such occurrence is returned -- that is, the smallest value </code>k</code> such that:
 	 *	<code>$this->charAt(k) == ch</code> 
 	 *	is <code>true</code>. If no such character occurs in this string, then -1 is returned.
 	 *
 	 * @param $ch A character, string or int.
 	 * @return the index of the first occurrence of the character in the character sequence 
 	 * 	represented by this object, or -1 if the character does not occur.
	 */
	public function indexOf($ch) {
		return \strpos($this->string, $ch) === false ? -1 : 
			\strpos($this->string, $ch);
	}
	
	/**
	 * Returns the index within this <code>string</code> of the last occurrence 
	 * 	of the specified <code>character</code>. 
	 * That is, the index returned is the largest value <code>k</code> such that:
 	 * 	<code>this.charAt(k) == ch</code>
 	 * is <code>true</code>. The String is searched backwards starting at the last character
 	 * 
 	 * @param $ch A character, string or int.
 	 * @return e index of the last occurrence of the character in the character sequence
 	 *  represented by this object, or -1 if the character does not occur.
	 */
	public function lastIndexOf($ch) {
		return \strrpos($this->string, $ch) === false ? -1 : 
			\strrpos($this->string, $ch);
	}
	
	/**
	 * Returns the length of this string. 
	 * The length is equal to the number of 16-bit Unicode characters in the string.
	 * 
	 * @return the length of the sequence of characters represented by this object.
	 */
	public function length() {
		return \strlen($this->string);
	}
	
	/**
	 * Returns a new string resulting from replacing all occurrences of <code>oldChar</code> 
	 * 	in this string with <code>newChar</code>.
	 * If the <code>character</code> <code>oldChar</code> does not occur in the <code>character</code> sequence 
	 * 	represented by this {@link String} object, then a reference to this {@link String} object is returned. 
	 * Otherwise, a new {@link String} object is created that represents a <code>character</code> sequence identical 
	 * 	to the <code>character</code> sequence represented by this {@link String} object, except that every occurrence of 
	 * 	<code>oldChar</code> is replaced by an occurrence of <code>newChar</code>.
	 * Examples:
	 * <code>new String("mesquite in your cellar")->replace('e', 'o')
     	 *    returns "mosquito in your collar"</code>
 	 * <code>new String("the war of baronets")->replace('r', 'y')
    	 *    returns "the way of bayonets"</code>
 	 * <code>new String("sparring with a purple porpoise")->replace('p', 't')
    	 *    returns "starring with a turtle tortoise"</code>
 	 * <code>new String("JonL")->replace('q', 'x') returns "JonL" (no change)</code>
 	 * 
 	 * @param $oldChar The old character.
    	 * @param $newChar The new character.
    	 * @return a string derived from this string by replacing every occurrence of <code>oldChar</code>
    	 * 	 with <code>newChar</code>.
	 */
	public function replace($oldChar, $newChar) {
		return new String(\str_replace($oldChar, $newChar, $this->string));
	}
	
	/**
	 * Replaces each substring of this string that matches the given regular expression with the given replacement.
	 * 
	 * @param $regex The regular expression to which this string is to be matched.
	 * @param $replace The string to replace with it.
	 * @return The new string.
	 */
	public function replaceAll($regex, $replace) {
		return new String(\preg_replace($regex,$replace, $this->string));
	}
	
	/**
	 * Returns a new string that is a substring of this string. 
	 * The substring begins with the character at the specified index and extends to the end of this string.
	 * 
	 * @param $beginIndex The beginning index, inclusive.
	 * @param $endIndex The end index, exclusive (optional).
	 * @return the specified substring.
	 */
	public function substring($beginIndex, $endIndex = null) {
		return $endIndex == null ?
			new String(\substr($this->string, $beginIndex)) : 
			new String(\substr($this->string, $beginIndex, $endIndex));
	}
	
	/**
	 * Splits this string around matches of the given regular expression.
    	 * This method works as if by invoking the two-argument split method with the given expression 
    	 * 	and a limit argument of zero. 
	 * Trailing empty strings are therefore not included in the resulting array.
	 * 
	 * @param $regex The delimiting regular expression
	 * @return The array of strings computed by splitting this string around matches of the given regular expression.
	 */
	public function split($regex, $limit = null) {
		return $limit == null ?
			new String(\preg_split($regex, $this->string)) : 
			new String(\preg_split($regex, $this->string, $limit));
	}
	
	/**
	 * Converts this string to a new character array.
	 * 
	 * @return a newly allocated character array whose length is the length of this string and whose contents 
	 * 	are initialized to contain the character sequence represented by this string.
	 */
	public function toCharArray() {
		return $this->string;
	}
	
	/**
	 * Converts all of the characters in this {@link String} to lower case using the rules of the default locale. 
	 * 
	 * @return The {@link String}, converted to lowercase.
	 */
	public function toLowercase() {
		return new String(\strtolower($this->string));
	}
	
	/**
	 * Converts all of the characters in this {@link String} to upper case using the rules of the default locale. 
	 * 
	 * @return The {@link String}, converted to uppercase.
	 */
	public function toUppercase() {
		return new String(\strtoupper($this->string));
	}
	
	/**
	 * Returns a copy of the string, with leading and trailing whitespace omitted.
    	 * If this String object represents an empty character sequence, or the first and last characters 
   	 * 	of character sequence represented by this String object both have codes greater than '\u0020' (the space character), 
    	 * 	then a reference to this String object is returned.
    	 * Otherwise, if there is no character with a code greater than '\u0020' in the string, 
     	 * 	then a new {@link String} object representing an empty string is created and returned.
 	 * Otherwise, let k be the index of the first character in the string whose code is greater than '\u0020', 
 	 * 	and let m be the index of the last character in the string whose code is greater than '\u0020'. A new String object is created, 
 	 * 	representing the substring of this string that begins with the character at index k and 
 	 * 	ends with the character at index m-that is, the result of this.substring(k, m+1).
	 * This method may be used to trim whitespace from the beginning and end of a string; in fact, 
	 * 	it trims all ASCII control characters as well.
	 * 
	 * @return A copy of this string with leading and trailing white space removed, or this string if it has no 
	 * 	leading or trailing white space.
	 */
	public function trim() {
		return \trim($this->string);
	}
	
	/** @Override */
	public function __toString() {
		return $this->string;
	}
}