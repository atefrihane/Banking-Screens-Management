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
                        placeholder="Search photos...">
                </div>

            </div>


            <div class="table-responsive">
                <table class="table  table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th wire:click="sortBy('link')" style="cursor: pointer;" class="mx-auto">
                                Photo



                            </th>


                            <th wire:click="sortBy('created_at')" style="cursor: pointer;">
                                Created_at


                            </th>
                            <th style="cursor: pointer;">
                                Link


                            </th>
                            <th style="width:  8.33%">

                            </th>

                        </tr>
                    </thead>


                    <tbody>


                        @foreach ($images as $image)

                        <tr>
                            <td style="width: 25%" class="text-center">
                                <img src="{{$image->link}}" alt="" style="width:200px;height:200px;object-fit:cover;">

                            </td>

                            <td>{{$image->created_at}}</td>
                            <td class="text-center">


                                <button class="btn btn-primary" data-clipboard-text="{{asset($image->link)}}">
                                    Copy to clipboard
                                </button>

                            </td>
                            <td>
                                <div class="dropdown d-flex justify-content-center">

                                    <a href="" class="text-darl" id="dropdownMenuButton" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" style="color:black;">
                                        <i class="fas fa-ellipsis-h text-black"></i> </a>


                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#exampleModal{{$image->id}}">Delete</a>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$image->id}}" tabindex="-1" role="dialog"
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
                                                    wire:click="handleDeleteImage({{$image->id}})"
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
                    Showing {{$images->firstItem()}} to {{$images->lastItem()}} out of {{$images->total()}}
                    images
                </p>
                <div class="d-flex justify-content-center">


                    {{$images->links()}}

                </div>

            </div>
        </div>
    </div>
</div>
