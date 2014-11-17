<?php
namespace WMS\EstoqueBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use WMS\EstoqueBundle\Entity\PurchaseOrder;
 
class LoadPurchaseOrderData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $purchaseorder1 = new PurchaseOrder();
        $purchaseorder1->setOrderNumber(0000000001);
        $purchaseorder1->setTotalCost(4000);
        $purchaseorder1->setTotalDiscount(200);
        
        $em->persist($purchaseorder1);
        
        $purchaseorder2 = new PurchaseOrder();
        $purchaseorder2->setOrderNumber(0000000002);
        $purchaseorder2->setTotalCost(10000);
        $purchaseorder2->setTotalDiscount(500);
        
        $em->persist($purchaseorder2);
        
        $em->flush();
 
        $this->addReference('purchaseorder1', $purchaseorder1);
        $this->addReference('purchaseorder2', $purchaseorder2);
    }
 
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}