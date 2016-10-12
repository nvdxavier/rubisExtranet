<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

///**
// * Contient
// *
// * @ORM\Table(name="contient", indexes={@ORM\Index(name="FK_Contient_Produit_Id", columns={"Produit_Id"}), @ORM\Index(name="FK_Contient_Pack_Id", columns={"Pack_Id"}), @ORM\Index(name="FK_Contient_Commande_Id", columns={"Commande_Id"})})
// * @ORM\Entity
// */
/**
 * Contient
 *
 * @ORM\Table(name="contient")
 * @ORM\Entity
 */
class Contient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Contient", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idContient;

    /**
     * @var \DateTime
     * @ORM\Column(name="Date_Contient", type="date", nullable=false)
     */
    private $dateContient;

    /**
     * @ORM\OneToOne(targetEntity="Extranet\ExtranetBundle\Entity\Produit", cascade={"persist"})
     * @ORM\JoinColumn(name="Produit", referencedColumnName="id_Produit")
     */
    private $produit;


    /**
     * @var \Extranet\ExtranetBundle\Entity\Pack
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Extranet\ExtranetBundle\Entity\Pack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Pack_Id", referencedColumnName="Id_Pack")
     * })
     */
    private $pack;

    /**
     * @var \Extranet\ExtranetBundle\Entity\Commande
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Extranet\ExtranetBundle\Entity\Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Commande_Id", referencedColumnName="Id_Commande")
     * })
     */
    private $commande;



    /**
     * Set dateContient
     *
     * @param \DateTime $dateContient
     * @return Contient
     */
    public function setDateContient($dateContient)
    {
        $this->dateContient = $dateContient;

        return $this;
    }

    /**
     * Get dateContient
     *
     * @return \DateTime
     */
    public function getDateContient()
    {
        return $this->dateContient;
    }

    /**
     * Set idContient
     *
     * @param integer $idContient
     * @return Contient
     */
    public function setIdContient($idContient)
    {
        $this->idContient = $idContient;

        return $this;
    }

    /**
     * Get idContient
     *
     * @return integer
     */
    public function getIdContient()
    {
        return $this->idContient;
    }

    /**
     * Set produit
     *
     * @param \Extranet\ExtranetBundle\Entity\Produit $produit
     * @return Contient
     */
    public function setProduit(\Extranet\ExtranetBundle\Entity\Produit $produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \Extranet\ExtranetBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set pack
     *
     * @param \Extranet\ExtranetBundle\Entity\Pack $pack
     * @return Contient
     */
    public function setPack(\Extranet\ExtranetBundle\Entity\Pack $pack)
    {
        $this->pack = $pack;

        return $this;
    }

    /**
     * Get pack
     *
     * @return \Extranet\ExtranetBundle\Entity\Pack
     */
    public function getPack()
    {
        return $this->pack;
    }

    /**
     * Set commande
     *
     * @param \Extranet\ExtranetBundle\Entity\Commande $commande
     * @return Contient
     */
    public function setCommande(\Extranet\ExtranetBundle\Entity\Commande $commande)
    {
        $this->commande = $commande;

        return $this;
    }

    /**
     * Get commande
     *
     * @return \Extranet\ExtranetBundle\Entity\Commande
     */
    public function getCommande()
    {
        return $this->commande;
    }
}
