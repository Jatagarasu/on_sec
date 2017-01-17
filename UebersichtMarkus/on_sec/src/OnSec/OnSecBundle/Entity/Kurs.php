<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Kurs
 */
class Kurs
{
    /**
     * @var integer
     */
    private $kursId;

    /**
     * @var string
     */
    private $raumNr;

    /**
     * @var string
     */
    private $bezeichnung;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $keyword;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $unterweisung;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $teilnehmer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->keyword = new \Doctrine\Common\Collections\ArrayCollection();
        $this->unterweisung = new \Doctrine\Common\Collections\ArrayCollection();
        $this->teilnehmer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get kursId
     *
     * @return integer
     */
    public function getKursId()
    {
        return $this->kursId;
    }

    /**
     * Set raumNr
     *
     * @param string $raumNr
     *
     * @return Kurs
     */
    public function setRaumNr($raumNr)
    {
        $this->raumNr = $raumNr;

        return $this;
    }

    /**
     * Get raumNr
     *
     * @return string
     */
    public function getRaumNr()
    {
        return $this->raumNr;
    }

    /**
     * Set bezeichnung
     *
     * @param string $bezeichnung
     *
     * @return Kurs
     */
    public function setBezeichnung($bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;

        return $this;
    }

    /**
     * Get bezeichnung
     *
     * @return string
     */
    public function getBezeichnung()
    {
        return $this->bezeichnung;
    }

    /**
     * Add keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keywords $keyword
     *
     * @return Kurs
     */
    public function addKeyword(\OnSec\OnSecBundle\Entity\Keywords $keyword)
    {
        $this->keyword[] = $keyword;

        return $this;
    }

    /**
     * Remove keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keywords $keyword
     */
    public function removeKeyword(\OnSec\OnSecBundle\Entity\Keywords $keyword)
    {
        $this->keyword->removeElement($keyword);
    }

    /**
     * Get keyword
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Add unterweisung
     *
     * @param \OnSec\OnSecBundle\Entity\Unterweisung $unterweisung
     *
     * @return Kurs
     */
    public function addUnterweisung(\OnSec\OnSecBundle\Entity\Unterweisung $unterweisung)
    {
        $this->unterweisung[] = $unterweisung;

        return $this;
    }

    /**
     * Remove unterweisung
     *
     * @param \OnSec\OnSecBundle\Entity\Unterweisung $unterweisung
     */
    public function removeUnterweisung(\OnSec\OnSecBundle\Entity\Unterweisung $unterweisung)
    {
        $this->unterweisung->removeElement($unterweisung);
    }

    /**
     * Get unterweisung
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnterweisung()
    {
        return $this->unterweisung;
    }

    /**
     * Add teilnehmer
     *
     * @param \OnSec\OnSecBundle\Entity\User $teilnehmer
     *
     * @return Kurs
     */
    public function addTeilnehmer(\OnSec\OnSecBundle\Entity\User $teilnehmer)
    {
        $this->teilnehmer[] = $teilnehmer;

        return $this;
    }

    /**
     * Remove teilnehmer
     *
     * @param \OnSec\OnSecBundle\Entity\User $teilnehmer
     */
    public function removeTeilnehmer(\OnSec\OnSecBundle\Entity\User $teilnehmer)
    {
        $this->teilnehmer->removeElement($teilnehmer);
    }

    /**
     * Get teilnehmer
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeilnehmer()
    {
        return $this->teilnehmer;
    }
}

