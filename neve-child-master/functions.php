<?php
	require_once dirname(__FILE__).'/enqueue/enqueue_front_scripts.php';
	require_once dirname(__FILE__).'/enqueue/admin_enqueue.php';
	require_once dirname(__FILE__).'/custom-option.php';
	require_once dirname(__FILE__).'/shortcode.php';
	function run_enqueue(){
		$Admin_Enqueue = new Admin_Enqueue();
	}
	add_action('init', 'run_enqueue');

	// ADD MENU AND SUBMENU PAGE
	add_action('admin_menu','my_custome_page_menu');
	function my_custome_page_menu(){
		add_menu_page( 
			$page_title = 'My Dashboard', 
			$menu_title = 'My Dashboard', 
			$capability = 'manage_options', 
			$menu_slug  = 'my-dashboard', 
			$callback   = 'my_dashboard_callback', 
			$icon_url   = 'dashicons-dashboard', 
			$position   = 5
		);

		add_submenu_page( 
			$parent_slug = 'my-dashboard', 
			$page_title  = 'Settings', 
			$menu_title  = 'Settings', 
			$capability  = 'manage_options', 
			$menu_slug   = 'setting-page', 
			$callback    = 'my_setting_callback', 
			$icon_url    = 'dashicons-admin-generic', 
		);
	}

	function my_dashboard_callback(){
		require_once dirname(__FILE__).'/pages/dashboard.php';
	}

	function my_setting_callback(){
		require_once dirname(__FILE__).'/subpages/settings.php';
	}

	// METABOX FIELD
	add_action( 'add_meta_boxes', 'post_meta_box' );
	function post_meta_box(){
		add_meta_box( 
			'post_meta_field', 
			'Post Meta Field',
			'post_meta_field_callback', 
			'product', 
			'normal',
			'low', 
		);
	}

	function post_meta_field_callback($post){
		$value = get_post_meta( $post->ID, 'post_meta_field',true);
		
		$html = '';
		$html .= '
				<div>
					<label>Video link:</label>
					<input type="text" name="post_meta_field" id="post_meta_field" value="'.$value.'"> 
				</div>';
		echo $html;
	}

	add_action( 'save_post', 'save_post_meta_fields');

	function save_post_meta_fields($post_id){
		update_post_meta( $post_id, 'post_meta_field', $_POST['post_meta_field']);
	}

	
	function my_custom_post_type_callback(){
	
		$labels = array (
			'name' => 'Store',
			'singular_name' => 'Store',
			'add_new' => 'Add Item',
			'all_items' => 'All Items',
			'edit_item' => 'New item',
			'new_item' => 'New Item',
			'view_item' => 'View Item',
			'search_item' => 'Search Item',
			'not_found' => 'No items',
		);

		$args = array (
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'supports' => array (
				'title',
				'editor',
				'thumbnails',
				'revisions',
				'comments'
			),
		);

		register_post_type('store',$args);
	}
	add_action('init', 'my_custom_post_type_callback' );

	// INSERTING DATA CALLBACK FUNCTION
	function custom_details_callback(){

		$add_post = array(
			'post_title'   =>  $_POST['data']['title'],
			'post_author'  =>  1,
			'post_content' =>  $_POST['data']['author'],
			'post_status'  =>  'Publish',
			'post_type' => 'store'

		);

		wp_insert_post( $add_post );

		wp_send_json("Successfully Insert");
	}

	add_action( 'wp_ajax_nopriv_custom_details', 'custom_details_callback' );
	add_action( 'wp_ajax_custom_details', 'custom_details_callback' );

	// DELETE CALLBACK FUNCTION
	function delete_post_callback(){
		
		$id = $_POST['data']['id'];

		global $wpdb;
		$wpdb -> query("DELETE FROM `wp_posts` WHERE post_type = 'store' AND ID = $id;");

		wp_send_json("Delete request is Success");
	}

	add_action( 'wp_ajax_nopriv_delete_post', 'delete_post_callback' );
	add_action( 'wp_ajax_delete_post', 'delete_post_callback' );

	// EDIT CALLBACK FUNCTION
	function edit_post_callback(){
		
		$id = $_POST['data']['id'];
		$title = $_POST['data']['title'];
		$author = $_POST['data']['author'];
        
		global $wpdb;
		$wpdb -> query("UPDATE `wp_posts` SET post_title = 'Default Title' , `post_content` = 'Admin' WHERE ID = $id;");
		
		// $wpdb -> query("UPDATE `wp_posts` SET `post_content` = $title, `post_title` = $author WHERE `wp_posts`.`ID` = $id;");
		// $wpdb -> query("UPDATE `wp_posts` SET `post_content` = 'Ads', `post_name` = 'Lazadasx' WHERE `wp_posts`.`ID` = $id;");

		// UPDATE `wp_posts` SET `post_content` = $title, `post_title` = $author WHERE `wp_posts`.`ID` = $id;

		// $add_post = array(
		// 	'post_title'   =>  $_POST['data']['title'],
		// 	'post_author'  =>  1,
		// 	'post_content' =>  $_POST['data']['author'],
		// 	'post_status'  =>  'Publish',
		// 	'post_type' => 'store'

		// );

		// wp_insert_post( $add_post );

		wp_send_json("Edit request is Success");
		
	}

	add_action( 'wp_ajax_nopriv_edit_post', 'edit_post_callback' );
	add_action( 'wp_ajax_edit_post', 'edit_post_callback' );

	// GET POST CALLBACK FUNCTION
	function get_post_callback(){

		$id = $_POST['data']['id'];

		global $wpdb;
		$result = $wpdb->get_results("SELECT * FROM `wp_posts` WHERE `post_type` = 'store' AND ID = $id;");
		
		// var_dump($result);
		wp_send_json($result);

	}

	add_action( 'wp_ajax_nopriv_get_post', 'get_post_callback' );
	add_action( 'wp_ajax_get_post', 'get_post_callback' );

	// UPDATE POST CALLBACK FUNCTION
	function update_post_callback(){

		$id = $_POST['data']['id'];
		$title = $_POST['data']['title'];
		$author = $_POST['data']['author'];

		global $wpdb;
		// $result = $wpdb -> query('UPDATE `wp_posts` SET post_title = '.$title.' , `post_content` = '.$author.' WHERE ID = '.$id.' ');

		try{
			// $result = $wpdb->wp_update('UPDATE `wp_posts` SET `post_title` = '.$title.' , `post_content` = '.$author.' WHERE ID = '.$id.' ');
			$result = $wpdb->query("UPDATE `wp_posts` SET `post_title` = '$title' , `post_content` = '$author' WHERE ID = $id");
			wp_send_json($result);
		}catch(\Throwable $th){
			wp_send_json($th);
		};

		// wp_send_json( $result );
	}

	add_action( 'wp_ajax_nopriv_update_post', 'update_post_callback' );
	add_action( 'wp_ajax_update_post', 'update_post_callback' );

	// ADD
	add_action('rest_api_init', function() {
		register_rest_route ('add/v1', 'store', array(
			'methods' => 'POST',
			'callback' => 'addData'
		));
	});

	function addData( $request ) {
		$title = $request['title'];
		$author = $request['author'];

		$add_post = array(
			'post_title'   =>  $title,
			'post_author'  =>  1,
			'post_content' =>  $author,
			'post_status'  =>  'Publish',
			'post_type' => 'store'

		);

		if(wp_insert_post( $add_post )){
			return "Success";
		} else {
			return "Failed";
		}

	}

	// DELETE
	add_action( 'rest_api_init', function() {	
		register_rest_route( 'delete/v1', 'store', array (
			'methods' => 'POST',
			'callback' => 'deleteData',
		));
	});

	function deleteData( $request ){
		$id = $request['id'];

		global $wpdb;
		$result = $wpdb -> query("DELETE FROM `wp_posts` WHERE post_type = 'store' AND ID = $id;");

		if($result){
			return "Success";
		} else {
			return "False";
		}
		
	}

	// Update
	add_action( 'rest_api_init', function() {	
		register_rest_route( 'update/v1', 'store', array (
			'methods' => 'POST',
			'callback' => 'updateData',
		));
	});

	function updateData( $request ){
		$id = $request['id'];
		$title = $request['title'];
		$author = $request['author'];

		global $wpdb;
		// $result = $wpdb -> query('UPDATE `wp_posts` SET post_title = '.$title.' , `post_content` = '.$author.' WHERE ID = '.$id.' ');

		try{
			// $result = $wpdb->wp_update('UPDATE `wp_posts` SET `post_title` = '.$title.' , `post_content` = '.$author.' WHERE ID = '.$id.' ');
			$result = $wpdb->query("UPDATE `wp_posts` SET `post_title` = '$title' , `post_content` = '$author' WHERE ID = $id");
			return $result;
		}catch(\Throwable $th){
			return $th;
		};

	}




	






