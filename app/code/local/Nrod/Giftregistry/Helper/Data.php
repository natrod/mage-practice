<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Nrod_Giftregistry_Helper_Data extends Mage_Payment_Helper_Data
{
    //test function to check the helper initialisationgit add 
    public function getTest()
    {
        return "If you can see this the module is working";
    }
	
	public function getEventTypes(){
		$collection = Mage::getModel('giftregistry/type')->getCollection();
		return $collection;
	}
	
	public function isRegistryOwner($registryCustomerId)
	{
		$currentCustomer = Mage::getSingleton('customer/session')->getCustomer();
		if($currentCustomer && $currentCustomer->getId() == $registryCustomerId)
			{
			return true;
			}
		return false;
	}
}