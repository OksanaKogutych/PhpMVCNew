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
}
