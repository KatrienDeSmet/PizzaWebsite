<?php

namespace pizza\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bestelbon
 *
 * @ORM\Table(name="Bestelbon")
 * @ORM\Entity
 */
class Bestelbon
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
     * @var integer
     *
     * @ORM\Column(name="aantal", type="integer")
     */
    private $aantal;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="Itempizza", type="object")
     */
    private $itempizza;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="pizzas", cascade={"persist"})
     * @ORM\JoinColumn(name="categorie_Id", referencedColumnName="id")
     */
    private $categorieId;

    /**
     * @ORM\OneToMany(targetEntity="Bestelling", mappedBy="bestelbonId", cascade={"persist", "all"})
     */
    protected $bestelbon;

    public function __construct()
    {
        $this->bestelbon = new ArrayCollection();
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
     * Set aantal
     *
     * @param integer $aantal
     * @return Bestelbon
     */
    public function setAantal($aantal)
    {
        $this->aantal = $aantal;

        return $this;
    }

    /**
     * Get aantal
     *
     * @return integer 
     */
    public function getAantal()
    {
        return $this->aantal;
    }

    /**
     * Set itempizza
     *
     * @param \stdClass $itempizza
     * @return Bestelbon
     */
    public function setItemPizza($itempizza)
    {
        $this->itempizza = $itempizza;

        return $this;
    }

    /**
     * Get itempizza
     *
     * @return \stdClass 
     */
    public function getItemPizza()
    {
        return $this->itempizza;
    }

    /**
     * Set categorieId
     *
     * @param integer $categorieId
     * @return Bestelbon
     */
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get categorieId
     *
     * @return string 
     */
    public function getCategorieId()
    {
        return $this->categorieId;
    }

}
