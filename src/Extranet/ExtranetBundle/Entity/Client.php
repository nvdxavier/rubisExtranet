<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\ClientRepository")
 */
class Client
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Utilisateur", type="string", length=30, nullable=false)
     */
    private $nomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom_Utilisateur", type="string", length=30, nullable=false)
     */
    private $prenomUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Email_Utilisateur", type="string", length=40, nullable=false)
     */
    private $emailUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="MDP_Utilisateur", type="string", length=40, nullable=false)
     */
    private $mdpUtilisateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateNaissance_Utilisateur", type="date", nullable=false)
     */
    private $datenaissanceUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse_Utilisateur", type="string", length=30, nullable=false)
     */
    private $adresseUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville_Utilisateur", type="string", length=30, nullable=false)
     */
    private $villeUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePostal_Utilisateur", type="string", length=30, nullable=false)
     */
    private $codepostalUtilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="Telephone_Utilisateur", type="string", length=30, nullable=false)
     */
    private $telephoneUtilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="Statut", type="integer", nullable=false)
     */
    private $statut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateInscription_Client", type="date", nullable=false)
     */
    private $dateinscriptionClient;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Client", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idClient;



    /**
     * Set nomUtilisateur
     *
     * @param string $nomUtilisateur
     * @return Client
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    /**
     * Get nomUtilisateur
     *
     * @return string 
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * Set prenomUtilisateur
     *
     * @param string $prenomUtilisateur
     * @return Client
     */
    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    /**
     * Get prenomUtilisateur
     *
     * @return string 
     */
    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    /**
     * Set emailUtilisateur
     *
     * @param string $emailUtilisateur
     * @return Client
     */
    public function setEmailUtilisateur($emailUtilisateur)
    {
        $this->emailUtilisateur = $emailUtilisateur;

        return $this;
    }

    /**
     * Get emailUtilisateur
     *
     * @return string 
     */
    public function getEmailUtilisateur()
    {
        return $this->emailUtilisateur;
    }

    /**
     * Set mdpUtilisateur
     *
     * @param string $mdpUtilisateur
     * @return Client
     */
    public function setMdpUtilisateur($mdpUtilisateur)
    {
        $this->mdpUtilisateur = $mdpUtilisateur;

        return $this;
    }

    /**
     * Get mdpUtilisateur
     *
     * @return string 
     */
    public function getMdpUtilisateur()
    {
        return $this->mdpUtilisateur;
    }

    /**
     * Set datenaissanceUtilisateur
     *
     * @param \DateTime $datenaissanceUtilisateur
     * @return Client
     */
    public function setDatenaissanceUtilisateur($datenaissanceUtilisateur)
    {
        $this->datenaissanceUtilisateur = $datenaissanceUtilisateur;

        return $this;
    }

    /**
     * Get datenaissanceUtilisateur
     *
     * @return \DateTime 
     */
    public function getDatenaissanceUtilisateur()
    {
        return $this->datenaissanceUtilisateur;
    }

    /**
     * Set adresseUtilisateur
     *
     * @param string $adresseUtilisateur
     * @return Client
     */
    public function setAdresseUtilisateur($adresseUtilisateur)
    {
        $this->adresseUtilisateur = $adresseUtilisateur;

        return $this;
    }

    /**
     * Get adresseUtilisateur
     *
     * @return string 
     */
    public function getAdresseUtilisateur()
    {
        return $this->adresseUtilisateur;
    }

    /**
     * Set villeUtilisateur
     *
     * @param string $villeUtilisateur
     * @return Client
     */
    public function setVilleUtilisateur($villeUtilisateur)
    {
        $this->villeUtilisateur = $villeUtilisateur;

        return $this;
    }

    /**
     * Get villeUtilisateur
     *
     * @return string 
     */
    public function getVilleUtilisateur()
    {
        return $this->villeUtilisateur;
    }

    /**
     * Set codepostalUtilisateur
     *
     * @param string $codepostalUtilisateur
     * @return Client
     */
    public function setCodepostalUtilisateur($codepostalUtilisateur)
    {
        $this->codepostalUtilisateur = $codepostalUtilisateur;

        return $this;
    }

    /**
     * Get codepostalUtilisateur
     *
     * @return string 
     */
    public function getCodepostalUtilisateur()
    {
        return $this->codepostalUtilisateur;
    }

    /**
     * Set telephoneUtilisateur
     *
     * @param string $telephoneUtilisateur
     * @return Client
     */
    public function setTelephoneUtilisateur($telephoneUtilisateur)
    {
        $this->telephoneUtilisateur = $telephoneUtilisateur;

        return $this;
    }

    /**
     * Get telephoneUtilisateur
     *
     * @return string 
     */
    public function getTelephoneUtilisateur()
    {
        return $this->telephoneUtilisateur;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     * @return Client
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
     * Set dateinscriptionClient
     *
     * @param \DateTime $dateinscriptionClient
     * @return Client
     */
    public function setDateinscriptionClient($dateinscriptionClient)
    {
        $this->dateinscriptionClient = $dateinscriptionClient;

        return $this;
    }

    /**
     * Get dateinscriptionClient
     *
     * @return \DateTime 
     */
    public function getDateinscriptionClient()
    {
        return $this->dateinscriptionClient;
    }

    /**
     * Get idClient
     *
     * @return integer 
     */
    public function getIdClient()
    {
        return $this->idClient;
    }
}
