<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 */
class Video
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
     * @return Video
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
     * @return Video
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
     * @return Video
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
