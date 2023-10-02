<?php
/**
 * The template for displaying front page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
            </div>
        </section>

    </main>

<?php
get_footer();
