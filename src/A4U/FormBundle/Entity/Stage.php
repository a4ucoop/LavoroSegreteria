<?php

namespace A4U\FormBundle\Entity;

use Gedmo\Timestampable;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Stage
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
     * @ORM\Column(name="address", type="string", length=128)
     */
    private $address;
 
 
    /**
     * @var string
     *
     * @ORM\Column(name="cap", type="string", length=128)
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
     * @ORM\Column(name="birthDate", type="datetimetz")
     */
    private $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="birthPlace", type="string", length=128)
     */
    private $birthPlace;

    /**
     * @ORM\ManyToOne(targetEntity="A4U\DataBundle\Entity\StuAnagScuole", inversedBy="stages")
     * @ORM\JoinColumn(name="attendedSchool_id", referencedColumnName="idRecord")
     */
    protected $attendedSchool;

    /**
     * @var string
     *
     * @ORM\Column(name="fiscalcode", type="string", length=128)
     */
    private $fiscalcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="schoolYear", type="integer")
     */
    private $schoolYear;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookContact", type="string", length=128, nullable=true)
     */
    private $facebookContact;

    /**
     * @var string
     *
     * @ORM\Column(name="stagePeriod", type="string", length=128, nullable=true)
     */
    private $stagePeriod;

    /**
     * @var string
     *
     * @ORM\Column(name="firstStudyField", type="string", length=128)
     */
    private $firstStudyField;

    /**
     * @var string
     *
     * @ORM\Column(name="secondStudyField", type="string", length=128)
     */
    private $secondStudyField;

    /**
     * @var string
     *
     * @ORM\Column(name="firstChoice", type="string", length=10)
     */
    private $firstChoice;
    
    /**
     * @var string
     *
     * @ORM\Column(name="secondChoice", type="string", length=10)
     */
    private $secondChoice;

    /**
     * @var string
     *
     * @ORM\Column(name="moneyPayed", type="string", length=128)
     */
    private $moneyPayed;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="submissiondate", type="datetimetz")
     * @Gedmo\Timestampable(on="create")
     */
    private $submissiondate;



    

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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * @return Stage
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
     * Set birthPlace
     *
     * @param string $birthPlace
     * @return Stage
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
     * @return Stage
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
     * Set schoolYear
     *
     * @param integer $schoolYear
     * @return Stage
     */
    public function setSchoolYear($schoolYear)
    {
        $this->schoolYear = $schoolYear;

        return $this;
    }

    /**
     * Get schoolYear
     *
     * @return integer 
     */
    public function getSchoolYear()
    {
        return $this->schoolYear;
    }

    /**
     * Set facebookContact
     *
     * @param string $facebookContact
     * @return Stage
     */
    public function setFacebookContact($facebookContact)
    {
        $this->facebookContact = $facebookContact;

        return $this;
    }

    /**
     * Get facebookContact
     *
     * @return string 
     */
    public function getFacebookContact()
    {
        return $this->facebookContact;
    }

    /**
     * Set stagePeriod
     *
     * @param string $stagePeriod
     * @return Stage
     */
    public function setStagePeriod($stagePeriod)
    {
        $this->stagePeriod = $stagePeriod;

        return $this;
    }

    /**
     * Get stagePeriod
     *
     * @return string 
     */
    public function getStagePeriod()
    {
        return $this->stagePeriod;
    }

    /**
     * Set firstStudyField
     *
     * @param string $firstStudyField
     * @return Stage
     */
    public function setFirstStudyField($firstStudyField)
    {
        $this->firstStudyField = $firstStudyField;

        return $this;
    }

    /**
     * Get firstStudyField
     *
     * @return string 
     */
    public function getFirstStudyField()
    {
        return $this->firstStudyField;
    }

    /**
     * Set secondStudyField
     *
     * @param string $secondStudyField
     * @return Stage
     */
    public function setSecondStudyField($secondStudyField)
    {
        $this->secondStudyField = $secondStudyField;

        return $this;
    }

    /**
     * Get secondStudyField
     *
     * @return string 
     */
    public function getSecondStudyField()
    {
        return $this->secondStudyField;
    }

    /**
     * Set firstChoice
     *
     * @param string $firstChoice
     * @return Stage
     */
    public function setFirstChoice($firstChoice)
    {
        $this->firstChoice = $firstChoice;

        return $this;
    }

    /**
     * Get firstChoice
     *
     * @return string 
     */
    public function getFirstChoice()
    {
        return $this->firstChoice;
    }

    /**
     * Set secondChoice
     *
     * @param string $secondChoice
     * @return Stage
     */
    public function setSecondChoice($secondChoice)
    {
        $this->secondChoice = $secondChoice;

        return $this;
    }

    /**
     * Get secondChoice
     *
     * @return string 
     */
    public function getSecondChoice()
    {
        return $this->secondChoice;
    }

    /**
     * Set moneyPayed
     *
     * @param string $moneyPayed
     * @return Stage
     */
    public function setMoneyPayed($moneyPayed)
    {
        $this->moneyPayed = $moneyPayed;

        return $this;
    }

    /**
     * Get moneyPayed
     *
     * @return string 
     */
    public function getMoneyPayed()
    {
        return $this->moneyPayed;
    }

    /**
     * Set submissiondate
     *
     * @param \DateTime $submissiondate
     * @return Stage
     */
    public function setSubmissiondate($submissiondate)
    {
        $this->submissiondate = $submissiondate;

        return $this;
    }

    /**
     * Get submissiondate
     *
     * @return \DateTime 
     */
    public function getSubmissiondate()
    {
        return $this->submissiondate;
    }

    /**
     * Set attendedSchool
     *
     * @param \A4U\DataBundle\Entity\StuAnagScuole $attendedSchool
     * @return Stage
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
