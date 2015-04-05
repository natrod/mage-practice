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

echo "<pre>";
$model=Mage::getModel('giftregistry/entity');
//$model=new Nrod_Giftregistry_Model_Type;
$helper=Mage::helper('giftregistry');
echo $helper->getTest();
$model->setEvent('Wedding');
print_r( $model->getData());

/*
$host='localhost';
$dbname='magento_dev01';
$username="root";
$password="mydb123";
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$sql = 'select * from catalog_product_entity ';
 
$q = $conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
$r=$q->fetch();
    print_r($r);

    
*/