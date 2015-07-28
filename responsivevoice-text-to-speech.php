<?php
/*
Plugin Name: ResponsiveVoice Text To Speech
Plugin URI: 
Description: An easy to use plugin to integrate ResponsiveVoice Text to Speech into your WP blog.
Version: 1.0.5
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

function RV_add_listen_button($atts){
	$postcontent = get_the_content();
	$postcontent = strip_shortcodes($postcontent);
	$postcontent = wp_strip_all_tags($postcontent, true);
	$postcontent = preg_replace("/&nbsp;/", "", $postcontent);    
	$postcontent = str_replace(array("'",'"'),array("\'",'\"'),$postcontent); // Get rid of quotation marks (single and double).
	$postcontent = preg_replace('/\s+/', ' ', trim($postcontent)); // Get rid of /n and /s in the string.
    extract(shortcode_atts(array(
      'voice' => 'UK English Female',
   ), $atts));

	// QQQ Check if the voice given exists.
	/*if($voice != null){
		$voicelist = "<script>responsiveVoice.getVoices();</script>";
		$voiceexists = false;
		for($i = 0; $i < count($voicelist); $i++)
		{
			if($voicelist[i] == $voice)
			{
				$voiceexists = true;
				break;
			}
		}
		if($voiceexists == false)
		{
			$voice = 'UK English Female';
		}
	}*/


	$iconurl = plugin_dir_url(__FILE__) . 'assets/images/responsivevoice-icon-16x16.png';

	// QQQ Check if voice is playing.
	$RVListenButton = "<button id='listenButton' class='butt js--triggerAnimation' type='button' value='Play'><img src='$iconurl'></img> Listen to this</button>
	<script>listenButton.onclick = function(){responsiveVoice.speak('$postcontent', '$voice');};</script>";
		
	return $RVListenButton;
}

add_shortcode('RVTextBox', 'RV_add_voicebox');
add_shortcode('RVListenButton', 'RV_add_listen_button');
?>