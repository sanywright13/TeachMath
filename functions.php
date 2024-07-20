<?php
function enqueue_child_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
wp_enqueue_style('bootstrap5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
wp_enqueue_style('font-awesome5', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', false);

if ( !is_admin() ) wp_deregister_script('jquery');
wp_enqueue_script( 'boot1','https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(),'',true );
wp_enqueue_style('google-font', 'https://fonts.googleapis.com', false);
wp_enqueue_style('google-font-Montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', false);
wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/jhsf.js', array(), null, true);

if(is_singular('cour')){
    global $post;
    if (!is_admin()) {
    
    //wp_enqueue_style( 'comments1', get_template_directory_uri() . '/css/comments.css' );
    wp_enqueue_script( 'cour',get_stylesheet_directory_uri(). '/js/coursFile.js', array(),'', true );
    wp_localize_script( 'cour', 'template_form',
     array('ajaxurl'=> admin_url( 'admin-ajax.php' ),'post_id'=>$post->ID)
    );
    }
    }

 
    
        wp_enqueue_script( 'addContent',get_stylesheet_directory_uri(). '/js/addContent.js', array(),'', true );
        wp_localize_script( 'addContent', 'template_form',
         array('ajaxurl'=> admin_url( 'admin-ajax.php' ))
        );
       
}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles');


/* add cours sections (poste type) */ 
/* ajouter packs costume post type */ 
/*  categories of cours lycee / college / primaire / SMI / (taxonomies of cours)*/

/**    Dans lycée on a SM , A et B , physique , SVT ,economie (terms of taxonomie lycée)*/
/* add packs sections (plusieurs packs)   packs councours medecine , packs ENSA , packs bac SMA, etc*/ 


function cour_custom_post_type() {
    $labels = array(
        'name'                => __( 'cour' ),
        'singular_name'       => __( 'cour'),
        'menu_name'           => __( 'cours'),
        'parent_item_colon'   => __( 'Parent cour'),
        'all_items'           => __( 'All cour'),
        'view_item'           => __( 'View cour'),
        'add_new_item'        => __( 'Add New cour'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit cour'),
        'update_item'         => __( 'Update cour'),
        'search_items'        => __( 'Search cour'),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label'               => __( 'cour'),
        'description'         => __( 'cour'),
        'labels'              => $labels,
			'rewrite'     => array('slug' => '%niveau%/%lyceeniveau%/%lyceeClass%/%category%', 'with_front' => false),

        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'comments'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
		'taxonomies'          => array('topics', 'category' ),
        'exclude_from_search' => false,
            'yarpp_support'       => true,
       // 'taxonomies'          => array('genres'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
);
    register_post_type( 'cour', $args );	
}
add_action( 'init', 'cour_custom_post_type', 0 );
flush_rewrite_rules();


function ActualitesEducation_custom_post_type() {
    $labels = array(
        'name'                => __( 'ActualitesEducation' ),
        'singular_name'       => __( 'ActualitesEducation'),
        'menu_name'           => __( 'ActualitesEducation'),
        'parent_item_colon'   => __( 'Parent ActualitesEducation'),
        'all_items'           => __( 'All ActualitesEducation'),
        'view_item'           => __( 'View ActualitesEducation'),
        'add_new_item'        => __( 'Add New ActualitesEducation'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit ActualitesEducation'),
        'update_item'         => __( 'Update ActualitesEducation'),
        'search_items'        => __( 'Search ActualitesEducation'),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label'               => __( 'ActualitesEducation'),
        'description'         => __( 'ActualitesEducation'),
        'labels'              => $labels,
		'rewrite'     => array('slug' => '', 'with_front' => false),

        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'comments'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
		'taxonomies'          => array('topics', 'category' ),
        'exclude_from_search' => false,
            'yarpp_support'       => true,
       // 'taxonomies'          => array('genres'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
);
    register_post_type( 'ActualitesEducation', $args );	
}
add_action( 'init', 'ActualitesEducation_custom_post_type', 0 );


function PacksConcours_custom_post_type() {
    $labels = array(
        'name'                => __( 'PacksConcours' ),
        'singular_name'       => __( 'PacksConcours'),
        'menu_name'           => __( 'PacksConcours'),
        'parent_item_colon'   => __( 'Parent PacksConcours'),
        'all_items'           => __( 'All PacksConcours'),
        'view_item'           => __( 'View PacksConcours'),
        'add_new_item'        => __( 'Add New PacksConcours'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit PacksConcours'),
        'update_item'         => __( 'Update PacksConcours'),
        'search_items'        => __( 'Search PacksConcours'),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );
    $args = array(
        'label'               => __( 'PacksConcours'),
        'description'         => __( 'PacksConcours'),
        'labels'              => $labels,
		'rewrite'     => array('slug' => 'concours-packs', 'with_front' => false),

        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'comments'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
		'taxonomies'          => array('topics', 'category' ),
        'exclude_from_search' => false,
            'yarpp_support'       => true,
       // 'taxonomies'          => array('genres'),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
);
    register_post_type( 'PacksConcours', $args );	
}
add_action( 'init', 'PacksConcours_custom_post_type', 0 );
function create_niveau_taxonomy() {
    $labels = array(
        'name'              => _x('niveau', 'taxonomy general name'),
        'singular_name'     => _x('niveau', 'taxonomy singular name'),
        'search_items'      => __('Search niveau'),
        'all_items'         => __('All niveaux'),
        'parent_item'       => __('Parent niveau'),
        'parent_item_colon' => __('Parent niveau:'),
        'edit_item'         => __('Edit niveau'),
        'update_item'       => __('Update niveau'),
        'add_new_item'      => __('Add New niveau'),
        'new_item_name'     => __('New niveau Name'),
        'menu_name'         => __('niveau'),
    );

    register_taxonomy('niveau', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite' => array('slug' => '%niveau%', 'with_front' => false),

    ));
}
add_action('init', 'create_niveau_taxonomy', 0);

/*** lycee Niveau taxonomie  as (math , physique , etc) */
function register_query_vars($vars) {
    $vars[] = 'niveau1lk';
    $vars[] = 'lyceeniveau';
    $vars[] = 'lyceeniv_parent';
    $vars[]='cpge1lk';
    $vars[]='cpge1lk_parent';
    $vars[]='CPGENiveau';
    $vars[]='lycee_niveau';
    $vars[]='CPGE_Niveau';
    $vars[]='lyceeClass';
    $vars[]='lyceeniveau_parent';
  
    return $vars;
}
add_filter('query_vars', 'register_query_vars');
function create_lyceeniveau_taxonomy() {
    $labels = array(
        'name'              => _x('lyceeniveau', 'taxonomy general name'),
        'singular_name'     => _x('lyceeniv', 'taxonomy singular name'),
        'search_items'      => __('Search lyceeniveau'),
        'all_items'         => __('All lyceeniveau'),
        'parent_item'       => __('Parent lyceeniveau'),
        'parent_item_colon' => __('Parent lyceeniveau'),
        'edit_item'         => __('Edit lyceeniveau'),
        'update_item'       => __('Update lyceeniveau'),
        'add_new_item'      => __('Add New lyceeniveau'),
        'new_item_name'     => __('New lyceeniveau Name'),
        'menu_name'         => __('Lycee Niveau'),
    );

    register_taxonomy('lyceeniveau', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite' => array('slug' => '%niveau1lk%/%lyceeniveau_parent%/%lyceeniveau%', 'with_front' => false),


    ));
}
add_action('init', 'create_lyceeniveau_taxonomy', 0);

/** taxonomies for CPGE 
 *  link type : cpge/mpsi/mathematique/name/
 * 
*/
function create_CPGENiveau_taxonomy() {
    $labels = array(
        'name'              => _x('CPGENiveau', 'taxonomy general name'),
        'singular_name'     => _x('CPGENiveau', 'taxonomy singular name'),
        'search_items'      => __('Search CPGENiveau'),
        'all_items'         => __('All CPGENiveau'),
        'parent_item'       => __('Parent CPGENiveau'),
        'parent_item_colon' => __('Parent CPGENiveau:'),
        'edit_item'         => __('Edit CPGENiveau'),
        'update_item'       => __('Update CPGENiveau'),
        'add_new_item'      => __('Add New CPGENiveau'),
        'new_item_name'     => __('New CPGENiveau Name'),
        'menu_name'         => __('Lycee Niveau'),
    );

    register_taxonomy('CPGENiveau', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => '%cpge1lk%/%cpge1lk_parent%/%CPGENiveau%', 'with_front' => false),
    ));
}
add_action('init', 'create_CPGENiveau_taxonomy', 0);

/*** SMA smb , physique ,svt,economie */
function create_LyceClasse_taxonomy() {
    $labels = array(
        'name'              => _x('LyceClasse', 'taxonomy general name'),
        'singular_name'     => _x('LyceClasse', 'taxonomy singular name'),
        'search_items'      => __('Search LyceClasse'),
        'all_items'         => __('All LyceClasse'),
        'parent_item'       => __('Parent LyceClasse'),
        'parent_item_colon' => __('Parent LyceClasse:'),
        'edit_item'         => __('Edit LyceClasse'),
        'update_item'       => __('Update LyceClasse'),
        'add_new_item'      => __('Add New LyceClasse'),
        'new_item_name'     => __('New LyceClasse Name'),
        'menu_name'         => __('Lycee Niveau'),
    );

    register_taxonomy('LyceClasse', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'LyceClasse'),
    ));
}
/*** primaire */

