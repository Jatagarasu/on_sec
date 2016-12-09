<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $vorname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $benachrichtigung;

    /**
     * @var \OnSec\OnSecBundle\Entity\Rolle
     */
    private $rolle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $kurs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $unterweisung;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->kurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->unterweisung = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Set vorname
     *
     * @param string $vorname
     *
     * @return User
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;

        return $this;
    }

    /**
     * Get vorname
     *
     * @return string
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
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
     * Set benachrichtigung
     *
     * @param boolean $benachrichtigung
     *
     * @return User
     */
    public function setBenachrichtigung($benachrichtigung)
    {
        $this->benachrichtigung = $benachrichtigung;

        return $this;
    }

    /**
     * Get benachrichtigung
     *
     * @return boolean
     */
    public function getBenachrichtigung()
    {
        return $this->benachrichtigung;
    }

    /**
     * Set rolle
     *
     * @param \OnSec\OnSecBundle\Entity\Rolle $rolle
     *
     * @return User
     */
    public function setRolle(\OnSec\OnSecBundle\Entity\Rolle $rolle = null)
    {
        $this->rolle = $rolle;

        return $this;
    }

    /**
     * Get rolle
     *
     * @return \OnSec\OnSecBundle\Entity\Rolle
     */
    public function getRolle()
    {
        return $this->rolle;
    }

    /**
     * Add kur
     *
     * @param \OnSec\OnSecBundle\Entity\Kurs $kur
     *
     * @return User
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
     * Add unterweisung
     *
     * @param \OnSec\OnSecBundle\Entity\Unterweisung $unterweisung
     *
     * @return User
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
}

