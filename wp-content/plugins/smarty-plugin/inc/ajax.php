<?php

function estates_filter_func() {
    $post = $_POST;

    $filters = array('relation'      => 'AND');
    if (isset($post['name']) && $post['name'] !== '')
        $filters[] = array(
                'key'       => 'estates_name',
                'value'     => $post['name'],
                'compare'   => '=',
            );
    if (isset($post['coord']) && $post['coord'] !== '')
        $filters[] = array(
            'key'       => 'estates_coord',
            'value'     => $post['coord'],
            'compare'   => '=',
        );
    if (isset($post['floor']) && $post['floor'] !== '')
        $filters[] = array(
            'key'       => 'estates_floors',
            'value'     => $post['floor'],
            'compare'   => '=',
        );
    if (isset($post['type']) && $post['type'] !== '')
        $filters[] = array(
            'key'       => 'estates_building_type',
            'value'     => $post['type'],
            'compare'   => '=',
        );


    $args = array(
        'post_type' => 'estate',
        'posts_per_page' => 3,
        'meta_query' => $filters
    );
    if (isset($post['page'])) {
        $args['paged'] = $post['page'];
    }
    if (isset($post['district']) && $post['district'] !== '')
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'district',
                'field' => 'id',
                'terms' => $post['district'],
            ),
        );

    $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :
            ?>
                    <?php
                        while ( $the_query->have_posts() ) :
                            $the_query->the_post();
                ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="card-text"><?php the_title(); ?></p>
                                    <ul>
                                        <?php $name = get_field('estates_name'); ?>
                                        <?php echo ($name && $name != '') ? '<li>Building name: ' . $name . '</li>' : ''; ?>
                                        <?php $coord = get_field('estates_coord'); ?>
                                        <?php echo ($coord && $coord != '') ? '<li>Coordinates: ' . $coord . '</li>' : ''; ?>
                                        <?php $floors = get_field('estates_floors'); ?>
                                        <?php echo ($floors && $floors != '') ? '<li>Floors: ' . $floors . '</li>' : ''; ?>
                                        <?php $terms = get_the_terms( $post->ID, 'district' ); ?>
                                        <?php if (count($terms) > 0) : ?>
                                            <?php $districts = array(); ?>
                                            <?php foreach ($terms as $term) : ?>
                                                <?php $districts[] = $term->name; ?>
                                            <?php endforeach; ?>
                                            <li>District: <?php echo implode(',', $districts); ?></li>
                                        <?php endif; ?>
                                    </ul>
                                    <a href="<?php echo the_permalink(); ?>" class="btn btn-primary my-2">Main call to action</a>
                                </div>
                            </div>
                        </div>
            <?php
                    endwhile;
                    ?>
            <?php if ($the_query->found_posts > 3) : ?>
                <?php $pages = $the_query->found_posts / 3; ?>
                        <div class="col-12">
                            <nav aria-label="">
                                <ul class="pagination js-pagi">
                                    <?php for ($i = 1; $i <= ceil($pages); $i++) : ?>
                                        <?php if (
                                            (isset($post['page']) && $post['page'] == $i ) ||
                                            (!isset($post['page']) && $i == 1)
                                        ) : ?>
                                            <li class="page-item active"><span class="page-link"><?php echo $i; ?></span></li>
                                        <?php else : ?>
                                            <li><a class="page-link" href="#"><?php echo $i; ?></a></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </ul>
                            </nav>
                        </div>
            <?php endif; ?>
        <?php
    else:
            echo 'Sorry, no posts matched your criteria.';
    endif;
    wp_die();
}

add_action('wp_ajax_nopriv_estates', 'estates_filter_func');
add_action('wp_ajax_estates', 'estates_filter_func');


function estates_filter_script_func() {
    ?>
    <script>
        var esFilt = document.querySelectorAll('.js-esFilt');
        if (esFilt.length > 0) {
            esFilt.forEach(function(el) {
                el.addEventListener('click', sendEsFilt)
            });
        }

        paginatorGenerate();

        function sendEsFilt(e, page = null) {
            e.preventDefault();
            var filters = document.querySelectorAll('.js-esFiltFilters');

            if (filters.length > 0) {
                var data = '';
                data = 'action=estates';
                filters.forEach(function(el) {
                    data += '&' + el.getAttribute('name')+'='+el.value;
                });
                if (page !== null) {
                    data += '&page='+page;
                }

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo admin_url('admin-ajax.php'); ?>');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var data =xhr.responseText;
                        document.querySelector('.js-estWrap').innerHTML = data;
                        paginatorGenerate()
                    } else {
                        console.error('Request failed. Returned status code ' + xhr.status);
                    }
                };
                xhr.send(data);
            }
        }

        function paginatorGenerate() {
            var esFiltPagi = document.querySelectorAll('.js-pagi li a');
            if (esFiltPagi.length > 0) {
                esFiltPagi.forEach(function(el) {
                    el.addEventListener('click', function(e){sendEsFilt(e, el.innerHTML)})
                });
            }
        }
    </script>
<?php
}

add_action('wp_footer', 'estates_filter_script_func');
