<?php

namespace A4U\FormBundle\Entity;

use Gedmo\Timestampable;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Generico
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Generico
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
     * @ORM\Column(name="name", type="string", length=128)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=128)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=32)
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=128)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=128)
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetimetz")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="birthplace", type="string", length=255)
     */
    private $birthPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="fiscalcode", type="string", length=128)
     */
    private $fiscalcode;

    /**
     * @var string
     *
     * @ORM\Column(name="attendedactivity", type="string", length=255)
     */
    private $attendedActivity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submissiondate", type="datetimetz")
     * @Gedmo\Timestampable(on="create")
     */
    private $submissionDate;




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
     * Set name
     *
     * @param string $name
     * @return Generico
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Generico
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    
        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Generico
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set cap
     *
     * @param string $cap
     * @return Generico
     */
    public function setCap($cap)
    {
        $this->cap = $cap;
    
        return $this;
    }

    /**
     * Get cap
     *
     * @return string 
     */
    public function getCap()
    {
        return $this->cap;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Generico
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Generico
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return PorteAperteEstate
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     * @return Generico
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    
        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime 
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Get birthDate as string
     *
     * @return string 
     */
    public function getBirthDateAsString()
    {
        return $this->birthDate->format('m/d/Y');
    }

    /**
     * Set birthPlace
     *
     * @param string $birthPlace
     * @return Generico
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;
    
        return $this;
    }

    /**
     * Get birthPlace
     *
     * @return string 
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * Set fiscalcode
     *
     * @param string $fiscalcode
     * @return Generico
     */
    public function setFiscalcode($fiscalcode)
    {
        $this->fiscalcode = $fiscalcode;
    
        return $this;
    }

    /**
     * Get fiscalcode
     *
     * @return string 
     */
    public function getFiscalcode()
    {
        return $this->fiscalcode;
    }

    /**
     * Set submissionDate
     *
     * @param \DateTime $submissionDate
     * @return Generico
     */
    public function setSubmissionDate($submissionDate)
    {
        $this->submissionDate = $submissionDate;
    
        return $this;
    }

    /**
     * Get submissionDate
     *
     * @return \DateTime 
     */
    public function getSubmissionDate()
    {
        return $this->submissionDate;
    }

    /**
     * Set attendedActivity
     *
     * @param string $attendedActivity
     * @return Generico
     */
    public function setAttendedActivity($attendedActivity)
    {
        $this->attendedActivity = $attendedActivity;

        return $this;
    }

    /**
     * Get attendedActivity
     *
     * @return string 
     */
    public function getAttendedActivity()
    {
        return $this->attendedActivity;
    }
}
