<?php

namespace Tests\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;
use App\Http\Controllers\OuvrageController;
use Illuminate\Http\Request;
use App\Models\Ouvrage;

class OuvrageControllerTest extends TestCase
{
    /** @test */
    public function test_index_method_returns_view_with_ouvrages()
    {
        $controller = new OuvrageController();
        $response = $controller->index();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('ouvrages', $response->getData());
    }

    /** @test */
    public function test_create_method_returns_view()
    {
        $controller = new OuvrageController();
        $response = $controller->create();

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }

    /** @test */
    public function test_store_method_creates_new_ouvrage_and_redirects()
    {
        $data = [
            'Titre' => 'Titre de test',
            'Auteur' => 'Auteur de test',
            'Editeur' => 'Editeur de test',
            'Prix' => 10.99,
            'AnneePublication' => '2023',
            'Statut' => 'disponible'
        ];

        $request = new \Illuminate\Http\Request($data);

        $controller = new OuvrageController();
        $response = $controller->store($request);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertNotNull(Ouvrage::where('Titre', 'Titre de test')->first());
    }

    /** @test */
    public function test_edit_method_returns_view_with_ouvrage()
    {
        $ouvrage = Ouvrage::factory()->create();

        $controller = new OuvrageController();
        $response = $controller->edit($ouvrage->id);

        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
        $this->assertArrayHasKey('ouvrage', $response->getData());
    }

    /** @test */
    public function test_update_method_updates_ouvrage_and_redirects()
    {
        $ouvrage = Ouvrage::factory()->create();

        $data = [
            'Titre' => 'Nouveau titre',
            'Auteur' => 'Nouvel auteur',
            'Editeur' => 'Nouvel éditeur',
            'Prix' => 15.99,
            'AnneePublication' => '2022',
            'Statut' => 'non disponible'
        ];

        $request = new \Illuminate\Http\Request($data);

        $controller = new OuvrageController();
        $response = $controller->update($request, $ouvrage->id);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);

        $updatedOuvrage = Ouvrage::findOrFail($ouvrage->id);
        $this->assertEquals('Nouveau titre', $updatedOuvrage->Titre);
        $this->assertEquals('Nouvel auteur', $updatedOuvrage->Auteur);
        // Ajoutez d'autres assertions pour vérifier les champs mis à jour si nécessaire
        $this->assertEquals('non disponible', $updatedOuvrage->Statut);
    }

    /** @test */
    public function test_destroy_method_deletes_ouvrage_and_redirects()
    {
        $ouvrage = Ouvrage::factory()->create();

        $controller = new OuvrageController();
        $response = $controller->destroy($ouvrage->id);

        $this->assertInstanceOf(\Illuminate\Http\RedirectResponse::class, $response);
        $this->assertNull(Ouvrage::find($ouvrage->id));
    }
}
