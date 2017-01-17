<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Frage
 */
class Frage
{
    /**
     * @var integer
     */
    private $frageId;

    /**
     * @var string
     */
    private $frageText;

    /**
     * @var string
     */
    private $bildLink;

    /**
     * @var \OnSec\OnSecBundle\Entity\Unterweisung
     */
    private $unterweisung;

    /**
     * @var \OnSec\OnSecBundle\Entity\User
     */
    private $user;


    /**
     * Get frageId
     *
     * @return integer
     */
    public function getFrageId()
    {
        return $this->frageId;
    }

    /**
     * Set frageText
     *
     * @param string $frageText
     *
     * @return Frage
     */
    public function setFrageText($frageText)
    {
        $this->frageText = $frageText;

        return $this;
    }

    /**
     * Get frageText
     *
     * @return string
     */
    public function getFrageText()
    {
        return $this->frageText;
    }

    /**
     * Set bildLink
     *
     * @param string $bildLink
     *
     * @return Frage
     */
    public function setBildLink($bildLink)
    {
        $this->bildLink = $bildLink;

        return $this;
    }

    /**
     * Get bildLink
     *
     * @return string
     */
    public function getBildLink()
    {
        return $this->bildLink;
    }

    /**
     * Set unterweisung
     *
     * @param \OnSec\OnSecBundle\Entity\Unterweisung $unterweisung
     *
     * @return Frage
     */
    public function setUnterweisung(\OnSec\OnSecBundle\Entity\Unterweisung $unterweisung = null)
    {
        $this->unterweisung = $unterweisung;

        return $this;
    }

    /**
     * Get unterweisung
     *
     * @return \OnSec\OnSecBundle\Entity\Unterweisung
     */
    public function getUnterweisung()
    {
        return $this->unterweisung;
    }

    /**
     * Set user
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return Frage
     */
    public function setUser(\OnSec\OnSecBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \OnSec\OnSecBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}

