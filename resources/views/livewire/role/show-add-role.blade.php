<div>
        <div class="card card-primary">
    
            <div class="card-body">
                <form wire:submit.prevent="handleAddRole">
                    <h3 class="">Add a role</h3>
    
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
                            <input type="text" class="form-control" wire:model="name" placeholder="Role.." required>
                        </div>
    
                    </div>
    
                    <div class="mx-auto mt-4" style="width: 200px;">
                        <div class="row">
                            <a href="{{route('showRoles')}}" class="btn btn-danger ml-3">Cancel </a>
                            <button type="submit" class="btn btn-primary ml-4">Confirm</button>
                        </div>
                    </div>
                </form>
    
            </div>
        </div>
    </div>
    