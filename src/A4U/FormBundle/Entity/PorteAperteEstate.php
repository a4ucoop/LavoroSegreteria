<?php

namespace A4U\FormBundle\Entity;

use Gedmo\Timestampable;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * PorteAperteEstate
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PorteAperteEstate
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
     * @ORM\Column(name="birthplace", type="string", length=128)
     */
    private $birthPlace;

    /**
     * @ORM\ManyToOne(targetEntity="A4U\DataBundle\Entity\StuAnagScuole", inversedBy="stages")
     * @ORM\JoinColumn(name="attendedSchool_id", referencedColumnName="idRecord")
     */
    protected $attendedSchool;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hasAttendedToOtherActivities", type="boolean")
     */
    private $hasAttendedToOtherActivities;

    /**
     * @var string
     *
     * @ORM\Column(name="activity", type="string", length=128, nullable=true)
     */
    private $activity;

    /**
     * @var string
     *
     * @ORM\Column(name="otherActivity", type="string", length=128, nullable=true)
     */
    private $otherActivity;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=128, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="otherReference", type="string", length=128, nullable=true)
     */
    private $otherReference;

    /**
     * @var string
     *
     * @ORM\Column(name="unicamCourse", type="string", length=128)
     */
    private $unicamCourse;

    /**
     * @var string
     *
     * @ORM\Column(name="fiscalcode", type="string", length=128)
     */
    private $fiscalcode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submissiondate", type="datetimetz")
     * @Gedmo\Timestampable(on="create")
     */
    private $submissionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservationdate", type="datetimetz")
     * @Gedmo\Timestampable(on="create")
     */
    private $reservationDate;



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
     * @return PorteAperteEstate
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
     * @return PorteAperteEstate
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
     * @return PorteAperteEstate
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
     * @return PorteAperteEstate
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
     * @return PorteAperteEstate
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
     * @return PorteAperteEstate
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
     * @return PorteAperteEstate
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
        if($this->birthDate !== null)
            return $this->birthDate->format('m/d/Y');
        else
            return "N/A";
    }

    /**
     * Set birthPlace
     *
     * @param string $birthPlace
     * @return PorteAperteEstate
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
     * Set hasAttendedToOtherActivities
     *
     * @param boolean $hasAttendedToOtherActivities
     * @return PorteAperteEstate
     */
    public function setHasAttendedToOtherActivities($hasAttendedToOtherActivities)
    {
        $this->hasAttendedToOtherActivities = $hasAttendedToOtherActivities;

        return $this;
    }

    /**
     * Get hasAttendedToOtherActivities
     *
     * @return boolean 
     */
    public function getHasAttendedToOtherActivities()
    {
        return $this->hasAttendedToOtherActivities;
    }

    /**
     * Get hasAttendedToOtherActivities as string
     *
     * @return string
     */
    public function getHasAttendedToOtherActivitiesAsString()
    {
        return var_export($this->hasAttendedToOtherActivities, True);
    }

    /**
     * Set activity
     *
     * @param string $activity
     * @return PorteAperteEstate
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string 
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Set otherActivity
     *
     * @param string $otherActivity
     * @return PorteAperteEstate
     */
    public function setOtherActivity($otherActivity)
    {
        $this->otherActivity = $otherActivity;

        return $this;
    }

    /**
     * Get otherActivity
     *
     * @return string 
     */
    public function getOtherActivity()
    {
        return $this->otherActivity;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return PorteAperteEstate
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set otherReference
     *
     * @param string $otherReference
     * @return PorteAperteEstate
     */
    public function setOtherReference($otherReference)
    {
        $this->otherReference = $otherReference;

        return $this;
    }

    /**
     * Get otherReference
     *
     * @return string 
     */
    public function getOtherReference()
    {
        return $this->otherReference;
    }

    /**
     * Set unicamCourse
     *
     * @param string $unicamCourse
     * @return PorteAperteEstate
     */
    public function setUnicamCourse($unicamCourse)
    {
        $this->unicamCourse = $unicamCourse;

        return $this;
    }

    /**
     * Get unicamCourse
     *
     * @return string 
     */
    public function getUnicamCourse()
    {
        return $this->unicamCourse;
    }

    /**
     * Set fiscalcode
     *
     * @param string $fiscalcode
     * @return PorteAperteEstate
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
     * @return PorteAperteEstate
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
     * Get submissionDate as string
     *
     * @return \DateTime
     */
    public function getSubmissionDateAsString()
    {
        return $this->submissionDate->format('m/d/Y');
    }

    /**
     * Set reservationDate
     *
     * @param \DateTime $reservationDate
     * @return PorteAperteEstate
     */
    public function setReservationDate($reservationDate)
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    /**
     * Get reservationDate
     *
     * @return \DateTime 
     */
    public function getReservationDate()
    {
        return $this->reservationDate;
    }

    /**
     * Get reservationDate as string
     *
     * @return string
     */
    public function getReservationDateAsString()
    {
        if($this->reservationDate !== null)
            return $this->reservationDate->format('m/d/Y');
        else
            return "N/A";
    }

    /**
     * Set attendedSchool
     *
     * @param \A4U\DataBundle\Entity\StuAnagScuole $attendedSchool
     * @return PorteAperteEstate
     */
    public function setAttendedSchool(\A4U\DataBundle\Entity\StuAnagScuole $attendedSchool = null)
    {
        $this->attendedSchool = $attendedSchool;

        return $this;
    }

    /**
     * Get attendedSchool
     *
     * @return \A4U\DataBundle\Entity\StuAnagScuole 
     */
    public function getAttendedSchool()
    {
        return $this->attendedSchool;
    }
}
