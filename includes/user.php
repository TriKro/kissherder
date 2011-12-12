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

function kissherder_display() {
	$options = get_option('kissherder_options');
	$api_key = $options['api_key'];

?>

<script type="text/javascript">
  var _kmq = _kmq || [];
  function _kms(u){
    setTimeout(function(){
      var s = document.createElement('script'); var f = document.getElementsByTagName('script')[0]; s.type = 'text/javascript'; s.async = true;
      s.src = u; f.parentNode.insertBefore(s, f);
    }, 1);
  }
  _kms('//i.kissmetrics.com/i.js');_kms('//doug1izaerwt3.cloudfront.net/<?php echo $api_key; ?>.1.js');
</script>

<?php
}

function kissherder_javascript() {
	wp_enqueue_script('kissherder', plugins_url('/kissherder/kissherder.js'), array('jquery'), 1.0);
	
	$options = get_option('kissherder_options');
	wp_localize_script( 'kissherder', 'KissHerder', array( 'subscribeEvent'   => $options['subscribe_event'],
														   'subscribeOptions' => $options['subscribe_options'] ? $options['subscribe_options'] : '{}',
														   'commentEvent'     => $options['comment_event'],
														   'commentOptions'   => $options['comment_options'] ? $options['comment_options'] : '{}',
														   'readEvent'        => $options['read_event'],
														   'readOptions'      => $options['read_options'] ? $options['read_options'] : '{}' ) );
}

?>
