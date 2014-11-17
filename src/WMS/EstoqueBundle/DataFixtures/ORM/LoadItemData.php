<?php
namespace WMS\EstoqueBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use WMS\EstoqueBundle\Entity\Item;
 
class LoadItemData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $item001 = new Item();
        $item001->setItemNumber(030);
        $item001->setCost(2000);
        $item001->setDiscount(100);
        $item001->setPurchaseOrder($this->getReference('purchaseorder1'));
        $em->persist($item001);
        
        $item002 = new Item();
        $item002->setItemNumber(070);
        $item002->setCost(5000);
        $item002->setDiscount(250);
        $item002->setPurchaseOrder($this->getReference('purchaseorder2'));
        $em->persist($item002);
        
        $em->flush();
 
    }
 
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}