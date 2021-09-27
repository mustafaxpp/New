<div>
    <!-- Profile Image -->
   <div class="container">
       <div class="row">
           <div class="col-1"> </div>
           <div class="col-10">
               <div class="card card-primary card-outline">
                   <div class="card-body box-profile">
                       <div class="text-center">
                           @if ($admin->profile_photo_path)
                           <img class="profile-user-img img-fluid img-circle"  src="{{ url('storage/' . $admin->profile_photo_path) }}" alt="User profile picture">
                           @else
                           <img class="profile-user-img img-fluid img-circle"  src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="User profile picture">
                           @endif
                       </div>
                       <div class="text-cente">
                           <h3 class="profile-username text-center">{{$admin->name}}</h3>
                           <p class="text-muted text-center">{{$admin->email}}</p>
                       </div>

                     <ul class="list-group list-group-unbordered mb-3">
                       <li class="list-group-item">
                         <b>Cteated At </b> <a class="float-right">{{ $admin->created_at->diffForHumans()}}</a>
                       </li>
                       <li class="list-group-item">
                         <b>Updated at</b> <a class="float-right">{{ $admin->updated_at->diffForHumans()}}</a>
                       </li>
                       <li class="list-group-item">
                         <b>Role</b> <a class="float-right">{{ $admin->role }}</a>
                       </li>
                     </ul>

                     <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                   </div>
                   <!-- /.card-body -->
               </div>
           </div>
           <div class="col-1">
               <a href="{{ url()->previous() }}" type="button" class="btn btn-info btn-xs float-right">Back</a>

           </div>
       </div>
   </div>
</div>
