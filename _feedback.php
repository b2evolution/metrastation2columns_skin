<?php
	/**
	 * This is the template that displays the feedback for a post
	 * (comments, trackbak, pingback...)
	 *
	 * This file is not meant to be called directly.
	 * It is meant to be called by an include in the _main.php template.
	 * To display a feedback, you should call a stub AND pass the right parameters
	 * For example: /blogs/index.php?p=1&more=1&c=1&tb=1&pb=1
	 * Note: don't code this URL by hand, use the template functions to generate it!
	 *
	 * b2evolution - {@link http://b2evolution.net/}
	 * Released under GNU GPL License - {@link http://b2evolution.net/about/license.html}
	 * @copyright (c)2003-2006 by Francois PLANQUE - {@link http://fplanque.net/}
	 *
	 * @package evoskins
	 * @subpackage custom
	 */
	if( !defined('EVO_MAIN_INIT') ) die( 'Please, do not access this page directly.' );

	/**
	 * We now call the default feedback handler...
	 * However you can replace this file with the full handler (in /blogs) and customize it!
	 */
	require get_path('skins').'_feedback.php';
?>