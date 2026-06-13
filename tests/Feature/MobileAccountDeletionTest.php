<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class MobileAccountDeletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_soft_delete_account(): void
    {
        $user = User::factory()->create([
            'created_by' => null,
            'state_id' => null,
        ]);
        $token = $user->createToken('Access Token');

        Sanctum::actingAs($user);

        $response = $this->deleteJson('/api/auth/account');

        $response->assertOk()
            ->assertJson([
                'status' => true,
                'message' => 'Account deleted successfully',
            ]);

        $this->assertSoftDeleted('users', ['id' => $user->id]);
        $this->assertDatabaseMissing('personal_access_tokens', ['id' => $token->accessToken->id]);
    }

    public function test_guest_cannot_delete_account(): void
    {
        $response = $this->deleteJson('/api/auth/account');

        $response->assertUnauthorized();
    }
}
