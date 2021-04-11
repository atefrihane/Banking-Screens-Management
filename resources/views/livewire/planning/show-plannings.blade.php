<div>
    <div class="card">

        <div class="card-body">
            <div class="row mb-4">
                <div class="col form-inline">
                    Per Page: &nbsp;
                    <select wire:model="perPage" class="form-control">
                        <option>2</option>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>25</option>
                    </select>
                </div>

                <div class="col">
                    <input wire:model.debounce.300ms="search" class="form-control" type="text"
                        placeholder="Search plannings...">
                </div>

            </div>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th wire:click="sortBy('channel_id')" style="cursor: pointer;">
                                Channel



                            </th>

                        
                            <th wire:click="sortBy('player_id')" style="cursor: pointer;">
                                Player


                            </th>

                            <th wire:click="sortBy('schedule_time')" style="cursor: pointer;">
                                Schedule time


                            </th>

                            <th wire:click="sortBy('status')" style="cursor: pointer;">
                                Status


                            </th>

                            <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                    Created at


                            </th>
                            <th style="width:  8.33%">

                            </th>

                        </tr>
                    </thead>


                    <tbody>


                        @foreach ($plannings as $planning)

                        <tr>
                            <td>{{ucfirst($planning->channel->name)}}</td>
                            <td>{{ucfirst($planning->player->name)}}</td>
                            <td>{{$planning->schedule_time}}</td>
                            <td>{{$planning->status == 0 ? 'Pending' : 'Processed'}}</td>
                            <td>{{$planning->created_at}}</td>
                            <td>
                                <div class="dropdown d-flex justify-content-center">

                                    <a href="" class="text-darl" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="color:black;">
                                        <i class="fas fa-ellipsis-h text-black"></i> </a>


                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        
                                        {{-- <a class="dropdown-item" href="{{route('showUpdatePlanning',$planning->id)}}">Edit</a> --}}
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#exampleModal{{$planning->id}}">Delete</a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$planning->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">

                                            <div class="modal-body">
                                                <h5> Would you like to delete this element ?</h5>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="handleDeletePlanning({{$planning->id}})"
                                                    data-dismiss="modal">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                                @endforeach





                    </tbody>
                   

             


                </table>
            </div>


            <div>

                <p class="mt-4">
                    Showing {{$plannings->firstItem()}} to {{$plannings->lastItem()}} out of {{$plannings->total()}}
                    plannings
                </p>
                <div class="d-flex justify-content-center">


                    {{$plannings->links()}}

                </div>

            </div>
        </div>
    </div>
</div>
