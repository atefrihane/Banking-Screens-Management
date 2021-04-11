<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Modules\Channel\Models\Channel;
use App\Modules\Network\Models\Network;
use App\Http\Livewire\Network\ShowNetworkChannels;
use App\Http\Livewire\Network\ShowAddNetworkChannel;
use App\Http\Livewire\Network\ShowUpdateNetworkChannel;

class ChannelTest extends TestCase
{
    public function test_add_channel_error_name()
    {
        $getNetwork = Network::first();
        Livewire::test(ShowAddNetworkChannel::class, ['network' => $getNetwork])
            ->set('name', '')
            ->set('url', 'https://github.com/livewire/livewire/issues/649')
            ->call('handleAddChannel')
            ->assertHasErrors(['name' => 'required']);

    }

    public function test_add_channel_error_url()
    {
        $getNetwork = Network::first();
        Livewire::test(ShowAddNetworkChannel::class, ['network' => $getNetwork])
            ->set('name', 'zz')
            ->set('url', 'foo')
            ->call('handleAddChannel')
            ->assertHasErrors(['url' => 'url']);

    }

    public function test_add_channel_success()
    {
        $getNetwork = Network::first();
        Livewire::test(ShowAddNetworkChannel::class, ['network' => $getNetwork])
            ->set('name', 'zz')
            ->set('url', 'https://github.com/livewire/livewire/issues/649')
            ->call('handleAddChannel')
        ;
        $this->assertTrue(Channel::whereName('zz')->exists());
    }

    public function test_add_second_channel_success()
    {
        $getNetwork = Network::first();
        Livewire::test(ShowAddNetworkChannel::class, ['network' => $getNetwork])
            ->set('name', 'aa')
            ->set('url', 'https://github.com/livewire/livewire/issues/649')
            ->call('handleAddChannel')
        ;
        $this->assertTrue(Channel::whereName('aa')->exists());
    }

    public function test_add_channel_error_already_exist()
    {
        $getNetwork = Network::first();
        Livewire::test(ShowAddNetworkChannel::class, ['network' => $getNetwork])
            ->set('name', 'aa')
            ->set('url', 'https://github.com/livewire/livewire/issues/649')
            ->call('handleAddChannel')
            ->assertHasErrors(['name' => 'unique']);

    }

    public function test_update_channel_success()
    {
        $getChannel = Channel::first();

        Livewire::test(ShowUpdateNetworkChannel::class, ['channel' => $getChannel])
            ->set('name', 'zz')
            ->set('url', 'https://github.com/livewire/livewire/issues/649')
            ->call('handleUpdateChannel');

        $this->assertTrue(Channel::whereName('zz')->exists());

    }

    public function test_update_channel_error()
    {
        $getChannel = Channel::first();
        Livewire::test(ShowUpdateNetworkChannel::class, ['channel' => $getChannel])

            ->set('name', 'aa')
            ->set('url', 'https://github.com/livewire/livewire/issues/649')
            ->call('handleUpdateChannel')
            ->assertHasErrors(['name' => 'unique']);

    }

    public function test_update_delete_channel_success()
    {

        $getNetwork = Network::first();
        $getChannelToDelete = Channel::first();
        Livewire::test(ShowNetworkChannels::class, ['network' => $getNetwork])

            ->call('handleDeleteChannel', $getChannelToDelete->id)
            ->assertDispatchedBrowserEvent('ElementDeleted');

    }

}
