<?php

function districts_taxonomy_init() {

    register_taxonomy(
        'district',
        'estate',
        array(
            'labels' => array(
                'name' => 'District',
                'singular_name' => 'District',
                'search_items' => 'Search',
                'popular_items' => 'Popular',
                'all_items' => 'All',
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => 'Edit',
                'update_item' => 'Update',
                'add_new_item' => 'Add New',
                'new_item_name' => 'New',
                'menu_name' => 'Districts',
            ),
            'update_count_callback' => '',
            'show_ui'               => true,
            'show_in_rest'          => true,
            'query_var' => true,
            'hierarchical'  => true,

        )
    );
}

add_action( 'init', 'districts_taxonomy_init' );