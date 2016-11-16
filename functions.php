<?php

/*-------------
General Include
--------------*/
function sellercenter_setup(){
// Tambah feed url pada template wordpress
	add_theme_support( 'automatic-feed-links' );

	/*
	 Script untuk management title dalam wordpress.
	 script ini akan menambahkan tag title secara otomatis dalam html wordpress/
	 */
	add_theme_support( 'title-tag' );

	/*
	 Menambahkan fitur set feature image pada post dan juga page
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );


	// Gunakan  wp_nav_menu() pada dua lokasi.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'sellercenterv2' ),
		'secondarys'  => __( 'Footer Menu', 'sellercenterv2' ),
	) );



}

//tambahkan dalam fungsi utama dengan add_action
add_action('after_setup_theme','sellercenter_setup');


//show feature image on post
function feature_img_url($postid, $imagesize) {
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($postid), $imagesize);
    $url = $thumb['0'];
    return $url;
}

function sellercenter_scripts(){

//adding bootstrap.min.css
wp_enqueue_style('bootstrap-css',get_template_directory_uri().'/css/bootstrap.min.css');


//adding font google
wp_enqueue_style('opensans','https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800');
  //adding tokopedia style default
wp_enqueue_style('generaltokopedia',get_template_directory_uri().'/css/general.css');



//adding bootstrap js to wordpress
wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20150330', true );
//adding calendar css
	
	if(is_page('guide-page')){
		wp_enqueue_style('swipercss',get_template_directory_uri().'/css/swiper.min.css');
		wp_enqueue_script('swiperjs',get_template_directory_uri().'/js/swiper.min.js', array( 'jquery' ), '20150330', true );
	}
	if(is_front_page()){
	wp_enqueue_style('calendarcss',get_template_directory_uri().'/css/monthly.css');
	wp_enqueue_script('calendarjs',get_template_directory_uri().'/js/monthly.js', array( 'jquery' ), '20150330', true );
}
	
	//adding style.css to wordpress
wp_enqueue_style('generalcss',get_stylesheet_uri());

}

//adding css to administrator
function sc_admin_scripts(){
	 wp_enqueue_script('tp_map_search', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places&key=AIzaSyCYHfhh3nX-mcDxzh9psXH2-ndPzq30Duo', '', '', true);
	wp_enqueue_style('sc_options_css',get_template_directory_uri().'/admin/scoptions.css');
	wp_enqueue_style('pickdate_css',get_template_directory_uri().'/css/monthly.css');
	wp_enqueue_style('picktime_css',get_template_directory_uri().'/admin/css/timedropper.min.css');
	wp_enqueue_script('pickup_location',get_template_directory_uri().'/admin/js/locationpicker.js');
		wp_enqueue_script('pickdate',get_template_directory_uri().'/js/monthly.js');
	wp_enqueue_script('datecontroller',get_template_directory_uri().'/admin/js/datecontroller.js');
	wp_enqueue_script('pickup_controller',get_template_directory_uri().'/admin/js/locationcontroller.js');
	wp_enqueue_script('pick_time',get_template_directory_uri().'/admin/js/timedropper.min.js', array( 'jquery' ), '20150330', true);
	wp_enqueue_script('pick_event_time',get_template_directory_uri().'/admin/js/timecontroller.js', array( 'jquery' ), '20150330', true);
	

}
add_action('admin_enqueue_scripts', 'sc_admin_scripts');

//adding to wp_enqueue_scripts
add_action('wp_enqueue_scripts','sellercenter_scripts');

//Logo Tokopedia
function logo(){
    echo get_template_directory_uri()."/images/tokopedia-logo.png";
}
//get image
function images($image){
  echo get_template_directory_uri().'/images/'.$image;
}
//get js
function set_js($js){
  echo get_template_directory_uri().'/js/'.$js;
}

//bootstrap nav walker
require_once('include/bootstrap_nav_walker.php');

//search
function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

//customize the excerpt lenght
function wpdocs_custom_excerpt_length( $length ) {
    return 10;
}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

//customize the excerpt end
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );



add_filter('pre_get_posts','SearchFilter');


/*----------------
Creating Theme Option
----------------*/

//creating menu options
add_action('admin_menu','sc_options_menu');
function sc_options_menu(){
		//create top level menu
		add_menu_page('Seller Center Options','SC Settings','administrator','scoptions','sc_options_page','dashicons-admin-generic');
		//register functions setting
		add_action('admin_init','sc_option_setting');
		

}

function print_meta($metaname){
	global $post;
	echo get_post_meta($post->ID,$metaname, true);
}
function gets_meta($metaname){
	global $post;
	return get_post_meta($post->ID,$metaname, true);
}

//registering options setting
function sc_option_setting(){
	register_setting('sc_options_group','front_category');
	register_setting('sc_options_group','category_list');
	register_setting('sc_options_group','header_logo');
}

function sc_options_page(){
	if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
}else{
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
}

?>

<style></style>
	<div class="sc-wrapper">
		<h1><span class="strong">Seller Center</span> <sub>Options</sub></h1>
		<form action="options.php" method="post" enctype="multipart/form-data">
			<?php settings_fields( 'sc_options_group' ); ?>
			<?php do_settings_sections( 'sc_options_group' ); ?>
			 <p>
				 <img class="header_logo" src="<?php echo get_option('header_logo'); ?>" width="100"/>
			</p>
<label for="">Header Logo Image URL:</label>
               
                <input class="header_logo_url form-input" type="text" name="header_logo" size="60" value="<?php echo get_option('header_logo'); ?>" placeholder="Upload Gambar Logo Anda">
                <a href="#" class="header_logo_upload">Upload</a>

			<div class="form-group">
				<label for="">Kategori Halaman Depan</label>
				<input type="text" class="form-input" name="front_category" placeholder="Masukan Kategori" value="<?php echo esc_attr( get_option('front_category') ); ?>">
			</div>

			<?php 
		$args=array(
		'orderby'=>'name',
			'order'=>'ASC'
		);
													 $categories=get_categories($args);

		
		?>
			<div class="form-group">
				<label for="">Pilih Kategori Posting</label>
				<select name="category_list" id="" class="form-input">
				
				<?php foreach($categories as $category){ ?>
				
				<option value="<?php echo $category->cat_ID ?>" <?php if(get_option('category_list')==$category->cat_ID){echo "selected";}?>><?php echo $category->name;?></option>
				
				<?php }?>
			</select>
			</div>

			<?php submit_button();?>
		</form>

	</div>
<script>
    jQuery(document).ready(function($) {
        $('.header_logo_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header_logo').attr('src', attachment.url);
                $('.header_logo_url').val(attachment.url);

            })
            .open();
        });
    });
