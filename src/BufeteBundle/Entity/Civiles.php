<?php

namespace BufeteBundle\Entity;

/**
 * Civiles
 */
class Civiles
{
    /**
     * @var integer
     */
    private $idCivil;

    /**
     * @var boolean
     */
    private $estadoCivil;

    /**
     * @var \BufeteBundle\Entity\Casos
     */
    private $idCaso;

    /**
     * @var \BufeteBundle\Entity\Pretenciones
     */
    private $idPretencion;


    /**
     * Get idCivil
     *
     * @return integer
     */
    public function getIdCivil()
    {
        return $this->idCivil;
    }

    /**
     * Set estadoCivil
     *
     * @param boolean $estadoCivil
     *
     * @return Civiles
     */
    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    /**
     * Get estadoCivil
     *
     * @return boolean
     */
    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    /**
     * Set idCaso
     *
     * @param \BufeteBundle\Entity\Casos $idCaso
     *
     * @return Civiles
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
     * Set idPretencion
     *
     * @param \BufeteBundle\Entity\Pretenciones $idPretencion
     *
     * @return Civiles
     */
    public function setIdPretencion(\BufeteBundle\Entity\Pretenciones $idPretencion = null)
    {
        $this->idPretencion = $idPretencion;

        return $this;
    }

    /**
     * Get idPretencion
     *
     * @return \BufeteBundle\Entity\Pretenciones
     */
    public function getIdPretencion()
    {
        return $this->idPretencion;
    }
}

