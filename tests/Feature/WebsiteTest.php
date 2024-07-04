<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebsiteTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testErrorValidationForCreateWebsite()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'name' => null,
        ];

        $response = $this->postJson(route('createWebsite'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testCreateWebsite()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'name' => $this->faker->name(),
            'url' => $this->faker->url(),
            'active' => '1'
        ];

        $response = $this->postJson(route('createWebsite'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForUpdateWebsite()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc',
            'name' => $this->faker->name(),
            'url' => $this->faker->url(),
            'active' => '1'
        ];

        $response = $this->putJson(route('updateWebsite'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testUpdateWebsite()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $postData = [
            'id' => $website->id,
            'name' => $this->faker->name(),
            'url' => $this->faker->url(),
            'active' => '0'
        ];

        $response = $this->putJson(route('updateWebsite'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForDeleteWebsite()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc'
        ];

        $response = $this->deleteJson(route('deleteWebsite'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testDeleteWebsite()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $postData = [
            'id' => $website->id
        ];

        $response = $this->deleteJson(route('deleteWebsite'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testReadWebsite(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $response = $this->getJson(route('readWebsite', ['id' => 'all']));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readWebsite', ['id' => $website->id]));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readWebsite'));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

}
