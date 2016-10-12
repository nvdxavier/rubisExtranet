<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Remise
 *
 * @ORM\Table(name="remise")
 * @ORM\Entity
 */
class Remise
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Remise", type="string", length=80, nullable=false)
     */
    private $nomRemise;

    /**
     * @var string
     *
     * @ORM\Column(name="PrixReduction_Remise", type="string", length=20, nullable=false)
     */
    private $prixreductionRemise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebut_Remise", type="date", nullable=false)
     */
    private $datedebutRemise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFin_Remise", type="date", nullable=false)
     */
    private $datefinRemise;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Remise", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRemise;



    /**
     * Set nomRemise
     *
     * @param string $nomRemise
     * @return Remise
     */
    public function setNomRemise($nomRemise)
    {
        $this->nomRemise = $nomRemise;

        return $this;
    }

    /**
     * Get nomRemise
     *
     * @return string 
     */
    public function getNomRemise()
    {
        return $this->nomRemise;
    }

    /**
     * Set prixreductionRemise
     *
     * @param string $prixreductionRemise
     * @return Remise
     */
    public function setPrixreductionRemise($prixreductionRemise)
    {
        $this->prixreductionRemise = $prixreductionRemise;

        return $this;
    }

    /**
     * Get prixreductionRemise
     *
     * @return string 
     */
    public function getPrixreductionRemise()
    {
        return $this->prixreductionRemise;
    }

    /**
     * Set datedebutRemise
     *
     * @param \DateTime $datedebutRemise
     * @return Remise
     */
    public function setDatedebutRemise($datedebutRemise)
    {
        $this->datedebutRemise = $datedebutRemise;

        return $this;
    }

    /**
     * Get datedebutRemise
     *
     * @return \DateTime 
     */
    public function getDatedebutRemise()
    {
        return $this->datedebutRemise;
    }

    /**
     * Set datefinRemise
     *
     * @param \DateTime $datefinRemise
     * @return Remise
     */
    public function setDatefinRemise($datefinRemise)
    {
        $this->datefinRemise = $datefinRemise;

        return $this;
    }

    /**
     * Get datefinRemise
     *
     * @return \DateTime 
     */
    public function getDatefinRemise()
    {
        return $this->datefinRemise;
    }

    /**
     * Get idRemise
     *
     * @return integer 
     */
    public function getIdRemise()
    {
        return $this->idRemise;
    }
}
