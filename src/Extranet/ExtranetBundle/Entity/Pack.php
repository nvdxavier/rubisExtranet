<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pack
 *
 * @ORM\Table(name="pack")
 * @ORM\Entity
 */
class Pack
{
    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Pack", type="string", length=100, nullable=false)
     */
    private $nomPack;

    /**
     * @var integer
     *
     * @ORM\Column(name="Prix_Pack", type="integer", nullable=false)
     */
    private $prixPack;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Debut", type="date", nullable=false)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Fin", type="date", nullable=false)
     */
    private $dateFin;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Pack", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPack;



    /**
     * Set nomPack
     *
     * @param string $nomPack
     * @return Pack
     */
    public function setNomPack($nomPack)
    {
        $this->nomPack = $nomPack;

        return $this;
    }

    /**
     * Get nomPack
     *
     * @return string 
     */
    public function getNomPack()
    {
        return $this->nomPack;
    }

    /**
     * Set prixPack
     *
     * @param integer $prixPack
     * @return Pack
     */
    public function setPrixPack($prixPack)
    {
        $this->prixPack = $prixPack;

        return $this;
    }

    /**
     * Get prixPack
     *
     * @return integer 
     */
    public function getPrixPack()
    {
        return $this->prixPack;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Pack
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Pack
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Get idPack
     *
     * @return integer 
     */
    public function getIdPack()
    {
        return $this->idPack;
    }
}
