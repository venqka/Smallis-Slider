<?php
/*
Title: Slide Button
Post Type: smallis-slider
*/

$slide_url_args = array(
    'type' => 'url',
    'field' => 'slide-url',
    'label' => __( 'Url', 'smallis' ),
    'description' => __( 'Enter slide url', 'smallis' )
 );
piklist( 'field', $slide_url_args );

$slide_button_args = array(
    'type' => 'text',
    'field' => 'button-text',
    'label' => __( 'Button text', 'smallis' ),
    'description' => 'Enter button text',
 );
piklist( 'field', $slide_button_args );
