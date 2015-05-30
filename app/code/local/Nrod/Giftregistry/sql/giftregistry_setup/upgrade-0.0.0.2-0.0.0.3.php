<?php
/* 
 * after finally getting a hang of the installer scripts, im writing an 
 * upgrade script to delete the type table re create it along with 
 */
$installer=$this;
$installer->startSetup();

//Deleting the type table
$tableName=$installer->getTable('giftregistry/type');


//took this little nugget from app\code\core\Mage\Catalog\sql\catalog_setup\mysql4-install-1.4.0.0.0.php
if($installer->getConnection()->isTableExists($tableName))
{    
    $installer->run("DROP TABLE $tableName");
}
//recreating the Type table
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
        ->addColumn('code', Varien_Db_Ddl_Table::TYPE_TEXT, 
            null,
            array(
                'nullable' => false,
            ),
                'Code'
        )
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 
            null,
            array(
                'nullable' => false,
            ),
                'Name'
        )
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 
            null,
            array(
                'nullable' => false,
            ),
                'Description'
        )
        ->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Store Id'
        )
        ->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, 
            null,
            array(
                'unsigned' => true,
                'nullable' => false,
                'default' => '0',
            ),
            'Active'
        )
        ->addIndex($installer->getIdxName('giftregistry/type', 
        array('store_id')),
            array('store_id'))
        ->addIndex($installer->getIdxName('giftregistry/type', 
            array('type_id')),
            array('type_id'))
        ->addForeignKey(
            $installer->getFkName(
                'giftregistry/type',
                'store_id',
                'core/store',
                'website_id'
            ),
            'store_id', $installer->getTable('core/store'), 
'store_id',
            Varien_Db_Ddl_Table::ACTION_CASCADE, Varien_Db_Ddl_Table::ACTION_CASCADE);
         $installer->getConnection()->createTable($table);
}
$installer->endSetup();