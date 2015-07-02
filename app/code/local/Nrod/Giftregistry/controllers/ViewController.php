<?php
class Nrod_Giftregistry_ViewController extends Mage_Core_Controller_Front_Action
{
	public function indexAction(){
		$this->_forward('view');
	}	
	public function viewAction()
	{
		$registryId = $this->getRequest()->getParam('registry_id');
		if($registryId){
			$entity = Mage::getModel('giftregistry/entity');
			Mage::register('loaded_registry', $entity);
			$this->loadLayout();
			$this->_initLayoutMessages('customer/session');
			$this->renderLayout();
			return $this;
		}
	}
}