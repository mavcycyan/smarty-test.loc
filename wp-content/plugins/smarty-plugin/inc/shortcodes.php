<?php

function estate_shortcodes_func() {
    add_shortcode('estates_list', 'estates_list_func');
}

add_action('init', 'estate_shortcodes_func');

function estates_list_func() {
    ob_start();
    ?>
    <div class="album py-5">
        <div class="container">
            <div class="p-3 bg-light mb-4">
                <div class="row">
                    <?php $filters = estates_field_values(); ?>
                    <div class="col-12 col-md-6 col-lg-2">
                        <div class="mb-3">
                            <label for="name" class="form-label">Building name</label>
                            <select class="form-select js-esFiltFilters" name="name">
                                <option selected value="">Select name...</option>
                                <?php if (count($filters['names']) > 0) : ?>
                                    <?php foreach ($filters['names'] as $name) : ?>
                                        <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <label for="name" class="form-label">Coordinates</label>
                        <select class="form-select js-esFiltFilters" name="coord">
                            <option selected value="">Select coordinate...</option>
                            <?php if (count($filters['coords']) > 0) : ?>
                                <?php foreach ($filters['coords'] as $coord) : ?>
                                    <option value="<?php echo $coord; ?>"><?php echo $coord; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <label for="name" class="form-label">Floors</label>
                        <select class="form-select js-esFiltFilters" name="floor">
                            <option selected value="">Select floor...</option>
                            <?php if (count($filters['floors']) > 0) : ?>
                                <?php foreach ($filters['floors'] as $floor) : ?>
                                    <option value="<?php echo $floor; ?>"><?php echo $floor; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <label for="name" class="form-label">Building type</label>
                        <select class="form-select js-esFiltFilters" name="type">
                            <option selected value="">Select type...</option>
                            <?php if (count($filters['types']) > 0) : ?>
                                <?php foreach ($filters['types'] as $type) : ?>
                                    <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-12 col-md-6 col-lg-2">
                        <label for="name" class="form-label">Districts</label>
                        <select class="form-select js-esFiltFilters" name="district">
                            <option selected value="">Select district...</option>
                            <?php $terms = get_terms(array('taxonomy' => 'district')); ?>
                            <?php if (count($terms) > 0) : ?>
                                <?php foreach ($terms as $term) : ?>
                                    <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="col-12 col-md-12 col-lg-2">
                        <button type="button" class="btn btn-primary mt-4 js-esFilt">Filter</button>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 js-estWrap">
                <?php
                $paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

                $args = array(
                    'post_type' => 'estate',
                    'posts_per_page' => 3,
                    'paged' => $paged,
                );
                $the_query = new WP_Query( $args ); ?>

                <?php if ( $the_query->have_posts() ) : ?>
                    <?php
                    while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                        $post_id = get_the_ID();
                        ?>

                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text"><?php echo get_the_title($post_id); ?></p>
                                    <ul>
                                        <?php $name = get_field('estates_name', $post_id); ?>
                                        <?php echo ($name && $name != '') ? '<li>Building name: ' . $name . '</li>' : ''; ?>
                                        <?php $coord = get_field('estates_coord', $post_id); ?>
                                        <?php echo ($coord && $coord != '') ? '<li>Coordinates: ' . $coord . '</li>' : ''; ?>
                                        <?php $floors = get_field('estates_floors', $post_id); ?>
                                        <?php echo ($floors && $floors != '') ? '<li>Floors: ' . $floors . '</li>' : ''; ?>
                                        <?php $types = get_field('estates_building_type', $post_id); ?>
                                        <?php echo ($types && $types != '') ? '<li>Building type: ' . $types . '</li>' : ''; ?>
                                        <?php $terms = get_the_terms( $post_id, 'district' ); ?>
                                        <?php if ($terms && count($terms) > 0) : ?>
                                            <?php $districts = array(); ?>
                                            <?php foreach ($terms as $term) : ?>
                                                <?php $districts[] = $term->name; ?>
                                            <?php endforeach; ?>
                                            <li>District: <?php echo implode(',', $districts); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                    <a href="<?php echo get_the_permalink($post_id); ?>" class="btn btn-primary my-2">Main call to action</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php if ($the_query->found_posts > 3) : ?>
                        <?php $pages = $the_query->found_posts / 3; ?>
                        <div class="col-12">
                            <nav aria-label="">
                                <ul class="pagination js-pagi">
                                    <?php for ($i = 1; $i <= ceil($pages); $i++) : ?>
                                        <?php if ($i == 1) : ?>
                                            <li class="page-item active"><span class="page-link"><?php echo $i; ?></span></li>
                                        <?php else : ?>
                                            <li><a class="page-link" href="#"><?php echo $i; ?></a></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                        </div>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}

function estates_field_values() {
    $names = array();
    $coords = array();
    $floors = array();
    $types = array();

    $posts = get_posts(array('post_type' => 'estate', 'numberposts' => -1));
    if (count($posts) > 0) {
        foreach ($posts as $p) {
            if ($name = get_field('estates_name', $p->ID)) {
                $names[] = $name;
            }
            if ($coord = get_field('estates_coord', $p->ID)) {
                $coords[] = $coord;
            }
            if ($floor = get_field('estates_floors', $p->ID)) {
                $floors[] = $floor;
            }
            if ($type = get_field('estates_building_type', $p->ID)) {
                $types[] = $type;
            }
        }
        $names = array_unique($names);
        $coords = array_unique($coords);
        $floors = array_unique($floors);
        $types = array_unique($types);
    }

    return array(
            'names' => $names,
            'coords' => $coords,
            'floors' => $floors,
            'types' => $types,
    );
}