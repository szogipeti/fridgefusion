<?php

namespace Tests\Unit;

use App\Http\Resources\MeasureResource;
use App\Models\Measure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class MeasureApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function test_get_all_measure()
    {
        $measures = MeasureResource::collection(Measure::all());
        $measure = $measures->collection->first();
        $response = $this->getJson('api/measures');
        $response
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data', $measures->count())
                ->has('data.0', fn(AssertableJson $json) => $json
                    ->where('id', 1)
                    ->where('name', $measure['name'])
                    ->where('standard_measure_id', $measure['standard_measure_id'])
                    ->where('conversion_rate', (int)$measure['conversion_rate'])
                    ->etc()
                )
            );

    }

    public function test_get_measure()
    {
        $measure = new MeasureResource(Measure::findOrFail(1));
        $response = $this->getJson('api/measures/1');
        $response
            ->assertJson(fn(AssertableJson $json) => $json
                ->has('data', fn(AssertableJson $json) => $json
                    ->where('id', 1)
                    ->where('name', $measure['name'])
                    ->where('standard_measure_id', $measure['standard_measure_id'])
                    ->where('conversion_rate', (int)$measure['conversion_rate'])
                )
            );
    }
}
