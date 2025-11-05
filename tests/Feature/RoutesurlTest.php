<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Planet;
use App\Models\Crew;
use App\Models\Technology;

class RoutesUrlTest extends TestCase
{
    public function test_routes()
    {
        // 🪐 Données de test
        $planet = Planet::factory()->create();
        $crew = Crew::factory()->create();
        $technology = Technology::factory()->create();

        // 🌐 Tableau des routes à tester
        $routes = [
            '/Space/Planets/space',
            '/Space/Planets/',
            '/Space/Crew/',
            '/Space/Technologies/',
            "/Space/Planets/{$planet->id}",
            "/Space/Crew/{$crew->id}",
            "/Space/Starships/{$technology->id}",
        ];

        // 🧪 Boucle de test
        foreach ($routes as $url) {

            $response = $this->get($url);
            
            // dump([
            //     'url' => $url,
            //     'status' => $response->status(),
            //     'content_preview' => substr($response->getContent(), 0, 200) // 200 caractères html
            // ]);

            $response->assertStatus(200, "❌ La route {$url} ne retourne pas un code 200.");
        }
    }
}