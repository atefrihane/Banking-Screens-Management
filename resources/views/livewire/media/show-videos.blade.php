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
                        placeholder="Search videos...">
                </div>

            </div>
            <div class="table-responsive">
                <table class="table  table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th wire:click="sortBy('link')" style="cursor: pointer;">
                                Video



                            </th>


                            <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                Created_at


                            </th>
                            <th style="width:  40%">
                                Link
                            </th>

                            <th style="width:  8.33%">

                            </th>

                        </tr>
                    </thead>


                    <tbody>


                        @foreach ($videos as $video)

                        <tr>
                            <td style="width:  8.33%">

                                <video width="320" height="240" controls src="{{asset($video->link)}}">
                                    Your browser does not support the video tag.
                                </video>
                            </td>

                            <td style="width:  40%">{{$video->created_at}}</td>

                            <td class="text-center"> <button class="btn btn-primary" data-clipboard-text="{{asset($video->link)}}">
                                    Copy to clipboard
                                </button></td>

                            <td>
                                <div class="dropdown d-flex justify-content-center">

                                    <a href="" class="text-darl" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="color:black;">
                                        <i class="fas fa-ellipsis-h text-black"></i> </a>


                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#exampleModal{{$video->id}}">Delete</a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$video->id}}" tabindex="-1" role="dialog"
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
                                                    wire:click="handleDeleteVideo({{$video->id}})"
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
                    Showing {{$videos->firstItem()}} to {{$videos->lastItem()}} out of {{$videos->total()}}
                    videos
                </p>
                <div class="d-flex justify-content-center">


                    {{$videos->links()}}

                </div>

            </div>
        </div>
    </div>
</div>
