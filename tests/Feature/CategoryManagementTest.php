<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Middleware\SecureHeaders;
use App\Models\User;

class CategoryManagementTest extends TestCase
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
    public function create_category_form_is_loaded()
    {
        $this->signIn();

        $this->get('/categories/create')
            ->assertOk();
    }

    /** @test */
    public function a_category_can_be_created_if_form_is_valid()
    {
        $this->signIn();

        $form_data = [
            'name' => 'Monthly Salary - Main dev work',
            'classification' => 'income',
            'spending_limit' => null,
            'summary' => 'Queue Technology',
        ];

        $response = $this->post('/categories', $form_data);

        $response
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('user_categories', $form_data);
    }
}
