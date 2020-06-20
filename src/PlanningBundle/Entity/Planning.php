<?php

namespace PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planning
 *
 * @ORM\Table(name="planning")
 * @ORM\Entity(repositoryClass="PlanningBundle\Repository\PlanningRepository")
 */
class Planning
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
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere1", type="string", length=255)
     */
    private $matiere1;



    /**
     * @var string
     *
     * @ORM\Column(name="activite1", type="string", length=255)
     */
    private $activite1;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere2", type="string", length=255)
     */
    private $matiere2;



    /**
     * @var string
     *
     * @ORM\Column(name="activite2", type="string", length=255)
     */
    private $activite2;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere3", type="string", length=255)
     */
    private $matiere3;



    /**
     * @var string
     *
     * @ORM\Column(name="activite3", type="string", length=255)
     */
    private $activite3;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere4", type="string", length=255)
     */
    private $matiere4;



    /**
     * @var string
     *
     * @ORM\Column(name="activite4", type="string", length=255)
     */
    private $activite4;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere5", type="string", length=255)
     */
    private $matiere5;



    /**
     * @var string
     *
     * @ORM\Column(name="activite5", type="string", length=255)
     */
    private $activite5;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere6", type="string", length=255)
     */
    private $matiere6;



    /**
     * @var string
     *
     * @ORM\Column(name="activite6", type="string", length=255)
     */
    private $activite6;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere7", type="string", length=255)
     */
    private $matiere7;



    /**
     * @var string
     *
     * @ORM\Column(name="activite7", type="string", length=255)
     */
    private $activite7;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere8", type="string", length=255)
     */
    private $matiere8;


    /**
     * @var string
     *
     * @ORM\Column(name="matiere9", type="string", length=255)
     */
    private $matiere9;



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
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param string $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }



    /**
     * Set matiere1
     *
     * @param string $matiere1
     *
     * @return Planning
     */
    public function setMatiere1($matiere1)
    {
        $this->matiere1 = $matiere1;

        return $this;
    }

    /**
     * Get matiere1
     *
     * @return string
     */
    public function getMatiere1()
    {
        return $this->matiere1;
    }



    /**
     * Set activite1
     *
     * @param string $activite1
     *
     * @return Planning
     */
    public function setActivite1($activite1)
    {
        $this->activite1 = $activite1;

        return $this;
    }

    /**
     * Get activite1
     *
     * @return string
     */
    public function getActivite1()
    {
        return $this->activite1;
    }



    /**
     * @param string $matiere2
     */
    public function setMatiere2($matiere2)
    {
        $this->matiere2 = $matiere2;
    }

    /**
     * @return string
     */
    public function getMatiere2()
    {
        return $this->matiere2;
    }


    /**
     * Set activite2
     *
     * @param string $activite2
     *
     * @return Planning
     */
    public function setActivite2($activite2)
    {
        $this->activite2 = $activite2;

        return $this;
    }

    /**
     * Get activite2
     *
     * @return string
     */
    public function getActivite2()
    {
        return $this->activite2;
    }



    /**
     * Set matiere3
     *
     * @param string $matiere3
     *
     * @return Planning
     */
    public function setMatiere3($matiere3)
    {
        $this->matiere3 = $matiere3;

        return $this;
    }

    /**
     * Get matiere3
     *
     * @return string
     */
    public function getMatiere3()
    {
        return $this->matiere3;
    }



    /**
     * Set activite3
     *
     * @param string $activite3
     *
     * @return Planning
     */
    public function setActivite3($activite3)
    {
        $this->activite3 = $activite3;

        return $this;
    }

    /**
     * Get activite3
     *
     * @return string
     */
    public function getActivite3()
    {
        return $this->activite3;
    }


    /**
     * @param string $matiere4
     */
    public function setMatiere4($matiere4)
    {
        $this->matiere4 = $matiere4;
    }


    /**
     * @return string
     */
    public function getMatiere4()
    {
        return $this->matiere4;
    }




    /**
     * Set activite4
     *
     * @param string $activite4
     *
     * @return Planning
     */
    public function setActivite4($activite4)
    {
        $this->activite4 = $activite4;

        return $this;
    }

    /**
     * Get activite4
     *
     * @return string
     */
    public function getActivite4()
    {
        return $this->activite4;
    }


    /**
     * @param string $matiere5
     */
    public function setMatiere5($matiere5)
    {
        $this->matiere5 = $matiere5;
    }


    /**
     * @return string
     */
    public function getMatiere5()
    {
        return $this->matiere5;
    }




    /**
     * Set activite5
     *
     * @param string $activite5
     *
     * @return Planning
     */
    public function setActivite5($activite5)
    {
        $this->activite5 = $activite5;

        return $this;
    }

    /**
     * Get activite5
     *
     * @return string
     */
    public function getActivite5()
    {
        return $this->activite5;
    }


    /**
     * @param string $matiere6
     */
    public function setMatiere6($matiere6)
    {
        $this->matiere6 = $matiere6;
    }


    /**
     * @return string
     */
    public function getMatiere6()
    {
        return $this->matiere6;
    }




    /**
     * Set activite6
     *
     * @param string $activite6
     *
     * @return Planning
     */
    public function setActivite6($activite6)
    {
        $this->activite6 = $activite6;

        return $this;
    }

    /**
     * Get activite6
     *
     * @return string
     */
    public function getActivite6()
    {
        return $this->activite6;
    }


    /**
     * @param string $matiere7
     */
    public function setMatiere7($matiere7)
    {
        $this->matiere7 = $matiere7;
    }


    /**
     * @return string
     */
    public function getMatiere7()
    {
        return $this->matiere7;
    }



    /**
     * Set activite7
     *
     * @param string $activite7
     *
     * @return Planning
     */
    public function setActivite7($activite7)
    {
        $this->activite7 = $activite7;

        return $this;
    }

    /**
     * Get activite7
     *
     * @return string
     */
    public function getActivite7()
    {
        return $this->activite7;
    }


    /**
     * @param string $matiere8
     */
    public function setMatiere8($matiere8)
    {
        $this->matiere8 = $matiere8;
    }


    /**
     * @return string
     */
    public function getMatiere8()
    {
        return $this->matiere8;
    }


    /**
     * @param string $matiere9
     */
    public function setMatiere9($matiere9)
    {
        $this->matiere9 = $matiere9;
    }


    /**
     * @return string
     */
    public function getMatiere9()
    {
        return $this->matiere9;
    }
}

