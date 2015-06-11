<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magento.com for more information.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright  Copyright (c) 2006-2014 X.commerce, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Nrod_Giftregistry_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function deleteAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function editAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function newPostAction()
    {
        $data=$this->getRequest()->getParams();
        $registry = Mage::getModel('giftregistry/entity');
        $customer = Mage::getSingleton('customer/session')->getCustomer();
        try{
           if($this->getRequest()->isPost() && !empty($data)){
                  $registry->updateRegistryData($customer, $data);
            $registry->save();
            $successMessage = Mage::helper('mdg_giftregistry')->__('Registry Successfully Created');
            Mage::getSingleton('core/session')->addSuccess($successMessage);
        }else{
            throw new Exception("Insufficient Data provided");
        }

               
           }
           catch (Mage_Core_Exception $e){}
        }
        
        
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function editPostAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
     public function preDispatch()
    {
        parent::preDispatch(); 
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->getResponse()->setRedirect(Mage::helper('customer')->getLoginUrl());
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }

}
