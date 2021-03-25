<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 */
class Competences{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message = "Veuillez entrer un nom")
     * 
     * @ORM\Column(type="string")
     */
    private $titre;
    /**
     * @Assert\NotBlank(message = "Veuillez entrer un nom")
     * 
     * @ORM\Column(type="string")
     */
    private $logo;

    private $tableau;

    public function __construct()
    {
        $this->tableau = new ArrayCollection();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of logo
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of tableau
     */ 
    public function getTableau()
    {
        return $this->tableau;
    }

    /**
     * Set the value of tableau
     *
     * @return  self
     */ 
    public function setTableau($tableau)
    {
        $this->tableau = $tableau;

        return $this;
    }
}