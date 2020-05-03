<?php

namespace Tests\Feature;

use App\AnalyticType;
use App\Property;
use App\PropertyAnalytic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function can_get_properties()
    {
        $response = $this->get('/api/properties');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_create_property()
    {
        $payload = [
            'suburb'  => 'Wolli Creek',
            'state'   => 'NSW',
            'country' => 'Australia',
        ];
        $response = $this->post('/api/properties', $payload);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function can_get_property_analytics()
    {
        $property = factory(Property::class)->create();
        $analyticsType = factory(AnalyticType::class)->create();
        $property->analytics()->createMany(factory(PropertyAnalytic::class, 5)->make(['analytic_type_id' => $analyticsType->id])->toArray());

        $response = $this->get('/api/properties/' . $property->id . '/analytics');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function can_create_property_analytic()
    {
        $property = factory(Property::class)->create();
        $analyticsType = factory(AnalyticType::class)->create();

        $payload = [
            'analytic_type_id' => $analyticsType->id,
            'value'            => '10',
        ];
        $response = $this->post('/api/properties/' . $property->id . '/analytics', $payload);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function can_update_property_analytic()
    {
        $property = factory(Property::class)->create();
        $analyticsType = factory(AnalyticType::class)->create();
        $propertyAnalytic = $property->analytics()->create(factory(PropertyAnalytic::class)->make(['analytic_type_id' => $analyticsType->id])->toArray());

        $payload = [
            'analytic_type_id' => $analyticsType->id,
            'value'            => '20',
        ];
        $response = $this->put('/api/properties/' . $property->id . '/analytics/' . $propertyAnalytic->id, $payload);

        $response->assertStatus(200);
    }
}
