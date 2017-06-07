<?php

namespace AppBundle\Entity;

/**
 * ItemComanda
 */
class ItemComanda
{

    public function getTotal() {
        return $this->quantity * $this->getProduct()->getPrice();
    }

    public function __toString()
    {
        $product = $this->getProduct();
        return $this->getTotal() . ' ron => ' . $this->getQuantity() . ' x ' . $product->getName() . ', ' . $product->getWidth() . 'x' .
            $product->getHeight() . ', ' . $product->getOpening() . ', ' . $product->getColor();
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var \AppBundle\Entity\Comanda
     */
    private $comanda;

    /**
     * @var \AppBundle\Entity\Product
     */
    private $product;


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
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return ItemComanda
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set comanda
     *
     * @param \AppBundle\Entity\Comanda $comanda
     *
     * @return ItemComanda
     */
    public function setComanda(\AppBundle\Entity\Comanda $comanda = null)
    {
        $this->comanda = $comanda;

        return $this;
    }

    /**
     * Get comanda
     *
     * @return \AppBundle\Entity\Comanda
     */
    public function getComanda()
    {
        return $this->comanda;
    }

    /**
     * Set product
     *
     * @param \AppBundle\Entity\Product $product
     *
     * @return ItemComanda
     */
    public function setProduct(\AppBundle\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \AppBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
