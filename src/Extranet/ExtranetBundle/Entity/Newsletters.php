<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Newsletters
 *
 * @ORM\Table(name="newsletters")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\NewslettersRepository")
 */
class Newsletters
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=255, nullable=false)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="form", type="text", length=65535, nullable=false)
     */
    private $form;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_newsletter", type="datetime", nullable=false)
     */
    private $dateCreationNewsletter;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_mise_a_jour", type="datetime", nullable=true)
     */
    private $dateMiseAJour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_envois", type="datetime", nullable=true)
     */
    private $dateEnvois;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set title
     *
     * @param string $title
     * @return Newsletters
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Set sujet
     *
     * @param string $sujet
     * @return Newsletters
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set form
     *
     * @param string $form
     * @return Newsletters
     */
    public function setForm($form)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get form
     *
     * @return string 
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * Set dateCreationNewsletter
     *
     * @param \DateTime $dateCreationNewsletter
     * @return Newsletters
     */
    public function setDateCreationNewsletter($dateCreationNewsletter)
    {
        $this->dateCreationNewsletter = $dateCreationNewsletter;

        return $this;
    }

    /**
     * Get dateCreationNewsletter
     *
     * @return \DateTime 
     */
    public function getDateCreationNewsletter()
    {
        return $this->dateCreationNewsletter;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Newsletters
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateMiseAJour
     *
     * @param \DateTime $dateMiseAJour
     * @return Newsletters
     */
    public function setDateMiseAJour($dateMiseAJour)
    {
        $this->dateMiseAJour = $dateMiseAJour;

        return $this;
    }

    /**
     * Get dateMiseAJour
     *
     * @return \DateTime 
     */
    public function getDateMiseAJour()
    {
        return $this->dateMiseAJour;
    }

    /**
     * Set dateEnvois
     *
     * @param \DateTime $dateEnvois
     * @return Newsletters
     */
    public function setDateEnvois($dateEnvois)
    {
        $this->dateEnvois = $dateEnvois;

        return $this;
    }

    /**
     * Get dateEnvois
     *
     * @return \DateTime 
     */
    public function getDateEnvois()
    {
        return $this->dateEnvois;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
