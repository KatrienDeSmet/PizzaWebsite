<?php

namespace pizza\SiteBundle\Entity;
use pizza\SiteBundle\Entity\Pizza;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Bestelling
 *
 * @ORM\Table(name="Bestelling")
 * @ORM\Entity(repositoryClass="pizza\SiteBundle\Entity\BestellingRepository")
 */
class Bestelling
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
     * @ORM\ManyToOne(targetEntity="Bestelbon", inversedBy="bestelbon", cascade={"persist"})
     * @ORM\JoinColumn(name="bestelbon_id", referencedColumnName="id", nullable=false)
     */
    private $bestelbonId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Totaal", type="integer")
     */
    private $totaal;

    /**
     * @ORM\OneToOne(targetEntity="Korting", inversedBy="bestelling", cascade={"persist"})
     * @ORM\JoinColumn(name="korting_id", referencedColumnName="id")
     **/
    private $kortingId;


    /**
     * @ORM\OneToMany(targetEntity="Rekening", mappedBy="bestellingId", cascade={"persist"})
     */
    protected $order;

    public function __construct()
    {
        $this->order = new ArrayCollection();

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
     * Set bestelbonId
     *
     * @param integer $bestelbonId
     * @return Bestelling
     */
    public function setBestelbonId($bestelbonId)
    {
        $this->bestelbonId = $bestelbonId;

        return $this;
    }

    /**
     * Get bestelbonId
     *
     * @return integer 
     */
    public function getBestelbonId()
    {
        return $this->bestelbonId;
    }


    /**
     * Set totaal
     *
     * @param integer $totaal
     * @return Bestelling
     */
    public function setTotaal($totaal)
    {
        $this->totaal = $totaal;

        return $this;
    }

    /**
     * Get totaal
     *
     * @return integer 
     */
    public function getTotaal()
    {
        return $this->totaal;
    }


    /**
     * Set kortingId
     *
     * @param integer $kortingId
     * @return Bestelling
     */
    public function setKortingId($kortingId)
    {
        $this->kortingId = $kortingId;

        return $this;
    }

    /**
     * Get kortingId
     *
     * @return integer 
     */
    public function getKortingId()
    {
        return $this->kortingId;
    }
}
