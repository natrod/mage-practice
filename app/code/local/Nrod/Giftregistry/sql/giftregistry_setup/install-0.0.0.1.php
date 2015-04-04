<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$installer=$this;
$installer->startSetup();
$tableName=$installer->getTable('giftregistry/entity');

if($installer->getConnection()->isTableExists($tableName) !=true)
{
    
    $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
            ),
                'Entity Id'
        )
        ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Customer Id'
        )
        ->addColumn('type_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
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
        ->addColumn('event_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
            array(),
            'Event Name'
        )
        ->addColumn('event_date', Varien_Db_Ddl_Table::TYPE_DATE, 
            null,
            array(),
            'Event Date'
        )
        ->addColumn('event_country', Varien_Db_Ddl_Table::TYPE_TEXT, 
            3,
            array(),
            'Event Country'
        )
        ->addColumn('event_location', Varien_Db_Ddl_Table::TYPE_TEXT, 
        255,
        array(),
            'Event Location'
        )
        ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, 
null,
            array(
                'nullable' => false,
            ),
            'Created At')
        ->addIndex($installer->getIdxName('giftregistry/entity', 
array('customer_id')),
            array('customer_id'))
        ->addIndex($installer->getIdxName('giftregistry/entity', 
array('website_id')),
            array('website_id'))
        ->addIndex($installer->getIdxName('giftregistry/entity', 
array('type_id')),
            array('type_id'))
        ->addForeignKey(
            $installer->getFkName(
                'giftregistry/entity',
                'customer_id',
                'customer/entity',
                'entity_id'
            ),
            'customer_id', $installer->getTable('customer/entity'), 
'entity_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey(
            $installer->getFkName(
                'giftregistry/entity',
                'website_id',
                'core/website',
                'website_id'
            ),
            'website_id', $installer->getTable('core/website'), 
'website_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
        ->addForeignKey(
            $installer->getFkName('giftregistry/entity',
                'type_id',
                'giftregistry/type',
                'type_id'
            ),
            'type_id', $installer->getTable('giftregistry/type'), 
'type_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
    
    
    $installer->getConnection()->createTable($table);

$tableName=$installer->getTable('giftregistry/type');

$table1 = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('type_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
            ),
                'Entity Id'
        )
        ->addColumn('code', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
            array(),
                'Code'
        )
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
            array(),
                'Name'
        )
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 255,
            array(),
                'Description'
        )
        ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0'
            ),
                'Store'
        )

        ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0'
            ),
                'Is Active'
        );
        $installer->getConnection()->createTable($table1);
    
$installer->endSetup();
}