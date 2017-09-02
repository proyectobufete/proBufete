<?php

namespace BufeteBundle\Entity;

/**
 * Casos
 */
class Casos
{
    /**
     * @var integer
     */
    private $idCaso;

    /**
     * @var integer
     */
    private $noCaso;

    /**
     * @var \DateTime
     */
    private $fechaCaso;

    /**
     * @var string
     */
    private $pruebasCaso;

    /**
     * @var integer
     */
    private $asignatarioCaso;

    /**
     * @var integer
     */
    private $estadoCaso;

    /**
     * @var \BufeteBundle\Entity\Tipoasuntos
     */
    private $idTipoasunto;

    /**
     * @var \BufeteBundle\Entity\Demandantes
     */
    private $idDemandante;

    /**
     * @var \BufeteBundle\Entity\Demandados
     */
    private $idDemandado;

    /**
     * @var \BufeteBundle\Entity\Estudiantes
     */
    private $idEstudiante;

    /**
     * @var \BufeteBundle\Entity\Tribunales
     */
    private $idTribunal;

    /**
     * @var \BufeteBundle\Entity\Personas
     */
    private $idPersona;

    /**
     * @var \BufeteBundle\Entity\Tipocaso
     */
    private $idTipo;


    /**
     * Get idCaso
     *
     * @return integer
     */
    public function getIdCaso()
    {
        return $this->idCaso;
    }

    /**
     * Set noCaso
     *
     * @param integer $noCaso
     *
     * @return Casos
     */
    public function setNoCaso($noCaso)
    {
        $this->noCaso = $noCaso;

        return $this;
    }

    /**
     * Get noCaso
     *
     * @return integer
     */
    public function getNoCaso()
    {
        return $this->noCaso;
    }

    /**
     * Set fechaCaso
     *
     * @param \DateTime $fechaCaso
     *
     * @return Casos
     */
    public function setFechaCaso($fechaCaso)
    {
        $this->fechaCaso = $fechaCaso;

        return $this;
    }

    /**
     * Get fechaCaso
     *
     * @return \DateTime
     */
    public function getFechaCaso()
    {
        return $this->fechaCaso;
    }

    /**
     * Set pruebasCaso
     *
     * @param string $pruebasCaso
     *
     * @return Casos
     */
    public function setPruebasCaso($pruebasCaso)
    {
        $this->pruebasCaso = $pruebasCaso;

        return $this;
    }

    /**
     * Get pruebasCaso
     *
     * @return string
     */
    public function getPruebasCaso()
    {
        return $this->pruebasCaso;
    }

    /**
     * Set asignatarioCaso
     *
     * @param integer $asignatarioCaso
     *
     * @return Casos
     */
    public function setAsignatarioCaso($asignatarioCaso)
    {
        $this->asignatarioCaso = $asignatarioCaso;

        return $this;
    }

    /**
     * Get asignatarioCaso
     *
     * @return integer
     */
    public function getAsignatarioCaso()
    {
        return $this->asignatarioCaso;
    }

    /**
     * Set estadoCaso
     *
     * @param integer $estadoCaso
     *
     * @return Casos
     */
    public function setEstadoCaso($estadoCaso)
    {
        $this->estadoCaso = $estadoCaso;

        return $this;
    }

    /**
     * Get estadoCaso
     *
     * @return integer
     */
    public function getEstadoCaso()
    {
        return $this->estadoCaso;
    }

    /**
     * Set idTipoasunto
     *
     * @param \BufeteBundle\Entity\Tipoasuntos $idTipoasunto
     *
     * @return Casos
     */
    public function setIdTipoasunto(\BufeteBundle\Entity\Tipoasuntos $idTipoasunto = null)
    {
        $this->idTipoasunto = $idTipoasunto;

        return $this;
    }

    /**
     * Get idTipoasunto
     *
     * @return \BufeteBundle\Entity\Tipoasuntos
     */
    public function getIdTipoasunto()
    {
        return $this->idTipoasunto;
    }

    /**
     * Set idDemandante
     *
     * @param \BufeteBundle\Entity\Demandantes $idDemandante
     *
     * @return Casos
     */
    public function setIdDemandante(\BufeteBundle\Entity\Demandantes $idDemandante = null)
    {
        $this->idDemandante = $idDemandante;

        return $this;
    }

    /**
     * Get idDemandante
     *
     * @return \BufeteBundle\Entity\Demandantes
     */
    public function getIdDemandante()
    {
        return $this->idDemandante;
    }

    /**
     * Set idDemandado
     *
     * @param \BufeteBundle\Entity\Demandados $idDemandado
     *
     * @return Casos
     */
    public function setIdDemandado(\BufeteBundle\Entity\Demandados $idDemandado = null)
    {
        $this->idDemandado = $idDemandado;

        return $this;
    }

    /**
     * Get idDemandado
     *
     * @return \BufeteBundle\Entity\Demandados
     */
    public function getIdDemandado()
    {
        return $this->idDemandado;
    }

    /**
     * Set idEstudiante
     *
     * @param \BufeteBundle\Entity\Estudiantes $idEstudiante
     *
     * @return Casos
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

    /**
     * Set idTribunal
     *
     * @param \BufeteBundle\Entity\Tribunales $idTribunal
     *
     * @return Casos
     */
    public function setIdTribunal(\BufeteBundle\Entity\Tribunales $idTribunal = null)
    {
        $this->idTribunal = $idTribunal;

        return $this;
    }

    /**
     * Get idTribunal
     *
     * @return \BufeteBundle\Entity\Tribunales
     */
    public function getIdTribunal()
    {
        return $this->idTribunal;
    }

    /**
     * Set idPersona
     *
     * @param \BufeteBundle\Entity\Personas $idPersona
     *
     * @return Casos
     */
    public function setIdPersona(\BufeteBundle\Entity\Personas $idPersona = null)
    {
        $this->idPersona = $idPersona;

        return $this;
    }

    /**
     * Get idPersona
     *
     * @return \BufeteBundle\Entity\Personas
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * Set idTipo
     *
     * @param \BufeteBundle\Entity\Tipocaso $idTipo
     *
     * @return Casos
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

    public function __toString()
    {
        return $this->noCaso;
    }
}
