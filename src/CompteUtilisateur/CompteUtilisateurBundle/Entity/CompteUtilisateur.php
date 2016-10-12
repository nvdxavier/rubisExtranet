<?php
// src/AppBundle/Entity/User.php

namespace CompteUtilisateur\CompteUtilisateurBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Validator\Constraints as Assert;
use Extranet\ExtranetBundle\Entity\AdressesMagasins;
use Extranet\ExtranetBundle\Entity\Commande;
use Extranet\ExtranetBundle\Entity\Projets;
use Extranet\ExtranetBundle\Entity\Taches;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="CompteUtilisateur\CompteUtilisateurBundle\Repository\CompteUtilisateurRepository")
 * @ORM\Table(name="compteutilisateur")
 */
class CompteUtilisateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    public function __construct()
    {
        parent::__construct();
        
        
    $this->projets = new ArrayCollection();
    $this->commande = new ArrayCollection();
    $this->adresseMagasin = new ArrayCollection();
    $this->taches = new ArrayCollection();
    }


/**
 * @ORM\OneToMany(targetEntity="Extranet\ExtranetBundle\Entity\Taches",  mappedBy="compteutilisateur")
 */
protected $taches;

    
/**
 * @ORM\ManyToMany(targetEntity="Extranet\ExtranetBundle\Entity\AdressesMagasins", cascade={"persist"})
 * @ORM\JoinColumn(nullable=true)
 */
private $adresseMagasin;

    
/**
 * @ORM\OnetoMany(targetEntity="Extranet\ExtranetBundle\Entity\Commande", mappedBy="compteutilisateur")
 *
 */
private $commande;

/**
 * @ORM\ManytoMany(targetEntity="Extranet\ExtranetBundle\Entity\Projets", cascade={"persist", "remove"})
 * @ORM\JoinColumn(nullable=true)
 */
private $projets;

    
    /**
     * Set AdressesMagasins
     *
     * @param \Extranet\ExtranetBundle\Entity\AdressesMagasins $adresseMagasin
     * @return compteutilisateur
     */
    public function setAdressesMagasins(AdressesMagasins $adresseMagasin)
    {
        $this->adresseMagasin = $adresseMagasin;

        return $this;
    }


    /**
     * Get AdressesMagasins
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdressesMagasins()
    {
        return $this->adresseMagasin;
    }


    /**
     * Add AdressesMagasins
     *
     * @param \Extranet\ExtranetBundle\Entity\AdressesMagasins $adresseMagasin
     * @return CompteUtilisateur
     */
    public function addAdressesMagasins(AdressesMagasins $adresseMagasin)
    {
        $this->adresseMagasin[] = $adresseMagasin;

        return $this;
    }

    /**
     * Remove AdressesMagasins
     *
     * @param \Extranet\ExtranetBundle\Entity\AdressesMagasins $adresseMagasin
     */
    public function removeAdressesMagasins(AdressesMagasins $adresseMagasin)
    {
        $this->adresseMagasin->removeElement($adresseMagasin);
    }



    /**
     * Add commandeProduit
     *
     * @param \Extranet\ExtranetBundle\Entity\Commande $commande
     * @return Utilisateurs
     */
    public function addCommande(Commande $commande)
    {
        $this->commande[] = $commande;

        return $this;
    }

    /**
     * Remove commandeProduit
     *
     * @param \Extranet\ExtranetBundle\Entity\Commande $commande
     */
    public function removeCommande(Commande $commande)
    {
        $this->commande->removeElement($commande);
    }

    /**
     * Get commandeProduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * Add projet
     *
     * @param \Extranet\ExtranetBundle\Entity\Projets $projet
     *
     * @return CompteUtilisateur
     */
    public function addProjets(Projets $projet)
    {
        $this->projets[] = $projet;

        return $this;
    }

    /**
     * Remove projet
     *
     * @param \Extranet\ExtranetBundle\Entity\Projets $projet
     */
    public function removeProjets(Projets $projet)
    {
        $this->projets->removeElement($projet);
    }

    /**
     * Get projets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProjets()
    {
        return $this->projets;
    }

    public function getRolesNames(){
        return array(
            "ROLE_ADMIN" => "ROLE_ADMIN",
            "ROLE_VENDEUR" => "ROLE_VENDEUR",
        );
    }

}