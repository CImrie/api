<?php


namespace RandomState\Api\Transformation\Adapters;


use League\Fractal\Manager;
use RandomState\Api\Transformation\Fractal\Switchboard;

abstract class FractalAdapter implements Adapter {

	/**
	 * @var Manager
	 */
	protected $manager;

	/**
	 * @var Switchboard
	 */
	protected $switchboard;

	/**
	 * @var array
	 */
	protected $includes;

	/**
	 * @var array
	 */
	protected $excludes;

	public function __construct(Manager $manager, Switchboard $switchboard, $includes = [], $excludes = [])
	{
		$this->manager = $manager;
		$this->switchboard = $switchboard;

		$this->includes = $includes;
		$this->excludes = $excludes;
	}

	public function run($data)
	{
        return $this->manager->createData($this->getResource($data))->toArray();
	}

    abstract public function getResource($data);
}