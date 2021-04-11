@component('mail::message')
<style>
    table.inner-body {
        width: 100%;
    }

</style>

We inform you that the players below are off :
<ul>
    @foreach ($players as $player)
    <li> {{$player->name}} </li>
    @endforeach

</ul>


@endcomponent
