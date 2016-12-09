<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Unterweisung
 */
class Unterweisung
{
    /**
     * @var integer
     */
    private $unterweisungId;

    /**
     * @var string
     */
    private $bezeichnung;

    /**
     * @var \DateTime
     */
    private $ablaufdatum;

    /**
     * @var string
     */
    private $pdfLink;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $kurs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $key;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->kurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->key = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get unterweisungId
     *
     * @return integer
     */
    public function getUnterweisungId()
    {
        return $this->unterweisungId;
    }

    /**
     * Set bezeichnung
     *
     * @param string $bezeichnung
     *
     * @return Unterweisung
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
     * Set ablaufdatum
     *
     * @param \DateTime $ablaufdatum
     *
     * @return Unterweisung
     */
    public function setAblaufdatum($ablaufdatum)
    {
        $this->ablaufdatum = $ablaufdatum;

        return $this;
    }

    /**
     * Get ablaufdatum
     *
     * @return \DateTime
     */
    public function getAblaufdatum()
    {
        return $this->ablaufdatum;
    }

    /**
     * Set pdfLink
     *
     * @param string $pdfLink
     *
     * @return Unterweisung
     */
    public function setPdfLink($pdfLink)
    {
        $this->pdfLink = $pdfLink;

        return $this;
    }

    /**
     * Get pdfLink
     *
     * @return string
     */
    public function getPdfLink()
    {
        return $this->pdfLink;
    }

    /**
     * Add kur
     *
     * @param \OnSec\OnSecBundle\Entity\Kurs $kur
     *
     * @return Unterweisung
     */
    public function addKur(\OnSec\OnSecBundle\Entity\Kurs $kur)
    {
        $this->kurs[] = $kur;

        return $this;
    }

    /**
     * Remove kur
     *
     * @param \OnSec\OnSecBundle\Entity\Kurs $kur
     */
    public function removeKur(\OnSec\OnSecBundle\Entity\Kurs $kur)
    {
        $this->kurs->removeElement($kur);
    }

    /**
     * Get kurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKurs()
    {
        return $this->kurs;
    }

    /**
     * Add key
     *
     * @param \OnSec\OnSecBundle\Entity\Keywords $key
     *
     * @return Unterweisung
     */
    public function addKey(\OnSec\OnSecBundle\Entity\Keywords $key)
    {
        $this->key[] = $key;

        return $this;
    }

    /**
     * Remove key
     *
     * @param \OnSec\OnSecBundle\Entity\Keywords $key
     */
    public function removeKey(\OnSec\OnSecBundle\Entity\Keywords $key)
    {
        $this->key->removeElement($key);
    }

    /**
     * Get key
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Add user
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return Unterweisung
     */
    public function addUser(\OnSec\OnSecBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     */
    public function removeUser(\OnSec\OnSecBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}

