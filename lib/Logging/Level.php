<?php
namespace Logging;

if (!defined('FaabBB'))
	die;

/**
 * The {@link Level} object defines a set of standard logging levels that can be
 * used to control logging output. The logging Level objects are ordered and are
 * specified by ordered integers. Enabling logging at a given level also enables
 * logging at all higher levels. Clients should normally use the predefined
 * Level public staticants such as {@link Level#SEVERE}. The levels in descending order
 * are:
 * <ul>
 * <li>SEVERE (highest value)</li>
 * <li>WARNING</li>
 * <li>INFO</li>
 * <li>CONFIG</li>
 * <li>FINE</li>
 * <li>FINER</li>
 * <li>FINEST (lowest value)</li>
 * </ul>
 *
 *
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Level {
	/**
	 * {@link Level#OFF} is a special level that can be used to turn off logging.
	 * This level is initialized to {@link Number#MAX_VALUE}
	 */
	public static $OFF = array('name' => 'OFF', 'value' => PHP_INT_MAX);

	/**
	 * {@link Level#SEVERE} is a message level indicating a serious failure. In
	 * general {@link Level#SEVERE} messages should describe events that are of
	 * considerable importance and which will prevent normal program execution. They
	 * should be reasonably intelligible to end users and to system administrators.
	 * This level is initialized to 1000.
	 */
	public static $SEVERE = array('name' => 'SEVERE', 'value' => 1000);

	/**
	 * {@link Level#WARNING} is a message level indicating a potential problem. In
	 * general {@link Level#WARNING} messages should describe events that will be of
	 * interest to end users or system managers, or which indicate potential
	 * problems. This level is initialized to 900.
	 */
	public static $WARNING = array('name' => 'WARNING', 'value' => 900);

	/**
	 * {@link Level#INFO} is a message level for informational messages. Typically
	 * {@link Level#INFO} messages will be written to the console or its equivalent.
	 * So the {@link Level#INFO} level should only be used for reasonably
	 * significant messages that will make sense to end users and system admins.
	 * This level is initialized to 800.
	 */
	public static $INFO = array('name' => 'INFO', 'value' => 800);

	/**
	 * {@link Level#CONFIG} is a message level for static configuration messages.
	 * {@link Level#CONFIG} messages are intended to provide a variety of static
	 * configuration information, to assist in debugging problems that may be
	 * associated with particular configurations. For example, {@link Level#CONFIG}
	 * message might include the CPU type, the graphics depth, the GUI
	 * look-and-feel, etc. This level is initialized to 700.
	 */
	public static $CONFIG = array('name' => 'CONFIG', 'value' => 700);

	/**
	 * {@link Level#FINE} is a message level providing tracing information. All of
	 * {@link Level#FINE}, {@link Level#FINER}, and {@link Level#FINEST} are
	 * intended for relatively detailed tracing. T The exact meaning of the three
	 * levels will vary between subsystems, but in general, {@link Level#FINEST}
	 * should be used for the most voluminous detailed output, {@link Level#FINER}
	 * for somewhat less detailed output, and {@link Level#FINE} for the lowest
	 * volume (and most important) messages. In general the {@link Level#FINE} level
	 * should be used for information that will be broadly interesting to developers
	 * who do not have a specialized interest in the specific subsystem.
	 * {@link Level#FINE} messages might include things like minor (recoverable)
	 * failures. Issues indicating potential performance problems are also worth
	 * logging as {@link Level#FINE}. This level is initialized to 500.
	 */
	public static $FINE = array('name' => 'FINE', 'value' => 500);
	/**
	 * {@link Level#FINER} indicates a fairly detailed tracing message. By default
	 * logging calls for entering, returning, or throwing an exception are traced at
	 * this level. This level is initialized to 400.
	 */
	public static $FINER = array('name' => 'FINER', 'value' => 400);
	/**
	 * {@link Level#FINEST} indicates a highly detailed tracing message. This level
	 * is initialized to 300.
	 */
	public static $FINEST = array('name' => 'FINEST', 'value' => 300);
	/**
	 * {@link Level#ALL} indicates that all messages should be logged. This level is
	 * initialized to {@link Number#MIN_VALUE}
	 */
	public static $ALL = array('name' => 'FINEST', 'value' => PHP_INT_SIZE);


}

?>
