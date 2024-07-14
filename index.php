<?php get_header();  ?>
<div class="alhftg">
<div class="pre-image">
<div class="overlay">
<?php echo wp_get_attachment_image( 122, "full", "", array( "class" => "img-responsive " ) );  ?>
</div>
<div class="align-items-baseline d-flex flex-column ighstf">
    <div class="col-md-7">
<h1 class="titreh1">Maîtrisez les Mathématiques à Tous les Niveaux</h1>
</div>
<div class="col-md-6 offset-md-1">
<p>Des cours et des exercices complets pour SC Math A, B, et BAC
 Préparez-vous aux 
    examens avec des ressources de qualité 
 Apprenez à votre rythme avec nos leçons interactives</p>
    </div>
<div class="col-md-4"> 
     <a class="btn btn-primary firstButton" href="#" role="button">Voir Cours</a>
    </div>
</div>

<div class="align-items-baseline  d-flex flex-row newSubs">
<div class="col-md-3">
<div class="djzeuY"> 

<span class="iconIoh">
<?php echo wp_get_attachment_image( 121, "full", "", );  ?>
</span>
<span class="" style="margin-left: 1em;">
<div>Des milliers d'exercices</div>
<div style="
    font-size: 0.66rem;
    font-weight: 500;
">Pour tous les niveaux et matières</div>

</span>
</div>
</div>

<div class="col-md-3">
<div class="djzeuY"> 

<span class="iconIoh">
<?php echo wp_get_attachment_image( 120, "full", "", );  ?>
</span>
<span class="" style="margin-left: 1em;">
<div>Cours expliqués simplement</div>
<div style="
    font-size: 0.66rem;
    font-weight: 500;
">Comprenez facilement les sujets difficiles

</div>

</span>
</div>
</div>

<div class="col-md-3">
<div class="djzeuY"> 

<span class="iconIoh">
<?php echo wp_get_attachment_image( 117, "full", "", );  ?>
</span>
<span class="" style="margin-left: 1em;">
<div>Préparation aux concours</div>
<div style="
    font-size: 0.66rem;
    font-weight: 500;
">Packs et vidéos pour réussir vos examens</div>

</span>
</div>
</div>
</div>

</div>


</div>
</div>
</div>


<div class="FirstPage">
<div class="mt-3 container-fluid">
<div class="d-flex mt-5  justify-content-center p-3">
<div class="titleHg col-md-9 offset-md-1">
<h2>Réussissez vos examens Mathématique et concours avec des guides d'examen et des tests pratiques.
</h2>
<p class="petitTitre">Trouvez des ressources et du matériel d'étude pour tous les niveaux.</p>
</div>


</div>
<?php $topcategories= get_terms(array(
  'taxonomy'=>'niveau',
  'hide_empty'=>true
));

$catSize=count($topcategories);
?>
<div class="gx-4 mt-4 justify-content-around p-2 row">
  <?php for($i=0;$i<$catSize;$i++){
   // var_dump(get_term_link($topcategories[$i]->term_id));
   $term_image = get_term_meta($topcategories[$i]->term_id, 'term_image', true);
    ?>
<div class="col-md-2">


  <div class="ssheader">
 
   <div class="icon"> 
    <img src="<?php echo $term_image;?>" alt="" class="img-res">
  </div>
   <div class="box-content">
     <h4>
      <a href="<?php echo  get_term_link($topcategories[$i]->term_id); ?>" class="">  <?php echo $topcategories[$i]->name; ?>
  </a>
</h4>
</div>

<div class="circle-icon">
<a href="<?php echo  get_term_link($topcategories[$i]->term_id); ?>" class="read-more-icon">
  <i class="fa-solid fa-arrow-right"></i>
</a>
  </div>


</div>
</div>

<?php } ?>

</div>

<section class="seconSectin">
<div class="row">

<div class="col-md-7 d-flex p-5     flex-column justify-content-center align-items-start">
  <h3>Creating A Community Of Life Long Learners</h3>
<p>Dourousi est un site de support pédagogique. nous nous engageons à fournir des cours de mathématiques de haute
 qualité, adaptés à tous les niveaux d'apprentissage. Que vous soyez un élève du primaire, un étudiant 
 du collège, ou que vous vous prépariez pour des examens de lycée ou d'université, nos cours sont conçus
  pour vous aider à exceller nos cours sont conçus
  pour vous aider à exceller nos cours sont conçus
  pour vous aider à exceller.
        </p>
        <ul class="lkdg">
