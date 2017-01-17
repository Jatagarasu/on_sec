<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Antwort
 */
class Antwort
{
    /**
     * @var integer
     */
    private $antwortId;

    /**
     * @var string
     */
    private $antwortText;

    /**
     * @var boolean
     */
    private $richtigkeit;

    /**
     * @var \OnSec\OnSecBundle\Entity\Frage
     */
    private $frage;


    /**
     * Get antwortId
     *
     * @return integer
     */
    public function getAntwortId()
    {
        return $this->antwortId;
    }

    /**
     * Set antwortText
     *
     * @param string $antwortText
     *
     * @return Antwort
     */
    public function setAntwortText($antwortText)
    {
        $this->antwortText = $antwortText;

        return $this;
    }

    /**
     * Get antwortText
     *
     * @return string
     */
    public function getAntwortText()
    {
        return $this->antwortText;
    }

    /**
     * Set richtigkeit
     *
     * @param boolean $richtigkeit
     *
     * @return Antwort
     */
    public function setRichtigkeit($richtigkeit)
    {
        $this->richtigkeit = $richtigkeit;

        return $this;
    }

    /**
     * Get richtigkeit
     *
     * @return boolean
     */
    public function getRichtigkeit()
    {
        return $this->richtigkeit;
    }

    /**
     * Set frage
     *
     * @param \OnSec\OnSecBundle\Entity\Frage $frage
     *
     * @return Antwort
     */
    public function setFrage(\OnSec\OnSecBundle\Entity\Frage $frage = null)
    {
        $this->frage = $frage;

        return $this;
    }

    /**
     * Get frage
     *
     * @return \OnSec\OnSecBundle\Entity\Frage
     */
    public function getFrage()
    {
        return $this->frage;
    }
}

