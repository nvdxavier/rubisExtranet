<?php

namespace Extranet\ExtranetBundle\Entity;

use CompteUtilisateur\CompteUtilisateurBundle\Entity\CompteUtilisateur;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\ManytoOne(targetEntity="CompteUtilisateur\CompteUtilisateurBundle\Entity\CompteUtilisateur", inversedBy="commande")
     * @ORM\JoinColumn(name="compteutilisateur", referencedColumnName="id")
     */
    private $compteutilisateur;


    /**
     * @var string
     *
     * @ORM\Column(name="NomDestinataire_Commande", type="string", length=80, nullable=false)
     */
    private $nomdestinataireCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="PrenomDestinataire_Commande", type="string", length=30, nullable=false)
     */
    private $prenomdestinataireCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="AdresseDEstinataire_Commande", type="string", length=30, nullable=false)
     */
    private $adressedestinataireCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePostalDestinataire_Commande", type="string", length=30, nullable=false)
     */
    private $codepostaldestinataireCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="VilleDestinataire_Commande", type="string", length=30, nullable=false)
     */
    private $villedestinataireCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Commande", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;



    /**
     * Set nomdestinataireCommande
     *
     * @param string $nomdestinataireCommande
     * @return Commande
     */
    public function setNomdestinataireCommande($nomdestinataireCommande)
    {
        $this->nomdestinataireCommande = $nomdestinataireCommande;

        return $this;
    }

    /**
     * Get nomdestinataireCommande
     *
     * @return string 
     */
    public function getNomdestinataireCommande()
    {
        return $this->nomdestinataireCommande;
    }

    /**
     * Set prenomdestinataireCommande
     *
     * @param string $prenomdestinataireCommande
     * @return Commande
     */
    public function setPrenomdestinataireCommande($prenomdestinataireCommande)
    {
        $this->prenomdestinataireCommande = $prenomdestinataireCommande;

        return $this;
    }

    /**
     * Get prenomdestinataireCommande
     *
     * @return string 
     */
    public function getPrenomdestinataireCommande()
    {
        return $this->prenomdestinataireCommande;
    }

    /**
     * Set adressedestinataireCommande
     *
     * @param string $adressedestinataireCommande
     * @return Commande
     */
    public function setAdressedestinataireCommande($adressedestinataireCommande)
    {
        $this->adressedestinataireCommande = $adressedestinataireCommande;

        return $this;
    }

    /**
     * Get adressedestinataireCommande
     *
     * @return string 
     */
    public function getAdressedestinataireCommande()
    {
        return $this->adressedestinataireCommande;
    }

    /**
     * Set codepostaldestinataireCommande
     *
     * @param string $codepostaldestinataireCommande
     * @return Commande
     */
    public function setCodepostaldestinataireCommande($codepostaldestinataireCommande)
    {
        $this->codepostaldestinataireCommande = $codepostaldestinataireCommande;

        return $this;
    }

    /**
     * Get codepostaldestinataireCommande
     *
     * @return string 
     */
    public function getCodepostaldestinataireCommande()
    {
        return $this->codepostaldestinataireCommande;
    }

    /**
     * Set villedestinataireCommande
     *
     * @param string $villedestinataireCommande
     * @return Commande
     */
    public function setVilledestinataireCommande($villedestinataireCommande)
    {
        $this->villedestinataireCommande = $villedestinataireCommande;

        return $this;
    }

    /**
     * Get villedestinataireCommande
     *
     * @return string 
     */
    public function getVilledestinataireCommande()
    {
        return $this->villedestinataireCommande;
    }

    /**
     * Get idCommande
     *
     * @return integer 
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }
}
