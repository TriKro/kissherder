<?php
/*
Copyright 2011 Tristan Kromer, Peter Backx (email : tristan@grasshopperherder.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

function kissherder_admin_menu () {
	add_options_page('KissHerder', 'KissHerder', 'manage_options', 'kissherder', 'kissherder_options_page');
}

function kissherder_admin_init () {
	register_setting('kissherder_options', 'kissherder_options');
	
	add_settings_section('kissherder_main', 'Settings', 'kissherder_main_text', 'kissherder');
	add_settings_field('kissherder_api_key', 'KissMetrics API key', 'kissherder_api_key_input', 'kissherder', 'kissherder_main');
	
	add_settings_field('kissherder_subscribe_event'  , 'Event on subscribe to RSS'            , 'kissherder_subscribe_event_input'  , 'kissherder', 'kissherder_main');
	add_settings_field('kissherder_subscribe_options', 'Extra (optional) options on subscribe', 'kissherder_subscribe_options_input', 'kissherder', 'kissherder_main');
	add_settings_field('kissherder_comment_event'    , 'Event on comment'                     , 'kissherder_comment_event_input'    , 'kissherder', 'kissherder_main');
	add_settings_field('kissherder_comment_options'  , 'Extra (options) options on comment'   , 'kissherder_comment_options_input'  , 'kissherder', 'kissherder_main');
	add_settings_field('kissherder_read_event'       , 'Event on read (2 minutes on page)'    , 'kissherder_read_event_input'       , 'kissherder', 'kissherder_main');
	add_settings_field('kissherder_read_options'     , 'Extra (optional) options on read'     , 'kissherder_read_options_input'     , 'kissherder', 'kissherder_main');
	
	add_settings_section('kissherder_linklove', 'Link Love', 'kissherder_footer_text', 'kissherder');
	add_settings_field('kissherder_footer', 'Show "Powered by" footer', 'kissherder_footer_input', 'kissherder', 'kissherder_linklove');
	
}

function kissherder_main_text() {
	echo "<p>Configure the kissherder plugin here. You can customize the event that is recorded on various actions. You can also add
			additional options that are sent with the event. These must be in the form of a JSON string, for instance {'activity':'facebook'}</p>";
}

function kissherder_footer_text() {
	echo "<p>If you like this plugin, why not show it?</p>";
}

function kissherder_api_key_input() {
	$options = get_option('kissherder_options');
	$value   = $options['api_key'];
	echo "<input id='api_key' name='kissherder_options[api_key]' type='text' value='$value' />";
}

function kissherder_subscribe_event_input() {
	$options = get_option('kissherder_options');
	$value   = $options['subscribe_event'];
	echo "<input id='subscribe_event' name='kissherder_options[subscribe_event]' type='text' value='$value' />";
}

function kissherder_subscribe_options_input() {
	$options = get_option('kissherder_options');
	$value   = esc_html($options['subscribe_options']);
	echo "<input id='subscribe_options' name='kissherder_options[subscribe_options]' type='text' value='$value' />";
}

function kissherder_comment_event_input() {
	$options = get_option('kissherder_options');
	$value   = $options['comment_event'];
	echo "<input id='comment_event' name='kissherder_options[comment_event]' type='text' value='$value' />";
}

function kissherder_comment_options_input() {
	$options = get_option('kissherder_options');
	$value   = esc_html($options['comment_options']);
	echo "<input id='comment_options' name='kissherder_options[comment_options]' type='text' value='$value' />";
}

function kissherder_read_event_input() {
	$options = get_option('kissherder_options');
	$value   = $options['read_event'];
	echo "<input id='read_event' name='kissherder_options[read_event]' type='text' value='$value' />";
}

function kissherder_read_options_input() {
	$options = get_option('kissherder_options');
	$value   = esc_html($options['read_options']);
	echo "<input id='read_options' name='kissherder_options[read_options]' type='text' value='$value' />";
}

function kissherder_footer_input() {
	$options = get_option('kissherder_options');
	echo "<input id='show_footer' name='kissherder_options[show_footer]' "; 
	checked($options['show_footer'], 'on');
	echo " type='checkbox'  />";
}

function kissherder_options_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>KissHerder</h2>
		
		<?php include(plugin_dir_path(__FILE__).'/../template/feedback.php'); ?>

		<form style="float: left; width: 70%;" action="options.php" method="post">
			<?php
				settings_fields('kissherder_options');
				do_settings_sections('kissherder');
			?>
			<input name="submit" type="submit" value="Save Changes"/>
		</form>
	</div>
	<?php
}
?>
