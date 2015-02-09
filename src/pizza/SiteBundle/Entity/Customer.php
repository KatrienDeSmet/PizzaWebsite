<?php

namespace pizza\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Customer
 *
 * @ORM\Table(name="Customer")
 * @ORM\Entity(repositoryClass="pizza\SiteBundle\Entity\CustomerRepository")
 */
class Customer
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
     * @ORM\Column(name="Firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="Lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="Street", type="string", length=255)
     */
    private $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="Housenumber", type="integer")
     */
    private $housenumber;

     /**
     * @ORM\ManyToOne(targetEntity="City", inversedBy="citys", cascade={"persist"})
     */
    private $cityId;

    /**
     * @ORM\ManyToOne(targetEntity="Phone", inversedBy="customer", cascade={"persist"})
     * @ORM\JoinColumn(name="phone_id", referencedColumnName="id")
     **/
    private $phone;


    /**
     * @ORM\OneToOne(targetEntity="Users", mappedBy="customerId", cascade={"persist"})
     **/
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="Bestelling", mappedBy="customerId", cascade={"persist"})
     */
    protected $bestelling;

    /**
     * @ORM\ManyToMany(targetEntity="Rekening", inversedBy="customerId", cascade={"persist"})
     **/
    protected $rekeningen;


    public function __construct()
    {
        $this->bestelling = new ArrayCollection();
        $this->rekeningen = new ArrayCollection();
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
     * Set firstname
     *
     * @param string $firstname
     * @return Customer
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firtsname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Customer
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Customer
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set housenumber
     *
     * @param integer $housenumber
     * @return Customer
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;

        return $this;
    }

    /**
     * Get housenumber
     *
     * @return integer 
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    

    /**
     * Set cityId
     *
     * @param string $cityId
     * @return Customer
     */
    public function setCityId($cityId)
    {
        $this->cityId = $cityId;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCityId()
    {
        return $this->cityId;
    }

    /**
     * Set phoneId
     *
     * @param integer $phoneId
     * @return Customer
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phoneId
     *
     * @return integer 
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
