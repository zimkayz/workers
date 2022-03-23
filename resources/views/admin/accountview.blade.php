@if (Auth::user()->role_as == 'admin')
        @extends('layouts.ad')

            @section('content-ad')




                <main id="main" class="main">

                    <div class="pagetitle">
                    <h1>Dashboard</h1>
                    <nav>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </nav>
                    </div>
                    <section class="section profile">
                        <div class="row">
                          <div class="col-xl-4">

                            <div class="card">
                              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                <img src="{{asset('admin/assets/img/blank-avatar.png ')}}" alt="Profile" class="rounded-circle">
                                @foreach ($users as $user)
                                @if(isset(Auth::user()->id) && Auth::user()->id == $user->id)

                                <h2>{{ $user->name ?? '' }} {{ $user->middlename ?? '' }} {{ $user->surname ?? '' }} </h2>
                                <h3>{{ $user->role_as  }}</h3>
                                @endif
                                @endforeach
                                <div class="social-links mt-2">
                                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                </div>
                              </div>
                            </div>

                          </div>

                          <div class="col-xl-8">

                            <div class="card">
                              <div class="card-body pt-3">
                                @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                  <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                                  </li>

                                  <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Add Admin</button>
                                  </li>
                                </ul>
                                <div class="tab-content pt-2">

                                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">About</h5>
                                    <p class="small fst-italic">Workers Directory. The Admin is responsible to add new positions and skills to the system.Also being able to edit,delete records. Admin can change users role from user to admin and delete users.</p>

                                    <h5 class="card-title">Profile Details</h5>
                                    @foreach ($users as $user)
                                    @if(isset(Auth::user()->id) && Auth::user()->id == $user->id)
                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                      <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Middlename</div>
                                      <div class="col-lg-9 col-md-8">{{ $user->usermiddlename }}</div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Surname</div>
                                      <div class="col-lg-9 col-md-8">{{ $user->surname }}</div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Role</div>
                                      <div class="col-lg-9 col-md-8">{{ $user->role_as }}</div>
                                    </div>


                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Phone</div>
                                      <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                                    </div>

                                    <div class="row">
                                      <div class="col-lg-3 col-md-4 label">Email</div>
                                      <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                    </div>
                                    @endif
                                    @endforeach
                                  </div>

                                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <table class="table table-striped table-hover datatable dt-responsive">
                                        <thead>
                                             <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Edit</th>

                                             </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->name }}</th>
                                                <td>{{ $user->role_as }}</td>
                                                <td><a href="{{ route('userrole.edit',$user->id) }}" type="button" class="btn btn-outline-primary">Edit</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                  </div>
                                </div>




                              </div>
                            </div>

                          </div>
                        </div>
                      </section>



                </main>







            @endsection
@endif
