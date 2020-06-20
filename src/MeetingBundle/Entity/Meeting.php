<?php

namespace MeetingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meeting
 *
 * @ORM\Table(name="meeting")
 * @ORM\Entity(repositoryClass="MeetingBundle\Repository\MeetingRepository")
 */
class Meeting
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
     * @var string
     *
     * @ORM\Column(name="emetteur", type="string", length=255)
     */
    private $emetteur;

    /**
     * @var string
     *
     * @ORM\Column(name="recepteur", type="string", length=255)
     */
    private $recepteur;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set emetteur
     *
     * @param string $emetteur
     *
     * @return Meeting
     */
    public function setEmetteur($emetteur)
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    /**
     * Get emetteur
     *
     * @return string
     */
    public function getEmetteur()
    {
        return $this->emetteur;
    }

    /**
     * Set recepteur
     *
     * @param string $recepteur
     *
     * @return Meeting
     */
    public function setRecepteur($recepteur)
    {
        $this->recepteur = $recepteur;

        return $this;
    }

    /**
     * Get recepteur
     *
     * @return string
     */
    public function getRecepteur()
    {
        return $this->recepteur;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Meeting
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Meeting
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
}

