<?php
/* 
 * after finally getting a hang of the installer scripts, im writing an 
 * upgrade script to delete the type table re create it along with 
 */

$installer = Mage::getResourceModel('catalog/setup', 'catalog_setup');
$installer->startSetup();
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'hair_need', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'label'             => 'Hair Need',
    'input'             => 'select',
    'source'            => 'eav/entity_attribute_source_table',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 2,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'hair_usage', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'label'             => 'Hair Usage',
    'input'             => 'select',
    'class'             => '',
    'source'            => 'eav/entity_attribute_source_table',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 2,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));

$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'product_type', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'label'             => 'Product Type',
    'input'             => 'select',
    'source'            => 'eav/entity_attribute_source_table',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => true,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 2,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'scent_type', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Scent Type',
    'input'             => 'select',
    'class'             => '',
    'source'            => 'eav/entity_attribute_source_table',
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
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'size_format', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Size Format',
    'input'             => 'select',
    'class'             => '',
    'source'            => 'eav/entity_attribute_source_table',
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

/*
 * 
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'created_by', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Product Owner',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
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
    'is_configurable'   => false,
));
 
 * * 
 */
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'product_faq', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Faq',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 0,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'type_product', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Product Type',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 0,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));

/*
 * 
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'video_gallery', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Video Gallery',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 0,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));
 * 
 */
$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'youtube', array(
    'group'             => 'General',
    'type'              => 'varchar',
    'backend'           => '',
    'frontend'          => '',
    'label'             => 'Youtube ID',
    'input'             => 'text',
    'class'             => '',
    'source'            => '',
    'global'            => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible'           => true,
    'required'          => false,
    'user_defined'      => true,
    'searchable'        => false,
    'filterable'        => 0,
    'comparable'        => false,
    'visible_on_front'  => false,
    'unique'            => false,
    'apply_to'          => 'simple,configurable,bundle,grouped',
    'is_configurable'   => false,
));


/*
 * Setting Config Values
 * 
 */
 // config set up code starts
$config = new Mage_Core_Model_Config();
$config->saveConfig('general/store/information_name','Moroccanoil');
$config->saveConfig('general/store/information_phone','1 888-700-1817');

$config->saveConfig('design/package/name','rwd');
$config->saveConfig('design/theme/template','moroccanoil');
$config->saveConfig('design/theme/skin','moroccanoil');
$config->saveConfig('design/theme/layout','moroccanoil');
$config->saveConfig('design/theme/default','enterprise');
$config->saveConfig('design/head/default_title','Moroccanoil® Official Site | Hair & Body products | Shop Online');
$config->saveConfig('design/head/title_suffix','| Moroccanoil');
$config->saveConfig("design/head/default_description","Moroccanoil Official Site. Creators of the original Moroccanoil Treatment, Moroccanoil offers luxury hair care and body care products. Innovative, easy-to-use, performance-driven formulas dramatically transform all hair types resulting in beautiful, healthy, natural-looking hair. As the pioneer of an all-new oil treatment hair care category, Moroccanoil has become a runaway hit among fashion and beauty insiders and has generated a devoted following among top stylists and their A-list celebrity clients. Famed for its weightless, residue-free quality, Moroccanoil's extensive line of luxury hair care products addresses the needs of all hair types and features a proprietary advanced blend of the finest ingredients to deliver optimal performance and dramatic results.");
$config->saveConfig('design/head/default_keywords','moroccanoil, moroccan oil, morocanoil, morroccanoil, morrocanoil, moroccanoil.com, Moroccanoil Treatment, moroccanoil salon locator, moroccanoil body care, moroccanoil hair care');
$config->saveConfig('design/header/logo_alt','Moroccanoil');
$config->saveConfig('design/footer/copyright','&copy; 2014 Moroccanoil. All Rights Reserved.');

// config setup code ends 
unset($config);
$installer->endSetup();