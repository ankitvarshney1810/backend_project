<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once (APPPATH . 'assets/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
class Service extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Api_Model');
		$this->load->library(array('form_validation', 'session'));
        $this->load->database();
    }
            
    function slider(){
        $data = $this->Api_Model->fetch_slider();
        $sliders=array('status'=>200,"error"=>false,'sliderlist'=>$data->result_array());
        echo json_encode($sliders);
    }

    function event(){
        $data = $this->Api_Model->fetch_event();
        $events=array('status'=>200,"error"=>false,'eventlist'=>$data->result_array());
        echo json_encode($events);
    }

    function news(){
        $data = $this->Api_Model->fetch_news();
        $news=array('status'=>200,"error"=>false,'newslist'=>$data->result_array());
        echo json_encode($news);
    }

    function product(){
        $data = $this->Api_Model->fetch_product();
        $products=array('status'=>200,"error"=>false,'productlist'=>$data->result_array());
        echo json_encode($products);
    }

    function magazine(){
        $data = $this->Api_Model->fetch_magazine();
        $magazines=array('status'=>200,"error"=>false,'magazinelist'=>$data->result_array());
        echo json_encode($magazines);
    }

    function newsignup(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('number', 'Number', 'required|is_unique[users.number]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $otp = rand(1000,9999);
        $key = '338f3ae527cb43ae2dc733f6a86ac44a';
        $senderid = 'LIVSTK';
        $number = $this->input->post('number');
        $message = 'Dear+User,+Your+one+time+password+is+'.$otp;
        if($this->form_validation->run()){
            $data = array(
                'name'            =>          $this->input->post('name'),
                'number'          =>          $this->input->post('number'),
                'email'           =>          $this->input->post('email'),
                'password'        =>          $this->input->post('password'),
                'otp'             =>          $otp
            );

            $this->Api_Model->insert_new_user($data);
            $array = array(
                'status'            =>          200,
                'error'             =>          false,
                'msg'                =>          'OTP Send Succesfully.'
            );
            echo json_encode($array);
            redirect("http://site.ping4sms.com/api/smsapi?key=$key&route=2&sender=$senderid&number=$number&sms=$message");
        }
        else{
            $array = array(
                'status'             =>          201,
                'error'              =>          true,
                'msg'                =>          'Email or Mobile Numebr is already exist.'
            );
            echo json_encode($array);
        }


    }

    function signup(){
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('number', 'Number', 'required|is_unique[users.number]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('otp', 'Otp', 'required');
        if($this->form_validation->run()){
            $data = array(
                'name'            =>          $this->input->post('name'),
                'number'          =>          $this->input->post('number'),
                'email'           =>          $this->input->post('email'),
                'password'        =>          $this->input->post('password'),
                'otp'             =>          $this->input->post('otp')
            );
    
            if($this->Api_Model->confirm_otp($data)){
                $array = array(
                    'status'            =>          200,
                    'error'             =>          false,
                    'msg'               =>          'SignUp Succesfully.'
                );
            }
            else{
                $array = array(
                    'status'            =>          201,
                    'error'             =>          True,
                    'msg'               =>          'OTP is Incorrect.'
                );
            }
        }
        else{
            $array = array(
                'status'             =>          201,
                'error'              =>          true,
                'msg'                =>          'Email or Mobile Numebr is already exist.'
            );
        }

        echo json_encode($array);
    }



    function signin(){
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run()){
            $username = $_POST['username'];
            $password = $_POST['password'];
     
            $data = $this->Api_Model->login($username, $password);
            
            if(empty($data)){
                $array = array(
                    'status'             =>          201,
                    'error'              =>          true,
                    'msg'                =>          'Username or Password is not Found.'
                );
            }
            else{
                $array = array(
                    'status'            =>          200,
                    'error'             =>          false,
                    'msg'               =>          'SignIn Succesfully.',
                    'userinfo'          =>          $data->result_array()
                );
            }

        }
        else{
            $array = array(
                'status'             =>          201,
                'error'              =>          true,
                'msg'                =>          'Username or Password is Required.'
            );
        }
        echo json_encode($array);
    }
      
    function dashboard(){
        $slider = $this->Api_Model->fetch_slider_limit();
        $event = $this->Api_Model->fetch_event_limit();
        $news = $this->Api_Model->fetch_news_limit();
        $product = $this->Api_Model->fetch_product_limit();
        $magazine = $this->Api_Model->fetch_magazine_limit();
        $dashboard=array('status'=>200,
                         'error'=>false,
                         'sliderlist'=>$slider->result_array(),
                         'eventlist'=>$event->result_array(),
                         'newslist'=>$news->result_array(),
                         'productlist'=>$product->result_array(),
                         'magazinelist'=>$magazine->result_array()
                        );
        echo json_encode($dashboard);
    }
    
    function forgetpasswordotp(){
        $this->form_validation->set_rules('number', 'Number', 'required|is_unique[users.number]');
        $otp = rand(1000,9999);
        $key = '338f3ae527cb43ae2dc733f6a86ac44a';
        $senderid = 'LIVSTK';
        $number = $this->input->post('number');
        $message = 'Dear+User,+Your+one+time+password+is+'.$otp;
        if(!$this->form_validation->run()){
            $data = array(
                'number'          =>          $this->input->post('number'),
                'otp'             =>          $otp
            );
            
            $this->Api_Model->insert_password_otp($data);
            $url = "http://site.ping4sms.com/api/smsapi?key=$key&route=2&sender=$senderid&number=$number&sms=$message";
            $data = file_get_contents($url);
            $array = array(
                'status'            =>          200,
                'error'             =>          false,
                'msg'               =>          'OTP Send Succesfully.'
            );
        }
        else{
            $array = array(
                'status'             =>          201,
                'error'              =>          true,
                'msg'                =>          'Mobile Numebr is not exist.'
            );
        }
        echo json_encode($array);

    }


    function forgetpassword(){        

        $number    =  $this->input->post('number');
        $otp       =  $this->input->post('otp');
        $password  =  $this->input->post('password');
        $data = array(
            'number'    =>   $number,
            'otp'       =>   $otp,
            'password'  =>   $password
        );
            
        if($this->Api_Model->forget_password($data)){
            $array = array(
                'status'            =>          200,
                'error'             =>          false,
                'msg'               =>          'Password Succesfully Changed.'
            );
        }
        else{
            $array = array(
                'status'            =>          201,
                'error'             =>          True,
                'msg'               =>          'OTP is Incorrect.'
            );
        }




        // if($otp === '1234'){
        //     $data = $this->Api_Model->forget($number, $password);
        //     if($data == true){
        //         $array = array(
        //             'status'            =>          200,
        //             'error'             =>          false,
        //             'msg'               =>          'Password Change Succesfully.'
        //         );
        //     }
        //     else{
        //         $array = array(
        //             'status'             =>          201,
        //             'error'              =>          true,
        //             'msg'                =>          'Number is not found.'
        //         );
        //     }
        // }
        // else{
        //     $array = array(
        //         'status'             =>          201,
        //         'error'              =>          true,
        //         'msg'                =>          'OTP is Invalid.'
        //     );
        // }

        echo json_encode($array);
    }
    
    function changepassword(){
        $number       =  $this->input->post('number');
        $oldpassword  =  $this->input->post('oldpassword');
        $newpassword  =  $this->input->post('newpassword');
        $data = array(
            'number'            =>          $number,
            'oldpassword'       =>          $oldpassword,
            'newpassword'       =>          $newpassword
        );
        $data = $this->Api_Model->change($data);
        if($data){
            $array = array(
                'status'            =>          200,
                'error'             =>          false,
                'msg'               =>          'Password Change Succesfully.'
            );
        }
        else{
            $array = array(
                'status'             =>          201,
                'error'              =>          true,
                'msg'                =>          'Something went wrong.'
            );
        }
        echo json_encode($array);
    }
    
    public function booking(){
        $amount     =  $this->input->post('amount');
        $order_count = $this->Api_Model->order_count();
        $api = new Api('rzp_test_yfnX8IXmx5sFa4', 'PTXrjAm5FkHSgYF5XdjftQ6t');
		$order = $api->order->create(array('receipt' => 'receipt_'.$order_count, 'amount' => $amount*100, 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; // Get the created Order ID

        $response = array(
            'status'            =>          '200',
            'error'             =>          false,
            'order_id'          =>          $orderId,
            'msg'               =>          'Order Generated Succesfully.'
        );
		echo json_encode( $response );
		exit();
	}
	
	public function buynow(){
        $payment_status = $this->input->post('paystatus');
        $product_id     = $this->input->post('productid');
        $quantity       = $this->input->post('quantity');
        date_default_timezone_set("Asia/Kolkata");
        $currentstamp = date("Y-m-d H:i:s");
        if($payment_status === 'success'){
            $query = $this->Api_Model->product_view($product_id);
            foreach($query->result() as $row) {
                $pre_quantity = $row->quantity;
            }
            $new_quantity = $pre_quantity - $quantity;
            $data = array(
                'id'            =>  $product_id,
                'quantity'      =>  $new_quantity
            );
            $this->Api_Model->update_product($data);
        }
        $data = array(
            'order_id'         =>  $this->input->post('orderid'),
            'product_id'       =>  $this->input->post('productid'),
            'quantity'         =>  $this->input->post('quantity'),
            'amount'           =>  $this->input->post('amount'),
            'number'           =>  $this->input->post('number'),
            'address'          =>  $this->input->post('address'),
            'txnid'            =>  $this->input->post('txnid'),
            'payment_status'   =>  $this->input->post('paystatus'),
            'order_status'     =>  'order placed',
            'created_on'       =>  $currentstamp
        );
        $data = $this->Api_Model->save_order($data);
        if($data){
            if($payment_status === 'success'){
                $response = array(
                    'status'            =>          '200',
                    'error'             =>          false,
                    'msg'               =>          'Order Placed Succesfully.'
                );
             }
             else{
                $response = array(
                    'status'            =>          '201',
                    'error'             =>          true,
                    'msg'               =>         'Order Placed Failed.'
                );
            }
        }

		echo json_encode( $response );
		exit();
    }
    
    function orderlist(){
        $number =  $this->input->post('number');
        $query = $this->Api_Model->order_view($number);
        $orderlistj=array();
        foreach($query->result() as $row) {
            $orderid     =  $row->order_id;
            $productid   =  $row->product_id;
            $quantity    =  $row->quantity;
            $amount      =  $row->amount;
            $txnid       =  $row->txnid;
            $orderstatus =  $row->order_status;
            $created_on  =  $row->created_on;
           
            $query = $this->Api_Model->product_name($productid);
            foreach($query->result() as $row) {
                $productname = $row->title;
            }
            $orderlistj1=array(
                'productname'    => $productname,
                'orderid'        => $orderid,
                'quantity'       => $quantity,
                'amount'         => $amount,
                'txnid'          => $txnid,
                'orderstatus'    => $orderstatus,
                'created_on'     => $created_on
            );
            array_push($orderlistj,$orderlistj1);
        }
        $orderlist=array(
            'status'            =>          '200',
            'error'             =>          false,
            'orderlist'         =>          $orderlistj
        );
        echo json_encode( $orderlist );
        exit();
    }
    
    function useraddress(){
        $data = array(
            'number'        =>  $this->input->post('number'),
            'address'       =>  $this->input->post('address')
        );
        $query = $this->Api_Model->update_user_address($data);
        if($query){
            $response = array(
                'status'            =>          '200',
                'error'             =>          false,
                'msg'               =>          'Address Update Succesfully.'
            );
        }
        else{
            $response = array(
                'status'            =>          '201',
                'error'             =>          true,
                'msg'               =>         'Address Update Failed.'
            );
        }
        echo json_encode( $response );
		exit();
    }
    
    function subscribe(){
        date_default_timezone_set('Asia/Kolkata');
        $expire_date = date('Y-m-d h:i:s', strtotime('+1 years'));
        $data = array(
            'number'       =>  $this->input->post('number'),
            'amount'       =>  $this->input->post('amount'),
            'expire'       =>  $expire_date
        );
        $query = $this->Api_Model->subscribe_add($data);
        $data1 = array(
            'number'       =>   $this->input->post('number'),
            'user_type'    =>   'subscribe'
        );
        $query1 = $this->Api_Model->user_type($data1);
        if($query){
            $response = array(
                'status'            =>          '200',
                'error'             =>          false,
                'msg'               =>          'Subscribe Succesfully.'
            );
        }
        else{
            $response = array(
                'status'            =>          '201',
                'error'             =>          true,
                'msg'               =>         'Subscribe Failed.'
            );
        }
        echo json_encode( $response );
		exit();
    }
    
    function subscribeview(){
        $number =  $this->input->post('number');
        $query = $this->Api_Model->subscribe_view($number);
        $subscribelistj=array();
        foreach($query->result() as $row) {
            $amount      =  $row->amount;
            $created_on  =  $row->create_on;
            $subscribelistj1 =  array(
                'amount'         => $amount,
                'created_on'     => $created_on
            );
            array_push($subscribelistj,$subscribelistj1);
        }
        $subscribelist=array(
            'status'            =>          '200',
            'error'             =>          false,
            'subscribelist'     =>          $subscribelistj
        );
        echo json_encode( $subscribelist );
        exit();
    }
}

?>