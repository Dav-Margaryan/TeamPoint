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

    }
}