<?php

namespace Extranet\ExtranetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenir
 *
 * @ORM\Table(name="contenir", indexes={@ORM\Index(name="FK_Contenir_Client_Id", columns={"Client_Id"}), @ORM\Index(name="FK_Contenir_Pack_Id", columns={"Pack_Id"})})
 * @ORM\Entity
 */
class Contenir
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateAjouter", type="date", nullable=false)
     */
    private $dateajouter;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Contenir", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idContenir;

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
     * @var \Extranet\ExtranetBundle\Entity\Client
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Extranet\ExtranetBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Client_Id", referencedColumnName="Id_Client")
     * })
     */
    private $client;



    /**
     * Set dateajouter
     *
     * @param \DateTime $dateajouter
     * @return Contenir
     */
    public function setDateajouter($dateajouter)
    {
        $this->dateajouter = $dateajouter;

        return $this;
    }

    /**
     * Get dateajouter
     *
     * @return \DateTime 
     */
    public function getDateajouter()
    {
        return $this->dateajouter;
    }

    /**
     * Set idContenir
     *
     * @param integer $idContenir
     * @return Contenir
     */
    public function setIdContenir($idContenir)
    {
        $this->idContenir = $idContenir;

        return $this;
    }

    /**
     * Get idContenir
     *
     * @return integer 
     */
    public function getIdContenir()
    {
        return $this->idContenir;
    }

    /**
     * Set pack
     *
     * @param \Extranet\ExtranetBundle\Entity\Pack $pack
     * @return Contenir
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
     * Set client
     *
     * @param \Extranet\ExtranetBundle\Entity\Client $client
     * @return Contenir
     */
    public function setClient(\Extranet\ExtranetBundle\Entity\Client $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \Extranet\ExtranetBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
    }
}
