<?php

get_header();

echo '<section class="pt-5 pb-5 body">';
echo '<div class="container">';
echo '<div class="row">';

echo '<div class="col-12 pb-4">';
echo '<h1>' . get_the_title(2889) . '</h1>';

echo '</div>';

if ( have_posts() ) : 
    
    while ( have_posts() ) : the_post();

echo '<div class="col-md-6 pr-lg-5 col-blog text-white" style="margin-bottom: 50px;">';

    
    echo '<div class="w-100 h-100 d-flex align-items-end justify-content-center blog-content position-relative overflow-h">';
    the_post_thumbnail('full',array('class'=>'position-absolute w-100 h-100'));
echo '<div>';

  echo '<div class="overlay position-absolute"></div>';
  echo '<div class="position-relative z-1" style="padding: 150px 25px 50px;">';
  echo '<a href="' . get_the_permalink() . '">';
  echo '<h3 class="h4">' . get_the_title() . '</h3>';
echo '</a>';

  echo '<hr class="border-white">';


  echo '<p class="">' . get_the_tags('Tags: ') . '</p>';
  echo '<a href="' . get_the_permalink() . '">Read More</a>';
  echo '</div>';



  echo '</div>';


  echo '</div>';


  echo '</div>';

// echo '<h3>' . get_the_title() . '</h3>';

// // the_content();
// the_excerpt();

// wp_link_pages();

// edit_post_link();

endwhile;

// default pagination from wordpress
// if ( get_next_posts_link() ) {
// next_posts_link();
// }


// if ( get_previous_posts_link() ) {
// previous_posts_link();
// }

echo '<div class="col-12 d-flex justify-content-center pt-4">';
// pagination with page numbers
    the_posts_pagination( array(
        'mid_size' => 100,
        'prev_text' => __( 'Previous Page', 'textdomain' ),
        'next_text' => __( 'Next Page', 'textdomain' ),
        ) );
echo '</div>';

// the next two lines break the code, not sure why
// else :
// echo '<p>No posts found. :(</p>';

endif;

echo '</div>';
echo '</div>';
echo '</section>';

get_footer(); 
?>