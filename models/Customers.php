<?php

class Customers extends MainModel {
    private $_table = 'customers';

    public function genActKey(){
        $unique = false;
        $hash = '';
        while(!$unique) {
            $hash = substr(hash('sha256', uniqid(mt_rand(), true) . microtime()), 0, 32);

            $check_existence = $this->getCustomers(array('activation_key' => $hash), array('id'));
            if (empty($check_existence))
                $unique = true;
        }

        return $hash;
    }

    public function getCustomers($search = array(),$columns = array()){
        $where = array();
        if(!empty($search['id']))
            $where[] = 'id = '.abs(intval($search['id']));
        if(!empty($search['username']))
            $where[] = 'username = "'.trim(htmlspecialchars($search['username'])).'"';
        if(!empty($search['activation_key']))
            $where[] = 'activation_key = "'.trim(htmlspecialchars($search['activation_key'])).'"';

        $where = !empty($where)?('Where '.implode(' AND ',$where)):'';
        $select = !empty($columns)?(implode(',',$columns)):' * ';

        $query = "
            Select 
                {$select} 
            From 
                {$this->_table} 
            {$where}";

        return $this->db->query($query)->fetchAll();
    }

    public function addCustomer($data){
        $insert = ' (';
        foreach ($data as $key => $value)
            $insert .= "'".$value."',";

        $insert = substr($insert, 0, -1).") ";

        $this->db->query("INSERT INTO customers (username,name,lastname,pw,is_active,activation_key) values {$insert}");
        return $this->db->lastInsertId();
    }

    public function updateCustomer($id,$data){
        $update = '';
        foreach ($data as $key => $value)
            $update .= $key." = '".$value."',";

        $update = substr($update, 0, -1)." ";

        $this->db->query('UPDATE customers set '.$update.' where id = '.$id);
    }
}