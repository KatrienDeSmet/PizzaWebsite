<?php

namespace pizza\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorie
 *
 * @ORM\Table(name="Categorie")
 * @ORM\Entity(repositoryClass="pizza\SiteBundle\Entity\CategorieRepository")
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(name="size", type="string", length=255)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;


    /**
     *
     * @ORM\OneToMany(targetEntity="Bestelbon", mappedBy="categorieId", cascade={"persist"})
     *
     */
    protected $pizzas;

    
    public function construct()
    {

        $this->pizzas = new ArrayCollection();
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
     * Set size
     *
     * @param string $size
     * @return Categorie
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set Price
     *
     * @param integer $price
     * @return Categorie
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get Price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }
}
