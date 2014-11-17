<?php

namespace WMS\EstoqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 */
class Item
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $item_number;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var string
     */
    private $cost;

    /**
     * @var string
     */
    private $discount;

    /**
     * @var \WMS\EstoqueBundle\Entity\PurchaseOrder
     */
    private $PurchaseOrder;


    public function __construct()
    {
        $this->created_at = new \DateTime("now");
        $this->updated_at = new \DateTime("now");
    }
    
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set item_number
     *
     * @param integer $itemNumber
     * @return Item
     */
    public function setItemNumber($itemNumber)
    {
        $this->item_number = $itemNumber;

        return $this;
    }

    /**
     * Get item_number
     *
     * @return integer 
     */
    public function getItemNumber()
    {
        return $this->item_number;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Item
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Item
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set cost
     *
     * @param string $cost
     * @return Item
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set discount
     *
     * @param string $discount
     * @return Item
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return string 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set PurchaseOrder
     *
     * @param \WMS\EstoqueBundle\Entity\PurchaseOrder $purchaseOrder
     * @return Item
     */
    public function setPurchaseOrder(\WMS\EstoqueBundle\Entity\PurchaseOrder $purchaseOrder = null)
    {
        $this->PurchaseOrder = $purchaseOrder;

        return $this;
    }

    /**
     * Get PurchaseOrder
     *
     * @return \WMS\EstoqueBundle\Entity\PurchaseOrder 
     */
    public function getPurchaseOrder()
    {
        return $this->PurchaseOrder;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }
}
