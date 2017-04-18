<?php

namespace MichaelSpiss\DesignPatterns\Tests;

use MichaelSpiss\DesignPatterns\Multiton;

class Multi {
    use Multiton;

    /**
     * The object's identifier
     * @var $identifier
     */
    protected $identifier;

    /**
     * Multiton constructor.
     * @param $identifier
     */
    protected function __construct($identifier) {
        $this->identifier = $identifier;
    }

    /**
     * Get the identifier
     * @return mixed identifier
     */
    public function getIdentifier() {
        return $this->identifier;
    }
}