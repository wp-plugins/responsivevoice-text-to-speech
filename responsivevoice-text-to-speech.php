<?php
/*
Plugin Name: ResponsiveVoice Text To Speech
Plugin URI: responsivevoice.com/wordpress-text-to-speech-plugin/?utm_source=wpadmin&utm_medium=plugin&utm_campaign=wprvttsplugin
Description: An easy to use plugin to integrate ResponsiveVoice Text to Speech into your WP blog.
Version: 1.1.3
Author: ResponsiveVoice
Author URI: http://responsivevoice.com
License: GPL2
*/
/*
Copyright 2015  ResponsiveVoice   (email : info@responsivevoice.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

wp_register_script( 'responsive-voice', 'http://code.responsivevoice.org/responsivevoice.js');
wp_enqueue_script( 'responsive-voice');
add_action('init', 'RV_add_listen_button');
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'RV_custom_plugin_action_links');

function RV_add_voicebox(){
	$iconurl = plugin_dir_url(__FILE__) . 'assets/images/responsivevoice-icon-192x192.png';
	$RVTextToSpeechWidget = "<div style='float:left' id='voicetestdiv'>
<textarea style='-webkit-input-placeholder: color: #555;' placeholder='Paste or type-in a block of text.' id='text' class='input input--dropdown js--animations' cols='45' rows='3'></textarea>
<br />
<select id='voiceselection' class='input input--dropdown js--animations'></select>&nbsp;&nbsp;&nbsp;<button id='playbutton' class='butt js--triggerAnimation' type='button' value='Play'>Play</button>
</div>
<script>var voicelist = responsiveVoice.getVoices(); var vselect = jQuery('#voiceselection'); jQuery.each(voicelist, function() {		vselect.append(jQuery('<option >').val(this.name).text(this.name)); }); playbutton.onclick = function() { responsiveVoice.speak((jQuery('#text').val())?jQuery('#text').val():jQuery('#text').attr('placeholder'),jQuery('#voiceselection').val()); }; jQuery('#voicetestdiv').hide(); jQuery('#waitingdiv').show(); responsiveVoice.OnVoiceReady = function() { jQuery('#voicetestdiv').fadeIn(0.5);jQuery('#waitingdiv').fadeOut(0.5);	}
</script>
<div style='float:left' class='poweredby_container'><img src=$iconurl height='64' width='64' align='middle'></img><div class='poweredby'>Powered by<br/><strong>ResponsiveVoice</strong></div></div>
<div style='clear: both;'>&nbsp;</div>";

	return $RVTextToSpeechWidget;
}

$id_listenbutton = 0;
function RV_add_listen_button($atts){
	global $id_listenbutton;
	$id_listenbutton++;

	$postcontent = get_the_content();
	$postcontent = RV_clean_text($postcontent);
	extract(shortcode_atts(array(
		'voice' => 'UK English Female',
		'buttontext' => 'Listen to this',
	), $atts));

	// Check if voice exists.
	//$voice = RV_check_voice($voice);
	//$iconurl = plugin_dir_url(__FILE__) . 'assets/images/responsivevoice-icon-16x16.png';

	$speakericon = "&#128266;";

	$RVListenButton = "<button id='listenButton$id_listenbutton' class='butt js--triggerAnimation' type='button' value='Play' title='ResponsiveVoice Tap to Start/Stop Speech'><span>$speakericon $buttontext</span></button><script> listenButton$id_listenbutton.onclick = function(){if(responsiveVoice.isPlaying()){responsiveVoice.cancel();}else{responsiveVoice.speak('$postcontent', '$voice');}}; </script>";

	return $RVListenButton;
}

$id_bb = 0;
function RV_add_bblisten($atts, $includedtext = ""){
	global $id_bb;
	$id_bb++;

	$cleantext = RV_clean_text($includedtext);
	extract(shortcode_atts(array(
		'voice' => 'UK English Female',
		'buttontext' => 'Play',
	), $atts));

	// Check if voice exists.
	//$voice = RV_check_voice($voice);
	//$iconurl = plugin_dir_url(__FILE__) . 'assets/images/responsivevoice-icon-16x16.png';

	$speakericon = "&#128266;";
	$RVBB = $includedtext."<button id='bb$id_bb' class='butt js--triggerAnimation' type='button' value='Play' ' class='butt js--triggerAnimation' type='button' value='Play' title='ResponsiveVoice Tap to Start/Stop Speech'><span>$speakericon $buttontext</span></button><script> bb$id_bb.onclick = function(){if(responsiveVoice.isPlaying()){responsiveVoice.cancel();}else{responsiveVoice.speak('$cleantext', '$voice');}}; </script>";

	return $RVBB;
}

function RV_custom_plugin_action_links( $links){
	$new_links = array(
		'<a href="http://responsivevoice.com/wordpress-text-to-speech-plugin/?utm_source=wordpress&utm_medium=plugin-action-row&utm_campaign=wp-plugin-launch" target="_blank">FAQ</a>',
		'<a href="http://responsivevoice.com/support/?utm_source=wordpress&utm_medium=plugin-action-row&utm_campaign=wp-plugin-launch" target="_blank">Support</a>',

	);
	$links = array_merge($new_links, $links);

	return $links;
}

// Check for name of the voice against the database of voices in the RV library. If there's no match, return default voice.
function RV_check_voice($voice){
	if($voice != null) {
		$voicelist = "<script type='text/javascript'>responsiveVoice.getVoices()</script>";
		$voiceexists = false;
		for ($i = 0; $i < count($voicelist); $i++) {
			if ($voicelist[i] == $voice) {
				$voiceexists = true;
				break;
			}
		}
		if ($voiceexists == false) {
			$voice = 'UK English Female';
		}
	}
	return $voice;
}

function RV_clean_text($text){
	$text = strip_shortcodes($text);
	$text = wp_strip_all_tags($text, true);
	$text = preg_replace("/&nbsp;/", "", $text);
	$text = str_replace(array("'", '"'), array("\'", '\"'), $text); // Get rid of quotation marks (single and double).
	$text = preg_replace('/\s+/', ' ', trim($text)); // Get rid of /n and /s in the string.

	return $text;
}

// BBCode shortcodes
add_shortcode('ResponsiveVoice', 'RV_add_bblisten');
add_shortcode('responsivevoice', 'RV_add_bblisten');

// Voicebox shortcodes
add_shortcode('ResponsiveVoiceBox', 'RV_add_voicebox');
add_shortcode('RVTextBox', 'RV_add_voicebox');

// "Listen to this" shortcodes
add_shortcode('responsivevoice_button', 'RV_add_listen_button');
add_shortcode('ListenToPostButton', 'RV_add_listen_button');
add_shortcode('RVListenButton', 'RV_add_listen_button');
?>
