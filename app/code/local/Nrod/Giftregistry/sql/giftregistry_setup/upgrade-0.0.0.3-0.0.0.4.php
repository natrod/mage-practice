<?php
/* 
 * after finally getting a hang of the installer scripts, im writing an 
 * upgrade script to delete the type table re create it along with 
 */
$installer=$this;
$installer->startSetup();

//Deleting the type table
$tableName=$installer->getTable('giftregistry/item');


//recreating the Type table
if($installer->getConnection()->isTableExists($tableName) !=true)
{
        $table = $installer->getConnection()
        ->newTable($tableName)
        ->addColumn('item_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
				'primary'   => true,
                
            ),
                'Type Id'
        )
        ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                
            ),
                'Entity Id'
        )
		->addColumn('registry_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 
            null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                
            ),
                'Entity Id'
        )
        ->addColumn('added_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, 
            null,
            array(
                'nullable' => false,
            ),
                'Name'
        )
        
        ->addIndex($installer->getIdxName('giftregistry/item', 
        array('product_id')),
            array('product_id'))
        ->addIndex($installer->getIdxName('giftregistry/item', 
            array('registry_id')),
            array('registry_id'))
        ->addForeignKey(
            $installer->getFkName(
                'giftregistry/item',
                'product_id',
                'catalog/product',
                'entity_id'
            ),
            'product_id', $installer->getTable('catalog/product'), 
'entity_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE)
			>addForeignKey(
            $installer->getFkName(
                'giftregistry/item',
                'registry_id',
                'giftregistry/entity'
                'registry_id'
            ),
            'registry_id', $installer->getTable('giftregistry/item'), 
'entity_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
         $installer->getConnection()->createTable($table);
}
$installer->endSetup();