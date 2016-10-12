<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * AdressesMagasins
 *
 * @ORM\Table(name="adresseMagasin")
 * @ORM\Entity(repositoryClass="Extranet\ExtranetBundle\Repository\AdressesMagasinsRepository")
 */
class AdressesMagasins
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMagasin", type="string", length=255)
     */
    private $nomMagasin;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseMagasin", type="string", length=255)
     */
    private $adresseMagasin;

    /**
     * @var integer
     *
     * @ORM\Column(name="codePostal", type="integer")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="villeMagasin", type="string", length=100)
     */
    private $villeMagasin;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomMagasin
     *
     * @param string $nomMagasin
     * @return AdressesMagasins
     */
    public function setNomMagasin($nomMagasin)
    {
        $this->nomMagasin = $nomMagasin;

        return $this;
    }

    /**
     * Get nomMagasin
     *
     * @return string 
     */
    public function getNomMagasin()
    {
        return $this->nomMagasin;
    }

    /**
     * Set adresseMagasin
     *
     * @param string $adresseMagasin
     * @return AdressesMagasins
     */
    public function setAdresseMagasin($adresseMagasin)
    {
        $this->adresseMagasin = $adresseMagasin;

        return $this;
    }

    /**
     * Get adresseMagasin
     *
     * @return string 
     */
    public function getAdresseMagasin()
    {
        return $this->adresseMagasin;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return AdressesMagasins
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }


    /**
     * Set villeMagasin
     *
     * @param string $villeMagasin
     * @return AdressesMagasins
     */
    public function setVilleMagasin($villeMagasin)
    {
        $this->villeMagasin = $villeMagasin;

        return $this;
    }

    /**
     * Get villeMagasin
     *
     * @return string 
     */
    public function getVilleMagasin()
    {
        return $this->villeMagasin;
    }
}
