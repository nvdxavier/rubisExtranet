<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Administrateur
 *
 * @ORM\Table(name="administrateur")
 * @ORM\Entity
 */
class Administrateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="Username", type="string", length=200, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Administrateur", type="string", length=30, nullable=false)
     */
    private $nomAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_Administrateur", type="string", length=30, nullable=false)
     */
    private $prenomAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Email_Administrateur", type="string", length=40, nullable=false)
     */
    private $emailAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="MDP_Administrateur", type="string", length=200, nullable=false)
     */
    private $mdpAdministrateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateNaissance_Administrateur", type="date", nullable=false)
     */
    private $datenaissanceAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_Administrateur", type="string", length=30, nullable=false)
     */
    private $adresseAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville_Administrateur", type="string", length=30, nullable=false)
     */
    private $villeAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePostal_Administrateur", type="string", length=30, nullable=false)
     */
    private $codepostalAdministrateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Telephone_Administrateur", type="string", length=30, nullable=false)
     */
    private $telephoneAdministrateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="Statut", type="integer", nullable=false)
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateInscription_Administrateur", type="date", nullable=false)
     */
    private $dateinscriptionAdministrateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Administrateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdministrateur;



    /**
     * Set username
     *
     * @param string $username
     * @return Administrateur
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set nomAdministrateur
     *
     * @param string $nomAdministrateur
     * @return Administrateur
     */
    public function setNomAdministrateur($nomAdministrateur)
    {
        $this->nomAdministrateur = $nomAdministrateur;

        return $this;
    }

    /**
     * Get nomAdministrateur
     *
     * @return string 
     */
    public function getNomAdministrateur()
    {
        return $this->nomAdministrateur;
    }

    /**
     * Set prenomAdministrateur
     *
     * @param string $prenomAdministrateur
     * @return Administrateur
     */
    public function setPrenomAdministrateur($prenomAdministrateur)
    {
        $this->prenomAdministrateur = $prenomAdministrateur;

        return $this;
    }

    /**
     * Get prenomAdministrateur
     *
     * @return string 
     */
    public function getPrenomAdministrateur()
    {
        return $this->prenomAdministrateur;
    }

    /**
     * Set emailAdministrateur
     *
     * @param string $emailAdministrateur
     * @return Administrateur
     */
    public function setEmailAdministrateur($emailAdministrateur)
    {
        $this->emailAdministrateur = $emailAdministrateur;

        return $this;
    }

    /**
     * Get emailAdministrateur
     *
     * @return string 
     */
    public function getEmailAdministrateur()
    {
        return $this->emailAdministrateur;
    }

    /**
     * Set mdpAdministrateur
     *
     * @param string $mdpAdministrateur
     * @return Administrateur
     */
    public function setMdpAdministrateur($mdpAdministrateur)
    {
        $this->mdpAdministrateur = $mdpAdministrateur;

        return $this;
    }

    /**
     * Get mdpAdministrateur
     *
     * @return string 
     */
    public function getMdpAdministrateur()
    {
        return $this->mdpAdministrateur;
    }

    /**
     * Set datenaissanceAdministrateur
     *
     * @param \DateTime $datenaissanceAdministrateur
     * @return Administrateur
     */
    public function setDatenaissanceAdministrateur($datenaissanceAdministrateur)
    {
        $this->datenaissanceAdministrateur = $datenaissanceAdministrateur;

        return $this;
    }

    /**
     * Get datenaissanceAdministrateur
     *
     * @return \DateTime 
     */
    public function getDatenaissanceAdministrateur()
    {
        return $this->datenaissanceAdministrateur;
    }

    /**
     * Set adresseAdministrateur
     *
     * @param string $adresseAdministrateur
     * @return Administrateur
     */
    public function setAdresseAdministrateur($adresseAdministrateur)
    {
        $this->adresseAdministrateur = $adresseAdministrateur;

        return $this;
    }

    /**
     * Get adresseAdministrateur
     *
     * @return string 
     */
    public function getAdresseAdministrateur()
    {
        return $this->adresseAdministrateur;
    }

    /**
     * Set villeAdministrateur
     *
     * @param string $villeAdministrateur
     * @return Administrateur
     */
    public function setVilleAdministrateur($villeAdministrateur)
    {
        $this->villeAdministrateur = $villeAdministrateur;

        return $this;
    }

    /**
     * Get villeAdministrateur
     *
     * @return string 
     */
    public function getVilleAdministrateur()
    {
        return $this->villeAdministrateur;
    }

    /**
     * Set codepostalAdministrateur
     *
     * @param string $codepostalAdministrateur
     * @return Administrateur
     */
    public function setCodepostalAdministrateur($codepostalAdministrateur)
    {
        $this->codepostalAdministrateur = $codepostalAdministrateur;

        return $this;
    }

    /**
     * Get codepostalAdministrateur
     *
     * @return string 
     */
    public function getCodepostalAdministrateur()
    {
        return $this->codepostalAdministrateur;
    }

    /**
     * Set telephoneAdministrateur
     *
     * @param string $telephoneAdministrateur
     * @return Administrateur
     */
    public function setTelephoneAdministrateur($telephoneAdministrateur)
    {
        $this->telephoneAdministrateur = $telephoneAdministrateur;

        return $this;
    }

    /**
     * Get telephoneAdministrateur
     *
     * @return string 
     */
    public function getTelephoneAdministrateur()
    {
        return $this->telephoneAdministrateur;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     * @return Administrateur
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set dateinscriptionAdministrateur
     *
     * @param \DateTime $dateinscriptionAdministrateur
     * @return Administrateur
     */
    public function setDateinscriptionAdministrateur($dateinscriptionAdministrateur)
    {
        $this->dateinscriptionAdministrateur = $dateinscriptionAdministrateur;

        return $this;
    }

    /**
     * Get dateinscriptionAdministrateur
     *
     * @return \DateTime 
     */
    public function getDateinscriptionAdministrateur()
    {
        return $this->dateinscriptionAdministrateur;
    }

    /**
     * Get idAdministrateur
     *
     * @return integer 
     */
    public function getIdAdministrateur()
    {
        return $this->idAdministrateur;
    }
}
