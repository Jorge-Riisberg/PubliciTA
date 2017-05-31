<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagen
 */
class Imagen
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $enlace;

    /**
     * @var \DateTime
     */
    private $fechahora;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\Anuncio
     */
    private $anuncio;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Imagen
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set enlace
     *
     * @param string $enlace
     * @return Imagen
     */
    public function setEnlace($enlace)
    {
        $this->enlace = $enlace;

        return $this;
    }

    /**
     * Get enlace
     *
     * @return string 
     */
    public function getEnlace()
    {
        return $this->enlace;
    }

    /**
     * Set fechahora
     *
     * @param \DateTime $fechahora
     * @return Imagen
     */
    public function setFechahora($fechahora)
    {
        $this->fechahora = $fechahora;

        return $this;
    }

    /**
     * Get fechahora
     *
     * @return \DateTime 
     */
    public function getFechahora()
    {
        return $this->fechahora;
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

    /**
     * Set anuncio
     *
     * @param \MainBundle\Entity\Anuncio $anuncio
     * @return Imagen
     */
    public function setAnuncio(\MainBundle\Entity\Anuncio $anuncio = null)
    {
        $this->anuncio = $anuncio;

        return $this;
    }

    /**
     * Get anuncio
     *
     * @return \MainBundle\Entity\Anuncio 
     */
    public function getAnuncio()
    {
        return $this->anuncio;
    }
}
