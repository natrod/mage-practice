<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once('app/Mage.php'); //Path to Magento
umask(0);
Mage::app();
ini_set('display_errors', 1);


$model=Mage::getModel('catalog/product')->load(1);
$helper=Mage::helper('giftregistry');
echo $helper->getTest();

