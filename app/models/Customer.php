<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author Оксана
 */
class Customer extends Model 
{
      
    function __construct()
    {
        $this->table_name = "customer";
        $this->id_column = "customer_id";
    }
     public static function register($param) {

        $db = new DB();

        $sql = "INSERT INTO customer (last_name, first_name, email, telephone, city, password) "
                . "VALUES (:last_name, :first_name, :email, :telephone, :city, md5(:password))";
        $db = new DB();
        $add = $db->query($sql, $param);
        if ($add) {
            return true;
        }
    }
    
    
    
      
     
    
}
