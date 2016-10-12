<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Facture", type="date", nullable=false)
     */
    private $dateFacture;

    /**
     * @var string
     *
     * @ORM\Column(name="TypePaiement_Facture", type="string", length=20, nullable=false)
     */
    private $typepaiementFacture;

    /**
     * @var string
     *
     * @ORM\Column(name="Statut_Payer", type="string", length=100, nullable=false)
     */
    private $statutPayer;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Facture", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFacture;



    /**
     * Set dateFacture
     *
     * @param \DateTime $dateFacture
     * @return Facture
     */
    public function setDateFacture($dateFacture)
    {
        $this->dateFacture = $dateFacture;

        return $this;
    }

    /**
     * Get dateFacture
     *
     * @return \DateTime 
     */
    public function getDateFacture()
    {
        return $this->dateFacture;
    }

    /**
     * Set typepaiementFacture
     *
     * @param string $typepaiementFacture
     * @return Facture
     */
    public function setTypepaiementFacture($typepaiementFacture)
    {
        $this->typepaiementFacture = $typepaiementFacture;

        return $this;
    }

    /**
     * Get typepaiementFacture
     *
     * @return string 
     */
    public function getTypepaiementFacture()
    {
        return $this->typepaiementFacture;
    }

    /**
     * Set statutPayer
     *
     * @param string $statutPayer
     * @return Facture
     */
    public function setStatutPayer($statutPayer)
    {
        $this->statutPayer = $statutPayer;

        return $this;
    }

    /**
     * Get statutPayer
     *
     * @return string 
     */
    public function getStatutPayer()
    {
        return $this->statutPayer;
    }

    /**
     * Get idFacture
     *
     * @return integer 
     */
    public function getIdFacture()
    {
        return $this->idFacture;
    }
}
