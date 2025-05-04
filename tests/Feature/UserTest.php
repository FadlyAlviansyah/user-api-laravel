<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
  use RefreshDatabase;

  public function test_can_create_user()
  {
    $data = [
      'name' => 'Test',
      'email' => 'test@example.com',
      'age' => 30
    ];
    $response = $this->postJson('/api/users', $data);
    $response->assertStatus(201)->assertJsonFragment($data);
  }

  public function test_can_get_users()
  {
    User::factory()->create();
    $response = $this->getJson('/api/users');
    $response->assertStatus(200);
  }

  public function test_can_update_user()
  {
    $user = User::factory()->create();
    $data = ['name' => 'Updated', 'email' => 'updated@example.com', 'age' => 31];
    $response = $this->putJson("/api/users/{$user->id}", $data);
    $response->assertStatus(200)->assertJsonFragment($data);
  }

  public function test_can_delete_user()
  {
    $user = User::factory()->create();
    $response = $this->deleteJson("/api/users/{$user->id}");
    $response->assertStatus(200)->assertJson(['message' => 'User deleted']);
  }
}

