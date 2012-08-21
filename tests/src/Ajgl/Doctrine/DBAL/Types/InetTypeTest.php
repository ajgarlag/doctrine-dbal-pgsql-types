<?php

namespace Ajgl\Doctrine\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\Tests\DBAL\Mocks\MockPlatform;

/**
 * Test class for InetType.
 * Generated by PHPUnit on 2012-07-18 at 09:03:09.
 */
class InetTypeTest
    extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MockPlatform
     */
    protected $platform;

    /**
     * @var InetType
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        if (!Type::hasType('inet')) {
            Type::addType('inet', 'Ajgl\Doctrine\DBAL\Types\InetType');
        } else {
            Type::overrideType('inet', 'Ajgl\Doctrine\DBAL\Types\InetType');
        }
        $this->platform = new MockPlatform();
        $this->object = Type::getType('inet');
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\InetType::getSqlDeclaration
     */
    public function testGetSqlDeclaration()
    {
        $this->assertEquals('INET', $this->object->getSqlDeclaration(array(), $this->platform));
        $this->assertEquals('INET', $this->object->getSqlDeclaration(array('length' => 5), $this->platform));
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\InetType::getName
     */
    public function testGetName()
    {
        $this->assertEquals(InetType::INET, $this->object->getName());
    }
}
