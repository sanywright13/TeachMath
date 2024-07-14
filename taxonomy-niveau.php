<?php get_header();  

$term = get_queried_object();
    
// Get the custom fields values
$term_image = get_term_meta($term->term_id, 'term_image', true);
$term_description = get_term_meta($term->term_id, 'term_description', true);
?>
<main class="niveauPgae">
<div class="container-fluid seconSectin">

<div class="row">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb mt-3">
    <li class="breadcrumb-item"><a href="<?php echo get_home_url(); ?>" title="">Acceuil</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo get_queried_object()->name;?></li>
  </ol>
</nav>

<div class="col-md-7 offset-md-1">
    <div class="hdgu">
<?php echo $term_description;?>
</div>
</div>


<div class="col-md-3" style="margin-top: -40px;">
    <img src="<?php echo $term_image;?>" class="imgNiveu">
</div>

</div>
</div>
<div class="container mt-2" style="
    border-left: 5px solid #008000;
   
">
    <div class="row mt-5 gx-2">
    <?php /*** if  */
        $taxocat=array();
    if (get_queried_object()->name=="Lycee"){
      $taxocat= get_terms(array(
        'taxonomy'=>'lyceeniveau',
        'hide_empty'=>false,
        'parent'=>0,
      ));
     //var_dump($taxocat);
      $niveauTax='lyceeniveau';
    }elseif(get_queried_object()->name=="CPGE"){
      $taxocat= get_terms(array(
        'taxonomy'=>'CPGENiveau',
        'hide_empty'=>false,
        'parent' => 0
      ));
      $niveauTax='CPGENiveau';
    }elseif(get_queried_object()->name=="Concours"){
      $taxocat= get_terms(array(
        'taxonomy'=>'councoursNiv',
        'hide_empty'=>false,
      )); 
      $niveauTax='councoursNiv';
    }elseif(get_queried_object()->name=="College"){
      $taxocat= get_terms(array(
        'taxonomy'=>'CollegeClasse',
        'hide_empty'=>false,
      ));
      $niveauTax='CollegeClass';
     
    }
    elseif(get_queried_object()->name=="Primaire"){
      $taxocat= get_terms(array(
        'taxonomy'=>'primaire',
        'hide_empty'=>false,
      ));
      $niveauTax='primaire';
    }
    
  //var_dump( get_niveauRelatedTerms_categories(get_queried_object()->name,'term_category','2eme Bac'));
 // var_dump(getCPGE_Cat(get_queried_object()->name,$taxocat[0]->name));
//var_dump($taxocat);
 //var_dump(get_CPGERelatedTerms_categories($taxocat[0]->term_id));
    ?>
    <div class="col-md-8">
    <ul class="list-group">
    <?php 
     //var_dump($taxocat);
  $Current_term=get_queried_object()->slug;
    //echo $niveauTax;
    foreach($taxocat as $cat):
        $term_link = get_term_link($cat);
       
        if(!is_wp_error($term_link)){
            
            ?>
            
  <?php

 //var_dump(get_CPGERelatedTerms_categories($cat->term_id));
 $all_terms=get_CPGERelatedTerms_categories($cat->term_id,$niveauTax,);
// var_dump($all_terms);
//check if this niveau belong to lycee and cpge if not remove it
if(in_array(get_queried_object()->slug,['lycee','cpge'])){?>
  <li class="list-group-item active" aria-current="true"><i class="fa-solid fa-book"></i>
  <a href="<?php echo esc_url(get_home_url().'/'.$Current_term.'/'.$cat->slug.'/');?>" 
  title="<?php echo esc_attr($cat->name);?>">
  <?php echo $cat->name;?>
</a>
</li>

<?php
//echo 'exist';
foreach($all_terms as $term):
  //$term_link_1 = get_term_link($term);
  
 ?>
  <li class="list-group-item"><a href="<?php echo esc_url(get_home_url().'/'.$Current_term.'/'.$cat->slug.'/'.$term->slug.'/');?>" class="sgft"><?php echo $term->name; ?></a></li>
<?php endforeach; 
}elseif(in_array(get_queried_object()->slug,['college','primaire'])){
  
   /// echo 'exist not'.get_queried_object()->slug;
  // get all the categories of this term
  ?>

  <?php  /***  get the categories of this term college or primaire*/

//var_dump($cat);
//get_the_category(post); //This returns both used and unused categories
$subjects_categories=get_subject_categories(esc_attr(get_queried_object()->slug),$cat->slug,$cat->term_taxonomy_id);
  
//var_dump($subjects_categories);
if(!empty($subjects_categories)):?>
  <li class="list-group-item active" aria-current="true"><i class="fa-solid fa-book"></i><?php echo $cat->name;?></li>

<?php
foreach ($subjects_categories as $sub_cat):
/*var_dump(
  get_home_url().'/'.esc_attr(get_queried_object()->slug).'/'.
  $cat->slug.'/'.$sub_cat->slug.'/'); */
  //$cats_sub=get_the_category($sub_cat); 
  ?>
  <li class="list-group-item"><a href="
  <?php echo esc_url(get_home_url().'/'.esc_attr(get_queried_object()->slug).'/'.
  $cat->slug.'/'.$sub_cat->slug.'/');?>" class="sgft"><?php echo $sub_cat->slug;?></a></li>

<?php 
endforeach;
endif;
}

} endforeach;?>
</ul>
    </div>

    <div class="col-md-4">
<?php 
$args=array(
'post_type'=>'cour',
'post_status' => array('publish'),
'posts_per_page'=>4,
);
$query=new WP_Query($args);
if($query->have_posts()){?>
<div class="sidebar">
  <h2 class="sidebar_title"> Dernier Courses Ajoutés</h2>
<ul class="list-group ">
  <?php
  while ($query->have_posts()) : $query->the_post();?>

  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="">
    <div class="image-thumbnail">
    <span class="item-date">May 29, 2024</span>
  <?php
if ( has_post_thumbnail() ) { 
  $image_title=get_the_title();?>
    <a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
 <?php the_post_thumbnail( 'sidebar-image' ,['alt'=>"$image_title","class"=>'img-responsive card-img-top'],$crop = true ); 
   }?>
    </a>
   </div>
      <div class="fw-bold">
     <h3 class="sidebar-link"> <a href="<?php the_permalink();?>" title="<?php the_title();?>">  <?php the_title();?></a></h3></div>
    </div>
 
  </li>


  <?php endwhile; wp_reset_postdata(); }?>

</ul>
</div>
    </div>

</div>

</main>
<?php get_footer(); ?>