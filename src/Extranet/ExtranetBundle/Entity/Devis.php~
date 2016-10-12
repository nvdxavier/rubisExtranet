<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devis
 *
 * @ORM\Table(name="devis")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\DevisRepository")
 */
class Devis
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Devis", type="date", nullable=false)
     */
    private $dateDevis;

    /**
     * @var float
     *
     * @ORM\Column(name="Total_Devis", type="float", precision=10, scale=0, nullable=false)
     */
    private $totalDevis;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Devis", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDevis;



    /**
     * Set dateDevis
     *
     * @param \DateTime $dateDevis
     * @return Devis
     */
    public function setDateDevis($dateDevis)
    {
        $this->dateDevis = $dateDevis;

        return $this;
    }

    /**
     * Get dateDevis
     *
     * @return \DateTime 
     */
    public function getDateDevis()
    {
        return $this->dateDevis;
    }

    /**
     * Set totalDevis
     *
     * @param float $totalDevis
     * @return Devis
     */
    public function setTotalDevis($totalDevis)
    {
        $this->totalDevis = $totalDevis;

        return $this;
    }

    /**
     * Get totalDevis
     *
     * @return float 
     */
    public function getTotalDevis()
    {
        return $this->totalDevis;
    }

    /**
     * Get idDevis
     *
     * @return integer 
     */
    public function getIdDevis()
    {
        return $this->idDevis;
    }
}