</script>

	<?php 
}


//adding metabox to post
add_action('add_meta_boxes','posting_metabox');
function posting_metabox(){
	add_meta_box('post_name_author','Penggagas Artikel','post_name_author','post','normal','high');
}
function post_name_author($post){
     $value=get_post_custom($post->ID);
     $sellername= isset($value['sellername']) ? esc_attr($value['sellername'][0]) : '';
	$shopname= isset($value['shopname']) ? esc_attr($value['shopname'][0]) : '';
	$authordesc= isset($value['authordesc']) ? esc_attr($value['authordesc'][0]) : '';
	$communityname= isset($value['communityname']) ? esc_attr($value['communityname'][0]) : '';
    wp_nonce_field('posting_meta_box_nonce', 'meta_box_nonce');

?>
	<style>
		.form-group label {
			margin-bottom: 5px;
		}
		
		.form-post {
			width: 100%;
			padding: 10px;
			border-radius: 3px;
			margin: 0;
		}
	</style>
	<div class="form-group">
		<label for="sellername">Nama Penjual</label>
		<input type="text" name="sellername" id="sellername" class="form-post" placeholder="Masukan Nama Penjual" value="<?php echo $sellername;?>">
	</div>
	<div class="form-group">
		<label for="shopname">Nama Toko</label>
		<input type="text" name="shopname" id="shopname" class="form-post" placeholder="Masukan Nama Toko" value="<?php echo $shopname;?>">
	</div>
	<div class="form-group">
		<label for="communityname">Nama Komunitas</label>
		<input type="text" name="communityname" id="communityname" class="form-post" placeholder="Masukan Nama Komunitas" value="<?php echo $communityname;?>">
	</div>
	<div class="form-group">
		<label for="authordesc">Deskripsi Penulis</label>
		<textarea name="authordesc" id="authordesc" cols="30" rows="10" class="form-post" placeholder="Masukan Cerita Tentang Penulis"><?php echo $authordesc;?></textarea>
	</div>
	<?php

}
add_action('save_post','posting_author_save');
function posting_author_save($post_id){
	        // Bail if we're doing an auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // if our nonce isn't there, or we can't verify it, bail
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'posting_meta_box_nonce'))
        return;

    // if our current user can't edit this post, bail
    if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['sellername'])) {
        update_post_meta($post_id, 'sellername', $_POST['sellername']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['shopname'])) {
        update_post_meta($post_id, 'shopname', $_POST['shopname']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['authordesc'])) {
        update_post_meta($post_id, 'authordesc', $_POST['authordesc']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['communityname'])) {
        update_post_meta($post_id, 'communityname', $_POST['communityname']);
    }
}


//event post type
add_action('init','event_post_type');
function event_post_type(){
	register_post_type( 'events',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' ),
		
      ),
      'public' => true,
      'has_archive' => true,
			'menu_icon'=>'dashicons-calendar-alt',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions',  ),
			
      'rewrite' => array('slug' => 'events')
    )
  );
}

