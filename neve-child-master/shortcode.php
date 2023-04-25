<?php

    // function shortcode_form( $attr ){

    //     $html = '';
    //     $html .= '<h1>Custom Form</h1>';
        // $html .= '<form action="" method="POST" id="submit">';
        // $html .=    '<input type="text" id="input-name" name="input-name" placeholder="Name"><br/>';
        // $html .=    '<input type="text" id="input-address" name="input-address" placeholder="Address"><br/>';
        // $html .=    '<input type="email" id="input-email" name="input-email" placeholder="Email"><br/>';
        // $html .=    '<input type="text" id="message" name="message" placeholder="Message"><br/>';
        // $html .=    '<input type="submit" name="submit" value="Submit">';
        // $html .= '</form>';

        // $message = 'This is a sample message from customer of LazaShopee';
        // $header = array('Content-Type: text/html; charset=UTF-8');
        // $input = $_POST['input-email'];
        // // $messages = $_GET['message'];
        
        // if( isset($_POST['submit']) ){
        //     wp_mail( $input, 'WP Mail Test', $message, $header);
        // }

        // wp_mail( $to:string|array, $subject:string, $message:string, $headers:string|array, $attachments:string|array )

    //     return $html;
    // }

    // add_shortcode( 'custom_form', 'shortcode_form' );

  function details_callback($attr){

        $html = ''; 
        $html .= '<form action="" method="POST" id="submit">';
        $html .=    '<div class="d-flex mb-3">';
        $html .=      '<input class="me-2" type="text" id="input-title" name="input-title" placeholder="Title">';
        $html .=      '<input class="me-2" type="text" id="input-author" name="input-author" placeholder="Author"><br/>';
        $html .=      '<input class="rounded-2 p-2" id="btnSubmit" type="submit" name="submit" value="Submit" >';
        $html .=    '</div>';
        $html .= '</form>';

        return $html;

  }

  add_shortcode( 'custom_details', 'details_callback');

  function table_callback(){

		$cpt = get_posts([
			'post_type' => 'store',
		]);
        
    $html = ''; 
		$html .= '<table>';
		$html .=   '<tr>';
    $html .=     '<th>Title</th>';
    $html .=     '<th>Author</th>';
    $html .=     '<th>Action</th>';
		$html .=  '</tr>';
		

		foreach($cpt as $post){

      get_posts([
        'post_type' => 'store',
      ]);

      $html .= '<tr>';
      $html .=    '<td>'.$post -> post_title.'</td>';
      $html .=    '<td>'.$post -> post_content.'</td>';

      // Delete Button
      $html .=    '<td>';
      $html .=        '<button class="edit--button rounded-2 p-2 me-2" name="edit--button" id="'.$post->ID.'" data="1" title="'.$post -> post_title.'" author="'.$post -> post_content.'"> Edit </button>';
      $html .=        '<button class="delete--button rounded-2 p-2" name="delete--button" id="'.$post->ID.'" data="2"> Delete </button>';
      $html .=    '</td>';
			$html .= '</tr>';
		}

		$html .= '</table>';

		return $html;
	}

	add_shortcode( 'custom_table', 'table_callback' );

  function update_callback($attr){

    // get_posts([
    //   'post_type' => 'store',
    // ]);



    $html = ''; 
		$html .= '<div id="modal">';
    $html .= 	'<form action="" method="POST">';
    $html .=    	'<div class="d-flex mb-3">';
    $html .=      	'<input class="me-2" type="text" id="update-title" name="input-title" placeholder="Title" value="">';
    $html .=      	'<input class="me-2" type="hidden" id="update-post-id" name="update-post-id" placeholder="Title">';
    $html .=      	'<input class="me-2" type="text" id="update-author" name="input-author" placeholder="Author" value=""><br/>';
    $html .=      	'<input class="rounded-2 p-2" id="submitUpdate" type="submit" name="submit" value="Submit">';
    $html .=    	'</div>';
		$html .= 	'</form>';
		$html .= '<div>';
		
		return $html;
  }

  add_shortcode( 'custom_update_details', 'update_callback');


  // $html = '';
  // $html .= '<!-- Modal -->
  //         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  //         <div class="modal-dialog">
  //             <div class="modal-content">
  //             <div class="modal-header">
  //                 <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
  //                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  //             </div>
  //             <div class="modal-body">
  //                 ...
  //             </div>
  //             <div class="modal-footer">
  //                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  //                 <button type="button" class="btn btn-primary">Save changes</button>
  //             </div>
  //             </div>
  //         </div>
  //        </div>';
  
  
  