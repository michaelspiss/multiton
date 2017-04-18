<?php

namespace MichaelSpiss\DesignPatterns;

trait Multiton {
    /**
     * @var array $_instances
     */
    protected static $_instances = [];

    /**
     * @param $identifier
     * @return Multiton
     */
    final public static function getInstance($identifier) {
        if(!isset(self::$_instances[$identifier])) {
            self::$_instances[$identifier] = new self($identifier);
        }
        return self::$_instances[$identifier];
    }

    /**
     * Multiton constructor.
     * Don't allow object instantiation via the "new" operator.
     * It is not final, so actions can be performed on instantiation.
     * Please make sure not to require any arguments. If arguments
     * are needed, add an "init" method and call it after the first
     * instantiation.
     * @param $identifier
     */
    protected function __construct($identifier) {}

    /**
     * Prevent clones of the Singleton instance
     */
    final private function __clone() {}

    /**
     * Prevent unserialization of a Singleton
     */
    final private function __wakeup() {}
}