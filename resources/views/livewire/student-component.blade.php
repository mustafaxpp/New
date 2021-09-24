<div class="">
    <!-- Add Student -->
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Add {{ $name }}</h3>
                    </div>
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                        {{-- name --}}
                        <div class="">
                            <label class="form-label" for="form3Example1"> Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" wire:model="name" class="form-control" placeholder="Name">
                            </div>
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        {{--Email  --}}
                        <div class="">
                            <label class="form-label" for="form3Example1"> Email </label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" wire:model="email" class="form-control" placeholder="Email">
                            </div>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                      {{--Pw  --}}
                      <div class="">
                        <label class="form-label" for="form3Example1"> Password </label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input wire:model="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                  </div>
                  <div class="card-footer">
                    <button  wire:click="add" type="submit" class="btn btn-info btn-md float-right"> Add </button>
                  </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <!-- Add Student -->

      {{-- new table  --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
               <div class="card-header py-3 text-center">
                   <h6 class="m-0 font-weight-bold text-primary">Student Table</h6>
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
                                <th>Email</th>
                                <th>Photo</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                               </tr>
                           </thead>
                           <tbody>
                               @forelse (App\Models\User::all() as $student )
                               @if ($student->role == 'student')
                                <tr>
                                    <td class="text-danger">{{$loop->iteration}}</td>
                                    <td class="text-primary">{{$student->name}}</td>
                                    <td class="text-success">{{$student->email}}</td>
                                    <td class="items-center">

                                        @if ($student->profile_photo_path)
                                        <img src="{{ url('storage/' . $student->profile_photo_path) }}" class="h-10 w-10 rounded-full" alt="User Image">
                                        @else

                                        @endif
                                    </td>
                                    <td><a class="btn btn-sm btn-success" title="Edit {{$student->name}}" wire:click='edit({{$student->id}})'> Edit </a> </td>
                             <td><a class="btn btn-sm btn-danger" title="Delete {{$student->name}}"  data-toggle="modal" data-target="#exampleModal{{$student->id}}"> X </a> </td>
                         </tr>
                         <!-- Modal -->
                            <div class="">
                                <div class="modal fade" id="exampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete student </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        Are You Sure You Want Delete
                                        <span class="text-danger">
                                            <b>
                                                {{$student->name}}
                                            </b>
                                        </span>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" wire:click='delete({{$student->id}})'>Delete</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                @endif
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
    <!-- /.card -->
