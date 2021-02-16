<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->database();  
		$this->load->model('Main_Model');
		$this->load->library(array('form_validation','session'));
	}

	public function index(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['event']=$this->Main_Model->event_count();
			$result['product']=$this->Main_Model->product_count();
			$result['news']=$this->Main_Model->news_count();
			$result['magazine']=$this->Main_Model->magazine_count();
			$result['user']=$this->Main_Model->user_count();
			$result['order']=$this->Main_Model->order_count();
			$result['subscribe']=$this->Main_Model->subscribe_count();
			$this->load->view('dashboard', $result);
		}
		else{
			$this->load->view('login');
		}
	}


	// slider controller

	public function upload_slider(){
        //file upload code 
        //set file upload settings 
        $config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
        $config['upload_path'] = './uploads/sliders/';
		$config['encrypt_name'] = true;
		        
        $this->load->library('upload',$config);
        
        if ($this->upload->do_upload('upload')) {
			$upload_data = $this->upload->data();
			
            $save = array(
                'image'        => $upload_data['file_name']
            );
            $query = $this->Main_Model->slider_store($save);
            if ($query) {
                $this->slider();
            } else {
                echo "sorry requested failed.";
            }
        } else {
                print_r($this->upload->display_errors());
		}
	}

	public function slider(){
		
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->slider();
			$this->load->view('slider', $result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function slider_view(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->slider_view($id);
			$this->load->view('slider_view',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function slider_edit(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->slider_view($id);
			$this->load->view('slider_edit',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function slider_edit_done(){
		// if (){
        //     $this->load->view('event');
        // }else{
            //get the form values
	
	
	 		if($_FILES["upload"]["tmp_name"]!=""){
            	//file upload code 
            	//set file upload settings 
            	$config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
            	$config['upload_path'] = './uploads/sliders/';
            	$config['encrypt_name'] = true;
				
				
				
            	$this->load->library('upload',$config);
				
            	if ($this->upload->do_upload('upload')) {
            	    $upload_data = $this->upload->data();

            	    //$data['cover_pic'] = $upload_data['file_name'];

            	    $save = array(
            	        'image'        => $upload_data['file_name'],
						'id'          => $this->input->post('id', TRUE)
            	    );
            	    $query = $this->Main_Model->slider_edit($save);
            	    if ($query) {
            	        $this->slider();
					} 
					else {
            	        echo "sorry requested failed pic.";
            	    }
				

            	} else {
            	        print_r($this->upload->display_errors());
				}
			}
			else{
				$save = array(
					'image'          => $this->input->post('old', TRUE),
					'id'          => $this->input->post('id', TRUE)
				);
				$query = $this->Main_Model->slider_edit($save);
				if ($query) {
					$this->slider();
				} 
				else {
					echo "sorry requested failed.";
				}
			}
		// }
	}

	public function slider_delete(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$query = $this->Main_Model->slider_delete($id);
			if($query){
				$this->slider();
			}
		}
		else{
			$this->load->view('login');
		}
	}



	// user controller

	public function upload_user(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('number', 'Number', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

 
        if ($this->form_validation->run() == FALSE){
            $this->load->view('user');
        }else{

			$save = array(
				'name'          => $this->input->post('name', TRUE),
				'number'        => $this->input->post('number', TRUE),
				'email'         => $this->input->post('email', TRUE),
				'password'      => $this->input->post('password', TRUE)
			);
			$query = $this->Main_Model->user_store($save);
			if ($query) {
				$this->user();
			} else {
				echo "sorry requested failed.";
			}
			

		}
	}

	public function user(){
		
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->user();
			$this->load->view('user',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function user_edit(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->user_view($id);
			$this->load->view('user_edit',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function user_edit_done(){
		// if (){
        //     $this->load->view('event');
        // }else{
            //get the form values
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('number', 'Number', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
	
	
			if ($this->form_validation->run() == FALSE){
				$this->load->view('user');
			}else{
	
				$save = array(
					'id'          => $this->input->post('id', TRUE),
					'name'          => $this->input->post('name', TRUE),
					'number'        => $this->input->post('number', TRUE),
					'email'         => $this->input->post('email', TRUE),
					'password'      => $this->input->post('password', TRUE)
				);
				$query = $this->Main_Model->user_edit($save);
				if ($query) {
					$this->user();
				} else {
					echo "sorry requested failed.";
				}
				
	
			}
		// }
	}

	public function user_delete(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$query = $this->Main_Model->user_delete($id);
			if($query){
				$this->user();
			}
		}
		else{
			$this->load->view('login');
		}
	}



	// event controller

	public function upload_event(){
		$this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
 
        if ($this->form_validation->run() == FALSE){
            $this->load->view('event');
        }else{
            
            //get the form values
            $data['title']    = $this->input->post('title', TRUE);
            $data['address']  = $this->input->post('address', TRUE);
            $data['description']  = $this->input->post('description', TRUE);
 
            //file upload code 
            //set file upload settings 
            $config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
            $config['upload_path'] = './uploads/events/';
            $config['encrypt_name'] = true;
            
 
            
            $this->load->library('upload',$config);
            
            if ($this->upload->do_upload('upload')) {
                $upload_data = $this->upload->data();

                //$data['cover_pic'] = $upload_data['file_name'];

                $save = array(
                    'image'        => $upload_data['file_name'],
                    'title'        => $this->input->post('title', TRUE),
                    'address'      => $this->input->post('address', TRUE),
                    'description'  => $this->input->post('description', TRUE)
                );
                $query = $this->Main_Model->event_store($save);
                if ($query) {
                    $this->event();
                } else {
                    echo "sorry requested failed.";
                }
                

            } else {
                    print_r($this->upload->display_errors());
			}
		}
	}

	public function event(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->event();
			$this->load->view('event', $result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function event_view(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->event_view($id);
			$this->load->view('event_view',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function event_edit(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->event_view($id);
			$this->load->view('event_edit',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function event_edit_done(){
		// if (){
        //     $this->load->view('event');
        // }else{
            //get the form values
            $data['title']    = $this->input->post('title', TRUE);
            $data['quantity'] = $this->input->post('quantity', TRUE);
            $data['price']    = $this->input->post('price', TRUE);
            $data['content']  = $this->input->post('content', TRUE);
	
	
	 		if($_FILES["upload"]["tmp_name"]!=""){
            	//file upload code 
            	//set file upload settings 
            	$config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
            	$config['upload_path'] = './uploads/events/';
            	$config['encrypt_name'] = true;
				
				
				
            	$this->load->library('upload',$config);
				
            	if ($this->upload->do_upload('upload')) {
            	    $upload_data = $this->upload->data();

            	    //$data['cover_pic'] = $upload_data['file_name'];

            	    $save = array(
            	        'image'        => $upload_data['file_name'],
            	        'id'         => $this->input->post('id', TRUE),
            	        'title'      => $this->input->post('title', TRUE),
            	        'address'   => $this->input->post('address', TRUE),
            	        'description'    => $this->input->post('description', TRUE)
            	    );
            	    $query = $this->Main_Model->event_edit($save);
            	    if ($query) {
            	        $this->event();
					} 
					else {
            	        echo "sorry requested failed pic.";
            	    }
				

            	} else {
            	        print_r($this->upload->display_errors());
				}
			}
			else{
				$save = array(
					'image'          => $this->input->post('old', TRUE),
					'id'           => $this->input->post('id', TRUE),
					'title'        => $this->input->post('title', TRUE),
					'address'      => $this->input->post('address', TRUE),
					'description'  => $this->input->post('description', TRUE)
				);
				$query = $this->Main_Model->event_edit($save);
				if ($query) {
					$this->event();
				} 
				else {
					echo "sorry requested failed.";
				}
			}
		// }
	}

	public function event_delete(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$query = $this->Main_Model->event_delete($id);
			if($query){
				$this->event();
			}
		}
		else{
			$this->load->view('login');
		}
	}

	// product controller

	public function upload_product(){
		$this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
 
        if ($this->form_validation->run() == FALSE){
            $this->load->view('product');
        }else{
            
            //get the form values
            $data['title']    = $this->input->post('title', TRUE);
            $data['quantity'] = $this->input->post('quantity', TRUE);
            $data['price']    = $this->input->post('price', TRUE);
            $data['content']  = $this->input->post('content', TRUE);
 
            //file upload code 
            //set file upload settings 
            $config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
            $config['upload_path'] = './uploads/products/';
            $config['encrypt_name'] = true;
            
 
            
            $this->load->library('upload',$config);
            
            if ($this->upload->do_upload('upload')) {
                $upload_data = $this->upload->data();

                //$data['cover_pic'] = $upload_data['file_name'];

                $save = array(
                    'pic'        => $upload_data['file_name'],
                    'title'      => $this->input->post('title', TRUE),
                    'quantity'   => $this->input->post('quantity', TRUE),
                    'price'      => $this->input->post('price', TRUE),
                    'content'    => $this->input->post('content', TRUE)
                );
                $query = $this->Main_Model->product_store($save);
                if ($query) {
                    $this->product();
                } else {
                    echo "sorry requested failed.";
                }
                

            } else {
                    print_r($this->upload->display_errors());
			}
		}
	}

	public function product(){
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->product();
			$this->load->view('product',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function product_view(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->product_view($id);
			$this->load->view('product_view',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function product_edit(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->product_view($id);
			$this->load->view('product_edit',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function product_edit_done(){
		// if (){
        //     $this->load->view('product');
        // }else{
            //get the form values
            $data['title']    = $this->input->post('title', TRUE);
            $data['quantity'] = $this->input->post('quantity', TRUE);
            $data['price']    = $this->input->post('price', TRUE);
            $data['content']  = $this->input->post('content', TRUE);
	
	
	 		if($_FILES["upload"]["tmp_name"]!=""){
            	//file upload code 
            	//set file upload settings 
            	$config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
            	$config['upload_path'] = './uploads/products/';
            	$config['encrypt_name'] = true;
				
				
				
            	$this->load->library('upload',$config);
				
            	if ($this->upload->do_upload('upload')) {
            	    $upload_data = $this->upload->data();

            	    //$data['cover_pic'] = $upload_data['file_name'];

            	    $save = array(
            	        'pic'        => $upload_data['file_name'],
            	        'id'         => $this->input->post('id', TRUE),
            	        'title'      => $this->input->post('title', TRUE),
            	        'quantity'   => $this->input->post('quantity', TRUE),
            	        'price'      => $this->input->post('price', TRUE),
            	        'content'    => $this->input->post('content', TRUE)
            	    );
            	    $query = $this->Main_Model->product_edit($save);
            	    if ($query) {
            	        $this->product();
					} 
					else {
            	        echo "sorry requested failed pic.";
            	    }
				

            	} else {
            	        print_r($this->upload->display_errors());
				}
			}
			else{
				$save = array(
					'pic'        => $this->input->post('old', TRUE),
					'id'         => $this->input->post('id', TRUE),
					'title'      => $this->input->post('title', TRUE),
					'quantity'   => $this->input->post('quantity', TRUE),
					'price'      => $this->input->post('price', TRUE),
					'content'    => $this->input->post('content', TRUE)
				);
				$query = $this->Main_Model->product_edit($save);
				if ($query) {
					$this->product();
				} 
				else {
					echo "sorry requested failed.";
				}
			}
		// }
	}

	public function product_delete(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$query = $this->Main_Model->product_delete($id);
			if($query){
				$this->product();
			}
		}
		else{
			$this->load->view('login');
		}
	}



	// news controller

	public function upload_news(){
		$this->form_validation->set_rules('title', 'Title', 'required');
 
        if ($this->form_validation->run() == FALSE){
            $this->load->view('news');
        }else{
            
            //get the form values
            $data['title']    = $this->input->post('title', TRUE);
            $data['description']  = $this->input->post('description', TRUE);
 
            //file upload code 
            //set file upload settings 
            $config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
            $config['upload_path'] = './uploads/news/';
            $config['encrypt_name'] = true;
            
 
            
            $this->load->library('upload',$config);
            
            if ($this->upload->do_upload('upload')) {
                $upload_data = $this->upload->data();

                //$data['cover_pic'] = $upload_data['file_name'];

                $save = array(
                    'image'        => $upload_data['file_name'],
                    'title'        => $this->input->post('title', TRUE),
                    'description'  => $this->input->post('description', TRUE)
                );
                $query = $this->Main_Model->news_store($save);
                if ($query) {
                    $this->news();
                } else {
                    echo "sorry requested failed.";
                }
                

            } else {
                    print_r($this->upload->display_errors());
			}
		}
	}

	public function news(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->news();
			$this->load->view('news', $result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function news_view(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->news_view($id);
			$this->load->view('news_view',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function news_edit(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->news_view($id);
			$this->load->view('news_edit',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function news_edit_done(){
		// if (){
        //     $this->load->view('news');
        // }else{
            //get the form values
            $data['title']    = $this->input->post('title', TRUE);
            $data['description']  = $this->input->post('description', TRUE);
	
	
	 		if($_FILES["upload"]["tmp_name"]!=""){
            	//file upload code 
            	//set file upload settings 
            	$config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
            	$config['upload_path'] = './uploads/news/';
            	$config['encrypt_name'] = true;
				
				
				
            	$this->load->library('upload',$config);
				
            	if ($this->upload->do_upload('upload')) {
            	    $upload_data = $this->upload->data();

            	    //$data['cover_pic'] = $upload_data['file_name'];

            	    $save = array(
            	        'image'        => $upload_data['file_name'],
            	        'id'         => $this->input->post('id', TRUE),
            	        'title'      => $this->input->post('title', TRUE),
            	        'description'    => $this->input->post('description', TRUE)
            	    );
            	    $query = $this->Main_Model->news_edit($save);
            	    if ($query) {
            	        $this->news();
					} 
					else {
            	        echo "sorry requested failed pic.";
            	    }
				

            	} else {
            	        print_r($this->upload->display_errors());
				}
			}
			else{
				$save = array(
					'image'          => $this->input->post('old', TRUE),
					'id'           => $this->input->post('id', TRUE),
					'title'        => $this->input->post('title', TRUE),
					'description'  => $this->input->post('description', TRUE)
				);
				$query = $this->Main_Model->news_edit($save);
				if ($query) {
					$this->news();
				} 
				else {
					echo "sorry requested failed.";
				}
			}
		// }
	}

	public function news_delete(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$query = $this->Main_Model->news_delete($id);
			if($query){
				$this->news();
			}
		}
		else{
			$this->load->view('login');
		}
	}


	// magazine controller



	public function uploadfiles($filename)
		{
		if (isset($_FILES['upload1']) && $_FILES['upload1']['name'] != ''){
	
			$config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png|pdf|csv';
			$config['upload_path'] = './uploads/magazines/';
			$config['encrypt_name'] = true;
			$this->load->library('upload',$config);
	
			if ($this->upload->do_upload($filename)) {
				$data = $this->upload->data();
				return $data;
			}else
			{
				$error = array('error' => $this->upload->display_errors());
				return false;
			}
		} 
	}
		// magazine controller
	public function upload_magazine(){
		if ($this->input->post('submit')){

			if (isset($_FILES['upload']) && $_FILES['upload']['name'] != ''){
				$file2 = $this->uploadfiles('upload');
			}  

			if (isset($_FILES['upload1']) && $_FILES['upload1']['name'] != ''){
				$file1 = $this->uploadfiles('upload1');
			}

			$save = array(
				'pdf'        => $file1['file_name'],
				'pic'        => $file2['file_name'],
				'title'        => $this->input->post('title', TRUE),
				'description'  => $this->input->post('description', TRUE)
			);
			$query = $this->Main_Model->magazine_store($save);
			if ($query) {
				$this->magazine();
			} else {
				echo "sorry requested failed.";
			}
		}
	}


	// public function upload_magazine(){
	// 	//$this->form_validation->set_rules('title', 'Title', 'required');


	// 	if ($this->input->post('submit')){
			
	// 		if (isset($_FILES['upload1']) && $_FILES['upload1']['name'] != ''){

	// 			$config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png';
    //             $config['upload_path'] = './uploads/magazines/';
	// 			$config['encrypt_name'] = true;
				
	// 			$this->load->library('upload',$config);

    //         	if ($this->upload->do_upload('upload1')) {
	// 				$upload_data1 = $this->upload->data();
	// 				echo $upload_data1['file_name'];
	// 			}

	// 		} 

	// 		if (isset($_FILES['upload']) && $_FILES['upload']['name'] != ''){

	// 			$config1['allowed_types'] = 'pdf|csv';
    //             $config1['upload_path'] = './uploads/magazines/';
	// 			$config1['encrypt_name'] = true;
				
	// 			$this->load->library('upload',$config1);

    //         	if ($this->upload->do_upload('upload')) {
	// 				$upload_data = $this->upload->data();
	// 				echo $upload_data['file_name'];
	// 			}
	// 		}
			


	// 	}



 
    //     // if ($this->form_validation->run() == FALSE){
    //     //     $this->load->view('magazine');
    //     // }else{
            
    //     //     //get the form values
    //     //     $data['title']    = $this->input->post('title', TRUE);
    //     //     $data['description']  = $this->input->post('description', TRUE);
 
    //     //     //file upload code 
    //     //     //set file upload settings 
    //     //     $config['allowed_types'] = 'jpg|jpeg|gif|bmp|webp|png|pdf|csv';
    //     //     $config['upload_path'] = './uploads/magazines/';
    //     //     $config['encrypt_name'] = true;
            
 
            
    //     //     $this->load->library('upload',$config);
            
    //     //     if ($this->upload->do_upload('upload')) {
    //     //         $upload_data = $this->upload->data();

    //     //         //$data['cover_pic'] = $upload_data['file_name'];

	// 	// 		if($this->upload->do_upload('upload1')){
	// 	// 			$upload_data1 = $this->upload->data();

	// 	// 			$save = array(
	// 	// 				'pdf'        => $upload_data['file_name'],
	// 	// 				'pic'        => $upload_data1['file_name'],
	// 	// 				'title'        => $this->input->post('title', TRUE),
	// 	// 				'description'  => $this->input->post('description', TRUE)
	// 	// 			);
	// 	// 			$query = $this->Main_Model->magazine_store($save);
	// 	// 			if ($query) {
	// 	// 				$this->magazine();
	// 	// 			} else {
	// 	// 				echo "sorry requested failed.";
	// 	// 			}
					


	// 	// 		}



    //     //     } else {
    //     //             print_r($this->upload->display_errors());
	// 	// 	}
	// 	// }
	// }

	public function magazine(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->magazine();
			$this->load->view('magazine', $result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function magazine_view(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->magazine_view($id);
			$this->load->view('magazine_view',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function magazine_edit(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->magazine_view($id);
			$this->load->view('magazine_edit',$result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function magazine_edit_done(){
		// if (){
        //     $this->load->view('magazine');
        // }else{
            //get the form values
            //$data['title']    = $this->input->post('title', TRUE);
            //$data['description']  = $this->input->post('description', TRUE);
	
			if($_FILES["upload"]["tmp_name"]!=""){
				if($_FILES["upload1"]["tmp_name"]!=""){
					if (isset($_FILES['upload']) && $_FILES['upload']['name'] != ''){
						$file2 = $this->uploadfiles('upload');
					}  
		
					if (isset($_FILES['upload1']) && $_FILES['upload1']['name'] != ''){
						$file1 = $this->uploadfiles('upload1');
					}

					$save = array(
						'pdf'          => $file1['file_name'],
						'pic'          => $file2['file_name'],
						'id'           => $this->input->post('id', TRUE),
						'title'        => $this->input->post('title', TRUE),
						'description'  => $this->input->post('description', TRUE)
					);
					// echo $file2['file_name'];
					// echo $file1['file_name'];
					// echo "both pic nd pdf";
				}
				else{
					if (isset($_FILES['upload']) && $_FILES['upload']['name'] != ''){
						$file2 = $this->uploadfiles('upload');
					}
					$save = array(
						'pdf'          => $this->input->post('old_pdf', TRUE),
						'pic'          => $file2['file_name'],
						'id'           => $this->input->post('id', TRUE),
						'title'        => $this->input->post('title', TRUE),
						'description'  => $this->input->post('description', TRUE)
					);
					//  echo $file2['file_name'];
					// echo "only pic";
				}
			}
			else{
				if($_FILES["upload1"]["tmp_name"]!=""){
					if (isset($_FILES['upload1']) && $_FILES['upload1']['name'] != ''){
						$file1 = $this->uploadfiles('upload1');
					}
					$save = array(
						'pdf'          => $file1['file_name'],
						'pic'          => $this->input->post('old_pic', TRUE),
						'id'           => $this->input->post('id', TRUE),
						'title'        => $this->input->post('title', TRUE),
						'description'  => $this->input->post('description', TRUE)
					);
					// echo $file1['file_name'];
					// echo "only pdf";
				}
				else{
					$save = array(
						'pdf'          => $this->input->post('old_pdf', TRUE),
						'pic'          => $this->input->post('old_pic', TRUE),
						'id'           => $this->input->post('id', TRUE),
						'title'        => $this->input->post('title', TRUE),
						'description'  => $this->input->post('description', TRUE)
					);
					// echo "none of them";
				}
			}
			$query = $this->Main_Model->magazine_edit($save);
			if ($query) {
				$this->magazine();
			} 
			else {
				echo "sorry requested failed.";
			}




	
	 		// if($_FILES["upload"]["tmp_name"]!=""){
            // 	//file upload code 
            // 	//set file upload settings 
            // 	$config['allowed_types'] = 'pdf|csv';
            // 	$config['upload_path'] = './uploads/magazines/';
            // 	$config['encrypt_name'] = true;
				
				
				
            // 	$this->load->library('upload',$config);
				
            // 	if ($this->upload->do_upload('upload')) {
            // 	    $upload_data = $this->upload->data();

            // 	    //$data['cover_pic'] = $upload_data['file_name'];

            // 	    $save = array(
            // 	        'pdf'        => $upload_data['file_name'],
            // 	        'id'         => $this->input->post('id', TRUE),
            // 	        'title'      => $this->input->post('title', TRUE),
            // 	        'description'    => $this->input->post('description', TRUE)
            // 	    );
            // 	    $query = $this->Main_Model->magazine_edit($save);
            // 	    if ($query) {
            // 	        $this->magazine();
			// 		} 
			// 		else {
            // 	        echo "sorry requested failed pic.";
            // 	    }
				

            // 	} else {
            // 	        print_r($this->upload->display_errors());
			// 	}
			// }
			// else{
			// 	$save = array(
			// 		'pdf'          => $this->input->post('old', TRUE),
			// 		'id'           => $this->input->post('id', TRUE),
			// 		'title'        => $this->input->post('title', TRUE),
			// 		'description'  => $this->input->post('description', TRUE)
			// 	);
			// 	$query = $this->Main_Model->magazine_edit($save);
			// 	if ($query) {
			// 		$this->magazine();
			// 	} 
			// 	else {
			// 		echo "sorry requested failed.";
			// 	}
			// }
		// }
	}

	public function magazine_delete(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$query = $this->Main_Model->magazine_delete($id);
			if($query){
				$this->magazine();
			}
		}
		else{
			$this->load->view('login');
		}
	}

	// order controller

	public function order(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->order();
			$this->load->view('order', $result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function orderdetail(){
		if($this->session->userdata('user')){
			$id = $this->uri->segment(3);
			$result['data']=$this->Main_Model->orderdetail($id);
			$this->load->view('orderdetail', $result);
			//echo $id;
		}
		else{
			$this->load->view('login');
		}
	}

	public function order_edit(){

		$save = array(
			'id'                 => $this->input->post('id', TRUE),
			'order_status'       => $this->input->post('order_type', TRUE)
		);
		$id = $this->input->post('id', TRUE);
		// echo $this->input->post('id', TRUE);
		// echo $this->input->post('order_type', TRUE);

		$query = $this->Main_Model->order_edit($save);

		if ($query) {
			$result['data']=$this->Main_Model->orderdetail($id);
			$this->load->view('orderdetail', $result);
		} else {
			echo "sorry requested failed.";
		}
		
	}
	
	// subscription controller

	public function subscribe(){
		$this->load->library('session');
		if($this->session->userdata('user')){
			$result['data']=$this->Main_Model->subscribe();
			$this->load->view('subscribe', $result);
		}
		else{
			$this->load->view('login');
		}
	}

	public function login_admin(){
		$this->load->library('session');
 
		$username = $_POST['username'];
		$password = $_POST['password'];
 
		$data = $this->Main_Model->login($username, $password);
 
		if($data){
			$this->session->set_userdata('user', $data);
			//$this->load->view('dashboard');
			$this->index();
		}
		else{
			$this->session->set_flashdata('error','Invalid login. User not found');
			redirect('../main');
		} 
	}
	
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('../main');
	}

}
