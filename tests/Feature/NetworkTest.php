<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Database\Factories\UserFactory;
use App\Modules\Network\Models\Network;
use App\Http\Livewire\Network\ShowAddNetwork;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NetworkTest extends TestCase
{

    public function test_add_second_network_error_required()
    {

    

        Livewire::test(ShowAddNetwork::class)
            ->set('name', '')
            ->call('handleAddNetwork')
            ->assertHasErrors(['name' => 'required']);

    }

    public function test_add_network_success()
    {

     

        Livewire::test(ShowAddNetwork::class)
            ->set('name', 'foo')
            ->call('handleAddNetwork');

        $this->assertTrue(Network::whereName('foo')->exists());
    }


    public function test_add_network_error_name_exist()
    {

        Livewire::test(ShowAddNetwork::class)
        ->set('name', 'foo')
        ->call('handleAddNetwork')
        ->assertHasErrors(['name' => 'unique']);
    }


  
   



 

}
