<?php

namespace BufeteBundle\Entity;

/**
 * Exoneraciones
 */
class Exoneraciones
{
    /**
     * @var integer
     */
    private $idExoneracion;

    /**
     * @var \DateTime
     */
    private $fechaExamen;

    /**
     * @var \BufeteBundle\Entity\Estudiantes
     */
    private $idEstudiante;


    /**
     * Get idExoneracion
     *
     * @return integer
     */
    public function getIdExoneracion()
    {
        return $this->idExoneracion;
    }

    /**
     * Set fechaExamen
     *
     * @param \DateTime $fechaExamen
     *
     * @return Exoneraciones
     */
    public function setFechaExamen($fechaExamen)
    {
        $this->fechaExamen = $fechaExamen;

        return $this;
    }

    /**
     * Get fechaExamen
     *
     * @return \DateTime
     */
    public function getFechaExamen()
    {
        return $this->fechaExamen;
    }

    /**
     * Set idEstudiante
     *
     * @param \BufeteBundle\Entity\Estudiantes $idEstudiante
     *
     * @return Exoneraciones
     */
    public function setIdEstudiante(\BufeteBundle\Entity\Estudiantes $idEstudiante = null)
    {
        $this->idEstudiante = $idEstudiante;

        return $this;
    }

    /**
     * Get idEstudiante
     *
     * @return \BufeteBundle\Entity\Estudiantes
     */
    public function getIdEstudiante()
    {
        return $this->idEstudiante;
    }
}

