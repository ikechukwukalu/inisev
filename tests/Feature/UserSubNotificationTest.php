<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserSubNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSubNotificationTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testErrorValidationForCreateUserSubNotification()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'name' => null,
        ];

        $response = $this->postJson(route('createUserSubNotification'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testCreateUserSubNotification()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'name' => $this->faker->name(),
        ];

        $response = $this->postJson(route('createUserSubNotification'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForUpdateUserSubNotification()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc',
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(route('updateUserSubNotification'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testUpdateUserSubNotification()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $userSubNotification = UserSubNotification::factory()->create();

        $postData = [
            'id' => $userSubNotification->id,
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(route('updateUserSubNotification'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForDeleteUserSubNotification()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc'
        ];

        $response = $this->deleteJson(route('deleteUserSubNotification'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testDeleteUserSubNotification()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $userSubNotification = UserSubNotification::factory()->create();

        $postData = [
            'id' => $userSubNotification->id
        ];

        $response = $this->deleteJson(route('deleteUserSubNotification'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testReadUserSubNotification(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $userSubNotification = UserSubNotification::factory()->create();

        $response = $this->getJson(route('readUserSubNotification', ['id' => 'all']));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readUserSubNotification', ['id' => $userSubNotification->id]));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readUserSubNotification'));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

}
