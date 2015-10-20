<?php

namespace A4U\FormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StageType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class StageType
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
     * @ORM\Column(name="nome_stage", type="string", length=255)
     */
    private $nomeStage;

    /**
     * @var string
     *
     * @ORM\Column(name="periodo_stage", type="string", length=3)
     */
    private $periodoStage;

    /**
     * @var string
     *
     * @ORM\Column(name="data_inizio", type="string", length=16)
     */
    private $dataInizio;

    /**
     * @var string
     *
     * @ORM\Column(name="data_fine", type="string", length=16)
     */
    private $dataFine;

    /**
     * @var string
     *
     * @ORM\Column(name="campo_studio", type="string", length=255)
     */
    private $campoStudio;

    /**
     * @var string
     *
     * @ORM\Column(name="descrizione", type="string", length=2048)
     */
    private $descrizione;

    /**
     * @var string
     *
     * @ORM\Column(name="data_inizio_data_fine", type="string", length=32)
     */
    private $dataInizioDataFine;


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
     * Set nomeStage
     *
     * @param string $nomeStage
     *
     * @return StageType
     */
    public function setNomeStage($nomeStage)
    {
        $this->nomeStage = $nomeStage;

        return $this;
    }

    /**
     * Get nomeStage
     *
     * @return string
     */
    public function getNomeStage()
    {
        return $this->nomeStage;
    }

    /**
     * Set periodoStage
     *
     * @param string $periodoStage
     *
     * @return StageType
     */
    public function setPeriodoStage($periodoStage)
    {
        $this->periodoStage = $periodoStage;

        return $this;
    }

    /**
     * Get periodoStage
     *
     * @return string
     */
    public function getPeriodoStage()
    {
        return $this->periodoStage;
    }

    /**
     * Set dataInizio
     *
     * @param string $dataInizio
     *
     * @return StageType
     */
    public function setDataInizio($dataInizio)
    {
        $this->dataInizio = $dataInizio;

        return $this;
    }

    /**
     * Get dataInizio
     *
     * @return string
     */
    public function getDataInizio()
    {
        return $this->dataInizio;
    }

    /**
     * Set dataFine
     *
     * @param string $dataFine
     *
     * @return StageType
     */
    public function setDataFine($dataFine)
    {
        $this->dataFine = $dataFine;

        return $this;
    }

    /**
     * Get dataFine
     *
     * @return string
     */
    public function getDataFine()
    {
        return $this->dataFine;
    }

    /**
     * Set campoStudio
     *
     * @param string $campoStudio
     *
     * @return StageType
     */
    public function setCampoStudio($campoStudio)
    {
        $this->campoStudio = $campoStudio;

        return $this;
    }

    /**
     * Get campoStudio
     *
     * @return string
     */
    public function getCampoStudio()
    {
        return $this->campoStudio;
    }

    /**
     * Set descrizione
     *
     * @param string $descrizione
     *
     * @return StageType
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
     * Set dataInizioDataFine
     *
     * @param string $dataInizioDataFine
     *
     * @return StageType
     */
    public function setDataInizioDataFine($dataInizioDataFine)
    {
        $this->dataInizioDataFine = $dataInizioDataFine;

        return $this;
    }

    /**
     * Get dataInizioDataFine
     *
     * @return string
     */
    public function getDataInizioDataFine()
    {
        return $this->dataInizioDataFine;
    }
}