function create_primaire_taxonomy() {
    $labels = array(
        'name'              => _x('primaire', 'taxonomy general name'),
        'singular_name'     => _x('primaire', 'taxonomy singular name'),
        'search_items'      => __('Search primaire'),
        'all_items'         => __('All primaires'),
        'parent_item'       => __('Parent primaire'),
        'parent_item_colon' => __('Parent primaire'),
        'edit_item'         => __('Edit primaire'),
        'update_item'       => __('Update primaire'),
        'add_new_item'      => __('Add New primaire'),
        'new_item_name'     => __('New primaire Name'),
        'menu_name'         => __('primaire niveau'),
    );

    register_taxonomy('primaire', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite' => array('slug' => '', 'with_front' => false),

    ));
}
add_action('init', 'create_primaire_taxonomy', 0);

function custom_lyceeniv_rewrite_rules() {
    /*** for lycee */
    add_rewrite_rule(
        '^lycee/([^/]+)/([^/]+)/?$',
        'index.php?niveau1lk=lycee&lyceeniv_parent=$matches[1]&lyceeniveau=$matches[2]',
        'top'
    );

    add_rewrite_rule(
        '^lycee/([^/]+)/?$',
        'index.php?niveau1lk=lycee&lyceeniveau=$matches[1]',
        'top'
    );
/** lycee/2eme-bac/science-a/mathematiques/ */
add_rewrite_rule(
    '^lycee/([^/]+)/([^/]+)/([^/]+)/?$',
    'index.php?niveau1lk=lycee&lyceeniv_parent=$matches[1]&lycee_niveau=$matches[2]&category_name=$matches[3]',
    'top'
);



    /*** for cpge */

    add_rewrite_rule(
        '^cpge/([^/]+)/([^/]+)/?$',
        'index.php?cpge1lk=cpge&cpge1lk_parent=$matches[1]&CPGENiveau=$matches[2]',
        'top'
    );

    add_rewrite_rule(
        '^cpge/([^/]+)/?$',
        'index.php?cpge1lk=cpge&CPGENiveau=$matches[1]',
        'top'
    );
    add_rewrite_rule(
        '^cpge/([^/]+)/([^/]+)/([^/]+)/?$',
        'index.php?cpge1lk=cpge&cpge1lk_parent=$matches[1]&CPGE_Niveau=$matches[2]&category_name=$matches[3]',
        'top'
    );

    /*** for primaire category */
    add_rewrite_rule(
        '^primaire/([^/]+)/([^/]+)/?$',
        'index.php?primaire=$matches[1]&category_name=$matches[2]',
        'top'
    );

    /*** for primaire sub category */
    add_rewrite_rule(
        '^primaire/([^/]+)/?$',
        'index.php?primaire=$matches[1]',
        'top'
    );


     /*** for college category */
     add_rewrite_rule(
        '^college/([^/]+)/([^/]+)/?$',
        'index.php?CollegeClasse=$matches[1]&category_name=$matches[2]',
        'top'
    );

    /*** for primaire sub category */
    add_rewrite_rule(
        '^college/([^/]+)/?$',
        'index.php?CollegeClasse=$matches[1]',
        'top'
    );
   /**** packs */
    add_rewrite_rule(
        '^concours-packs/([^/]+)/?$',
        'index.php?post_type=packsconcours&name=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_lyceeniv_rewrite_rules');




add_action('init', 'create_LyceClasse_taxonomy', 0);
/*** SMA smb , physique ,svt,economie */
function create_CollegeClasse_taxonomy() {
    $labels = array(
        'name'              => _x('CollegeClasse', 'taxonomy general name'),
        'singular_name'     => _x('CollegeClasse', 'taxonomy singular name'),
        'search_items'      => __('Search CollegeClasse'),
        'all_items'         => __('All CollegeClasse'),
        'parent_item'       => __('Parent CollegeClasse'),
        'parent_item_colon' => __('Parent CollegeClasse:'),
        'edit_item'         => __('Edit CollegeClasse'),
        'update_item'       => __('Update CollegeClasse'),
        'add_new_item'      => __('Add New CollegeClasse'),
        'new_item_name'     => __('New CollegeClasse Name'),
        'menu_name'         => __('Lycee Niveau'),
    );

    register_taxonomy('CollegeClasse', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => ''),
    ));
}
add_action('init', 'create_CollegeClasse_taxonomy', 0);


