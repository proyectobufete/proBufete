<?php

namespace BufeteBundle\Entity;

/**
 * Prestaciones
 */
class Prestaciones
{
    /**
     * @var integer
     */
    private $idPrestaciones;

    /**
     * @var string
     */
    private $prestacion;

    /**
     * @var boolean
     */
    private $estadoPrestacion;


    /**
     * Get idPrestaciones
     *
     * @return integer
     */
    public function getIdPrestaciones()
    {
        return $this->idPrestaciones;
    }

    /**
     * Set prestacion
     *
     * @param string $prestacion
     *
     * @return Prestaciones
     */
    public function setPrestacion($prestacion)
    {
        $this->prestacion = $prestacion;

        return $this;
    }

    /**
     * Get prestacion
     *
     * @return string
     */
    public function getPrestacion()
    {
        return $this->prestacion;
    }

    /**
     * Set estadoPrestacion
     *
     * @param boolean $estadoPrestacion
     *
     * @return Prestaciones
     */
    public function setEstadoPrestacion($estadoPrestacion)
    {
        $this->estadoPrestacion = $estadoPrestacion;

        return $this;
    }

    /**
     * Get estadoPrestacion
     *
     * @return boolean
     */
    public function getEstadoPrestacion()
    {
        return $this->estadoPrestacion;
    }

    public function __toString()
    {
        return $this->prestacion;
    }
}
