<?php

namespace A4U\DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpzioniStage
 * @ORM\Table()
 * @ORM\Entity
 */
class OpzioniStage
{
    /**
     * @var integer
     * @ORM\Column(name="idrecord", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idrecord;

    /**
     * @var string
     * @ORM\Column(name="descrizione", type="string", length=250)
     */
    private $descrizione;

    /**
     * @var integer
     * @ORM\Column(name="ordinevis", type="integer")
     */
    private $ordinevis;

    /**
     * @var integer
     * @ORM\Column(name="anno", type="integer")
     */
    private $anno;

    /**
     * @var integer
     * @ORM\Column(name="attivo", type="integer")
     */
    private $attivo;


    /**
     * Set idrecord
     *
     * @param integer $idrecord
     * @return OpzioniStage
     */
    public function setIdrecord($idrecord)
    {
        $this->idrecord = $idrecord;

        return $this;
    }

    /**
     * Get idrecord
     *
     * @return integer 
     */
    public function getIdrecord()
    {
        return $this->idrecord;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     * @return OpzioniStage
     */
    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;

        return $this;
    }

    /**
     * Get descrizione
     *
     * @return string 
     */
    public function getDescrizione()
    {
        return $this->descrizione;
    }

    /**
     * Set ordinevis
     *
     * @param integer $ordinevis
     * @return OpzioniStage
     */
    public function setOrdinevis($ordinevis)
    {
        $this->ordinevis = $ordinevis;

        return $this;
    }

    /**
     * Get ordinevis
     *
     * @return integer 
     */
    public function getOrdinevis()
    {
        return $this->ordinevis;
    }

    /**
     * Set anno
     *
     * @param integer $anno
     * @return OpzioniStage
     */
    public function setAnno($anno)
    {
        $this->anno = $anno;

        return $this;
    }

    /**
     * Get anno
     *
     * @return integer 
     */
    public function getAnno()
    {
        return $this->anno;
    }

    /**
     * Set attivo
     *
     * @param integer $attivo
     * @return OpzioniStage
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

########################################


    /**
     * Get AvailableChoices
     *
     * @return array 
     */

    public function getAvailableChoices($studyField)
    {
        return array(0, 1, 2);
    }
    public function __toString()
    {
        return $this->descrizione;
    }
}
