<?php

class Main_Model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

// functions of model for login start

    public function login($username, $password){
        $query = $this->db->get_where('admins', array('username'=>$username, 'password'=>$password));
        return $query->row_array();
    }

    function event_count(){
        $totalRows = $this->db->count_all('events');
        return $totalRows;
    }

    function product_count(){
        $totalRows = $this->db->count_all('products');
        return $totalRows;
    }

    function news_count(){
        $totalRows = $this->db->count_all('news');
        return $totalRows;
    }

    function magazine_count(){
        $totalRows = $this->db->count_all('magazines');
        return $totalRows;
    }
    
    function user_count(){
        $totalRows = $this->db->count_all('users');
        return $totalRows;
    }
    
    function order_count(){
        $totalRows = $this->db->count_all('orders');
        return $totalRows;
    }

    function subscribe_count(){
        $totalRows = $this->db->count_all('subscriptions');
        return $totalRows;
    }

// functions of model for login end

// functions of model for slider start

    //save slider data to db
	function slider_store($save){
		$query = $this->db->insert('sliders',$save);
		return $query;
	}

    //view of slider list
    function slider(){
        $query = $this->db->query("select * from sliders order by id DESC");
		return $query->result();
    }
    
    //view of individual slider by id
    function slider_view($id){
        $query = $this->db->get_where('sliders', array('id'=>$id));
		return $query->result();
    }

    //edit slider by id
    function slider_edit($save){
        $this->db->where(array('id' => $save['id']));
        $this->db->update('sliders', $save);
		return true;
    } 

    //delete individual slider by id
    function slider_delete($id){
        $query = $this->db->delete('sliders', array('id' => $id));
        return $query;
    }

// functions of model for slider end

// functions of model for user start

    //save user data to db
	function user_store($save){
		$query = $this->db->insert('users',$save);
		return $query;
	}

    //view of user list
    function user(){
        $query = $this->db->query("select * from users order by id DESC");
		return $query->result();
    }
    
    //view of individual user by id
    function user_view($id){
        $query = $this->db->get_where('users', array('id'=>$id));
		return $query->result();
    }

    //edit user by id
    function user_edit($save){
        $this->db->where(array('id' => $save['id']));
        $this->db->update('users', $save);
		return true;
    } 

    //delete individual user by id
    function user_delete($id){
        $query = $this->db->delete('users', array('id' => $id));
        return $query;
    }

// functions of model for user end

// functions of model for event start

    //save event data to db
	function event_store($save){
		$query = $this->db->insert('events',$save);
		return $query;
	}

    //view of event list
    function event(){
        $query = $this->db->query("select * from events order by id DESC");
		return $query->result();
    }
    
    //view of individual event by id
    function event_view($id){
        $query = $this->db->get_where('events', array('id'=>$id));
		return $query->result();
    }

    //edit event by id
    function event_edit($save){
        $this->db->where(array('id' => $save['id']));
        $this->db->update('events', $save);
		return true;
    } 

    //delete individual event by id
    function event_delete($id){
        $query = $this->db->delete('events', array('id' => $id));
        return $query;
    }

// functions of model for event end

// functions of model for product start

    //save product data to db
	function product_store($save){
		$query = $this->db->insert('products',$save);
		return $query;
	}

    //view of product list
    function product(){
        $query = $this->db->query("select * from products order by id DESC");
		return $query->result();
    }
    
    //view of individual product by id
    function product_view($id){
        $query = $this->db->get_where('products', array('id'=>$id));
		return $query->result();
    }

    //edit product by id
    function product_edit($save){
        $this->db->where(array('id' => $save['id']));
        $this->db->update('products', $save);
		return true;
    } 

    //delete individual product by id
    function product_delete($id){
        $query = $this->db->delete('products', array('id' => $id));
        return $query;
    }

// functions of model for product end

// functions of model for news start

    //save news data to db
	function news_store($save){
		$query = $this->db->insert('news',$save);
		return $query;
	}

    //view of news list
    function news(){
        $query = $this->db->query("select * from news order by id DESC");
		return $query->result();
    }
    
    //view of individual new by id
    function news_view($id){
        $query = $this->db->get_where('news', array('id'=>$id));
		return $query->result();
    }

    //edit news by id
    function news_edit($save){
        $this->db->where(array('id' => $save['id']));
        $this->db->update('news', $save);
		return true;
    } 

    //delete individual news by id
    function news_delete($id){
        $query = $this->db->delete('news', array('id' => $id));
        return $query;
    }

// functions of model for news end

// functions of model for magazine start

    //save magazine data to db
	function magazine_store($save){
		$query = $this->db->insert('magazines',$save);
		return $query;
	}

    //view of magazine list
    function magazine(){
        $query = $this->db->query("select * from magazines order by id DESC");
		return $query->result();
    }
    
    //view of individual new by id
    function magazine_view($id){
        $query = $this->db->get_where('magazines', array('id'=>$id));
		return $query->result();
    }

    //edit magazine by id
    function magazine_edit($save){
        $this->db->where(array('id' => $save['id']));
        $this->db->update('magazines', $save);
		return true;
    } 

    //delete individual magazine by id
    function magazine_delete($id){
        $query = $this->db->delete('magazines', array('id' => $id));
        return $query;
    }

// functions of model for magazine end

// functions of model for orders start
    function order(){
        $query = $this->db->query("select * from orders order by id DESC");
        return $query->result();
    }

    function orderdetail($id){
        $query = $this->db->get_where('orders', array('id'=>$id));
		return $query->result();
    }

    function order_edit($save){
        $this->db->where(array('id' => $save['id']));
        $this->db->update('orders', $save);
		return true;
    }
// functions of model for orders end

// functions of model for subscribe start
    function subscribe(){
        //$this->db->join('subscriptions', 'subscriptions.number = users.number', 'inner');
        //$query = $this->db->get();
        $query = $this->db->query("SELECT subscriptions.id, subscriptions.number, users.name, subscriptions.amount, subscriptions.create_on
                                    FROM subscriptions
                                    INNER JOIN users
                                    ON subscriptions.number=users.number
                                    order by id DESC ;"
                                    );
        return $query->result();
    }
// functions of model for subscribe end


}

?>