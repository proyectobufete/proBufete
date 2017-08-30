<?php

namespace BufeteBundle\Entity;

/**
 * Pretenciones
 */
class Pretenciones
{
    /**
     * @var integer
     */
    private $idPretencion;

    /**
     * @var string
     */
    private $pretencionProcesal;

    /**
     * @var boolean
     */
    private $estadoPretencion;


    /**
     * Get idPretencion
     *
     * @return integer
     */
    public function getIdPretencion()
    {
        return $this->idPretencion;
    }

    /**
     * Set pretencionProcesal
     *
     * @param string $pretencionProcesal
     *
     * @return Pretenciones
     */
    public function setPretencionProcesal($pretencionProcesal)
    {
        $this->pretencionProcesal = $pretencionProcesal;

        return $this;
    }

    /**
     * Get pretencionProcesal
     *
     * @return string
     */
    public function getPretencionProcesal()
    {
        return $this->pretencionProcesal;
    }

    /**
     * Set estadoPretencion
     *
     * @param boolean $estadoPretencion
     *
     * @return Pretenciones
     */
    public function setEstadoPretencion($estadoPretencion)
    {
        $this->estadoPretencion = $estadoPretencion;

        return $this;
    }

    /**
     * Get estadoPretencion
     *
     * @return boolean
     */
    public function getEstadoPretencion()
    {
        return $this->estadoPretencion;
    }
}

