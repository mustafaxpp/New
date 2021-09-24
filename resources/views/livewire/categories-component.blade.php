<div class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <!-- Name input -->
                            <div class="form-outline mb-2">
                                <label class="form-label" for="form3Example1"> Name</label>
                                <input type="text" wire:model="name" id="form3Example1" class="form-control" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <!-- Submit button -->
                            <a type="button" wire:click="save" class="btn btn-primary btn-block mb-4"> Save </a>`
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
        </div>
        @if (session()->has('message'))
             <div class="alert alert-success text-center">
                 {{ session('message') }}
             </div>
         @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                         <th>id</th>
                         <th>Name</th>
                         {{-- <th>Sub Category</th> --}}
                         {{-- <th>Main Category</th> --}}
                         <th>&nbsp;</th>
                         <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Models\Category::all() as $cat )

                         <tr>
                             <td class="text-danger">{{$cat->id}}</td>
                             <td class="text-primary">{{$cat->name}}</td>
                             {{-- <td class="text-primary">{{$cat->sub_categoires->name}}</td> --}}
                             {{-- <td class="text-primary">{{$cat->main_categoires->name}}</td> --}}
                             <td><a class="btn btn-sm btn-success" title="Edit {{$cat->name}}" wire:click='edit({{$cat->id}})'> Edit </a> </td>
                             <td><a class="btn btn-sm btn-danger" title="Delete {{$cat->name}}"  data-toggle="modal" data-target="#exampleModal{{$cat->id}}"> X </a> </td>
                         </tr>
                         <!-- Modal -->
                         <div class="modal fade" id="exampleModal{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Delete cat </h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                                 </div>
                                 <div class="modal-body">
                                 Are You Sure You Want Delete
                                 <span class="text-danger">
                                     <b>
                                         {{$cat->name}}
                                     </b>
                                 </span>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                 <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click='delete({{$cat->id}})'>Delete</button>
                                 </div>
                             </div>
                             </div>
                         </div>

                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>




