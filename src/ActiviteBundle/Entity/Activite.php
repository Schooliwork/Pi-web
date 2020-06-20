<?php

namespace ActiviteBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Activite
 *
 * @ORM\Table(name="activite")
 * @ORM\Entity(repositoryClass="ActiviteBundle\Repository\ActiviteRepository")
 */
class Activite
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
     * @ORM\Column(name="Animateur", type="string", length=255)
     */
    private $animateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @var string
     *@Assert\File(mimeTypes={"image/jpeg", "image/jpg", "image/png", "image/GIF"})
     * @ORM\Column(name="Photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_activite", type="string", length=255)
     */
    private $nomActivite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_activite", type="date")
     */
    private $dateActivite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Time_start", type="time")
     */
    private $timeStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Time_end", type="time")
     */
    private $timeEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=255)
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
     * Set photo
     *
     * @param string $photo
     *
     * @return Activite
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }



    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set nomActivite
     *
     * @param string $nomActivite
     *
     * @return Activite
     */
    public function setNomActivite($nomActivite)
    {
        $this->nomActivite = $nomActivite;

        return $this;
    }

    /**
     * Get nomActivite
     *
     * @return string
     */
    public function getNomActivite()
    {
        return $this->nomActivite;
    }

    /**
     * Set dateActivite
     *
     * @param \DateTime $dateActivite
     *
     * @return Activite
     */
    public function setDateActivite($dateActivite)
    {
        $this->dateActivite = $dateActivite;

        return $this;
    }

    /**
     * Get dateActivite
     *
     * @return \DateTime
     */
    public function getDateActivite()
    {
        return $this->dateActivite;
    }

    /**
     * Set timeStart
     *
     * @param \DateTime $timeStart
     *
     * @return Activite
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get timeStart
     *
     * @return \DateTime
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Set timeEnd
     *
     * @param \DateTime $timeEnd
     *
     * @return Activite
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    /**
     * Get timeEnd
     *
     * @return \DateTime
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Activite
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
     * @return string
     */
    public function getAnimateur()
    {
        return $this->animateur;
    }

    /**
     * @param string $animateur
     */
    public function setAnimateur(string $animateur)
    {
        $this->animateur = $animateur;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie(string $categorie)
    {
        $this->categorie = $categorie;
    }






}



