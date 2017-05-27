<?php

namespace AppBundle\Entity;

/**
 * Cerere
 */
class Cerere
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var integer
     */
    private $latime;

    /**
     * @var string
     */
    private $deschidere;

    /**
     * @var integer
     */
    private $cantitate;

    /**
     * @var string
     */
    private $prenume;

    /**
     * @var string
     */
    private $tipul_produsului;

    /**
     * @var integer
     */
    private $inaltime;

    /**
     * @var string
     */
    private $culoare;

    /**
     * @var string
     */
    private $alte_specificatii;


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
     * Set name
     *
     * @param string $name
     *
     * @return Cerere
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Cerere
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set latime
     *
     * @param integer $latime
     *
     * @return Cerere
     */
    public function setLatime($latime)
    {
        $this->latime = $latime;

        return $this;
    }

    /**
     * Get latime
     *
     * @return integer
     */
    public function getLatime()
    {
        return $this->latime;
    }

    /**
     * Set deschidere
     *
     * @param string $deschidere
     *
     * @return Cerere
     */
    public function setDeschidere($deschidere)
    {
        $this->deschidere = $deschidere;

        return $this;
    }

    /**
     * Get deschidere
     *
     * @return string
     */
    public function getDeschidere()
    {
        return $this->deschidere;
    }

    /**
     * Set cantitate
     *
     * @param integer $cantitate
     *
     * @return Cerere
     */
    public function setCantitate($cantitate)
    {
        $this->cantitate = $cantitate;

        return $this;
    }

    /**
     * Get cantitate
     *
     * @return integer
     */
    public function getCantitate()
    {
        return $this->cantitate;
    }

    /**
     * Set prenume
     *
     * @param string $prenume
     *
     * @return Cerere
     */
    public function setPrenume($prenume)
    {
        $this->prenume = $prenume;

        return $this;
    }

    /**
     * Get prenume
     *
     * @return string
     */
    public function getPrenume()
    {
        return $this->prenume;
    }

    /**
     * Set tipulProdusului
     *
     * @param string $tipulProdusului
     *
     * @return Cerere
     */
    public function setTipulProdusului($tipulProdusului)
    {
        $this->tipul_produsului = $tipulProdusului;

        return $this;
    }

    /**
     * Get tipulProdusului
     *
     * @return string
     */
    public function getTipulProdusului()
    {
        return $this->tipul_produsului;
    }

    /**
     * Set inaltime
     *
     * @param integer $inaltime
     *
     * @return Cerere
     */
    public function setInaltime($inaltime)
    {
        $this->inaltime = $inaltime;

        return $this;
    }

    /**
     * Get inaltime
     *
     * @return integer
     */
    public function getInaltime()
    {
        return $this->inaltime;
    }

    /**
     * Set culoare
     *
     * @param string $culoare
     *
     * @return Cerere
     */
    public function setCuloare($culoare)
    {
        $this->culoare = $culoare;

        return $this;
    }

    /**
     * Get culoare
     *
     * @return string
     */
    public function getCuloare()
    {
        return $this->culoare;
    }

    /**
     * Set alteSpecificatii
     *
     * @param string $alteSpecificatii
     *
     * @return Cerere
     */
    public function setAlteSpecificatii($alteSpecificatii)
    {
        $this->alte_specificatii = $alteSpecificatii;

        return $this;
    }

    /**
     * Get alteSpecificatii
     *
     * @return string
     */
    public function getAlteSpecificatii()
    {
        return $this->alte_specificatii;
    }
}

