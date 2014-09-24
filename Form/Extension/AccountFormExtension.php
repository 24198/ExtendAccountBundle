<?php

namespace Madia\Bundle\ExtendAccountBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

class AccountFormExtension extends AbstractTypeExtension
{
    
    /**
     * build the orocrm_account form
     * since you're listing (in this case) to a specific form (orocrm_account)
     * you can modify it to your own extend.
     * 
     * In this case I wanted custom (many-to-one) fields being placed in the general
     * section and use the oro_user_select since it looks better in the frontend than
     * the oro_entity_select field type.
     * 
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //get additional field(s)
        $additionalFieldBuilder = $builder->get('additional');
        
        //check if your custom field exists.
        if($additionalFieldBuilder->has('product_owner')) {
            //remove your custom field.
            $additionalFieldBuilder->remove('product_owner');
        }
        
        //check if your second custom field exists.
        if($additionalFieldBuilder->has('account_manager')) {
            //remove your second custom field.
            $additionalFieldBuilder->remove('account_manager');
        }        
        /**
         * add the custom fields to the "general section of the Account form"
         * use the normal $builder->add() like you would with any form
         */
        $builder->add(
            'product_owner',
            'oro_user_select',
            array('required' => false, 'label' => 'madia.account.form.product_owner')
        );

        $builder->add(
            'account_manager',
            'oro_user_select',
            array('required' => false, 'label' => 'madia.account.form.account_manager')
        );

    }    
    
    /**
     * Returns the name of the type being extended.
     *
     * @return string The name of the type being extended
     */
    public function getExtendedType()
    {
        return 'orocrm_account';
    }
}
