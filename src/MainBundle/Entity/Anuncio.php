<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anuncio
 */
class Anuncio
{
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \MainBundle\Entity\Empresa
     */
    private $empresa;

    /**
     * @var \MainBundle\Entity\Tipo
     */
    private $tipo;


    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Anuncio
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * Set empresa
     *
     * @param \MainBundle\Entity\Empresa $empresa
     * @return Anuncio
     */
    public function setEmpresa(\MainBundle\Entity\Empresa $empresa = null)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * Get empresa
     *
     * @return \MainBundle\Entity\Empresa 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set tipo
     *
     * @param \MainBundle\Entity\Tipo $tipo
     * @return Anuncio
     */
    public function setTipo(\MainBundle\Entity\Tipo $tipo = null)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return \MainBundle\Entity\Tipo 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
