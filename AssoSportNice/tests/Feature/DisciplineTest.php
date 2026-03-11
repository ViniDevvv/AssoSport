<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Discipline;

class DisciplineTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_disciplines()
    {
        Discipline::create(['DIS_ID' => 'TEST', 'DIS_NOM' => 'Test']);

        $response = $this->get(route('disciplines.index'));
        $response->assertStatus(200);
        $response->assertSee('Test');
    }

    /** @test */
    public function it_can_create_a_discipline()
    {
        $response = $this->post(route('disciplines.store'), ['DIS_ID' => 'ABC', 'DIS_NOM' => 'Alpha']);
        $response->assertRedirect(route('disciplines.index'));
        $this->assertDatabaseHas('DISCIPLINE', ['DIS_ID' => 'ABC', 'DIS_NOM' => 'Alpha']);
    }

    /** @test */
    public function it_can_update_a_discipline()
    {
        $d = Discipline::create(['DIS_ID' => 'UPD', 'DIS_NOM' => 'Old']);
        $response = $this->put(route('disciplines.update', $d), ['DIS_NOM' => 'New']);
        $response->assertRedirect(route('disciplines.index'));
        $this->assertDatabaseHas('DISCIPLINE', ['DIS_ID' => 'UPD', 'DIS_NOM' => 'New']);
    }

    /** @test */
    public function it_can_delete_a_discipline()
    {
        $d = Discipline::create(['DIS_ID' => 'DEL', 'DIS_NOM' => 'Trash']);
        $response = $this->delete(route('disciplines.destroy', $d));
        $response->assertRedirect(route('disciplines.index'));
        $this->assertDatabaseMissing('DISCIPLINE', ['DIS_ID' => 'DEL']);
    }
}
