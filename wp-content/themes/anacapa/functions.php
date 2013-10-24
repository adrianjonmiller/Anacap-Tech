<?php


automatic_feed_links();

if ( function_exists('register_sidebar') )
	register_sidebar(array('name'=>'sidebar1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));
	register_sidebar(array('name'=>'sidebar2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));
	register_sidebar(array('name'=>'sidebar3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
));


add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150 );
add_image_size( 'single-post-thumbnail', 598, 9999 ); // Permalink thumbnail size

function exclude_category($query) {
if ( $query->is_home ) {
$query->set('cat', '-4');
}
return $query;
}
add_filter('pre_get_posts', 'exclude_category');


add_action( 'admin_menu', 'mf_add_page_excerpt_box' );
function mf_add_page_excerpt_box() {
	add_meta_box( 'mf_page_excerpt', __( 'Excerpt' ), 'postexcerpt', 'page', 'normal', 'high' );
}
function postexcerpt() {
	global $post;
	$message = __( 'Excerpts are optional hand-crafted summaries of your content. You can <a href="http://codex.wordpress.org/Template_Tags/the_excerpt" target="_blank">use them in your template</a>' );
	print <<<EOF
	<div class="inside">
	<textarea rows="5" cols="40" name="excerpt" tabindex="3" id="excerpt">{$post->post_excerpt}</textarea>
	<p>{$message}</p>
	</div>
EOF;
}



function get_attachment_icons($echo = false){
	$attached_files = false;
	
	$sAttachmentString = "";
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'order' => 'ASC',
	 'orderby' => 'menu_order ID',
	 'post_mime_type' => 'application/pdf',  //MIME Type condition
	 ))){
	 $attached_files = true;
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$file_title = apply_filters('the_title',$file->post_title);
		$file_caption = apply_filters('the_excerpt',$file->post_excerpt);
		$file_description = apply_filters('the_content',$file->post_content);
		$sAttachmentString .= "<li class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link'>";
		$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/pdf.png'/>";
		$sAttachmentString .= "</a>";
		$sAttachmentString .= "<a href='$file_link'>$file_title</a> $file_caption $file_description";
		$sAttachmentString .= "</li>";
		}
	}
	//Word Documents
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'order' => 'ASC',
	 'orderby' => 'menu_order ID',
	 'post_mime_type' => 'application/msword',  //MIME Type condition
	 ))){
	 $attached_files = true;
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$file_title = apply_filters('the_title',$file->post_title);
		$sAttachmentString .= "<li class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link'>";
		$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/word.png'/>";
		$sAttachmentString .= "</a>";
		$sAttachmentString .= "<a href='$file_link'>$file_title</a>";
		$sAttachmentString .= "</li>";
		}
	}
	//Powerpoint Documents
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'order' => 'ASC',
	 'orderby' => 'menu_order ID',
	 'post_mime_type' => 'application/vnd.ms-powerpoint',  //MIME Type condition
	 ))){
	 $attached_files = true;
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$file_title = apply_filters('the_title',$file->post_title);
		$sAttachmentString .= "<li class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link'>";
		$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/PowerPoint.png'/>";
		$sAttachmentString .= "</a>";
		$sAttachmentString .= "<a href='$file_link'>$file_title</a>";
		$sAttachmentString .= "</li>";
		}
	}
	//Excel Documents
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'order' => 'ASC',
	 'orderby' => 'menu_order ID',
	 'post_mime_type' => 'application/vnd.ms-excel',  //MIME Type condition
	 ))){
	 $attached_files = true;
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$file_title = apply_filters('the_title',$file->post_title);
		$sAttachmentString .= "<li class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link'>";
		$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/XLS8.png'/>";
		$sAttachmentString .= "</a>";
		$sAttachmentString .= "<a href='$file_link'>$file_title</a>";
		$sAttachmentString .= "</li>";
		}
	}
	//Zipped Files
	if ( $files = get_children(array(   //do only if there are attachments of these qualifications
	 'post_parent' => get_the_ID(),
	 'post_type' => 'attachment',
	 'numberposts' => -1,
	 'order' => 'ASC',
	 'orderby' => 'menu_order ID',
	 'post_mime_type' => 'application/zip',  //MIME Type condition
	 ))){
	 $attached_files = true;
	 foreach( $files as $file ){ //setup array for more than one file attachment
		$file_link = wp_get_attachment_url($file->ID);    //get the url for linkage
		$file_name_array=explode("/",$file_link);
		$file_name=array_reverse($file_name_array);  //creates an array out of the url and grabs the filename
		$file_title = apply_filters('the_title',$file->post_title);
		$sAttachmentString .= "<li class='documentIcons'>";
		$sAttachmentString .= "<a href='$file_link'>";
		$sAttachmentString .= "<img src='".get_bloginfo('template_directory')."/images/mime/zip.png'/>";
		$sAttachmentString .= "</a>";
		$sAttachmentString .= "<a href='$file_link'>$file_title</a>";
		$sAttachmentString .= "</li>";
		}
	}

if ($attached_files) $sAttachmentString = "<ul class='documentIconsWrapper'>" . $sAttachmentString . "</ul>";


if($echo){
    echo $sAttachmentString;
  }
  return $sAttachmentString;
}
add_shortcode('attachment icons', 'get_attachment_icons');


/* Add Testimonial Custom Post Type */
require_once(TEMPLATEPATH . '/functions/custom-post-type.php');


function my_page_css_class($css_class, $page) {
    if (get_post_type()=='testimonials' || is_page(520)) {
        if ($page->ID == get_option('page_for_posts')) {
            foreach ($css_class as $k=>$v) {
                if ($v=='current_page_parent') unset($css_class[$k]);
            }
        }
        if ($page->ID==520) {
            $css_class[]='current_page_parent';
        }
    }
    return $css_class;
}
add_filter('page_css_class','my_page_css_class',10,2);

// Change tinyMCE default background color

function fb_change_mce_options($initArray) {
	
	$initArray['theme_advanced_default_background_color'] = '#daff80';
	return $initArray;
}
add_filter('tiny_mce_before_init', 'fb_change_mce_options');

?>
