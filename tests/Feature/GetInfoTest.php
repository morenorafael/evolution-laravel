<?php

namespace Morenorafael\EvolutionLaravel\Tests\Feature;

use Illuminate\Support\Facades\Http;
use Morenorafael\EvolutionLaravel\Facades\Evolution;
use Morenorafael\EvolutionLaravel\Tests\TestCase;

class GetInfoTest extends TestCase
{
    public function test_get_status()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $status = Evolution::getInfo()->getStatus();

        // Then
        $this->assertEquals(200, $status);
    }

    public function test_is_successful()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $isSuccessful = Evolution::getInfo()->isSuccessful();

        // Then
        $this->assertTrue($isSuccessful);
    }

    public function test_get_message()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $message = Evolution::getInfo()->getMessage();

        // Then
        $this->assertEquals('Welcome to the Evolution API, it is working!', $message);
    }

    public function test_get_version()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $version = Evolution::getInfo()->getVersion();

        // Then
        $this->assertEquals('1.7.4', $version);
    }

    public function test_get_swagger()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $swagger = Evolution::getInfo()->getSwagger();

        // Then
        $this->assertEquals("{$config['url']}/docs", $swagger);
    }

    public function test_get_manager()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $manager = Evolution::getInfo()->getManager();

        // Then
        $this->assertEquals("{$config['url']}/manager", $manager);
    }

    public function test_get_documentation()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $documentation = Evolution::getInfo()->getDocumentation();

        // Then
        $this->assertEquals('https://doc.evolution-api.com', $documentation);
    }

    public function test_to_array()
    {
        // Given
        $config = config('evolution');

        Http::fake([
            "{$config['url']}/" => Http::response([
                'status' => 200,
                'message' => 'Welcome to the Evolution API, it is working!',
                'version' => '1.7.4',
                'swagger' => "{$config['url']}/docs",
                'manager' => "{$config['url']}/manager",
                'documentation' => 'https://doc.evolution-api.com',
            ], 200),
        ]);
        
        // When
        $array = Evolution::getInfo()->toArray();

        // Then
        $this->assertEquals([
            'status' => 200,
            'message' => 'Welcome to the Evolution API, it is working!',
            'version' => '1.7.4',
            'swagger' => "{$config['url']}/docs",
            'manager' => "{$config['url']}/manager",
            'documentation' => 'https://doc.evolution-api.com',
        ], $array);
    }
}
