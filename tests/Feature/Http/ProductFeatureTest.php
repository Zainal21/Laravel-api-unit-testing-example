<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductFeatureTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_products()
    {
        $response = $this->json('GET',route('product.index'));
        $response->assertStatus(200);
    }

    public function test_store_data()
    {
        $response = $this->json('POST',route('product.store'),[
            'product_name' => 'testing',
            'product_qty' => 1,
            'product_brand' => 'testing-brand',
        ]);
        $response->assertStatus(200);
    }


    public function test_failed_store()
    {
        $response = $this->json('POST',route('product.store'),[
            'product_name' => 'testing',
            'product_qty' => 'test',
            'product_brand' => 'testing-brand',
            'produtc_stocks' => 12
        ]);
        $response->assertStatus(500);
    }

    public function test_validation_store()
    {
        $response = $this->json('POST',route('product.store'),[
            'product_name' => '',
            'product_qty' => 'test',
            'product_brand' => 'testing-brand',
        ]);
        $response->assertStatus(400);
    }

}
