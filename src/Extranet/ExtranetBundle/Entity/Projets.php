<?php

namespace Extranet\ExtranetBundle\Entity;


use Extranet\ExtranetBundle\Entity\Taches;
use Doctrine\ORM\Mapping as ORM;

/**
 * Projets
 *
 * @ORM\Table(name="projets")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\ProjetsRepository")
 */
class Projets
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
     * @ORM\Column(name="NomProjet", type="string", length=100, nullable=true)
     */
    private $nomProjet;


    /**
     * @var string
     *
     * @ORM\Column(name="Pleine_description", type="text", length=65535, nullable=true)
     */
    private $pleinedescription;

    /**
     * @var string
     *
     * @ORM\Column(name="DescriptionProjet", type="string", length=255, nullable=true)
     */
    private $descriptionProjet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebutProjet", type="datetime", nullable=true, unique=false)
     */
    private $dateDebutProjet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFinProjet", type="datetime", nullable=true, unique=false)
     */
    private $dateFinProjet;

    /**
     * @var string
     *
     * @ORM\Column(name="EtatduProjet", type="string", length=255, nullable=true, unique=false)
     */
    private $etatduProjet;

    /**
     * @var string
     * @ORM\OneToMany(targetEntity="Extranet\ExtranetBundle\Entity\Taches", mappedBy="projets",cascade={"persist","remove"})
     * @ORM\JoinColumn(name="id", referencedColumnName="projets_id")
     */
    private $tacheid;

    /**
     * @var string
     *
     * @ORM\Column(name="Dossier", type="text", length=255, nullable=true, unique=false)
     */
    private $dossier;
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
     * Set nomProjet
     *
     * @param string $nomProjet
     *
     * @return Projets
     */
    public function setNomProjet($nomProjet)
    {
        $this->nomProjet = $nomProjet;

        return $this;
    }

    /**
     * Get nomProjet
     *
     * @return string
     */
    public function getNomProjet()
    {
        return $this->nomProjet;
    }

    /**
     * Set pleinedescription
     *
     * @param string $pleinedescription
     * @return Projets
     */
    public function setPleineDescription($pleinedescription)
    {
        $this->pleinedescription = $pleinedescription;

        return $this;
    }

    /**
     * Get pleinedescription
     *
     * @return string
     */
    public function getPleineDescription()
    {
        return $this->pleinedescription;
    }


    /**
     * Set descriptionProjet
     *
     * @param string $descriptionProjet
     *
     * @return Projets
     */
    public function setDescriptionProjet($descriptionProjet)
    {
        $this->descriptionProjet = $descriptionProjet;

        return $this;
    }

    /**
     * Get descriptionProjet
     *
     * @return string
     */
    public function getDescriptionProjet()
    {
        return $this->descriptionProjet;
    }

    /**
     * Set dateDebutProjet
     *
     * @param \DateTime $dateDebutProjet
     *
     * @return Projets
     */
    public function setDateDebutProjet($dateDebutProjet)
    {
        $this->dateDebutProjet = $dateDebutProjet;

        return $this;
    }

    /**
     * Get dateDebutProjet
     *
     * @return \DateTime
     */
    public function getDateDebutProjet()
    {
        return $this->dateDebutProjet;
    }

    /**
     * Set dateFinProjet
     *
     * @param \DateTime $dateFinProjet
     *
     * @return Projets
     */
    public function setDateFinProjet($dateFinProjet)
    {
        $this->dateFinProjet = $dateFinProjet;

        return $this;
    }

    /**
     * Get dateFinProjet
     *
     * @return \DateTime
     */
    public function getDateFinProjet()
    {
        return $this->dateFinProjet;
    }

    /**
     * Set etatduProjet
     *
     * @param string $etatduProjet
     *
     * @return Projets
     */
    public function setEtatduProjet($etatduProjet)
    {
        $this->etatduProjet = $etatduProjet;

        return $this;
    }

    /**
     * Get etatduProjet
     *
     * @return string
     */
    public function getEtatduProjet()
    {
        return $this->etatduProjet;
    }

    /**
     * Set taches
     *
     * @param \Extranet\ExtranetBundle\Entity\Taches $taches
     *
     * @return Projets
     */
    public function setTaches(Taches $taches = null)
    {
        $this->taches = $taches;

        return $this;
    }

    /**
     * Get taches
     *
     * @return \Extranet\ExtranetBundle\Entity\Taches
     */
    public function getTaches()
    {
        return $this->taches;
    }


    /**
     * Set tacheid
     *
     * @param \Extranet\ExtranetBundle\Entity\Taches $tacheid
     *
     * @return Taches
     */
    public function setTacheid($tacheid)
    {
        $this->tacheid = $tacheid;

        return $this;
    }

    /**
     * Get tacheid
     *
     * @return int
     */
    public function getTacheid()
    {
        return $this->tacheid;
    }


    public function __toString() {
        return strval($this->id);
    }

    /**
     * Set dossier
     *
     * @param string $dossier
     *
     * @return Projets
     */
    public function setDossier($dossier)
    {
        $this->dossier = $dossier;

        return $this;
    }

    /**
     * Get dossier
     *
     * @return string
     */
    public function getDossier()
    {
        return $this->dossier;
    }


}
