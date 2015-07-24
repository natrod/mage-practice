<?php
/* 
 * after finally getting a hang of the installer scripts, im writing an 
 * upgrade script to delete the type table re create it along with 
 */

$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');


$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'scent_type', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Scent Type',
    'input'             => 'select',
    'class'             => '',
    'source'            => 'eav/entity_attribute_source_table',
    'option' 			=>array ( 'values' => array ( 0 => 'Floral',)),
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 0,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => true,
));
$installer->endSetup();