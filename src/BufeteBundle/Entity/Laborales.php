<?php

namespace BufeteBundle\Entity;

/**
 * Laborales
 */
class Laborales
{
    /**
     * @var integer
     */
    private $idTipolaboral;

    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     */
    private $fechaFin;

    /**
     * @var float
     */
    private $salario;

    /**
     * @var boolean
     */
    private $estadoLaboral;

    /**
     * @var \BufeteBundle\Entity\Casos
     */
    private $idCaso;

    /**
     * @var \BufeteBundle\Entity\Prestaciones
     */
    private $idPrestaciones;

    /**
     * @var \BufeteBundle\Entity\Trabajos
     */
    private $idTrabajo;


    /**
     * Get idTipolaboral
     *
     * @return integer
     */
    public function getIdTipolaboral()
    {
        return $this->idTipolaboral;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return Laborales
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Laborales
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set salario
     *
     * @param float $salario
     *
     * @return Laborales
     */
    public function setSalario($salario)
    {
        $this->salario = $salario;

        return $this;
    }

    /**
     * Get salario
     *
     * @return float
     */
    public function getSalario()
    {
        return $this->salario;
    }

    /**
     * Set estadoLaboral
     *
     * @param boolean $estadoLaboral
     *
     * @return Laborales
     */
    public function setEstadoLaboral($estadoLaboral)
    {
        $this->estadoLaboral = $estadoLaboral;

        return $this;
    }

    /**
     * Get estadoLaboral
     *
     * @return boolean
     */
    public function getEstadoLaboral()
    {
        return $this->estadoLaboral;
    }

    /**
     * Set idCaso
     *
     * @param \BufeteBundle\Entity\Casos $idCaso
     *
     * @return Laborales
     */
    public function setIdCaso(\BufeteBundle\Entity\Casos $idCaso = null)
    {
        $this->idCaso = $idCaso;

        return $this;
    }

    /**
     * Get idCaso
     *
     * @return \BufeteBundle\Entity\Casos
     */
    public function getIdCaso()
    {
        return $this->idCaso;
    }

    /**
     * Set idPrestaciones
     *
     * @param \BufeteBundle\Entity\Prestaciones $idPrestaciones
     *
     * @return Laborales
     */
    public function setIdPrestaciones(\BufeteBundle\Entity\Prestaciones $idPrestaciones = null)
    {
        $this->idPrestaciones = $idPrestaciones;

        return $this;
    }

    /**
     * Get idPrestaciones
     *
     * @return \BufeteBundle\Entity\Prestaciones
     */
    public function getIdPrestaciones()
    {
        return $this->idPrestaciones;
    }

    /**
     * Set idTrabajo
     *
     * @param \BufeteBundle\Entity\Trabajos $idTrabajo
     *
     * @return Laborales
     */
    public function setIdTrabajo(\BufeteBundle\Entity\Trabajos $idTrabajo = null)
    {
        $this->idTrabajo = $idTrabajo;

        return $this;
    }

    /**
     * Get idTrabajo
     *
     * @return \BufeteBundle\Entity\Trabajos
     */
    public function getIdTrabajo()
    {
        return $this->idTrabajo;
    }
}

