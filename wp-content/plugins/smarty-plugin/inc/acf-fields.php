<?php
if( function_exists('acf_add_local_field_group') ):

    $floor_count = array();
    for ($i = 1; $i <= 20; $i++) {
        $num = (string) $i;
        $floor_count[$num] = $num;
    }
    acf_add_local_field_group(array(
        'key' => 'group_6217ff1148f5f',
        'title' => 'Table fields',
        'fields' => array(
            array(
                'key' => 'field_62144d1729bb8',
                'label' => 'Building name',
                'name' => 'estates_name',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_62144d1729bb9',
                'label' => 'Coordinates',
                'name' => 'estates_coord',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_52d6eef4a33af',
                'label' => 'Floor count',
                'name' => 'estates_floors',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' =>
                    array (
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                'choices' => $floor_count,
                'default_value' =>
                    array (
                        0 => '1',
                    ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'translations' => 'copy_once',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_64bfb4d00401c',
                'label' => 'Building type',
                'name' => 'estates_building_type',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'panel' => 'Panel',
                    'brick' => 'Brick',
                    'foamblock' => 'Foam block',
                ),
                'allow_custom' => 0,
                'default_value' => array(
                ),
                'layout' => 'vertical',
                'toggle' => 0,
                'return_format' => 'value',
                'save_custom' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'estate',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
endif;