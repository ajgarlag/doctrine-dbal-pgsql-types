<?php

namespace Ajgl\Doctrine\DBAL\Types;

use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\TestCase;

/**
 * Test class for StringArrayType.
 * Generated by PHPUnit on 2012-07-18 at 09:03:09.
 */
class StringArrayTypeTest
    extends TestCase
{
    /**
     * @var StringArrayType
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp(): void
    {
         if (!Type::hasType('string[]')) {
            Type::addType('string[]', 'Ajgl\Doctrine\DBAL\Types\StringArrayType');
        } else {
            Type::overrideType('string[]', 'Ajgl\Doctrine\DBAL\Types\StringArrayType');
        }
        $this->object = Type::getType('string[]');
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\StringArrayType::getName
     */
    public function testGetName()
    {
        $this->assertEquals(StringArrayType::STRINGARRAY, $this->object->getName());
    }

    /**
     * @covers Ajgl\Doctrine\DBAL\Types\StringArrayType::getInnerType
     */
    public function testGetInnerType()
    {
        $this->assertInstanceOf('Doctrine\DBAL\Types\StringType', $this->object->getInnerType());
    }

}
