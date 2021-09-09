<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Middleware\SecureHeaders;
use App\Models\User;

class TransactionsTest extends TestCase
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
    public function create_transactions_form_is_loaded()
    {
        $this->signIn();

        $this->get('/transactions/create')
            ->assertOk();
    }


    /** @test */
    public function a_transaction_can_be_created_if_form_is_valid()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $form_data = [
            'transaction_datetime' => now()->toDateTimeString(),
            'user_category_id' => 1,
            'transaction_type' => 'savings',
            'summary' => 'bank savings',
            'source_user_fund_id' => 1,
            'destination_user_fund_id' => null,
            'amount' => 10000,
            'transfer_fee' => null,
            'notes' => null,
        ];

        $response = $this->post('/transactions', $form_data);
        $response
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('user_transactions', $form_data);

    }
}
