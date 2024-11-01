<?php
/*
Plugin Name: Skysa Facebook Fan Page App
Plugin URI: http://wordpress.org/extend/plugins/skysa-facebook-fan-page-app
Description: This app displays information directly from your Facebook Page.
Version: 1.4
Author: Skysa
Author URI: http://www.skysa.com
*/

/*
*************************************************************
*                 This app was made using the:              *
*                       Skysa App SDK                       *
*    http://wordpress.org/extend/plugins/skysa-app-sdk/     *
*************************************************************
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
MA  02110-1301, USA.
*/

// Make sure we don't expose any info if called directly
if ( !function_exists( 'add_action' ) ) exit;

// Skysa App plugins require the skysa-req subdirectory,
// and the index file in that directory to be included.
// Here is where we make sure it is included in the project.
include_once dirname( __FILE__ ) . '/skysa-required/index.php';


// FACEBOOK FAN PAGE APP
$GLOBALS['SkysaApps']->RegisterApp(array( 
    'id' => '503036f8ec62f',
    'label' => 'Facebook Fan Page',
	'options' => array(
		'bar_label' => array( // key is the field name
            'label' => 'Button Label',
			'info' => 'What would you like the bar link label name to be?',
			'type' => 'text',
			'value' => 'Facebook',
			'size' => '30|1'
		),
        'icon' => array(
            'label' => 'Button Icon URL',
            'info' => 'Enter a URL for the an Icon Image. (You can leave this blank for none)',
			'type' => 'image',
			'value' => plugins_url( '/icons/facebook-icon.png', __FILE__ ),
			'size' => '50|1'
        ),
        'title' => array(
            'label' => 'App Title',
            'info' => 'What would you like to set as the title for the app window?',
			'type' => 'text',
			'value' => 'Our Facebook Page',
			'size' => '30|1'
        ),
        'option1' => array(
            'label' => 'Fan Page URL',
            'info' => 'What is your Facebook Fan Page URL?',
			'type' => 'text',
			'value' => '',
			'size' => '50|1'
        )
	),
    'window' => array(
        'position' => 'Page Center'
    ),
    'fvars' => array(
        'url' => skysa_app_facebook_fan_page_fvar_url
    ),
    'views' => array(
        'main' => '<iframe src="//www.facebook.com/plugins/likebox.php?href=#fvar_url&width=350&height=258&colorscheme=light&show_faces=true&border_color=%2394A3C4&stream=false&header=false&appId=248868828464746" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:258px;" allowTransparency="true"></iframe>'
    ), 
    'html' => '<div id="$button_id" class="bar-button" apptitle="$app_title" w="350" h="306" bar="$app_position">$app_icon<span class="label">$app_bar_label</span></div>',
    'js' => "
        S.on('click',function(){S.open('window','main')});
     "
));

function skysa_app_facebook_fan_page_fvar_url($rec){
    return urlencode($rec['option1']);
}

?>