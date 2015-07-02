<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nrod_Giftregistry_Model_Mysql4_Type_Collection extends 
Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('giftregistry/type');
        parent::_construct();
    }
}