/** taxonomies for Councours 
 *  link type : councours/medecine/2024/
 *  councours/ensam/2020/ 
 * 
*/

function create_councoursNiv_taxonomy() {
    $labels = array(
        'name'              => _x('councoursNiv', 'taxonomy general name'),
        'singular_name'     => _x('councoursNiv', 'taxonomy singular name'),
        'search_items'      => __('Search councoursNiv'),
        'all_items'         => __('All councoursNiv'),
        'parent_item'       => __('Parent councoursNiv'),
        'parent_item_colon' => __('Parent councoursNiv:'),
        'edit_item'         => __('Edit councoursNiv'),
        'update_item'       => __('Update councoursNiv'),
        'add_new_item'      => __('Add New councoursNiv'),
        'new_item_name'     => __('New councoursNiv Name'),
        'menu_name'         => __('Councours types'),
    );

    register_taxonomy('councoursNiv', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'councoursNiv'),
    ));
}
add_action('init', 'create_councoursNiv_taxonomy', 0);

function create_annee_taxonomy() {
    $labels = array(
        'name'              => _x('annee', 'taxonomy general name'),
        'singular_name'     => _x('annee', 'taxonomy singular name'),
        'search_items'      => __('Search annee'),
        'all_items'         => __('All annee'),
        'parent_item'       => __('Parent annee'),
        'parent_item_colon' => __('Parent annee:'),
        'edit_item'         => __('Edit annee'),
        'update_item'       => __('Update annee'),
        'add_new_item'      => __('Add New annee'),
        'new_item_name'     => __('New annee Name'),
        'menu_name'         => __('chercher par annee'),
    );

    register_taxonomy('annee', array('cour'), array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'show_admin_column' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'annee'),
    ));
}
add_action('init', 'create_annee_taxonomy', 0);

