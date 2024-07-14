
<?php 
/*** i want courses of this category that belong to its sub categories  */
// Ensure this is the main query
if (have_posts() && is_main_query()) {
    global $wp_query;
   get_header();  
   echo 'category template';
   $term = get_queried_object();
    // Debug: Display query parameters
 
    echo '<pre>';
    echo 'Query Parameters:';
    //var_dump($wp_query);
    echo '</pre>';

    // Loop through the posts
    while (have_posts()) {
        the_post();
        // Display post content or title for verification
        the_title('<h2>', '</h2>');
        //the_content();
      echo   the_permalink();
    }

    // Debug: Display query results
    echo '<pre>';
    echo 'Query Results:';
   // var_dump($wp_query->posts);
    echo '</pre>';
    get_footer();
}  elseif (!have_posts()) {

    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
    include( get_query_template( '404' ) );
    exit();
}

?>


