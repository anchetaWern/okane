<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Middleware\SecureHeaders;
use App\Models\User;

class FundsManagementTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $this->withoutMiddleware(SecureHeaders::class);
    }

    private function signIn()
    {
        $user = User::factory()->create();
        return $this->actingAs($user);
    }

    /** @test */
    public function create_fund_form_is_loaded()
    {
        $this->signIn();

        $this->get('/funds/create')
            ->assertOk();
    }


    /** @test */
    public function a_fund_can_be_created_if_form_is_valid()
    {
        $this->signIn();

        $form_data = [
            'name' => 'ING Pay',
            'category' => 'high_interest_savings',
            'initial_balance' => 1000,
        ];

        $response = $this->post('/funds', $form_data);

        $response
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('user_funds', $form_data);
    }





}
