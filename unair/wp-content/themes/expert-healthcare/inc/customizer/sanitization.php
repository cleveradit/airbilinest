<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Expert Healthcare
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

function expert_healthcare_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function expert_healthcare_switch_sanitization( $input ) {
    if ( true === $input ) {
        return 1;
    } else {
        return 0;
    }
}

function expert_healthcare_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function expert_healthcare_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

function expert_healthcare_sanitize_html( $html ) {
	return wp_kses_post( force_balance_tags( $html ) );
}

/* Sanitization Text*/
function expert_healthcare_sanitize_text( $text ) {
	return wp_filter_post_kses( $text );
}

function expert_healthcare_sanitize_phone_number( $phone ) {
    return preg_replace( '/[^\d+]/', '', $phone );
}

// Sanitization callback function for numeric input
function expert_healthcare_sanitize_numeric_input($input) {
    // Remove any non-numeric characters
    return preg_replace('/[^0-9]/', '', $input);
}

// Sanitization callback function for logo width
function expert_healthcare_sanitize_logo_width($input) {
    $input = absint($input); // Convert to integer
    // Ensure the value is between 1 and 150
    return ($input >= 1 && $input <= 300) ? $input : 150; // Default to 270 if out of range
}

// Sanitize the input
function expert_healthcare_sanitize_sidebar_position( $input ) {
    $valid = array( 'right', 'left' );

    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return 'right';
    }
}

function expert_healthcare_sanitize_copyright_position( $input ) {
    $valid = array( 'right', 'left', 'center' );

    if ( in_array( $input, $valid, true ) ) {
        return $input;
    } else {
        return 'right';
    }
}