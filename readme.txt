=== ResponsiveVoice Text To Speech ===
Contributors: ResponsiveVoice
Author: ResponsiveVoice
Donate link: http://responsivevoice.com/wordpress-text-to-speech-plugin
Tags: audio, google translate, Google Voice, speech, text to audio, text to speech, text-to-speech, text2speech, speech synthesis api, webspeech api, voice, espeak, javascript, Speak, speech, spoken, text, text-to-speech, talk, listen, accessibility, a11y, webreader, ivona, tts, arabic, mp3, ogg, buddypress, button, chinese, english, french, german, google, welcome, greetings, hebrew, html, html5, iPad, iphone, italian, jquery, link, links, menus, mobile, multilingual, page, pages, plugin, plugins, portuguese, Post, posts, readability, Russian, seo, shortcode, sidebar, sound, spanish, gspeech, stats, tablet, tts, widget, wordpress, button, blind, visual impairment, elderly, ADA, BS 8878:2010, WCAG 2.0, Web Content Accessibility Guidelines 2.0
Requires at least: 3.6
Tested up to: 4.2.3
Stable tag: 1.1.3

ResponsiveVoice the leading HTML5 text to speech synthesis solution, is now available for WordPress. Over 51 languages through 168 voices.

== Description ==
[ResponsiveVoice](http://responsivevoice.com/wordpress-text-to-speech-plugin) is a HTML5-based Text-To-Speech library designed to add voice features to WordPress across all smartphone, tablet and desktop devices. It supports 51 languages through 168 voices and has no dependencies.

Languages include UK English, US English, Spanish, French, Deutsch, Italian, Greek, Hungarian, Turkish, Russian, Dutch, Swedish, Norwegian, Japanese, Korean, Chinese, Hindi, Serbian, Croatian, Bosnian, Romanian, Catalan, Australian, Finnish, Afrikaans, Albanian, Arabic, Armenian, Czech, Danish, Esperanto, Hatian Creole, Icelandic, Indonesian, Latin, Latvian, Macedonian, Moldavian, Montenegrin, Polish, Brazilian Portuguese, Portuguese, Serbo-Croatian, Slovak, Spanish Latin American, Swahili, Tamil, Thai, Vietnamese and Welsh.


### Support and Questions visit here first:
> * [Support](http://responsivevoice.com/support)

### Useful Links:
> * [Live Demo](http://responsivevoice.com/wordpress-text-to-speech-plugin)
> * [Homepage](http://responsivevoice.com/wordpress-text-to-speech-plugin)
> * [Documentation](http://responsivevoice.com/wordpress-text-to-speech-plugin)

### Features:
* Listen to any post or page with the tap of a button
* Shortcodes to place Listen button anywhere on the post or page
* 51 languages supported through 168 voices
* Unlimited text to speech
* Easy access to content for website users, tap to listen to your page or post read aloud
* A more functional website for a range of users including visually impaired and the elderly
* Web Accessibility Compliance Group 2.0, ADA and BS 8878:2010 features

### Usage:

* ** It's Easy ** - To have the Listen button appear put the following shortcode anywhere in the text of your page or post.
`[responsivevoice_button]`

You can select a voice by using the "voice" parameter, and change the text that appears on the button with the "buttontext" parameter. The following shortcode will read in the US English Female voice, and the button will say "Play".
`[responsivevoice_button voice="US English Female" buttontext="Play"]`
A full list of ResponsiveVoice names is available at [Documentation](http://responsivevoice.org/text-to-speech-languages/). Default is UK English Female.

* ** Read a whole page, or just sections of text ** - If you don't want the whole page or post to be read, just surround the salient text with 
`[responsivevoice]Text you want ResponsiveVoice to read [/responsivevoice]`
This tag also supports the voice and buttontext parameters.

For more details, please see the [Documentation](http://responsivevoice.com/wordpress-text-to-speech-plugin)

= Requirements =

There are no requirements, you do not need to install cURL.

== Frequently Asked Questions ==

You can read our FAQs [here](http://responsivevoice.freshdesk.com/support/solutions "ResponsiveVoice Helpdesk")

If you have experienced any problems with this plugin please let us know by contacting our support department at [Support](http://responsivevoice.com/support "ResponsiveVoice support") website.

== Installation ==

1. Unzip files.
2. Upload the entire responsivevoice-text-to-speech folder to the /wp-content/plugins/ directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.
4. Use the shortcodes in your post or page.
5. Enjoy!

== Screenshots ==

1. ResponsiveVoice Listen button in a Wordpress post.

== Changelog ==

= 1.1.3 =
 * Removed ResponsiveVoice icon from buttons, now the speaker emoji is displayed instead.
 * FIX: Text in the button should not wrap around anymore.

= 1.1.2 =
* FIX: multiple instances of ResponsiveVoice buttons now work on the same page.
* FIX: fixed vertical alignment of the ResponsiveVoice logo in buttons.
* FEATURE: added the possibility to only speak a piece of text. Just surround it with [responsivevoice] and [/responsivevoice]. Its parameters are voice and buttontext, like with [responsivevoice_button].

= 1.1.1 =
* FIX: Text in [responsivevoice_button] won't wrap anymore.
* Added FAQ and Support links to the plugin's action row in Wordpress' "Installed plugins" page.

= 1.1 =
* Clicking on the RVListenButton on a page while a voice is playing will now stop it.
* Added support for new standardized shortcode, [RVListenButton].
* Added support for a "voice" parameter for [RVListenButton], which defaults to UK English Female.
* Added support for a "buttontext" parameter for [RVListenButton], which defaults to "Listen to this".

= 1.0.5 =
* Support for voice attribute in shortcode

= 1.0 =
* This is the initial release of the plugin

== Upgrade Notice ==

= 1.1.3 =
* New speaker icon!