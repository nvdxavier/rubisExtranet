<?php

namespace Extranet\ExtranetBundle\Entity;

use CompteUtilisateur\CompteUtilisateurBundle\Entity\CompteUtilisateur;
use Doctrine\ORM\Mapping as ORM;

/**
 * Taches
 *
 * @ORM\Table(name="taches")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\TachesRepository")
 */
class Taches
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
     * @ORM\Column(name="Tache", type="string", length=255, nullable=true, unique=false)
     */
    private $tache;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionTache", type="text", length=65535, nullable=true, unique=false)
     */
    private $descriptionTache;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Duree", type="time", nullable=true, unique=false)
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Debut", type="datetimetz", nullable=true, unique=false)
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Fin", type="datetimetz", nullable=true, unique=false)
     */
    private $fin;


    /**
     * @var string
     *
     * @ORM\Column(name="statutTache", type="string", length=255, nullable=true, unique=false)
     */
    private $statutTache;

    /**
     * @var int
     *
     * @ORM\Column(name="Priorite", type="integer", nullable=true, unique=false)
     */
    private $priorite;


    /**
     * @var int
     *
     * @ORM\Column(name="projets_id", type="integer", nullable=true, unique=false)
     */
    private $projets_id;

  //  /**
  //   * @ORM\ManytoOne(targetEntity="Extranet\ExtranetBundle\Entity\Projets", inversedBy="taches")
  //   * @ORM\JoinColumn(name="projets_id", referencedColumnName="id",nullable=false, unique=false, onDelete="SET NULL")
  //   */
  //  private $projets_id;

/**
 * @ORM\ManytoOne(targetEntity="CompteUtilisateur\CompteUtilisateurBundle\Entity\CompteUtilisateur", inversedBy="taches")
 * @ORM\JoinColumn(name="compteutilisateur", referencedColumnName="id")
 */
private $compteutilisateur;

/**
 * @ORM\ManytoOne(targetEntity="Extranet\ExtranetBundle\Entity\Projets", cascade={"persist", "remove"})
 * @ORM\JoinColumn(nullable=true)
 */
private $projets;


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
     * Set compteutilisateur
     *
     * @param int $compteutilisateur
     *
     * @return compteutilisateur
     */
    public function setCompteutilisateur($compteutilisateur)
    {
        $this->compteutilisateur = $compteutilisateur;

        return $this;
    }

    /**
     * Get tache
     *
     * @return int
     */
    public function getCompteutilisateur()
    {
        return $this->compteutilisateur;
    }



    /**
     * Set tache
     *
     * @param string $tache
     *
     * @return Taches
     */
    public function setTache($tache)
    {
        $this->tache = $tache;
        return $this;
    }

    /**
     * Get tache
     *
     * @return string
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * Set descriptionTache
     *
     * @param string $descriptionTache
     *
     * @return Taches
     */
    public function setDescriptionTache($descriptionTache)
    {
        $this->descriptionTache = $descriptionTache;

        return $this;
    }

    /**
     * Get descriptionTache
     *
     * @return string
     */
    public function getDescriptionTache()
    {
        return $this->descriptionTache;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return Taches
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \DateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return Taches
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return Taches
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }


    /**
     * Set statutTache
     *
     * @param string $statutTache
     *
     * @return Taches
     */
    public function setStatutTache($statutTache)
    {
        $this->statutTache = $statutTache;

        return $this;
    }

    /**
     * Get statutTache
     *
     * @return string
     */
    public function getStatutTache()
    {
        return $this->statutTache;
    }

    /**
     * Set priorite
     *
     * @param integer $priorite
     *
     * @return Taches
     */
    public function setPriorite($priorite)
    {
        $this->priorite = $priorite;

        return $this;
    }

    /**
     * Get priorite
     *
     * @return int
     */
    public function getPriorite()
    {
        return $this->priorite;
    }


    /**
     * Set projets_id
     *
     * @param integer $projets_id
     *
     * @return Taches
     */
    public function setProjetsid($projets_id)
    {
        $this->projets_id = $projets_id;

        return $this;
    }

    /**
     * Get projets_id
     *
     * @return int
     */
    public function getProjetsid()
    {
        return $this->projets_id;
    }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add utilisateur
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur
     *
     * @return Taches
     */
    public function addUtilisateur(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur
     */
    public function removeUtilisateur(\Utilisateurs\UtilisateursBundle\Entity\Utilisateurs $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Set projets
     *
     * @param \Extranet\ExtranetBundle\Entity\Projets $projets
     *
     * @return Taches
     */
    public function setProjets( $projets = null)
    {
        $this->projets = $projets;

        return $this;
    }

    /**
     * Get projets
     *
     * @return \Extranet\ExtranetBundle\Entity\Projets
     */
    public function getProjets()
    {
        return $this->projets;
    }



}
