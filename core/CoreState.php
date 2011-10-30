<?php
if (!defined('FaabBB'))
	exit();
/**
 * Contains serveral states FaabBB can be in; stored in an 'enum'.
 * <note>Be careful when selecting a state, as example the 'INIT' will initialize the FaabBB system again.</note>
 *
 * @category Core
 * @version Version 3.006 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
 class CoreState {
 	/**
 	 * Represents the state where the {@link Core} isn't initialized yet.
 	 */
 	const INIT = 0;

 	/**
 	 * Represents the state where the {@link Core} is successfully initialized,
 	 * 	so the invoke method can be called.
 	 */
 	const INVOKE = 1;

 	/**
 	 * Represents the state where the {@link Core} failed to initialize.
 	 */
 	const INIT_FAILED = 2;

 	/**
 	 * Represents the state where the {@link Core} failed to invoke.
 	 */
 	const INVOKE_FAILED = 3;

 	/**
 	 * Represents the state where everything is done and  the HTTP Response is send.
 	 */
 	const SUCCESS = 4;

 	// TODO: Finish this.
 }


?>