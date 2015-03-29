<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

class Nrod_Giftregistry_Model_Item extends Mage_Core_Model_Abstract
{
  
    public function __construct() {
        $this->_init('giftregistry/item');
        parent::_construct();

    }

    public function getTest()
    {
        return "Model Item Working as expected";
    }
}