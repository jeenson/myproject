<?php
namespace AppBundle\Entity;

class Car
{
	/**
	 * @var string $marca
	 *
	 */
	private $marca = 'Toyota';

	/**
	 * @var string $cajaCambios
	 *
	 */
	private $cajaCambios = 'Manual';

	/**
	 * @var boolean $encendido
	 *
	 */
	private $encendido = true;

	/**
	 * @var integer $cantPuertas
	 *
	 */
	private $cantPuertas = 6;


	public function getMarca()
	{
		return $this->marca;
	}

	public function getCajaCambios()
	{
		return $this->cajaCambios;
	}

	
	public function isEncendido()
    {
        return $this->encendido;
    }
	

    public function hasCantPuertas()
    {
        return 0 !== count($this->cantPuertas);
    }
    
    public function getCantPuertas()
    {
    	return $this->cantPuertas;
    }

}