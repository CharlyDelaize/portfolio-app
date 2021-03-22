<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 */
class Portfolio{
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
     * @Assert\Length(
     * min = 2,
     * max = 50,
     * minMessage = "Ce prénom est trop court",
     * maxMessage = "Ce prénom est trop long",
     * )
     * @Assert\NotBlank(message = "Veuillez entrer un prénom")
     * 
     * @ORM\Column(type="string")
     */
    private $prenom;

    /**
     * @Assert\Length(
     * min = 10,
     * max = 50,
     * minMessage = "Cet e-mail est trop court",
     * maxMessage = "Cet e-mail est trop long",
     * )
     * @Assert\NotBlank(message = "Veuillez entrer un e-mail")
     * 
     * @ORM\Column(type="string")
     */
    private $email;
    /** 
    * @ORM\Column(type="text")
    */
    private $message;

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
     * Get min = 2,
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set min = 2,
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get min = 10,
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set min = 10,
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

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
