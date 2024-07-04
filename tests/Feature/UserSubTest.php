<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserSub;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSubTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testErrorValidationForCreateUserSub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'name' => null,
        ];

        $response = $this->postJson(route('createUserSub'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testCreateUserSub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $postData = [
            'user_id' => $user->id,
            'website_id' => $website->id,
            'active' => '1'
        ];

        $response = $this->postJson(route('createUserSub'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForUpdateUserSub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc',
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(route('updateUserSub'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testUpdateUserSub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $userSub = UserSub::factory()->create([
                'user_id' => $user->id,
                'website_id' => $website->id,
                'active' => '0'
            ]);

        $postData = [
            'id' => $userSub->id,
            'active' => '1'
        ];

        $response = $this->putJson(route('updateUserSub'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForDeleteUserSub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc'
        ];

        $response = $this->deleteJson(route('deleteUserSub'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testDeleteUserSub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $userSub = UserSub::factory()->create([
                'user_id' => $user->id,
                'website_id' => $website->id
            ]);

        $postData = [
            'id' => $userSub->id
        ];

        $response = $this->deleteJson(route('deleteUserSub'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testReadUserSub(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $userSub = UserSub::factory()->create([
                'user_id' => $user->id,
                'website_id' => $website->id
            ]);

        $response = $this->getJson(route('readUserSub', ['id' => 'all']));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readUserSub', ['id' => $userSub->id]));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readUserSub'));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

}
