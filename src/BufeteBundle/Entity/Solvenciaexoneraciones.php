<?php

namespace BufeteBundle\Entity;

/**
 * Solvenciaexoneraciones
 */
class Solvenciaexoneraciones
{
    /**
     * @var integer
     */
    private $idSolvencia;

    /**
     * @var \DateTime
     */
    private $fechaSolvencia;

    /**
     * @var \BufeteBundle\Entity\Exoneraciones
     */
    private $idExoneracion;

    /**
     * @var \BufeteBundle\Entity\Tipocaso
     */
    private $idTipo;


    /**
     * Get idSolvencia
     *
     * @return integer
     */
    public function getIdSolvencia()
    {
        return $this->idSolvencia;
    }

    /**
     * Set fechaSolvencia
     *
     * @param \DateTime $fechaSolvencia
     *
     * @return Solvenciaexoneraciones
     */
    public function setFechaSolvencia($fechaSolvencia)
    {
        $this->fechaSolvencia = $fechaSolvencia;

        return $this;
    }

    /**
     * Get fechaSolvencia
     *
     * @return \DateTime
     */
    public function getFechaSolvencia()
    {
        return $this->fechaSolvencia;
    }

    /**
     * Set idExoneracion
     *
     * @param \BufeteBundle\Entity\Exoneraciones $idExoneracion
     *
     * @return Solvenciaexoneraciones
     */
    public function setIdExoneracion(\BufeteBundle\Entity\Exoneraciones $idExoneracion = null)
    {
        $this->idExoneracion = $idExoneracion;

        return $this;
    }

    /**
     * Get idExoneracion
     *
     * @return \BufeteBundle\Entity\Exoneraciones
     */
    public function getIdExoneracion()
    {
        return $this->idExoneracion;
    }

    /**
     * Set idTipo
     *
     * @param \BufeteBundle\Entity\Tipocaso $idTipo
     *
     * @return Solvenciaexoneraciones
     */
    public function setIdTipo(\BufeteBundle\Entity\Tipocaso $idTipo = null)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * Get idTipo
     *
     * @return \BufeteBundle\Entity\Tipocaso
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }
}

