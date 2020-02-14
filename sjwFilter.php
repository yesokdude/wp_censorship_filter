<?php 
/*
Plugin Name: SJW_Filter
Plugin URI: 
Description: 
Version: 1.0
Author: YesOkDude
Author URI: https://github.com/yesokdude
*/

define('SJWFILTER_DIR', plugin_dir_path(__FILE__));

function sjwfilter_filter_the_content($the_content)
{
	static $badwords = array();
	if (empty($badwords) )
	{
		$badwords = explode(',', file_get_contents(SJWFILTER_DIR . 'badwords.txt'));
	}

	for($i = 0, $c = count($badwords); $i < $c; $i++) 
	{
		$the_content = preg_replace('#' . $badwords[$i] . '#iu', ' {плохое слово}', $the_content);
	}
	return $the_content;
}
add_filter('the_content', 'sjwFilter_filter_the_content');

