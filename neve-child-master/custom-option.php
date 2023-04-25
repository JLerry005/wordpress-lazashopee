<?php 

/**
 * Custom Option
 */

 add_action('admin_init', 'custom_option_callback');

 function custom_option_callback(){
    add_settings_section( 
        'custom_settings_section', 
        'Custom Settings', 
        'custom_settings_section_callback', 
        'custom_settings_option'
    );

    add_settings_field( 
        'custom_setting_field', 
        'Video Size', 
        'custom_settings_callback', 
        'custom_settings_option', 
        'custom_settings_section', 
    );

    register_setting( 'custom_settings_option', 'custom_setting_field');
    register_setting( 'custom_settings_option', 'custom_setting_field2');
 }

 function custom_settings_section_callback(){
    $html = '';
    $html .= '<p>Custom Settings</p>';
    echo $html;
 }

 function custom_settings_callback($args){
    $width_value = get_option( 'custom_setting_field', '' );
    $height_value = get_option( 'custom_setting_field2', '' );
    
    $html = '';
    $html .= '
    <div>
      <label>Width</label>
      <input type="text" name="custom_setting_field" id="custom_setting_field" value="'.$width_value.'">
      <br/>
      <label>Height</label>
      <input type="text" name="custom_setting_field2" id="custom_setting_field2" value="'.$height_value.'">
    </div>';
    echo $html;
 }