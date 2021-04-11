<div>
    <div class="card card-primary">

        <div class="card-body">
            <form wire:submit.prevent="handleAddPlayer">
                <h3 class="">Add a player</h3>

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
                <div class="row mt-5">
                    <div class="col-md-12">

                        <label for="">Name</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Name.." required>
                    </div>

                </div>


                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="autocomplete"> Location/City/Address </label>
                        <input type="text" name="autocomplete" id="autocomplete" class="form-control"
                            placeholder="Select Location"  wire:model="location" required>
                    </div>

                    <input type="text" id="latitude" class="form-control d-none" wire:model="latitude">
                    <input type="text" id="longitude" class="form-control d-none" wire:model="longitude">

                </div>

                <div class="row mt-3">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Channel</label>
                            <select class="form-control" id="exampleFormControlSelect1" wire:model="channel_id"
                                required>
                                @if($channels)
                                <option value="" selected disabled>Select channel</option>
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




                <div class="mx-auto mt-4" style="width: 200px;">
                    <div class="row">
                        <a href="{{route('showNetworkPlayers',$this->network->id)}}" class="btn btn-danger ml-3">Cancel
                        </a>
                        <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
