<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attivita_date
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Attivita_date
{


    /**
     * @var integer
     *
     * @ORM\Column(name="IdRecord", type="integer")
     * @ORM\Id
     */
    private $idRecord;

    /**
     * @var integer
     *
     * @ORM\Column(name="IdAttivita", type="integer")
     */
    private $idAttivita;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Data_ini", type="datetime")
     */
    private $dataIni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Data_fine", type="datetime")
     */
    private $dataFine;

    /**
     * @var integer
     *
     * @ORM\Column(name="Periodo", type="integer")
     */
    private $periodo;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo_desc", type="string", length=150)
     */
    private $periodoDesc;

    /**
     * @var string
     *
     * @ORM\Column(name="Periodo_Desc_Supp", type="string", length=255)
     */
    private $periodoDescSupp;

    /**
     * @var string
     *
     * @ORM\Column(name="SEDE", type="string", length=50)
     */
    private $sEDE;

    /**
     * @var integer
     *
     * @ORM\Column(name="Attivo", type="integer")
     */
    private $attivo;

    /**
     * @var string
     *
     * @ORM\Column(name="Periodo_note", type="string", length=150)
     */
    private $periodoNote;


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
     * Set idRecord
     *
     * @param integer $idRecord
     * @return Attivita_date
     */
    public function setIdRecord($idRecord)
    {
        $this->idRecord = $idRecord;

        return $this;
    }

    /**
     * Get idRecord
     *
     * @return integer 
     */
    public function getIdRecord()
    {
        return $this->idRecord;
    }

    /**
     * Set idAttivita
     *
     * @param integer $idAttivita
     * @return Attivita_date
     */
    public function setIdAttivita($idAttivita)
    {
        $this->idAttivita = $idAttivita;

        return $this;
    }

    /**
     * Get idAttivita
     *
     * @return integer 
     */
    public function getIdAttivita()
    {
        return $this->idAttivita;
    }

    /**
     * Set dataIni
     *
     * @param \DateTime $dataIni
     * @return Attivita_date
     */
    public function setDataIni($dataIni)
    {
        $this->dataIni = $dataIni;

        return $this;
    }

    /**
     * Get dataIni
     *
     * @return \DateTime 
     */
    public function getDataIni()
    {
        return $this->dataIni;
    }

    /**
     * Set dataFine
     *
     * @param \DateTime $dataFine
     * @return Attivita_date
     */
    public function setDataFine($dataFine)
    {
        $this->dataFine = $dataFine;

        return $this;
    }

    /**
     * Get dataFine
     *
     * @return \DateTime 
     */
    public function getDataFine()
    {
        return $this->dataFine;
    }

    /**
     * Set periodo
     *
     * @param integer $periodo
     * @return Attivita_date
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return integer 
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set periodoDesc
     *
     * @param string $periodoDesc
     * @return Attivita_date
     */
    public function setPeriodoDesc($periodoDesc)
    {
        $this->periodoDesc = $periodoDesc;

        return $this;
    }

    /**
     * Get periodoDesc
     *
     * @return string 
     */
    public function getPeriodoDesc()
    {
        return $this->periodoDesc;
    }

    /**
     * Set periodoDescSupp
     *
     * @param string $periodoDescSupp
     * @return Attivita_date
     */
    public function setPeriodoDescSupp($periodoDescSupp)
    {
        $this->periodoDescSupp = $periodoDescSupp;

        return $this;
    }

    /**
     * Get periodoDescSupp
     *
     * @return string 
     */
    public function getPeriodoDescSupp()
    {
        return $this->periodoDescSupp;
    }

    /**
     * Set sEDE
     *
     * @param string $sEDE
     * @return Attivita_date
     */
    public function setSEDE($sEDE)
    {
        $this->sEDE = $sEDE;

        return $this;
    }

    /**
     * Get sEDE
     *
     * @return string 
     */
    public function getSEDE()
    {
        return $this->sEDE;
    }

    /**
     * Set attivo
     *
     * @param integer $attivo
     * @return Attivita_date
     */
    public function setAttivo($attivo)
    {
        $this->attivo = $attivo;

        return $this;
    }

    /**
     * Get attivo
     *
     * @return integer 
     */
    public function getAttivo()
    {
        return $this->attivo;
    }

    /**
     * Set periodoNote
     *
     * @param string $periodoNote
     * @return Attivita_date
     */
    public function setPeriodoNote($periodoNote)
    {
        $this->periodoNote = $periodoNote;

        return $this;
    }

    /**
     * Get periodoNote
     *
     * @return string 
     */
    public function getPeriodoNote()
    {
        return $this->periodoNote;
    }
}
