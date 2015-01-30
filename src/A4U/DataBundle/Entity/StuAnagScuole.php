<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StuAnagScuole
 * @ORM\Table()
 * @ORM\Entity
 */
class StuAnagScuole
{
    /**
     * @var integer
     * @ORM\Column(name="idRecord", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idRecord;

    /**
     * @var string
     * @ORM\Column(name="denominazione", type="string", length=255)
     */
    private $denominazione;

    /**
     * @var string
     * @ORM\Column(name="indirizzo", type="string", length=100)
     */
    private $indirizzo;

    /**
     * @var string
     * @ORM\Column(name="telefono", type="string", length=50)
     */
    private $telefono;

    /**
     * @var string
     * @ORM\Column(name="fax", type="string", length=50)
     */
    private $fax;

    /**
     * @var string
     * @ORM\Column(name="eMail", type="string", length=50)
     */
    private $eMail;

    /**
     * @var string
     * @ORM\Column(name="sito", type="string", length=50)
     */
    private $sito;

    /**
     * @var string
     * @ORM\Column(name="cap", type="string", length=5)
     */
    private $cap;

    /**
     * @var string
     * @ORM\Column(name="citta", type="string", length=255)
     */
    private $citta;

    /**
     * @var string
     * @ORM\Column(name="provincia", type="string", length=255)
     */
    private $provincia;

    /**
     * @var string
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;

    /**
     * @var string
     * @ORM\Column(name="presi", type="string", length=120)
     */
    private $presi;

    /**
     * @var string
     * @ORM\Column(name="idDocenteUnicam", type="string", length=6)
     */
    private $idDocenteUnicam;

    /**
     * @var string
     * @ORM\Column(name="anno", type="string", length=10)
     */
    private $anno;

    /**
     * @var string
     * @ORM\Column(name="regione", type="string", length=40)
     */
    private $regione;

    /**
     * @var string
     * @ORM\Column(name="diploma", type="string", length=255)
     */
    private $diploma;

    /**
     * @var string
     * @ORM\Column(name="CODMIN", type="string", length=20)
     */
    private $CODMIN;

    /**
     * @var integer
     * @ORM\Column(name="IdScuola", type="integer")
     */
    private $IdScuola;

    /**
     * @var string
     * @ORM\Column(name="CODSCUOLA", type="string", length=10)
     */
    private $CODSCUOLA;

    /**
     * @var string
     * @ORM\Column(name="TipoScuolaMiurCod", type="string", length=2)
     */
    private $TipoScuolaMiurCod;

     /**
     * @var string
     * @ORM\Column(name="Tipologia", type="string", length=255)
     */
    private $Tipologia;

    /**
     * @var string
     * @ORM\Column(name="Sigla", type="string", length=5)
     */
    private $Sigla;


    /**
     * Set idRecord
     *
     * @param integer $idRecord
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * @return StuAnagScuole
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
     * Set CODMIN
     *
     * @param string $CODMIN
     * @return StuAnagScuole
     */
    public function setCODMIN($CODMIN)
    {
        $this->CODMIN = $CODMIN;

        return $this;
    }

    /**
     * Get CODMIN
     *
     * @return string 
     */
    public function getCODMIN()
    {
        return $this->CODMIN;
    }

    /**
     * Set IdScuola
     *
     * @param integer $IdScuola
     * @return StuAnagScuole
     */
    public function setIdScuola($IdScuola)
    {
        $this->IdScuola = $IdScuola;

        return $this;
    }

    /**
     * Get IdScuola
     *
     * @return integer 
     */
    public function getIdScuola()
    {
        return $this->IdScuola;
    }

    /**
     * Set CODSCUOLA
     *
     * @param string $CODSCUOLA
     * @return StuAnagScuole
     */
    public function setCODSCUOLA($CODSCUOLA)
    {
        $this->CODSCUOLA = $CODSCUOLA;

        return $this;
    }

    /**
     * Get CODSCUOLA
     *
     * @return string 
     */
    public function getCODSCUOLA()
    {
        return $this->CODSCUOLA;
    }

    /**
     * Set TipoScuolaMiurCod
     *
     * @param string $TipoScuolaMiurCod
     * @return StuAnagScuole
     */
    public function setTipoScuolaMiurCod($TipoScuolaMiurCod)
    {
        $this->TipoScuolaMiurCod = $TipoScuolaMiurCod;

        return $this;
    }

    /**
     * Get TipoScuolaMiurCod
     *
     * @return string 
     */
    public function getTipoScuolaMiurCod()
    {
        return $this->TipoScuolaMiurCod;
    }

    /**
     * Set Tipologia
     *
     * @param string $Tipologia
     * @return StuAnagScuole
     */
    public function setTipologia($Tipologia)
    {
        $this->Tipologia = $Tipologia;

        return $this;
    }

    /**
     * Get Tipologia
     *
     * @return string 
     */
    public function getTipologia()
    {
        return $this->Tipologia;
    }

    /**
     * Set Sigla
     *
     * @param string $Sigla
     * @return StuAnagScuole
     */
    public function setSigla($Sigla)
    {
        $this->Sigla = $Sigla;

        return $this;
    }

    /**
     * Get Sigla
     *
     * @return string 
     */
    public function getSigla()
    {
        return $this->Sigla;
    }
}
