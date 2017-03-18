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
    private $id;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $notificationActive;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $completed_instructions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $roles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->completed_instructions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Gets Useremail
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getEmail();
    }

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
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
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
     * Set notificationActive
     *
     * @param boolean $notificationActive
     *
     * @return User
     */
    public function setNotificationActive($notificationActive)
    {
        $this->notificationActive = $notificationActive;

        return $this;
    }

    /**
     * Get notificationActive
     *
     * @return boolean
     */
    public function getNotificationActive()
    {
        return $this->notificationActive;
    }

    /**
     * Add completedInstruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $completedInstruction
     *
     * @return User
     */
    public function addCompletedInstruction(\OnSec\OnSecBundle\Entity\Instruction $completedInstruction)
    {
        $this->completed_instructions[] = $completedInstruction;

        return $this;
    }

    /**
     * Remove completedInstruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $completedInstruction
     */
    public function removeCompletedInstruction(\OnSec\OnSecBundle\Entity\Instruction $completedInstruction)
    {
        $this->completed_instructions->removeElement($completedInstruction);
    }

    /**
     * Get completedInstructions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompletedInstructions()
    {
        return $this->completed_instructions;
    }

    /**
     * Add role
     *
     * @param \OnSec\OnSecBundle\Entity\Role $role
     *
     * @return User
     */
    public function addRole(\OnSec\OnSecBundle\Entity\Role $role)
    {
        $this->roles[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \OnSec\OnSecBundle\Entity\Role $role
     */
    public function removeRole(\OnSec\OnSecBundle\Entity\Role $role)
    {
        $this->roles->removeElement($role);
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }
}