/*** add new costum permalink for each course */

function filter_cour_post_type_link($post_link, $post) {
   
    if ('cour' === get_post_type($post) && $post->post_type=='cour' && !is_category()) {
	
        $niveau_terms = wp_get_object_terms($post->ID, 'niveau');
        $niveau2_terms = wp_get_object_terms($post->ID, 'lyceeniveau');
		$cpge_niveau=wp_get_object_terms($post->ID,'CPGENiveau');
		$councour_niveau=wp_get_object_terms($post->ID,'councoursNiv');
		$anne=wp_get_object_terms($post->ID,'annee');
        $sujet_terms = wp_get_object_terms($post->ID, 'category');
        $primaire=wp_get_object_terms($post->ID, 'primaire');
        $college=wp_get_object_terms($post->ID, 'CollegeClasse');
    //if(is_singular('cour')):
        if (!empty($niveau_terms) && !is_wp_error($niveau_terms)) {
            $niveau_slug = $niveau_terms[0]->slug;
			
        } else {
            $niveau_slug = '';
        }
/*** primaire strecture */

if (!empty($primaire) && !is_wp_error($primaire)) {
    $primaire_slug = $primaire[0]->slug;
    $post_link = home_url('/primaire/' . $primaire_slug. '/' .$sujet_terms[0]->slug .'/'.$post->post_name.'/');

//var_dump($post_link);
} else {
    $primaire_slug = '';
}

/*** college strecture */

if (!empty($college) && !is_wp_error($college)) {
    $college_slug = $college[0]->slug;
    $post_link = home_url('/college/' . $college_slug. '/' .$sujet_terms[0]->slug .'/'.$post->post_name.'/');

//var_dump($post_link);
} else {
    $primaire_slug = '';
}
        if (!empty($niveau2_terms) && !is_wp_error($niveau2_terms)) {
            $niveau2_slug = $niveau2_terms[0]->slug;
            $niveau3_slug = $niveau2_terms[1]->slug;

              // Build the permalink structure
	  $post_link = str_replace('%niveau%', $niveau_slug, $post_link);
	  if ($niveau2_slug) {
		  $post_link = str_replace('%lyceeniveau%', $niveau2_slug, $post_link);
          $post_link = str_replace('%lyceeClass%', $niveau3_slug, $post_link);

	  } else {
		  // Remove the placeholder if 'niveau2' is not applicable
		  $post_link = str_replace('%lyceeniveau%', '', $post_link);
          $post_link = str_replace('%lyceeClass%', '', $post_link);
	  }
        } else {
            $niveau2_slug = null;
            $niveau3_slug=null;
        }
      


        if (!empty($sujet_terms) && !is_wp_error($sujet_terms)) {
            $sujet_slug = $sujet_terms[0]->slug;
		
        } else {
            $sujet_slug = '';
        }

		
/** CPGE */
		if (!empty($cpge_niveau) && !is_wp_error($cpge_niveau)) {
            $cpge_niveau_slug = $cpge_niveau[0]->slug;
            $cpge_niveau_child=$cpge_niveau[1]->slug;
            //var_dump($cpge_niveau_child);
			$post_link = str_replace('%niveau%', 'cpge', $post_link);
            $post_link = str_replace('%lyceeniveau%', $cpge_niveau_slug , $post_link);
            $post_link = str_replace('%lyceeClass%', $cpge_niveau_child, $post_link);

            
			//var_dump($post_link);
        } else {
            $cpge_niveau_slug = '';
            $cpge_niveau_child='';
        }

		/** councours */
		if (!empty($councour_niveau) && !is_wp_error($councour_niveau)) {
			$concoursNiv_slug = $councour_niveau[0]->slug;
			$annee_slug=$anne[0]->slug;
			$post_link = str_replace('%niveau%', 'concours', $post_link);
            $post_link = str_replace('%lyceeniveau%', $concoursNiv_slug, $post_link);
            $post_link = str_replace('%category%', $annee_slug, $post_link);
			
        } else {
            $concoursNiv_slug = '';
        }

    
	  /** build for cpge */
		if($cpge_niveau_slug){
			$post_link = str_replace('%CPGENiveau%', $cpge_niveau_slug, $post_link);
		}
		else {
			$post_link = str_replace('%CPGENiveau%', '', $post_link);
		}

	  $post_link = str_replace('%category%', $sujet_slug, $post_link);
//var_dump($post_link);
	  // Remove any double slashes resulting from the removal of 'niveau2'
	//  $post_link = str_replace('//', '/', $post_link);	
     // var_dump($post_link);
   // endif;
    }

    return $post_link;
}
add_filter('post_type_link', 'filter_cour_post_type_link', 10, 2);
/*****  */
function add_custom_rewrite_rules() {
    add_rewrite_rule(
        '^lycee/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$',
        'index.php?post_type=cour&niveau=lycee&lyceeniveau=$matches[1]&lyceeClass=$matches[2]&category=$matches[3]&name=$matches[4]',
        'top'
    );
/*** primaire 
 * 
 * 
 * primaire/1er-primaire/mathematique/cour_name
*/

	add_rewrite_rule(
        '^primaire/([^/]+)/([^/]+)/([^/]+)/?$',
        'index.php?post_type=cour&niveau=primaire&lyceeniveau=$matches[1]&category=$matches[2]&name=$matches[3]',
        'top'
    );

    /**** college/1er-annee/physique/cour_name/ */

	add_rewrite_rule(
        '^college/([^/]+)/([^/]+)/([^/]+)/?$',
        'index.php?post_type=cour&niveau=college&lyceeniveau=$matches[1]&category=$matches[2]&name=$matches[3]',
        'top'
    );

/** cpge */
add_rewrite_rule(
	'^cpge/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$',
	'index.php?post_type=cour&niveau=cpge&lyceeniveau=$matches[1]&lyceeClass=$matches[2]&category=$matches[3]&name=$matches[4]',
	'top'
);

add_rewrite_rule(
	'^concours/([^/]+)/([^/]+)/?$',
	'index.php?post_type=cour&niveau=concours&lyceeniveau=$matches[1]&annee=$matches[2]',
	'top'
);
/*
add_rewrite_rule(
    '^lycee/([^/]+)/([^/]+)/([^/]+)/([^/]+)/?$',
    'index.php?post_type=cour&niveau=$matches[1]&lyceeniveau=$matches[2]&category=$matches[3]',
    'top'
);
*/

}
add_action('init', 'add_custom_rewrite_rules');