<li class="oiut">
        <span class="">
          <img src="http://localhost/wp-content/uploads/2024/06/Vector.png">
        <span class="gfyo">Videos Gratuit</span>
      </span>
  </li> 
        <li class="oiut">
      <span class="oiut">
        <img src="http://localhost/wp-content/uploads/2024/06/Vector.png">
        <span class="gfyo">+351 Excercices Corrigé</span>
      </span> 
  </li>
 
  
        <li class="oiut">
      <span class="oiut">
        <img src="http://localhost/wp-content/uploads/2024/06/Vector.png">
        <span class="gfyo">+80 Matiéres Bien Expliquer</span>
      </span> 
  </li>
        <li class="oiut">
      <span class="oiut"><img src="http://localhost/wp-content/uploads/2024/06/Vector.png">
        <span class="gfyo">+102 Packs Pour Concours</span>
      </span> 
  </li>
  </ul>
</div>

<div class="col-md-4 offset-md-1 mt-3" >
<?php echo wp_get_attachment_image( 124, "full", "", );  ?>
</div>
</div>

</section>


<section class=" section3">
<div class="row py-4 ps-4 gx-4 justify-content-center">
<?php /** get last added courses*/
$TopCours=new WP_Query(array(
  'post_type'=>'cour',
  'post_status' => array('publish'),
    'posts_per_page'=>4,
  'meta_query' => array(
    array(

      'key' => 'populaires',
      'compare' => '=',
      'value' => '1'
    )
  )
)); 

if($TopCours->have_posts()){
while ($TopCours->have_posts()) : $TopCours->the_post();
$subject = get_the_terms($post->ID, 'category');
$niveau = get_the_terms($post->ID, 'niveau');
$rating = get_field('rating');
$course_time = get_field('cour_time');

?>


<div class="col-md-3">

<div class="card ">
  <div class="image-thumbnail">
  <?php
if ( has_post_thumbnail() ) { 
  $image_title=get_the_title();?>
    <a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
 <?php the_post_thumbnail( 'card-size' ,['alt'=>"$image_title","class"=>'img-responsive card-img-top'],$crop = true ); 
   }?>
    </a>
   <span class="badgey"><i class="me-2 fa-regular fa-clock"></i><?php echo $course_time.' H';?></span>
   </div>
      <div class="card-body">
     <div class="cardi-top"> <span class="category-subject"><?php echo $subject[0]->name;?> </span> 
     <span class="icon-star">
     <i class="fa-solid fa-star"></i> <span class="icon-value"><?php echo '('.$rating.')';?></span>
     </span>
    </div>
     <div class="card-title"> 
       <h5>
      <a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>"><?php echo get_the_title();?></a>
    </h5>
    </div>


<div class="course__border mt-2"></div>
      <div class="nbir">
     
      <a class="btn btn-primary" href="#" role="button">Voir Cour</a>
      <div class="gfyo">
<i class="fa-regular fa-file"></i><span class="ms-1 oiut"><a href="<?php echo  get_term_link($niveau[0]->term_id); ?>" title="<?php echo  esc_attr($niveau[0]->name); ?>"><?php echo $niveau[0]->name;?></a></span>
</div>
      </div>
      </div>
    </div>

</div>

<?php endwhile; }
wp_reset_postdata();?>
</div>
</section>

</div>
<section class="section4-ssyt mt-5">
<div class="col-md-6"><?php echo wp_get_attachment_image( 166, "full", "", array( "class" => "img-responsive " ) );  ?></div>
<div class="col-md-6 p-4">
<h6>Packs de Concours pour Écoles d'Ingénieurs et Médecine </h6>
<div class="gdtypm mt-4">

Préparez-vous efficacement aux concours des grandes écoles avec nos packs de concours !

Nous vous offrent une collection complète et actualisée des épreuves passées des plus grandes écoles d'ingenieurs.
Réussir vos Concours de Médecine ,ENSA et ENSAM.
</div>
<ul class="lkdg mt-4">
  <li class="mlzkk">
  <div >  
  <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg>
  </div>
  <div class="mlzkk">
  <span>Annales des Concours : </span>Tous les sujets des concours des années précédentes.
  </div>

</li>

  <li>
  <div>  
  <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg>
  </div>
  <div class="mlzkk">
  <span>Corrections Détaillées : </span>Des solutions complètes pour comprendre vos erreurs et progresser.

  </div>
</li>
  <li>
  <div>  
  <svg aria-hidden="true" class="e-font-icon-svg e-fas-circle" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg>
  </div>
  <div class="mlzkk">  
  <span>Exhaustivité : </span>Une large collection de sujets couvrant de nombreuses années et différentes écoles.
  </div>
</li>
</ul>
<a class="btn btn-primary firstButton" href="#" role="button">Nos Packs</a>
  </div>
</section>

</div>  
</div>
<?php get_footer(); ?>
