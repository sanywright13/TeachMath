<?php 
get_header();
global $post;
?>
<main class="lesson_page">
<div class="container-fluid">
<div class="row">
<div class="col-md-9 ps-0">
<?php // get the courses of this lesson

$course_lesson= get_posts(array(
    'post_type' => 'cour',
    'meta_query' => array(
        array(
            'key' => 'related_lessons', // name of custom field
            'value' => '"' . $post->ID . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
        )
    )
));
//var_dump($course_lesson);
$course_ID=$course_lesson[0]->ID;
// Retrieve categories for the 'lesson' post type
$taxonomy = 'niveau'; // Adjust to your custom taxonomy
$terms = wp_get_post_terms($course_ID, $taxonomy);
/*** get the course of this lesson and display it */
//var_dump($terms);
if(!empty($terms[0]->name=='Lycee')){
  $term_lyc=wp_get_post_terms($course_ID,'lyceeniveau');
  $term_cate=wp_get_post_terms($course_ID,'category');
  //var_dump($term_cate[0]->name);
  $cat_lycee_url=get_home_url().'/'.$terms[0]->slug.'/'.$term_lyc[0]->slug.'/'.$term_lyc[1]->slug.'/'.$term_cate[0]->slug.'/';
 
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb ms-0">
    <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" title=""><i class="fa-solid fa-house"></i><span>Acceuil</span></a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($terms[0]->term_id)); ?>" title=""><?php echo $terms[0]->name;?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($term_lyc[0]->term_id)); ?>" title=""><?php echo $term_lyc[1]->name;?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url($cat_lycee_url); ?>" title=""><?php echo $term_cate[0]->name;?></a></li>

    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_the_permalink($course_ID)); ?>" title=""><?php echo $course_lesson[0]->post_title;?></a></li>


    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
  </ol>
</nav>
<?php }elseif($terms[0]->name=='CPGE'){
   $term_lyc=wp_get_post_terms($course_ID,'CPGENiveau');
   $term_cate=wp_get_post_terms($course_ID,'category');
   $cat_lycee_url=get_home_url().'/'.$terms[0]->slug.'/'.$term_lyc[0]->slug.'/'.$term_lyc[1]->slug.'/'.$term_cate[0]->slug.'/';
  
  ?>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" title=""><i class="fa-solid fa-house"></i>Acceuil</a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($terms[0]->term_id)); ?>" title=""><?php echo $terms[0]->name;?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($term_lyc[0]->term_id)); ?>" title=""><?php echo $term_lyc[0]->name;?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($term_lyc[1]->term_id)); ?>" title=""><?php echo $term_lyc[1]->name;?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url($cat_lycee_url); ?>" title=""><?php echo $term_cate[0]->name;?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
  </ol>
</nav>
<?php }elseif($terms[0]->name=='College'){
   $term_lyc=wp_get_post_terms($course_ID,'CollegeClasse');
   $cat_lycee_url=get_home_url().'/'.$terms[0]->slug.'/'.$term_lyc[0]->slug.'/';

  ?>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" title=""><i class="fa-solid fa-house"></i>Acceuil</a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($terms[0]->term_id)); ?>" title=""><?php echo $terms[0]->name;?></a></li>

    <li class="breadcrumb-item"><a href="<?php echo esc_url($cat_lycee_url); ?>" title=""><?php echo $term_lyc[0]->name;?></a></li>

    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
  </ol>
</nav>
<?php }elseif($terms[0]->name=='Primaire'){
     $term_lyc=wp_get_post_terms($course_ID,'primaire');
     $cat_lycee_url=get_home_url().'/'.$terms[0]->slug.'/'.$term_lyc[0]->slug.'/';?>
  <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" title=""><i class="fa-solid fa-house"></i>Acceuil</a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url(get_term_link($terms[0]->term_id)); ?>" title=""><?php echo $terms[0]->name;?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo esc_url($cat_lycee_url); ?>" title=""><?php echo $term_lyc[0]->name;?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
  </ol>
</nav>
<?php }
//var_dump($terms[0]);
?>


<?php the_content();?>
</div>
<div class="col-md-3">

</div>
</div>
</div>
</main>
<?php get_footer();?>