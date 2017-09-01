<?php

namespace BufeteBundle\Entity;

/**
 * Tipoasuntos
 */
class Tipoasuntos
{
    /**
     * @var integer
     */
    private $idTipoasunto;

    /**
     * @var string
     */
    private $asunto;

    /**
     * @var boolean
     */
    private $estadoAsunto;


    /**
     * Get idTipoasunto
     *
     * @return integer
     */
    public function getIdTipoasunto()
    {
        return $this->idTipoasunto;
    }

    /**
     * Set asunto
     *
     * @param string $asunto
     *
     * @return Tipoasuntos
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;

        return $this;
    }

    /**
     * Get asunto
     *
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * Set estadoAsunto
     *
     * @param boolean $estadoAsunto
     *
     * @return Tipoasuntos
     */
    public function setEstadoAsunto($estadoAsunto)
    {
        $this->estadoAsunto = $estadoAsunto;

        return $this;
    }

    /**
     * Get estadoAsunto
     *
     * @return boolean
     */
    public function getEstadoAsunto()
    {
        return $this->estadoAsunto;
    }

    public function __toString()
    {
        return $this->asunto;
    }
}
