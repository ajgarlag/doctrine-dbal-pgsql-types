<?php

namespace Ajgl\Doctrine\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\Tests\DBAL\Mocks\MockPlatform;

/**
 * Test class for SmallIntArrayType.
 * Generated by PHPUnit on 2012-07-18 at 09:03:09.
 */
class SmallIntArrayTypeTest
    extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MockPlatform
     */
    protected $platform;

    /**
     * @var SmallIntArrayType
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        if (!Type::hasType('smallint[]')) {
            Type::addType('smallint[]', 'Ajgl\Doctrine\DBAL\Types\SmallIntArrayType');
        } else {
            Type::overrideType('smallint[]', 'Ajgl\Doctrine\DBAL\Types\SmallIntArrayType');
        }
        $this->platform = new MockPlatform();
        $this->object = Type::getType('smallint[]');
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\SmallIntArrayType::getSqlDeclaration
     */
    public function testGetSqlDeclaration()
    {
        $this->assertEquals('SMALLINT[]', $this->object->getSqlDeclaration(array(), $this->platform));
        $this->assertEquals('SMALLINT[5]', $this->object->getSqlDeclaration(array('length' => 5), $this->platform));
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\SmallIntArrayType::convertToPHPValue
     */
    public function testConvertToPHPValue()
    {
        $expected = array(10000, 10000, 10000, 10000);
        $actual = $this->object->convertToPHPValue('{10000, 10000, 10000,10000}', $this->platform);
        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\SmallIntArrayType::convertToDatabaseValue
     */
    public function testConvertToDatabaseValue()
    {
        $expected = '{10000,10000,10000,10000}';
        $actual = $this->object->convertToDatabaseValue(array(10000, 10000, 10000, 10000), $this->platform);
        $this->assertSame($expected, $actual);
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\SmallIntArrayType::getName
     */
    public function testGetName()
    {
        $this->assertEquals(SmallIntArrayType::SMALLINTARRAY, $this->object->getName());
    }
}