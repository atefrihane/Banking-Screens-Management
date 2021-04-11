<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleUpdatePlanning">
                <h3 class="">Update a planning</h3>

                @if ($errors->any())
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                @endif
           

                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Player</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="player_id"
                                wire:change="handleLoadPlayers($event.target.value)" required>
                                @if($players)
                                <option value="" selected>Select player</option>
                                @foreach ($players as $player)
                                <option value="{{$player->id}}"> {{$player->name}}</option>
                                @endforeach
                                @else
                                <option value="">No player found</option>

                                @endif
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Channel</label>
                            <select class="form-control"  wire:model="channel_id"
                                required>
                                @if($channels)
                                <option value="" disabled>Select channel</option>
                                @foreach ($channels as $channel)
                                <option value="{{$channel->id}}"> {{$channel->name}}</option>
                                @endforeach
                                @else
                                <option value="">No channel found</option>

                                @endif
                            </select>
                        </div>
                    </div>

                </div>

                <div class="row mt-3">
                    <div class="col-md-12">

                        <label for="">Schedule time</label>
                        <input type="datetime-local" class="form-control"  value="{{ date('Y-m-d\TH:i', strtotime($schedule_time)) }}" onchange="window.livewire.emit('set:updateScheduleTime',event.target.value)"  placeholder="Schedule time.." required>
                    </div>

                </div>
                <div class="mx-auto mt-4" style="width: 200px;">
                    <div class="row">
                        <a href="{{route('showPlannings')}}" class="btn btn-danger ml-3">Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
