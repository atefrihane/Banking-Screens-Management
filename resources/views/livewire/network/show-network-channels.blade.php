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
                        placeholder="Search channels...">
                </div>

            </div>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th wire:click="sortBy('name')" style="cursor: pointer;">
                                Name



                            </th>

                            <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                Created_at


                            </th>

                            <th style="cursor: pointer;">
                                Live preview


                            </th>
                            <th style="width:  8.33%">

                            </th>

                        </tr>
                    </thead>


                    <tbody>


                        @foreach ($channels as $channel)

                        <tr>
                            <td>{{ucfirst($channel->name)}}</td>

                            <td>{{$channel->created_at}}</td>
                            <td class="text-center"><a href="{{$channel->url}}"  target="_blank" class="btn  btn-primary">Show</a></td>
                            <td>
                                <div class="dropdown d-flex justify-content-center">

                                    <a href="" class="text-darl" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="color:black;">
                                        <i class="fas fa-ellipsis-h text-black"></i> </a>


                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                            href="{{route('showChannelContent',$channel->id)}}">Customize</a>
                                            @if($channel->zip_file)    
                                            <a class="dropdown-item"
                                            href="{{route('handleDownloadZip',$channel->id)}}">Download</a>
                                             @endif  
                                            <a class="dropdown-item"
                                            href="{{route('showUploadZip',$channel->id)}}">Upload</a>
                                          

                                        <a class="dropdown-item"
                                            href="{{route('showUpdateChannel',$channel->id)}}">Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#exampleModal{{$channel->id}}">Delete</a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$channel->id}}" tabindex="-1" role="dialog"
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
                                                    wire:click="handleDeleteChannel({{$channel->id}})"
                                                    data-dismiss="modal">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @endforeach





                    </tbody>
                    </td>

                    </tr>



                </table>
            </div>


            <div>

                <p class="mt-4">
                    Showing {{$channels->firstItem()}} to {{$channels->lastItem()}} out of {{$channels->total()}}
                    channels
                </p>
                <div class="d-flex justify-content-center">


                    {{$channels->links()}}

                </div>

            </div>
        </div>
    </div>
</div>