//adding event meta
add_action('add_meta_boxes','events_metabox');
function events_metabox(){
	add_meta_box('event_post','Lokasi Event','event_post','events','normal','high');
	add_meta_box('event_date','Tanggal Event','event_date','events','side','high');
	add_meta_box('event_time','Waktu Event','event_time','events','side','high');
}

function event_time($post){
	$value=get_post_custom($post->ID);
     $eventstart= isset($value['eventstart']) ? esc_attr($value['eventstart'][0]) : '';
	$eventend= isset($value['eventend']) ? esc_attr($value['eventend'][0]) : '';
    wp_nonce_field('events_meta_box_nonce', 'meta_box_nonce');
	?>

<div class="form-group">
		<label for="eventstart">Mulai Event</label>
		<input type="text" name="eventstart" id="eventstart" class="form-post" placeholder="Masukan Waktu Mulai Event" value="<?php echo $eventstart;?>">
	
	</div>
<div class="form-group">
		<label for="eventend">Akhir Event</label>
		<input type="text" name="eventend" id="eventend" class="form-post" placeholder="Masukan Waktu Berakhir Event" value="<?php echo $eventend;?>">
	
	</div>

<?php
}


function event_date($post){
	 $value=get_post_custom($post->ID);
     $eventdate= isset($value['eventdate']) ? esc_attr($value['eventdate'][0]) : '';
    wp_nonce_field('events_meta_box_nonce', 'meta_box_nonce');
	?>
<div class="form-group">
		<label for="eventdate">Tanggal Event</label>
		<input type="text" name="eventdate" id="eventdate" class="form-post" placeholder="Masukan Tanggal Event" value="<?php echo $eventdate;?>">
	<div class="monthly" id="mycalendar2"></div>
	</div>

<?php
}

function event_post($post){
	 $value=get_post_custom($post->ID);
     $eventlocation= isset($value['eventlocation']) ? esc_attr($value['eventlocation'][0]) : '';
	$eventlat= isset($value['eventlat']) ? esc_attr($value['eventlat'][0]) : '';
	$eventlon= isset($value['eventlon']) ? esc_attr($value['eventlon'][0]) : '';
	
    wp_nonce_field('events_meta_box_nonce', 'meta_box_nonce');


?>
<style>
		.form-group label {
			margin-bottom: 5px;
		}
		
		.form-post {
			width: 100%;
			padding: 10px;
			border-radius: 3px;
			margin: 0;
		}
	</style>
	<div class="form-group">
		<label for="eventlocation">Cari Lokasi</label>
		<input type="text" name="eventlocation" id="eventlocation" class="form-post" placeholder="Masukan Nama Lokasi" value="<?php echo $eventlocation;?>">
	</div>
	<div class="form-group">
		<label for="eventlat">Event Latitude</label>
		<input type="text" name="eventlat" id="eventlat" class="form-post" placeholder="Masukan Event Latitude" value="<?php echo $eventlat;?>">
	</div>
	<div class="form-group">
		<label for="eventlon">Event Logitude</label>
		<input type="text" name="eventlon" id="eventlon" class="form-post" placeholder="Masukan Event Longitude" value="<?php echo $eventlon;?>">
	</div>
<div class="form-group">
	<label for="">Pick Location</label>
</div>
	<div id="maps" width="100%" style="height:300px;"></div>
	
<?php 
}
add_action('save_post','event_save');
function event_save($post_id){
	        // Bail if we're doing an auto save
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    // if our nonce isn't there, or we can't verify it, bail
    if (!isset($_POST['meta_box_nonce']) || !wp_verify_nonce($_POST['meta_box_nonce'], 'events_meta_box_nonce'))
        return;

    // if our current user can't edit this post, bail
    if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['eventdate'])) {
        update_post_meta($post_id, 'eventdate', $_POST['eventdate']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['eventlocation'])) {
        update_post_meta($post_id, 'eventlocation', $_POST['eventlocation']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['eventlat'])) {
        update_post_meta($post_id, 'eventlat', $_POST['eventlat']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['eventlon'])) {
        update_post_meta($post_id, 'eventlon', $_POST['eventlon']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['eventstart'])) {
        update_post_meta($post_id, 'eventstart', $_POST['eventstart']);
    }
	if (!current_user_can('edit_post'))
        return;
        if (isset($_POST['eventend'])) {
        update_post_meta($post_id, 'eventend', $_POST['eventend']);
    }
}

add_action( 'init', 'selleroftheweek' );
function selleroftheweek() {
  register_post_type( 'sotw',
    array(
      'labels' => array(
        'name' => __( 'Seller OTW' ),
        'singular_name' => __( 'Seller OTW' )
      ),
      'public' => true,
      'has_archive' => true,
      	'menu_icon'=>'dashicons-awards',
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions',  )
    )
  );
}

?>