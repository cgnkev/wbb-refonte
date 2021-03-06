<?php

namespace WBB\BarBundle\Entity\Collections;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * BarMedia
 *
 * @ORM\Table(name="wbb_bar_media")
 * @ORM\Entity
 */
class BarMedia
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
     * @ORM\Column(name="alt", type="string", length=255, nullable=true)
     */
    private $alt;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="smallint", nullable=true)
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity="WBB\BarBundle\Entity\Bar", inversedBy="medias")
     */
    private $bar;

    /**
     * @ORM\OneToMany(targetEntity="WBB\BarBundle\Entity\Collections\BestOfBar", mappedBy="media", cascade={"persist"}, orphanRemoval=true)
     */
    private $bestofs;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", fetch="EAGER")
     */
    private $media;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;


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
     * Set alt
     *
     * @param string $alt
     * @return BarMedia
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return BarMedia
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set bar
     *
     * @param \WBB\BarBundle\Entity\Bar $bar
     * @return BarMedia
     */
    public function setBar(\WBB\BarBundle\Entity\Bar $bar = null)
    {
        $this->bar = $bar;

        return $this;
    }

    /**
     * Get bar
     *
     * @return \WBB\BarBundle\Entity\Bar
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set media
     *
     * @param Media $media
     * @return BarMedia
     */
    public function setMedia(Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set video1
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $video1
     * @return BarMedia
     */
    public function setVideo1(Media $video1 = null)
    {
        $this->video1 = $video1;

        return $this;
    }

    /**
     * Get video1
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getVideo1()
    {
        return $this->video1;
    }

    /**
     * Set video2
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $video2
     * @return BarMedia
     */
    public function setVideo2(Media $video2 = null)
    {
        $this->video2 = $video2;

        return $this;
    }

    /**
     * Get video2
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getVideo2()
    {
        return $this->video2;
    }

    public function __toString()
    {
        if($this->alt)
            return $this->position.': '.$this->alt;
        else
            return '';
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return BarMedia
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return BarMedia
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bestofs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bestofs
     *
     * @param \WBB\BarBundle\Entity\Collections\BestOfBar $bestofs
     * @return BarMedia
     */
    public function addBestof(\WBB\BarBundle\Entity\Collections\BestOfBar $bestofs)
    {
        $this->bestofs[] = $bestofs;

        return $this;
    }

    /**
     * Remove bestofs
     *
     * @param \WBB\BarBundle\Entity\Collections\BestOfBar $bestofs
     */
    public function removeBestof(\WBB\BarBundle\Entity\Collections\BestOfBar $bestofs)
    {
        $this->bestofs->removeElement($bestofs);
    }

    /**
     * Get bestofs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBestofs()
    {
        return $this->bestofs;
    }
}
