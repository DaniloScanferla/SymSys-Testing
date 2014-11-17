<?php

namespace WMS\EstoqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseOrder
 */
class PurchaseOrder
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $order_number;

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
    private $total_cost;

    /**
     * @var string
     */
    private $total_discount;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $itens;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created_at = new \DateTime("now");
        $this->updated_at = new \DateTime("now");
        
        $this->itens = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set order_number
     *
     * @param integer $orderNumber
     * @return PurchaseOrder
     */
    public function setOrderNumber($orderNumber)
    {
        $this->order_number = $orderNumber;

        return $this;
    }

    /**
     * Get order_number
     *
     * @return integer 
     */
    public function getOrderNumber()
    {
        return $this->order_number;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return PurchaseOrder
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
     * @return PurchaseOrder
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
     * Set total_cost
     *
     * @param string $totalCost
     * @return PurchaseOrder
     */
    public function setTotalCost($totalCost)
    {
        $this->total_cost = $totalCost;

        return $this;
    }

    /**
     * Get total_cost
     *
     * @return string 
     */
    public function getTotalCost()
    {
        return $this->total_cost;
    }

    /**
     * Set total_discount
     *
     * @param string $totalDiscount
     * @return PurchaseOrder
     */
    public function setTotalDiscount($totalDiscount)
    {
        $this->total_discount = $totalDiscount;

        return $this;
    }

    /**
     * Get total_discount
     *
     * @return string 
     */
    public function getTotalDiscount()
    {
        return $this->total_discount;
    }

    /**
     * Add itens
     *
     * @param \WMS\EstoqueBundle\Entity\Item $itens
     * @return PurchaseOrder
     */
    public function addIten(\WMS\EstoqueBundle\Entity\Item $itens)
    {
        $this->itens[] = $itens;

        return $this;
    }

    /**
     * Remove itens
     *
     * @param \WMS\EstoqueBundle\Entity\Item $itens
     */
    public function removeIten(\WMS\EstoqueBundle\Entity\Item $itens)
    {
        $this->itens->removeElement($itens);
    }

    /**
     * Get itens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItens()
    {
        return $this->itens;
    }
    
    public function __toString()
    {
        return (string)$this->getOrderNumber() ? (string)$this->getOrderNumber() : "";
    }
}
