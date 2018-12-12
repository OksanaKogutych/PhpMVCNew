<?php

/**
 * Class Product
 */
class Product extends Model
{

    /**
     * Product constructor.
     */
    function __construct()
    {
        $this->table_name = "products";
        $this->id_column = "id";
    }
    public function validationData($values) {
        $validation = array();
        foreach ($values as $key => $value) {
            $validation[$key] = htmlspecialchars($value, ENT_COMPAT);
        }
        return $validation;
    }
       
        
    
 public function editItem($id,$values) {
        $values = $this->validationData($values);
        $db = new DB();
        $sql = "UPDATE products SET sku = :sku, name = :name, price = :price, qty = :qty WHERE id = $id";
        $add = $db->insert($sql, $values);
        if ($add) {
            return 'succes';
        } else {
            return 'error';
        }
        
    }
    public function addItem($values) {
        $values = $this->validationData($values);
        $db = new DB();
        $sql = "INSERT INTO products (sku, name, price, qty) VALUES (:sku, :name, :price, :qty)";
        $add = $db->insert($sql, $values);
        
    }
}