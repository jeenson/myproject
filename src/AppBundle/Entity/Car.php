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
	private $cajaCambios = 'Automatica';

	public function getMarca()
	{
		return $this->marca;
	}

	public function getCajaCambios()
	{
		return $this->cajaCambios;
	}

}