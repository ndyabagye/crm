<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Client;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
final class ClientFactory extends Factory
{
    /** @var class-string<Client> */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'website' => $this->faker->domainName(),
            'workspace_id' => Workspace::factory(),
        ];
    }
}
