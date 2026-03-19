<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Competition;
use App\Models\Discipline;

class CompetitionTest extends TestCase
{
    use RefreshDatabase;

        #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_list_competitions()
    {
        $d = Discipline::create(['DIS_ID' => 'D1', 'DIS_NOM' => 'Dis1']);
        Competition::create(['COM_ID' => 'C1', 'COM_NOM' => 'Comp1', 'DIS_ID' => $d->DIS_ID]);

        $response = $this->get(route('competitions.index'));
        $response->assertStatus(200);
        $response->assertSee('Comp1');
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_create_a_competition()
    {
        $d = Discipline::create(['DIS_ID' => 'D1', 'DIS_NOM' => 'Dis1']);

        $response = $this->post(route('competitions.store'), [
            'COM_ID' => 'C2',
            'COM_NOM' => 'Comp2',
            'DIS_ID' => $d->DIS_ID,
            'COM_DATE' => '2026-01-01',
        ]);

        $response->assertRedirect(route('competitions.index'));
        $this->assertDatabaseHas('COMPETITION', ['COM_ID' => 'C2', 'COM_NOM' => 'Comp2']);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_update_a_competition()
    {
        $d1 = Discipline::create(['DIS_ID' => 'D1', 'DIS_NOM' => 'Dis1']);
        $d2 = Discipline::create(['DIS_ID' => 'D2', 'DIS_NOM' => 'Dis2']);
        $c = Competition::create(['COM_ID' => 'C3', 'COM_NOM' => 'Comp3', 'DIS_ID' => $d1->DIS_ID]);

        $response = $this->put(route('competitions.update', $c), [
            'COM_NOM' => 'Comp3 Updated',
            'DIS_ID' => $d2->DIS_ID,
            'COM_DATE' => '2026-02-02',
        ]);

        $response->assertRedirect(route('competitions.index'));
        $this->assertDatabaseHas('COMPETITION', ['COM_ID' => 'C3', 'COM_NOM' => 'Comp3 Updated', 'DIS_ID' => $d2->DIS_ID]);
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function it_can_delete_a_competition()
    {
        $d = Discipline::create(['DIS_ID' => 'D1', 'DIS_NOM' => 'Dis1']);
        $c = Competition::create(['COM_ID' => 'C4', 'COM_NOM' => 'Comp4', 'DIS_ID' => $d->DIS_ID]);

        $response = $this->delete(route('competitions.destroy', $c));
        $response->assertRedirect(route('competitions.index'));
        $this->assertDatabaseMissing('COMPETITION', ['COM_ID' => 'C4']);
    }
}
