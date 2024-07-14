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
   
<div class="container-fluid">
    <div class="row">
<div class="col-md-4">
<div class="flex-shrink-0 p-3" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold"><?php echo get_the_title(); ?></span>
    </a>
    <ul class="list-unstyled ps-0">
    <?php if($featured_lessons): ?>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Cours
        </button>
        <div class="collapse show" id="home-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <?php foreach( $featured_lessons as $featured_lesson ):  
                //var_dump($featured_lesson);?>
            <li >
<button data-target="element-<?php echo $featured_lesson->ID;?>" class="link-body-emphasis d-inline-flex text-decoration-none rounded mb-2"
            >

            <?php echo $featured_lesson->post_title;?>
            </button>
        </li>
        <?php endforeach; ?>
          </ul>
        
        </div>
      </li>
      
      <?php endif; if($featured_excercices): ?>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
        Excercices
        </button>
        <div class="collapse show" id="dashboard-collapse" style="">
            <?php foreach($featured_excercices as $excercice):?>
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li data-target="element-<?php echo $excercice->ID ;?>">
              
            <button data-target="element-<?php echo $excercice->ID;?>" class="link-body-emphasis d-inline-flex text-decoration-none rounded"><?php echo get_the_title($excercice);?>
          
            </button></li>
          </ul>
          <?php endforeach; ?>
        </div>
      </li>
      <?php endif;
      if($featured_videos):?>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="true">
        Videos Cours
        </button>
        <div class="collapse show" id="orders-collapse" style="">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
          <?php foreach($featured_videos as $video):?>

            <li>  <button data-target="element-<?php echo $video->ID;?>"
             class="link-body-emphasis d-inline-flex text-decoration-none rounded"><?php echo get_the_title($video);?>
            
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
<div class="col-md-6">
<h1><?php  echo get_the_title(); ?></h1>
<h2 class="gfpr"> </h2>

<?php /** cour section */

if(!empty($featured_lessons)){
?>

<section class="scfrb active" id="course-section">
<?php $i=0; foreach( $featured_lessons as $featured_lesson ):  ?>
<div class="fgoru <?php if ($i==0) {echo 'active' ;}?>" id="<?php echo $featured_lesson->ID ;?>">
<h3 class="piek"> <?php echo get_the_title($featured_lesson); ?></h3>
</div>
<?php $i++; endforeach; ?>
          </section>
<?php }if(!empty($featured_excercices)){ /*** excerices section */ ?>

  <section class="scfrb" id="exercice-section">
<?php  foreach( $featured_excercices as $exo ): 
  

  ?>
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