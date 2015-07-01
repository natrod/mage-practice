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
 
    public function  updateRegistryData(Mage_Customer_Model_Customer $customer, $data)
    {
     
       try
       {
           if(!empty($data))
            {
            $this->setCustomerId($customer->getId());
            $this->setWebsiteId($customer->getWebsiteId());
            $this->setTypeId($data['type_id']);
            $this->setEventName($data['event_name']);
            $this->setEventDate($data['event_date']);
            $this->setEventCountry($data['event_country']);
            $this->setEventLocation($data['event_location']);


             }
           else{
               throw new Exception ("Error Processing Request Insufficient Data in Nrod_Giftregistry_Model_Entity:updateRegistryData()");
           }
           
           
       }
       catch(Exception $e)
       {
           Mage::logException($e->getMessage());
       }
       return $this;
     }
    
}