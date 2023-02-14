<?php get_header();
echo '<section class="pt-5 pb-5 body">';
echo '<div class="container">';
echo '<div class="row justify-content-center">';
get_template_part('partials/sidebar');
echo '<div class="col-lg-9 col-md-12 order-lg-2 order-1">';

echo '<p>' . get_the_time('F jS, Y') . '</p>';

echo '<h1 class="pb-4">' . get_the_title() . '</h1>';

if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else:
echo '<p>Sorry, no posts matched your criteria.</p>';
endif;
echo '</div>';
// <div class="col-lg-3">
// </div>
echo '</div>';
echo '<div class="row justify-content-center pt-5">';
echo '<div class="col-md-6" id="previous">';
echo '<small>Previous</small>';
echo '<h3 class="h5">' . get_previous_post_link() . '</h3>';
echo '</div>';
echo '<div class="col-md-6 text-right" id="next">';
echo '<small>Next</small>';
echo '<h3 class="h5">' . get_next_post_link() . '</h3>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</section>';
get_footer(); ?>