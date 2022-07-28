<?php

namespace Tests\Unit\PaymentCollaborators;

use App\Services\PaymentCollaborators\PaymentCollaboratorService;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeletePaymentCollaboratorTest extends TestCase
{
    use WithFaker;

    protected $collaborator;

    /**
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();

        $this->service = app()->make(PaymentCollaboratorService::class);

        $this->prepareForTests();
    }

    /**
     *
     * @return void
     */
    private function prepareForTests(): void
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

        $this->collaborator = $this->json('POST', route('collaborator.store'), $params);
    }
    
    /**
     *
     * @test
     * @return void
     */
    public function deletePaymentCollaborator()
    {
        $response = $this->service->delete($this->collaborator->original['data']->id);

        $this->assertEquals(204, $response['status']);
    }
}
