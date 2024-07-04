<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Website;
use App\Models\WebsitePost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebsitePostTest extends TestCase
{
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testErrorValidationForCreateWebsitePost()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'name' => null,
        ];

        $response = $this->postJson(route('createWebsitePost'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testCreateWebsitePost()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $postData = [
            'website_id' => $website->id,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'active' => '1'
        ];

        $response = $this->postJson(route('createWebsitePost'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForUpdateWebsitePost()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc',
            'name' => $this->faker->name(),
        ];

        $response = $this->putJson(route('updateWebsitePost'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testUpdateWebsitePost()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $websitePost = WebsitePost::factory()->create([
            'website_id' => $website->id,
            'active' => '0'
        ]);

        $postData = [
            'id' => $websitePost->id,
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'active' => '1'
        ];

        $response = $this->putJson(route('updateWebsitePost'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testErrorValidationForDeleteWebsitePost()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $postData = [
            'id' => 'abc'
        ];

        $response = $this->deleteJson(route('deleteWebsitePost'), $postData);
        $responseArray = $response->json();

        $this->assertFalse($responseArray['success']);
    }

    public function testDeleteWebsitePost()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $websitePost = WebsitePost::factory()->create([
            'website_id' => $website->id,
        ]);

        $postData = [
            'id' => $websitePost->id
        ];

        $response = $this->deleteJson(route('deleteWebsitePost'), $postData);
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

    public function testReadWebsitePost(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $website = Website::factory()->create();

        $websitePost = WebsitePost::factory()->create([
            'website_id' => $website->id,
        ]);

        $response = $this->getJson(route('readWebsitePost', ['id' => 'all']));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readWebsitePost', ['id' => $websitePost->id]));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);

        $response = $this->getJson(route('readWebsitePost'));
        $responseArray = $response->json();

        $response->assertOk();
        $this->assertTrue($responseArray['success']);
    }

}
