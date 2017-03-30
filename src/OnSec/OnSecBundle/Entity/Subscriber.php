<?php

namespace OnSec\OnSecBundle\Entity;

/**
 * Subscriber
 */
class Subscriber
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $subscribtionDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subscribtionDate
     *
     * @param \DateTime $subscribtionDate
     *
     * @return Subscriber
     */
    public function setSubscribtionDate($subscribtionDate)
    {
        $this->subscribtionDate = $subscribtionDate;

        return $this;
    }

    /**
     * Get subscribtionDate
     *
     * @return \DateTime
     */
    public function getSubscribtionDate()
    {
        return $this->subscribtionDate;
    }
    /**
     * @var \OnSec\OnSecBundle\Entity\Course
     */
    private $cours;

    /**
     * @var \OnSec\OnSecBundle\Entity\User
     */
    private $user;


    /**
     * Set cours
     *
     * @param \OnSec\OnSecBundle\Entity\Course $cours
     *
     * @return Subscriber
     */
    public function setCours(\OnSec\OnSecBundle\Entity\Course $cours = null)
    {
        $this->cours = $cours;

        return $this;
    }

    /**
     * Get cours
     *
     * @return \OnSec\OnSecBundle\Entity\Course
     */
    public function getCours()
    {
        return $this->cours;
    }

    /**
     * Set user
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return Subscriber
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

    /**
     * @ORM\PrePersist
     *
     * Sets the subscribtionDate to todays date.
     */
    public function subscribtionDateTime()
    {
        $this->setSubscribtionDate(new \DateTime());
    }
    /**
     * @var \OnSec\OnSecBundle\Entity\Course
     */
    private $course;


    /**
     * Set course
     *
     * @param \OnSec\OnSecBundle\Entity\Course $course
     *
     * @return Subscriber
     */
    public function setCourse(\OnSec\OnSecBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \OnSec\OnSecBundle\Entity\Course
     */
    public function getCourse()
    {
        return $this->course;
    }
}
