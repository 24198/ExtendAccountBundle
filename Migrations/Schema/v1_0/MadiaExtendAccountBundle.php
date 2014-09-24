<?php

namespace Madia\Bundle\ExtendAccountBundle\Migrations\Schema\v1_0;

use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\MigrationBundle\Migration\Migration;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;

class MadiaExtendAccountBundle implements Migration, ExtendExtensionAwareInterface {
    
    protected $extendExtension;

    public function setExtendExtension(ExtendExtension $extendExtension) {
        $this->extendExtension = $extendExtension;
    }    
    
    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function up(Schema $schema, QueryBag $queries) {
        // @codingStandardsIgnoreStart
        $extendExtension = $this->extendExtension;
        /** extend table orocrm_account **/
        $table = $schema->getTable('orocrm_account');

        /**
         * define and add our custom fields
         */
        $extendExtension->addManyToOneRelation(
            $schema, //schema 
            $table, //table name (in which you'll add the field)
            'product_owner', //column name
            'oro_user', //target table name
            'id', //target column name
            [
                'extend' => ['owner' => ExtendScope::OWNER_CUSTOM]
            ]
        );        

        $extendExtension->addManyToOneRelation(
            $schema,
            $table,
            'account_manager',
            'oro_user',
            'id',
            [
                'extend' => ['owner' => ExtendScope::OWNER_CUSTOM]
            ]
        );        
    }
}
