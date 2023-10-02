<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package smarty
 */

get_header();
?>

    <main>

        <section class="py-5 container">
            <div class="py-lg-5">
                <h1 class="fw-light text-center"><?php the_title(); ?></h1>
                <p class="lead text-muted"><?php the_content(); ?></p>
                <table class="table">
                    <tr>
                        <?php $name = get_field('estates_name'); ?>
                        <?php echo ($name && $name != '') ? '<td>Building name</td><td>' . $name . '</td>' : ''; ?>
                    </tr>
                    <tr>
                        <?php $coord = get_field('estates_coord'); ?>
                        <?php echo ($coord && $coord != '') ? '<td>Coordinates</td><td>' . $coord . '</td>' : ''; ?>
                    </tr>
                    <tr>
                        <?php $floors = get_field('estates_floors'); ?>
                        <?php echo ($floors && $floors != '') ? '<td>Floor</td><td>' . $floors . '</td>' : ''; ?>
                    </tr>
                    <tr>
                        <?php $types = get_field('estates_building_type'); ?>
                        <?php echo ($types && $types != '') ? '<td>Building type</td><td>' . $types . '</td>' : ''; ?>
                    </tr>
                    <tr>
                        <?php $terms = get_the_terms( $post->ID, 'district' ); ?>
                        <?php if ($terms && count($terms) > 0) : ?>
                            <?php $districts = array(); ?>
                            <?php foreach ($terms as $term) : ?>
                                <?php $districts[] = $term->name; ?>
                            <?php endforeach; ?>
                            <td>District</td><td><?php echo implode(',', $districts); ?></td>
                        <?php endif; ?>
                    </tr>
                </table>
            </div>
        </section>

    </main>

<?php
get_footer();
