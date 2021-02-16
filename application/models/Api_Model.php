<?php

class Api_Model extends CI_Model{

    function fetch_slider(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('sliders');
    }

    function fetch_event(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('events');
    }

    function fetch_news(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('news');
    }

    function fetch_product(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('products');
    }

    function fetch_magazine(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('magazines');
    }

    function fetch_slider_limit(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('sliders', '10');
    }

    function fetch_event_limit(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('events', '10');
    }

    function fetch_news_limit(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('news', '10');
    }

    function fetch_product_limit(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('products', '10');
    }

    function fetch_magazine_limit(){
        $this->db->order_by('id', 'DESC');
        return $this->db->get('magazines', '10');
    }
    
    function insert_new_user($data){
        $this->db->insert('newsignup', $data);
    }

    function confirm_otp($data){
        $this->db->where(array('name' => $data['name'], 'number' => $data['number'], 'email' => $data['email'], 'password' => $data['password'], 'otp' => $data['otp'])); 
        $query = $this->db->get('newsignup');
        if($query->num_rows() > 0){
            $this->db->delete('newsignup', array('number' => $data['number']));
            $this->db->insert('users', array('name' => $data['name'], 'number' => $data['number'], 'email' => $data['email'], 'password' => $data['password']));
            return true;
        }
        else{
            return false;
        }
    }

    function insert_user($data){
        $this->db->insert('users', $data);
    }

    public function login($username, $password){
        $this->db->select('name, number, email, address, user_type');
        $query = $this->db->get_where('users', array('number'=>$username, 'password'=>$password));
        return $query;
    }

    function insert_password_otp($data){
        $this->db->insert('passwordotps', $data);
    }

    function forget_password($data){
        $this->db->where(array('number' => $data['number'], 'otp' => $data['otp'])); 
        $query = $this->db->get('passwordotps');
        if($query->num_rows() > 0){
            $this->db->delete('passwordotps', array('number' => $data['number']));
            $this->db->where(array('number' => $data['number']));
            $this->db->update('users', array('password' => $data['password']));
            return true;
        }
        else{
            return false;
        }


        $this->db->where(array('number' => $number));
        $this->db->update('users', array('password'=>$password));
		return true;
    }
    
    function change($data){
        if($this->db->where(array('number' => $data['number'], 'password' => $data['oldpassword']))){
            $this->db->update('users', array('password'=>$data['newpassword']));
            return true;
        }
        else{
            return false;
        }
    }
    
    function order_count(){
        $totalRows = $this->db->count_all('orders');
        return $totalRows;
    }

    function save_order($data){
        $this->db->insert('orders', $data);
        return true;
    }
    
    function product_view($product_id){
        $this->db->select('quantity');
        $query = $this->db->get_where('products', array('id'=>$product_id));
		return $query;
    }

    function update_product($data){
        $this->db->where(array('id' => $data['id']));
        $this->db->update('products', $data);
		return true;
    }
    
    function order_view($number){
        $this->db->select('order_id, product_id, quantity, amount, txnid, created_on');
        $query = $this->db->get_where('orders', array('number'=>$number));
		return $query;
    }

    function product_name($productid){
        $this->db->select('title');
        $query = $this->db->get_where('products', array('id'=>$productid));
		return $query;
    }
    
    function update_user_address($data){
        $this->db->where(array('number' => $data['number']));
        $this->db->update('users', $data);
		return true;
    }
    
    function subscribe_add($data){
        $this->db->insert('subscriptions', $data);
        return true;
    }
    
    function user_type($data1){
        $this->db->where(array('number' => $data1['number']));
        $this->db->update('users', $data1);
		return true;
    }
    
    function subscribe_view($number){
        $this->db->select('amount, create_on');
        $query = $this->db->get_where('subscriptions', array('number'=>$number));
		return $query;
    }
}

?>