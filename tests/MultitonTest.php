<?php

namespace MichaelSpiss\DesignPatterns\Tests;

class MultitonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Make sure that an existing instance is served if there is one
     */
    public function testMultitonsServeSingletons() {
        Multi::getInstance('1')->value = 1;

        $this->assertEquals('1', Multi::getInstance('1')->value);
    }

    /**
     * Make sure one "Multi" instance doesn't get mixed up with another one
     */
    public function testMultipleInstancesDoNotMixUp()
    {
        Multi::getInstance('1')->value = 1;
        Multi::getInstance('2')->value = 2;

        $this->assertEquals('1', Multi::getInstance('1')->value);
        $this->assertEquals('2', Multi::getInstance('2')->value);
    }

    /**
     * Make sure cloning is disabled
     */
    public function testCloningThrowsAnError() {
        // skip this test if running on a PHP version lower than 7 (causes fatal error)
        if(version_compare(PHP_VERSION, '7.0.0') < 0) {
            $this->markTestSkipped('PHP Fatal error if call to private or protected.');
        } else {
            $this->setExpectedException("Error");
            $copy = clone Multi::getInstance('1');
        }
    }

    /**
     * Make sure a multiton cannot be unserialized
     * (serialization + unserialization results in a clone of the singleton)
     */
    public function testUnserializationThrowsAnError() {
        $serialized = serialize(Multi::getInstance('1'));
        $this->setExpectedException("PHPUnit_Framework_Error_Warning");
        unserialize($serialized);
    }


    /**
     * Make sure singletons cannot be instantiated via the "new" operator
     */
    public function testInstantiationViaNewOperatorThrowsError() {
        // skip this test if running on a PHP version lower than 7 (causes fatal error)
        if(version_compare(PHP_VERSION, '7.0.0') < 0) {
            $this->markTestSkipped('PHP Fatal error if call to private or protected.');
        } else {
            $this->setExpectedException("Error");
            /** @noinspection PhpParamsInspection */
            new Multi();
        }
    }
}
