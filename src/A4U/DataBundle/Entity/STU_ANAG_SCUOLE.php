<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * STU_ANAG_SCUOLE
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class STU_ANAG_SCUOLE
{


    /**
     * @var integer
     *
     * @ORM\Column(name="IdRecord", type="integer")
     * @ORM\Id
     */
    private $idRecord;

    /**
     * @var string
     *
     * @ORM\Column(name="Denominazione", type="string", length=255)
     */
    private $denominazione;

    /**
     * @var string
     *
     * @ORM\Column(name="Indirizzo", type="string", length=100)
     */
    private $indirizzo;

    /**
     * @var string
     *
     * @ORM\Column(name="Telefono", type="string", length=50)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="Fax", type="string", length=50)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="E_mail", type="string", length=50)
     */
    private $eMail;

    /**
     * @var string
     *
     * @ORM\Column(name="Sito", type="string", length=50)
     */
    private $sito;

    /**
     * @var string
     *
     * @ORM\Column(name="Cap", type="string", length=5)
     */
    private $cap;

    /**
     * @var string
     *
     * @ORM\Column(name="Citta", type="string", length=255)
     */
    private $citta;

    /**
     * @var string
     *
     * @ORM\Column(name="Provincia", type="string", length=255)
     */
    private $provincia;

    /**
     * @var string
     *
     * @ORM\Column(name="Note", type="text")
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="Presi", type="string", length=120)
     */
    private $presi;

    /**
     * @var string
     *
     * @ORM\Column(name="Id_Docente_Unicam", type="string", length=6)
     */
    private $idDocenteUnicam;

    /**
     * @var string
     *
     * @ORM\Column(name="Anno", type="string", length=10)
     */
    private $anno;

    /**
     * @var string
     *
     * @ORM\Column(name="Regione", type="string", length=40)
     */
    private $regione;

    /**
     * @var string
     *
     * @ORM\Column(name="Diploma", type="string", length=255)
     */
    private $diploma;

    /**
     * @var string
     *
     * @ORM\Column(name="CODMIN", type="string", length=20)
     */
    private $cODMIN;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_SCUOLA", type="integer")
     */
    private $iDSCUOLA;

    /**
     * @var string
     *
     * @ORM\Column(name="COD_SCUOLA", type="string", length=10)
     */
    private $cODSCUOLA;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO_SCUOLA_MIUR_COD", type="string", length=2)
     */
    private $tIPOSCUOLAMIURCOD;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPOLOGIA", type="string", length=255)
     */
    private $tIPOLOGIA;

    /**
     * @var string
     *
     * @ORM\Column(name="SIGLA", type="string", length=5)
     */
    private $sIGLA;


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
     * @return STU_ANAG_SCUOLE
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
     * Set denominazione
     *
     * @param string $denominazione
     * @return STU_ANAG_SCUOLE
     */
    public function setDenominazione($denominazione)
    {
        $this->denominazione = $denominazione;

        return $this;
    }

    /**
     * Get denominazione
     *
     * @return string 
     */
    public function getDenominazione()
    {
        return $this->denominazione;
    }

    /**
     * Set indirizzo
     *
     * @param string $indirizzo
     * @return STU_ANAG_SCUOLE
     */
    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;

        return $this;
    }

    /**
     * Get indirizzo
     *
     * @return string 
     */
    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return STU_ANAG_SCUOLE
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return STU_ANAG_SCUOLE
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set eMail
     *
     * @param string $eMail
     * @return STU_ANAG_SCUOLE
     */
    public function setEMail($eMail)
    {
        $this->eMail = $eMail;

        return $this;
    }

    /**
     * Get eMail
     *
     * @return string 
     */
    public function getEMail()
    {
        return $this->eMail;
    }

    /**
     * Set sito
     *
     * @param string $sito
     * @return STU_ANAG_SCUOLE
     */
    public function setSito($sito)
    {
        $this->sito = $sito;

        return $this;
    }

    /**
     * Get sito
     *
     * @return string 
     */
    public function getSito()
    {
        return $this->sito;
    }

    /**
     * Set cap
     *
     * @param string $cap
     * @return STU_ANAG_SCUOLE
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
     * Set citta
     *
     * @param string $citta
     * @return STU_ANAG_SCUOLE
     */
    public function setCitta($citta)
    {
        $this->citta = $citta;

        return $this;
    }

    /**
     * Get citta
     *
     * @return string 
     */
    public function getCitta()
    {
        return $this->citta;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return STU_ANAG_SCUOLE
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return STU_ANAG_SCUOLE
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set presi
     *
     * @param string $presi
     * @return STU_ANAG_SCUOLE
     */
    public function setPresi($presi)
    {
        $this->presi = $presi;

        return $this;
    }

    /**
     * Get presi
     *
     * @return string 
     */
    public function getPresi()
    {
        return $this->presi;
    }

    /**
     * Set idDocenteUnicam
     *
     * @param string $idDocenteUnicam
     * @return STU_ANAG_SCUOLE
     */
    public function setIdDocenteUnicam($idDocenteUnicam)
    {
        $this->idDocenteUnicam = $idDocenteUnicam;

        return $this;
    }

    /**
     * Get idDocenteUnicam
     *
     * @return string 
     */
    public function getIdDocenteUnicam()
    {
        return $this->idDocenteUnicam;
    }

    /**
     * Set anno
     *
     * @param string $anno
     * @return STU_ANAG_SCUOLE
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return string 
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set regione
     *
     * @param string $regione
     * @return STU_ANAG_SCUOLE
     */
    public function setRegione($regione)
    {
        $this->regione = $regione;

        return $this;
    }

    /**
     * Get regione
     *
     * @return string 
     */
    public function getRegione()
    {
        return $this->regione;
    }

    /**
     * Set diploma
     *
     * @param string $diploma
     * @return STU_ANAG_SCUOLE
     */
    public function setDiploma($diploma)
    {
        $this->diploma = $diploma;

        return $this;
    }

    /**
     * Get diploma
     *
     * @return string 
     */
    public function getDiploma()
    {
        return $this->diploma;
    }

    /**
     * Set cODMIN
     *
     * @param string $cODMIN
     * @return STU_ANAG_SCUOLE
     */
    public function setCODMIN($cODMIN)
    {
        $this->cODMIN = $cODMIN;

        return $this;
    }

    /**
     * Get cODMIN
     *
     * @return string 
     */
    public function getCODMIN()
    {
        return $this->cODMIN;
    }

    /**
     * Set iDSCUOLA
     *
     * @param integer $iDSCUOLA
     * @return STU_ANAG_SCUOLE
     */
    public function setIDSCUOLA($iDSCUOLA)
    {
        $this->iDSCUOLA = $iDSCUOLA;

        return $this;
    }

    /**
     * Get iDSCUOLA
     *
     * @return integer 
     */
    public function getIDSCUOLA()
    {
        return $this->iDSCUOLA;
    }

    /**
     * Set cODSCUOLA
     *
     * @param string $cODSCUOLA
     * @return STU_ANAG_SCUOLE
     */
    public function setCODSCUOLA($cODSCUOLA)
    {
        $this->cODSCUOLA = $cODSCUOLA;

        return $this;
    }

    /**
     * Get cODSCUOLA
     *
     * @return string 
     */
    public function getCODSCUOLA()
    {
        return $this->cODSCUOLA;
    }

    /**
     * Set tIPOSCUOLAMIURCOD
     *
     * @param string $tIPOSCUOLAMIURCOD
     * @return STU_ANAG_SCUOLE
     */
    public function setTIPOSCUOLAMIURCOD($tIPOSCUOLAMIURCOD)
    {
        $this->tIPOSCUOLAMIURCOD = $tIPOSCUOLAMIURCOD;

        return $this;
    }

    /**
     * Get tIPOSCUOLAMIURCOD
     *
     * @return string 
     */
    public function getTIPOSCUOLAMIURCOD()
    {
        return $this->tIPOSCUOLAMIURCOD;
    }

    /**
     * Set tIPOLOGIA
     *
     * @param string $tIPOLOGIA
     * @return STU_ANAG_SCUOLE
     */
    public function setTIPOLOGIA($tIPOLOGIA)
    {
        $this->tIPOLOGIA = $tIPOLOGIA;

        return $this;
    }

    /**
     * Get tIPOLOGIA
     *
     * @return string 
     */
    public function getTIPOLOGIA()
    {
        return $this->tIPOLOGIA;
    }

    /**
     * Set sIGLA
     *
     * @param string $sIGLA
     * @return STU_ANAG_SCUOLE
     */
    public function setSIGLA($sIGLA)
    {
        $this->sIGLA = $sIGLA;

        return $this;
    }

    /**
     * Get sIGLA
     *
     * @return string 
     */
    public function getSIGLA()
    {
        return $this->sIGLA;
    }
}
