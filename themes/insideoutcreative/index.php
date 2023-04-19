<?php

get_header();

echo '<section class="pt-5 pb-5 body">';
echo '<div class="container">';
echo '<div class="row">';

echo '<div class="col-12 pb-4">';
$posts_page_id = get_option( 'page_for_posts' );
$posts_page_title = get_the_title( $posts_page_id );

echo '<h1>' . $posts_page_title . '</h1>';

echo '</div>';
echo '</div>';

if ( have_posts() ) : 
  echo '<div class="row">';
  echo '<div class="col-lg-9">';
  echo '<div class="row">';
    while ( have_posts() ) : the_post();

echo '<div class="col-md-6 pr-lg-5 col-blog text-white" style="margin-bottom: 50px;">';

    
    echo '<div class="w-100 h-100 d-flex align-items-end blog-content position-relative overflow-h img-hover">';
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

echo '</div>';
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
  echo '</div>';

  echo '<div class="col-lg-3">';
  echo get_template_part('partials/sidebar');
  echo '</div>';

  echo '</div>';

endif;

echo '</div>';
echo '</div>';
echo '</section>';

get_footer(); 
?>