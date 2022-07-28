<?php

namespace Tests\Feature\Collaborators;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteCollaboratorTest extends TestCase
{
    use WithFaker;
    
    /**
     *
     * @test
     * @return void
     */
    public function deleteAnExistingCollaborator()
    {
        $params = [
            'full_name' => $this->faker->name(),
            'cpf' => strval(rand(11111111111, 99999999999)),
            'email' => $this->faker->email(),
            'rg' => strval(rand(1000000, 9999999)),
            'birthdate' => $this->faker->date(),
            'cep' => strval(rand(55000000, 99999999)),
            'address' => $this->faker->streetName(),
            'number' => strval(rand(0, 1000)),
            'city' => $this->faker->city(),
            'state' => $this->faker->country(),
            'salary' => strval(rand(1000.00, 10000.00))
        ];

        $response = $this->json('POST', route('collaborator.store'), $params);
        $response->assertOk();       

        $response = $this->json('DELETE', route('collaborator.delete'), ['id' => $response->original['data']->id]);       
        $response->assertStatus(204);
    }

    /**
     *
     * @test
     * @return void
     */
    public function deleteAnExistingCollaboratorIdIsRequired()
    {
        $params = [
            'full_name' => $this->faker->name(),
            'cpf' => strval(rand(11111111111, 99999999999)),
            'email' => $this->faker->email(),
            'rg' => strval(rand(1000000, 9999999)),
            'birthdate' => $this->faker->date(),
            'cep' => strval(rand(55000000, 99999999)),
            'address' => $this->faker->streetName(),
            'number' => strval(rand(0, 1000)),
            'city' => $this->faker->city(),
            'state' => $this->faker->country(),
            'salary' => strval(rand(1000.00, 10000.00))
        ];

        $response = $this->json('POST', route('collaborator.store'), $params);
        $response->assertOk();       

        $response = $this->json('DELETE', route('collaborator.delete'));       
        $response->assertStatus(422);
    }
    
}
