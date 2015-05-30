<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$installer=$this;
$installer->startSetup();
$tableName=$installer->getTable('giftregistry/type');

if($installer->getConnection()->isTableExists($tableName) !=true)
{
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('type_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, 
            null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
            ),
                'Type Id'
        )
        ->addColumn('website_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Website Id'
        )
        ->addColumn('registry_type', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
            array(),
            'Registry Type'
        )
        ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'active'
        )
        ->addColumn('event_comments', Varien_Db_Ddl_Table::TYPE_TEXT, 
        255,
        array(),
            'Comments'
        )
        ->addIndex($installer->getIdxName('giftregistry/type', 
array('website_id')),
            array('website_id'))
       ->addIndex($installer->getIdxName('giftregistry/type', 
            array('type_id')),
            array('type_id'))  
        ->addForeignKey(
            $installer->getFkName(
                'giftregistry/type',
                'website_id',
                'core/website',
                'website_id'
            ),
            'website_id', $installer->getTable('core/website'), 
'website_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
    
    
    $installer->getConnection()->createTable($table);
}
$installer->endSetup();