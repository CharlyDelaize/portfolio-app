<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 */
class Projet{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Length(
     * min = 1,
     * max = 50,
     * minMessage = "Ce nom est trop court",
     * maxMessage = "Ce nom est trop long",
     * )
     * @Assert\NotBlank(message = "Veuillez entrer un nom")
     * 
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @Assert\NotBlank(message = "Veuillez entrer un nom")
     * 
     * @ORM\Column(type="string")
     */
    private $image;

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
     * Get min = 1,
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set min = 1,
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

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