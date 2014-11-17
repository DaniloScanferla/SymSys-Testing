<?php

namespace WMS\EstoqueBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PurchaseOrderType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('order_number')
            ->add('created_at')
            ->add('updated_at')
            ->add('total_cost')
            ->add('total_discount')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WMS\EstoqueBundle\Entity\PurchaseOrder'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wms_estoquebundle_purchaseorder';
    }
}