function custom_taxonomy_rewrite_rules() {
    $terms = get_terms(array(
        'taxonomy' => 'niveau',
        'hide_empty' => false,
    ));

    foreach ($terms as $term) {
        $slug = $term->slug;

        // Custom rewrite rule based on the term slug
        add_rewrite_rule(
            $slug . '/?$',
            'index.php?niveau=' . $slug,
            'top'
        );
    }
}
add_action('init', 'custom_taxonomy_rewrite_rules');

class wp_bootstrap_navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			/*
			if ( $args->has_children )
				$class_names .= ' dropdown';
			*/
			if($args->has_children && $depth === 0) { $class_names .= ' dropdown'; } elseif($args->has_children && $depth > 0) { $class_names .= ' dropdown-submenu'; }
			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';
			// remove Font Awesome icon from classes array and save the icon
			// we will add the icon back in via a <span> below so it aligns with
			// the menu item
			if ( in_array('fa', $classes)) {
				$key = array_search('fa', $classes);
				$icon = $classes[$key + 1];
				$class_names = str_replace($classes[$key+1], '', $class_names);
				$class_names = str_replace($classes[$key], '', $class_names);
			}
			
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names .'>';
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			// If item has_children add atts to a.
			// if ( $args->has_children && $depth === 0 ) {
			if ( $args->has_children && $depth === 0 ) {
   				$atts['href'] = ! empty( $item->url ) ? $item->url : ''; // new line
				//$atts['data-bs-toggle']	= 'dropdown';
				$atts['class']			= 'dropdown-toggle';
				//$atts['aria-haspopup']  = 'true';
				
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			// Font Awesome icons
			if ( ! empty( $icon ) )
				$item_output .= '<a'. $attributes .'><span class="fa ' . esc_attr( $icon ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';	
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}


// Add custom fields to the 'niveau' taxonomy
function add_niveau_custom_fields($term) {
    // Check for existing taxonomy meta for the term
    $term_id = $term->term_id;
    $term_image = get_term_meta($term_id, 'term_image', true);
    $term_description = get_term_meta($term_id, 'term_description', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="term_image"><?php _e('Term Image'); ?></label>
        </th>
        <td>
            <input type="text" name="term_image" id="term_image" value="<?php echo esc_attr($term_image) ? esc_attr($term_image) : ''; ?>">
            <p class="description"><?php _e('Enter the URL of the image.'); ?></p>
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="term_description"><?php _e('Term Description'); ?></label>
        </th>
        <td>
            <textarea name="term_description" id="term_description" rows="5" cols="50"><?php echo esc_attr($term_description) ? esc_attr($term_description) : ''; ?></textarea>
            <p class="description"><?php _e('Enter a description for this term.'); ?></p>
        </td>
    </tr>
    <?php
}
add_action('niveau_edit_form_fields', 'add_niveau_custom_fields', 10, 2);

// Save custom fields for the 'niveau' taxonomy
function save_niveau_custom_fields($term_id) {
    if (isset($_POST['term_image'])) {
        update_term_meta($term_id, 'term_image', sanitize_text_field($_POST['term_image']));
    }
    if (isset($_POST['term_description'])) {
        update_term_meta($term_id, 'term_description', sanitize_textarea_field($_POST['term_description']));
    }
}
add_action('edited_niveau', 'save_niveau_custom_fields', 10, 2);


// Change term link for the 'niveau' taxonomy
function change_niveau_term_link($termlink, $term, $taxonomy) {
    // Check if the taxonomy is 'niveau'
    if ($taxonomy === 'niveau') {

        // Modify the term link as needed
        // For example, add a prefix to the term slug
        $termlink = home_url('/' . $term->slug . '/');
    }
 
    return $termlink;
}
add_filter('term_link', 'change_niveau_term_link', 10, 3);

// Filter term link for 'lyceeniv'
function filter_lyceeniv_term_link($termlink, $term, $taxonomy) {
    if ($taxonomy === 'lyceeniveau') {
        $term_data = get_term($term->term_id, 'lyceeniveau');
        $parent_term = $term_data->parent ? get_term($term_data->parent, 'lyceeniveau') : null;
        if ($parent_term) {
            $niveau_term = get_term_by('id', $parent_term->parent, 'niveau');
            $termlink = home_url('lycee' . ($niveau_term ? $niveau_term->slug : '') . '/' . $parent_term->slug . '/' . $term->slug . '/');
      //var_dump($termlink);
        } else {
            $niveau_term = get_term_by('id', $term->parent, 'niveau');
            $termlink = home_url('lycee' . ($niveau_term ? $niveau_term->slug : '') . '/' . $term->slug . '/');
            //var_dump($termlink);
        }
    }
   elseif($taxonomy === 'CPGENiveau'){
    $term_data = get_term($term->term_id, 'CPGENiveau');

        $parent_term = $term_data->parent ? get_term($term_data->parent, 'CPGENiveau') : null;
        if ($parent_term) {
            $niveau_term = get_term_by('id', $parent_term->parent, 'niveau');
            $termlink = home_url('cpge' . ($niveau_term ? $niveau_term->slug : '') . '/' . $parent_term->slug . '/' . $term->slug . '/');
     // var_dump($termlink);
        } else {
            $niveau_term = get_term_by('id', $term->parent, 'niveau');
            $termlink = home_url('cpge' . ($niveau_term ? $niveau_term->slug : '') . '/' . $term->slug . '/');
           // var_dump($termlink);
        }
    }
    return $termlink;
}
add_filter('term_link', 'filter_lyceeniv_term_link', 10, 3);
/**  add related terms to eachother */
// Save custom fields for the 'niveau' taxonomy


function add_niveauRelated_custom_fields($term) {

// Add custom fields to the 'niveau related category' taxonomy
    $term_id = $term->term_id;
    $term_category = get_term_meta($term_id, 'term_category', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="term_image"><?php _e('Term Category'); ?></label>
        </th>
        <td>
            <input type="text" name="term_category" id="term_category" value="<?php echo esc_attr($term_category) ? esc_attr($term_category) : ''; ?>">
            <p class="term_category"><?php _e('Enter the category that this term belong to'); ?></p>
        </td>
    </tr>
    <?php
}
/*
add_action('LyceeNiv_edit_form_fields', 'add_niveauRelated_custom_fields', 10, 2);


function save_niveauRelated_custom_fields($term_id) {
    if (isset($_POST['term_category'])) {
        update_term_meta($term_id, 'term_category', sanitize_text_field($_POST['term_category']));
    }
  
}
add_action('edited_LyceeNiv', 'save_niveauRelated_custom_fields', 10, 2);



function add_LyceClasseRelated_custom_fields($term) {

    // Add custom fields to the 'niveau related category' taxonomy
        $term_id = $term->term_id;
        $term_category = get_term_meta($term_id, 'term_category', true);
        ?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="term_image"><?php _e('Term Category'); ?></label>
            </th>
            <td>
                <input type="text" name="term_category" id="term_category" value="<?php echo esc_attr($term_category) ? esc_attr($term_category) : ''; ?>">
                <p class="term_category"><?php _e('Enter the category that this term belong to'); ?></p>
            </td>
        </tr>
        <?php
    }
    add_action('LyceClasse_edit_form_fields', 'add_LyceClasseRelated_custom_fields', 10, 2);
    
    
    function save_LyceClasseRelated_custom_fields($term_id) {
        if (isset($_POST['term_category'])) {
            update_term_meta($term_id, 'term_category', sanitize_text_field($_POST['term_category']));
        }
      
    }
    add_action('edited_LyceClasse', 'save_LyceClasseRelated_custom_fields', 10, 2);


/*** Lycee  childreen terms */

function get_niveauRelatedTerms_categories( $term_name, $meta_key,$meta_value) {
    global $wpdb;

  $sql=  $wpdb->prepare("
    SELECT DISTINCT t1.*
    FROM {$wpdb->terms} AS t1
    INNER JOIN {$wpdb->termmeta} AS t3 ON t1.term_id = t3.term_id
    WHERE 
        t3.meta_key = %s
        AND t3.meta_value IN (%s, %s)
", $meta_key, $term_name, $meta_value);

$results = $wpdb->get_results($sql);
var_dump($results);
  
}

/*** CPGE  childreen terms */


function add_CPGENiveauRelated_custom_fields($term) {

    // Add custom fields to the 'niveau related category' taxonomy
        $term_id = $term->term_id;
        $term_category = get_term_meta($term_id, 'term_category', true);
        ?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="term_image"><?php _e('Term Category'); ?></label>
            </th>
            <td>
                <input type="text" name="term_category" id="term_category" value="<?php echo esc_attr($term_category) ? esc_attr($term_category) : ''; ?>">
                <p class="term_category"><?php _e('Enter the category that this term belong to'); ?></p>
            </td>
        </tr>
        <?php
    }
    add_action('CPGENiveau_edit_form_fields', 'add_CPGENiveauRelated_custom_fields', 10, 2);
    
    
    function save_CPGENiveauRelated_custom_fields($term_id) {
        if (isset($_POST['term_category'])) {
            update_term_meta($term_id, 'term_category', sanitize_text_field($_POST['term_category']));
        }
      
    }
    add_action('edited_CPGENiveau', 'save_CPGENiveauRelated_custom_fields', 10, 2);


function get_CPGERelatedTerms_categories($term_parent,$taxonomy) {
    global $wpdb;


  $sql=  $wpdb->prepare("
    SELECT DISTINCT t1.*
    FROM {$wpdb->terms} AS t1
    INNER JOIN {$wpdb->term_taxonomy} AS t2 ON t1.term_id = t2.term_id
    WHERE 
    
 t2.taxonomy=%s And
        t2.parent =%d
", $taxonomy,$term_parent);

$results = $wpdb->get_results($sql);

return $results;
  
}

add_image_size( 'card-size', 280,450, true );
add_image_size( 'index-icon',140,'', true );
add_image_size( 'sidebar-image',351,100, true );
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    }
    add_filter('upload_mimes', 'add_file_types_to_uploads');


    /*** modify category template global query based on the taxonomy */
    function modify_cour_query($query) {
        if ($query->is_main_query() && !is_admin() && is_category()) {
            // Get the current category
            $category = get_queried_object();
    
            // Modify the query to fetch 'cour' post type
            $query->set('post_type', 'cour');
    
            $term = get_queried_object();
// Initialize the tax_query array
$tax_query = array(
    'relation' => 'AND',
    array(
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => $category->slug,
    ),
);

$taxonomy1 = get_query_var('cpge1lk');
$taxonomy2 = get_query_var('cpge1lk_parent');
$taxonomy3 = get_query_var('CPGE_Niveau');
$taxonomy4=get_query_var('niveau1lk');
$taxonomy5=get_query_var('lyceeniv_parent');
$taxonomy6=get_query_var('lycee_niveau');
$taxonomy7=get_query_var('CollegeClasse');
$taxonomy8=get_query_var('primaire');

if(!empty($taxonomy1) && !empty($taxonomy2) && $term->taxonomy='category'){
 

  $tax_query[]=array(
    'taxonomy'=>'niveau',
    'field'=>'slug',
    'terms'=>$taxonomy1
  );
  $tax_query[]=array(
    'taxonomy'=>'CPGENiveau',
    'field'=>'slug',
    'terms'=>$taxonomy2
  );
  $tax_query[]=array(
    'taxonomy'=>'CPGENiveau',
    'field'=>'slug',
    'terms'=>$taxonomy3
  );


}elseif(!empty($taxonomy4) && !empty($taxonomy5)&& !empty($taxonomy6) && $term->taxonomy='category'){
   // echo 'lycee category';

    $tax_query[] = array(
        'taxonomy' => 'niveau',
        'field'    => 'slug',
        'terms'    => $taxonomy4,
    );
    $tax_query[] = array(
        'taxonomy' => 'lyceeniveau',
        'field'    => 'slug',
        'terms'    => $taxonomy5,
    );
    $tax_query[] = array(
        'taxonomy' => 'lyceeniveau',
        'field'    => 'slug',
        'terms'    => $taxonomy6,
    );
 // var_dump($tax_query);

}elseif(!empty($taxonomy7) && $term->taxonomy='category'){
    /*** college */
    echo 'college category';
    var_dump($taxonomy7);
 $tax_query[] = array(
        'taxonomy' => 'niveau',
        'field'    => 'slug',
        'terms'    =>'college',
    );
      $tax_query[] = array(
        'taxonomy' => 'CollegeClasse',
        'field'    => 'slug',
        'terms'    => $taxonomy7,
    );
}elseif(!empty($taxonomy8) && $term->taxonomy='category'){

    /*** primaire */
    echo 'primaire category';
    var_dump($taxonomy8);
     $tax_query[] = array(
        'taxonomy' => 'niveau',
        'field'    => 'slug',
        'terms'    =>'primaire',
    );
      $tax_query[] = array(
        'taxonomy' => 'primaire',
        'field'    => 'slug',
        'terms'    => $taxonomy8,
    );
}
$query->set('tax_query', $tax_query);

        }
            
    }
    
add_action('pre_get_posts', 'modify_cour_query');

/*** get primaire and college subjects */

function get_subject_categories($taxonomy,$category,$term_taxo){
//var_dump($category);
//var_dump($term_taxo);
global $wpdb;
    /*** check if a course exist that belong to the category and the taxonomy  */
    /*** if yes return the categories */
/***  the sql request will select postype == cour and taxonomy=$taxonomy and category =$catgeory */

$sql=  $wpdb->prepare("
  SELECT DISTINCT t1.id
  FROM  {$wpdb->posts} AS t1 
INNER JOIN {$wpdb->term_relationships} AS t2 ON t2.object_id = t1.id
INNER JOIN {$wpdb->term_taxonomy} AS t3 ON t3.term_taxonomy_id = t2.term_taxonomy_id
INNER JOIN {$wpdb->terms} AS t4 ON t4.term_id = t3.term_id
  WHERE 
     t2.term_taxonomy_id=%s
     AND 
     t4.slug=%s
",$term_taxo,$category);

$results = $wpdb->get_col($sql);
$ids = implode(',', array_map('intval', $results));
//var_dump($ids);
if ($results){

    $sql_1=  $wpdb->prepare("
  SELECT DISTINCT t4.*
  FROM  {$wpdb->posts} AS t1 
 INNER JOIN {$wpdb->term_relationships} AS t2 ON t2.object_id = t1.id
INNER JOIN {$wpdb->term_taxonomy} AS t3 ON t3.term_taxonomy_id = t2.term_taxonomy_id
INNER JOIN {$wpdb->terms} AS t4 ON t4.term_id = t3.term_id
 WHERE t1.ID IN ($ids)
     AND 
     t3.taxonomy ='category'
",);

$categories = $wpdb->get_results($sql_1);

if($categories){

return $categories;
}
else{
    return false;
}


}
else{
    return false;
}


    /*** else non return false */

}

/*** lesson costume posts */

 // Register Lesson Post Type
 register_post_type('lesson', [
    'label' => 'Lessons',
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'has_archive' => true,
    'rewrite' => ['slug' => 'lessons'],
    'show_ui' => true,
]);
// Register Exercise Post Type
register_post_type('exercise', [
    'label' => 'Exercises',
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'has_archive' => true,
    'rewrite' => ['slug' => 'exercises'],
]);
/*** course video  */
register_post_type('course video', [
    'label' => 'course video',
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'has_archive' => true,
    'rewrite' => ['slug' => 'video'],
]);
/*
function create_custom_taxonomies() {
    // Register Course Category Taxonomy
    register_taxonomy('course_category', ['course'], [
        'label' => 'Course Categories',
        'rewrite' => ['slug' => 'course-category'],
        'hierarchical' => true,
    ]);

    // Register Lesson Category Taxonomy
    register_taxonomy('lesson_category', ['lesson'], [
        'label' => 'Lesson Categories',
        'rewrite' => ['slug' => 'lesson-category'],
        'hierarchical' => true,
    ]);
   
} 
add_action('init', 'create_custom_taxonomies');*/
/*** add meta box */


class WPOrg_Meta_Box {


	/**
	 * Set up and add the meta box.
	 */
	public static function add() {
		$screens = ['lesson' ];
		foreach ( $screens as $screen ) {
            var_dump($screen);
			add_meta_box(
				'wporg_box_id',          // Unique ID
				'Custom Meta Box Title', // Box title
				[ self::class, 'html' ],   // Content callback, must be of type callable
				$screen                  // Post type
			);
		}
	}


	/**
	 * Save the meta box selections.
	 *
	 * @param int $post_id  The post ID.
	 */
    public static function save(int $post_id) {
        if (array_key_exists('video_lesson', $_POST) && array_key_exists('lesson_title', $_POST)) {
            update_post_meta(
                $post_id,
                '_lesson_videos',
                $_POST['video_lesson']
            );
            update_post_meta(
                $post_id,
                '_lesson_title',
                $_POST['lesson_title']
            );
        }
    }

/*** add multiples a videos and multiples explination   */
	/**
	 * Display the meta box HTML to the user.
	 *
	 * @param WP_Post $post   Post object.
	 */
	public static function html( $post ) {
		$videos = get_post_meta( $post->ID, '_lesson_videos', true );
        $content=get_post_meta($post->ID,'_lesson_title',true);

        $videos =is_array($videos) ? $videos : [] ;
        $content= is_array($content) ? $content : [];

        //var_dump($content);
		?>
         <div id="lesson_additional"> 
		<label for="wporg_field" class="wporg_field_class">Add Aditional lesson content as video and it's explaination</label>
       <?php foreach($videos as $index =>$video):?>
        <div class="lesson_item">
		<input type="url" name="video_lesson[]" value="<?php echo esc_url($video);?>">
        <input type="text"  name="lesson_title[]" value="<?php echo esc_attr($content[$index]);?>   ">
                        
        <button type="button" class="lesson_remove">Remove</button>
       </div>
  <?php endforeach; ?>
    </div>

    <button type="button" id="lesson_add" >add new video</button>
    <script>

document.addEventListener("DOMContentLoaded",function() {

$addButton=document.getElementById('lesson_add')
$addButton.addEventListener('click',function(){

    let container=document.getElementById('lesson_additional')
    let newItem=document.createElement('div')
    newItem.classList.add('lesson_item')
    newItem.innerHTML=`
                    <input type="url" name="video_lesson[]" placeholder="Video URL">
                    <input type="text" name="lesson_title[]" placeholder="Video explanation" >
                
                    <button type="button" class="lesson_remove">Remove</button>
                `;
container.appendChild(newItem)

});
/** remove some of the added content */
 
document.querySelectorAll('.lesson_remove').forEach(function(button){
    console.log(button)
button.addEventListener('click',function(){
    console.log('clicked')
    button.parentElement.remove()
})
})
})
    </script>
		<?php
	}
}

add_action( 'add_meta_boxes', [ 'WPOrg_Meta_Box', 'add' ] );
add_action( 'save_post', [ 'WPOrg_Meta_Box', 'save' ] );



?>