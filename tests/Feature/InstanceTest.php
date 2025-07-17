<?php

declare(strict_types=1);

namespace Morenorafael\EvolutionLaravel\Tests\Feature;

use Morenorafael\EvolutionLaravel\Facades\Evolution;
use Morenorafael\EvolutionLaravel\Services\Instance;
use Morenorafael\EvolutionLaravel\Tests\TestCase;

class InstanceTest extends TestCase
{
    public function test_validate_instance()
    {
        // Given
        
        // When
        $instance = Evolution::instance();

        // Then
        $this->assertInstanceOf(Instance::class, $instance);
    }

    public function test_set_name()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->setName('instance name');

        // Then
        $this->assertEquals('instance name', $instance->getArray()['instanceName']);
    }

    public function test_set_integration()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->setIntegration(Instance::WHATSAPP_BAILEYS);

        // Then
        $this->assertEquals(Instance::WHATSAPP_BAILEYS, $instance->getArray()['integration']);
    }

    public function test_make_baleys()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->makeBaleys();

        // Then
        $this->assertEquals(Instance::WHATSAPP_BAILEYS, $instance->getArray()['integration']);
    }

    public function test_make_business()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->makeBusiness();

        // Then
        $this->assertEquals(Instance::WHATSAPP_BUSINESS, $instance->getArray()['integration']);
    }

    public function test_set_token()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->setToken('abc123');

        // Then
        $this->assertEquals('abc123', $instance->getArray()['token']);
    }

    public function test_make_qr()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->makeQR();

        // Then
        $this->assertTrue($instance->getArray()['qr']);
    }

    public function test_set_number()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->setNumber('573011111111');

        // Then
        $this->assertEquals('573011111111', $instance->getArray()['number']);
    }

    public function test_reject_call()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->rejectCall();

        // Then
        $this->assertTrue($instance->getArray()['rejectCall']);
    }

    public function test_set_msg_call()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->setMsgCall('message');

        // Then
        $this->assertEquals('message', $instance->getArray()['msgCall']);
    }

    public function test_groups_ignore()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->groupsIgnore();

        // Then
        $this->assertTrue($instance->getArray()['groupsIgnore']);
    }

    public function test_always_online()
    {
        // Given
        
        // When
        $instance = Evolution::instance()->alwaysOnline();

        // Then
        $this->assertTrue($instance->getArray()['alwaysOnline']);
    }
}
