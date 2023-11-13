<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Produtos;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

class ProdutosTest extends TestCase
{
    /** 
     * @test
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/api/v1/produtos/listar');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * @test
     */
    public function check_if_products_columns_is_correct(): void
    {
        $produtos = new Produtos;

        $expected = [
            'nome',
            'descricao',
            'preco',
            'quantidade'
        ];

        $arrayCompared = array_diff($expected, $produtos->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }

    /**
     * @test
     */
    public function test_making_an_api_request(): void
    {
        $response = $this->postJson('/api/v1/produtos/cadastrar', [
            'nome' => 'Samsung',
            'descricao' => ' Tablet',
            'preco' => '1900.00',
            'quantidade' => '20'
        ]);

        $response
            ->assertStatus(201);
    }   
}
