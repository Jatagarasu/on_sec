<?php

namespace OnSec\OnSecBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="OnSec\OnSecBundle\Repository\CourseRepository")
 */
class Course
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \OnSec\OnSecBundle\Entity\Room
     *
     * @ORM\Column(name="room", type="\OnSec\OnSecBundle\Entity\Room")
     *
     * Attention!!!!!!!!!!!!
     *
     * @ORM\ManyToOne(targetEntity="Room",cascade={"persist"})
     */
    private $room;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \OnSec\OnSecBundle\Entity\User
     *
     * @ORM\Column(name="owner", type="\OnSec\OnSecBundle\Entity\User")
     */
    private $owner;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     */
    private $instructions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     */
    private $subscribers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     */
    private $keywords;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     */
    private $moderators;


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
     * Set roomNo
     *
     * @param \OnSec\OnSecBundle\Entity\Room $room
     *
     * @return Course
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get roomNo
     *
     * @return \OnSec\OnSecBundle\Entity\Room
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Course
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set owner
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return Course
     */
    public function setOwner($user)
    {
        $this->owner = $user;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \OnSec\OnSecBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add instructions
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $instruction
     *
     * @return Course
     */
    public function addInstruction(\OnSec\OnSecBundle\Entity\Instruction $instruction)
    {
        $this->instructions[] = $instruction;

        return $this;
    }

    /**
     * Get instructions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInstructions()
    {
        return $this->instructions;
    }

    /**
     * Add subscriber
     *
     * @param \OnSec\OnSecBundle\Entity\User $subscriber
     *
     * @return Course
     */
    public function addSubscriber(\OnSec\OnSecBundle\Entity\User $user)
    {
        $this->subscribers[] = $user;

        return $this;
    }

    /**
     * Get subscribers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubscribers()
    {
        return $this->subscribers;
    }

    /**
     * Add keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keyword $keyword
     *
     * @return Course
     */
    public function addKeyword($keyword)
    {
        $this->keywords[] = $keyword;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set moderators
     *
     * @param \OnSec\OnSecBundle\Entity\User $user
     *
     * @return Course
     */
    public function addModerator($user)
    {
        $this->moderators[] = $user;

        return $this;
    }

    /**
     * Get moderators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModerators()
    {
        return $this->moderators;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->instructions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscribers = new \Doctrine\Common\Collections\ArrayCollection();
        $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moderators = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Remove instruction
     *
     * @param \OnSec\OnSecBundle\Entity\Instruction $instruction
     */
    public function removeInstruction(\OnSec\OnSecBundle\Entity\Instruction $instruction)
    {
        $this->instructions->removeElement($instruction);
    }

    /**
     * Remove subscriber
     *
     * @param \OnSec\OnSecBundle\Entity\User $subscriber
     */
    public function removeSubscriber(\OnSec\OnSecBundle\Entity\User $subscriber)
    {
        $this->subscribers->removeElement($subscriber);
    }

    /**
     * Remove keyword
     *
     * @param \OnSec\OnSecBundle\Entity\Keyword $keyword
     */
    public function removeKeyword(\OnSec\OnSecBundle\Entity\Keyword $keyword)
    {
        $this->keywords->removeElement($keyword);
    }

    /**
     * Remove moderator
     *
     * @param \OnSec\OnSecBundle\Entity\User $moderator
     */
    public function removeModerator(\OnSec\OnSecBundle\Entity\User $moderator)
    {
        $this->moderators->removeElement($moderator);
    }
}
