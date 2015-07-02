<?php
class Nrod_Giftregistry_Block_list extends Mage_Core_Block_Template
{
	public function getCustomerRegistries()
	{
		$currentCustomer = Mage::getSingleton('customer/session')->getCustomer();
		if($currentCustomer)
		{
			$collection = Mage::getModel('giftregistry/entity')
			->getCollection()
			->addFieldToFilter('customer_id',$currentCustomer->getId());
		}
		
		return $collection;
	}
	
	
}