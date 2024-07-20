<?php get_header(); 

global $post;
?>
<?php
$featured_lessons = get_field('related_lessons');
$featured_excercices=get_field('related_excercices');
$featured_videos=get_field('related_video');

//$custom_field = get_field( 'related_lessons', $post->ID );
//var_dump($featured_lessons->ID);

 ?>
   
<div class="cour-page container-fluid">
    <div class="row">
<div class="col-md-4 p-0">
<div class="flex-shrink-0 p-0 sidebaryt" >
    <div class=" p-3 align-items-center pb-3  text-center link-body-emphasis text-decoration-none border-bottom">

      <span class="fs-5 fw-semibold"><?php echo get_the_title(); ?></span>
</div   >
    <ul class="firstul list-unstyled ps-0">
    <?php if($featured_lessons): ?>
      <li class="">
        <div class="sectioncour">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
        <i class="fa-solid fa-book-open"></i>   Cours
        </button>
    </div>
        <div class="collapse show" id="home-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal  small">
            <?php foreach( $featured_lessons as $featured_lesson ):  
                //var_dump($featured_lesson);?>
            <li >
         
<button data-target="element-<?php echo $featured_lesson->ID;?>" class="align-items-center d-inline-flex items-justified-left link-body-emphasis text-decoration-none"
            >
            <div class="hidden-classicon">  <i class="fa-solid fa-chevron-right" style="
    text-align: center;
    padding: 14px 4px 7px 4px;
"></i></div>
            <i class="fa-regular fa-file"></i>  <?php echo $featured_lesson->post_title;?>
            </button>
        </li>
        <?php endforeach; ?>
          </ul>
        
        </div>
      </li>
      
      <?php endif; if($featured_excercices): ?>
      <li class="">
      <div class="sectioncour">
    
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
        <i class="fa-solid fa-book-open"></i> Excercices
        </button>
   
      </div>
        <div class="collapse show" id="dashboard-collapse" style="">
            <?php foreach($featured_excercices as $excercice):?>
          <ul class="btn-toggle-nav list-unstyled fw-normal  small">
            <li data-target="element-<?php echo $excercice->ID ;?>">
              
            <button data-target="element-<?php echo $excercice->ID;?>" class="align-items-center d-inline-flex items-justified-left link-body-emphasis text-decoration-none">
            <div class="hidden-classicon">  <i class="fa-solid fa-chevron-right" style="
    text-align: center;
    padding: 14px 4px 7px 4px;
"></i></div>
            <i class="fa-regular fa-file"></i> 
            <?php echo get_the_title($excercice);?>
            </button></li>
          </ul>
          <?php endforeach; ?>
        </div>
      </li>
      <?php endif;
      if($featured_videos):?>
      <li class="">
      <div class="sectioncour">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
        <i class="fa-solid fa-book-open"></i>   Videos 
        </button>
      </div>
        <div class="collapse show" id="orders-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal  small">
          <?php foreach($featured_videos as $video):?>

            <li>  <button data-target="element-<?php echo $video->ID;?>"
             class="align-items-center d-inline-flex items-justified-left link-body-emphasis text-decoration-none">
             <div class="hidden-classicon">  <i class="fa-solid fa-chevron-right" style="
    text-align: center;
    padding: 14px 4px 7px 4px;
"></i></div>
            <i class="fa-regular fa-file"></i> 
             
             <?php echo get_the_title($video);?>
            
          </button></li>
         <?php  endforeach; ?>
          </ul>
        </div>
      </li>
      <?php endif;?>
      <li class="border-top my-3"></li>
      
    </ul>
  </div>


</div>
<div class="col-md-8">
<h1 class="titreh1"><?php  echo get_the_title(); ?></h1>
<?php // get the courses categories 
// Retrieve categories for the 'lesson' post type
$taxonomy = 'niveau'; // Adjust to your custom taxonomy
$terms = wp_get_post_terms($post->ID, $taxonomy);

if(!empty($terms[0]->name=='Lycee')){
  $term_lyc=wp_get_post_terms($post->ID,'lyceeniveau');
  $term_cate=wp_get_post_terms($post->ID,'category');
  //var_dump($term_cate[0]->name);
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
<?php }elseif($terms[0]->name=='CPGE'){
   $term_lyc=wp_get_post_terms($post->ID,'CPGENiveau');
   $term_cate=wp_get_post_terms($post->ID,'category');
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
   $term_lyc=wp_get_post_terms($post->ID,'CollegeClasse');
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
     $term_lyc=wp_get_post_terms($post->ID,'primaire');
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

<h2 class="gfpr"> </h2>

<?php /** cour section */

if(!empty($featured_lessons)){
?>

<section class="scfrb active" id="course-section">
<?php $i=0; foreach( $featured_lessons as $featured_lesson ):  

#get field of clicked lesson 

//$videos = get_post_meta('video_lesson',$featured_lesson,);
$videos_lessons = get_post_meta( $featured_lesson->ID, '_lesson_videos', true );
$videos_titles= get_post_meta( $featured_lesson->ID, '_lesson_title', true );
?>
<div class="fgoru <?php if ($i==0) {echo 'active' ;}?>" id="<?php echo $featured_lesson->ID ;?>">
<div style="position: relative;"><h3 class="piek"> <?php echo get_the_title($featured_lesson); ?></h3></div>
<?php // var_dump($video);?>
<ul class="list-group ms-0">
<li class="list-group-item"> <i class="fa-solid fa-file-pdf me-2"></i>Cour PDF</li>

<?php if($videos_titles): ?>
  <?php foreach ($videos_titles as $index => $title): 
    if ($title)
    ?>
  <li class="list-group-item "><i class="fa-brands fa-youtube me-2"></i><?php echo $title;?></li>
  <?php endforeach; ?>
  <?php endif; ?>

</ul>
<a href="<?php echo  get_the_permalink($featured_lesson); ?>" class="mt-2 btn btn-success">

  <span>Commencer</span>
  <i class="fa-solid fa-arrow-right"></i>
</a>
</div>

<?php $i++; endforeach; ?>
          </section>
<?php }if(!empty($featured_excercices)){ /*** excerices section */ ?>

  <section class="scfrb" id="exercice-section">
<?php  foreach( $featured_excercices as $exo ):?>
<div class="fgoru" id="<?php echo $exo->ID ;?>">
<h3 class="piek"> <?php echo get_the_title($exo); ?></h3>
</div>
<?php endforeach; ?>
          </section>

          <?php } if(!empty($featured_videos)){/*** video section */ ?>
            <section class="scfrb" id="video-section">
<?php  foreach( $featured_videos as $video ): 
  

  ?>
<div class="fgoru" id="<?php echo $video->ID ;?>">
<h3 class="piek"> <?php echo get_the_title($video); ?></h3>
</div>
<?php endforeach; ?>
          </section>
          <?php } ?>
</div>
</div>
</div>
<?php get_footer(); ?>