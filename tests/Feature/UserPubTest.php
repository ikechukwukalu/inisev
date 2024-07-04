<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserPub;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserPubTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testErrorValidationForCreateUserPub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'name' => null,
        ];

        $response = $this->postJson(route('createUserPub'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testCreateUserPub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $postData = [
            'user_id' => $user->id,
            'website_id' => $website->id,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'active' => '1'
        ];

        $response = $this->postJson(route('createUserPub'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForUpdateUserPub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc',
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(route('updateUserPub'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testUpdateUserPub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $userPub = UserPub::factory()->create([
            'user_id' => $user->id,
            'website_id' => $website->id,
            'active' => '0'
        ]);

        $postData = [
            'id' => $userPub->id,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'active' => '1'
        ];

        $response = $this->putJson(route('updateUserPub'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForDeleteUserPub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc'
        ];

        $response = $this->deleteJson(route('deleteUserPub'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testDeleteUserPub()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $userPub = UserPub::factory()->create([
            'user_id' => $user->id,
            'website_id' => $website->id,
            'active' => '0'
        ]);

        $postData = [
            'id' => $userPub->id
        ];

        $response = $this->deleteJson(route('deleteUserPub'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testReadUserPub(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $userPub = UserPub::factory()->create([
            'user_id' => $user->id,
            'website_id' => $website->id,
            'active' => '0'
        ]);

        $response = $this->getJson(route('readUserPub', ['id' => 'all']));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readUserPub', ['id' => $userPub->id]));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readUserPub'));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

}
