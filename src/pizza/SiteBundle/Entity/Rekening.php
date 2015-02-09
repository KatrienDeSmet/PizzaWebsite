<?php

namespace pizza\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rekening
 *
 * @ORM\Table(name="Rekening")
 * @ORM\Entity
 */
class Rekening
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
     * @ORM\ManyToOne(targetEntity="Bestelling", inversedBy="order", cascade={"persist"})
     * @ORM\JoinColumn(name="Bestelling_id", referencedColumnName="id")
     */
    private $bestellingId;

    
    /**
     * @ORM\ManyToMany(targetEntity="Rekening", mappedBy="rekeningen", cascade={"persist"})
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")   
     **/
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="betaald", type="string", length=255)
     */
    private $betaald;


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
     * Set customerId
     *
     * @param integer $userpizzaId
     * @return Rekening
     */
    public function setBestellingId($bestellingId)
    {
        $this->bestellingId = $bestellingId;

        return $this;
    }

    /**
     * Get cutomerId
     *
     * @return integer 
     */
    public function geBestellingId()
    {
        return $this->bestellingId;
    }


    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return Rekening
     */
    public function setCustomerId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->userId;
    }


    /**
     * Get betaald
     *
     * @return string 
     */
    public function getBetaald()
    {
        return $this->betaald;
    }

    /**
     * Set bestelbonId
     *
     * @param integer $bestelbonId
     * @return Rekening
     */
    public function setBetaald($betaald)
    {
        $this->betaald = $betaald;

        return $this;
    }
}
