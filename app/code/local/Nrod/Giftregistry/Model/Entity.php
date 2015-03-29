<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */

class Nrod_Giftregistry_Model_Entity extends Mage_Core_Model_Abstract
{
 
    public function __construct() {
        $this->_init('giftregistry/entity');
        parent::_construct();

    }
 
    public function getTest()
    {
        return "Model Entity Working as expected";
    }
}