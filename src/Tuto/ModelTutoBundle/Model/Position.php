<?php

namespace Tuto\ModelTutoBundle\Model;

class Position
{
    /**
     * @var string
     */
    private $lattitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * Set lattitude
     *
     * @param string $lattitude
     *
     * @return Position
     */
    public function setLattitude($lattitude)
    {
        $this->lattitude = $lattitude;

        return $this;
    }

    /**
     * Get lattitude
     *
     * @return string
     */
    public function getLattitude()
    {
        return $this->lattitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Position
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }
}