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
}

function kissherder_main_text() {
	echo '<p>Configure the kissherder plugin here.</p>';
}

function kissherder_api_key_input() {
	$options = get_option('kissherder_options');
	$value   = $options['api_key'];
	echo "<input id='twitter_name' name='kissherder_options[api_key]' type='text' value='$value' />";
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
