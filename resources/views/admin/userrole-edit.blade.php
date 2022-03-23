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
                            <form action="{{ route('userrole.update',$user->id) }}" method="POST" >

                                @csrf

                                    <div class="col-xl-8">
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label"> Name</label>
                                            <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" id="Name" value="{{ $user->name }}" readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Role</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select class="form-select" name="role_as" aria-label="Default select example">

                                                    <option selected value="{{ $user->role_as }}">{{ $user->role_as }}</option>
                                                    @if($user->role_as == 'user')
                                                    <option value="admin">admin</option>
                                                    @elseif($user->role_as == 'admin')
                                                    <option value="user">user</option>
                                                    @endif

                                                  </select>

                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                        </div>

                                    </div>
                        </div>
                    </section>
                </main>
            @endsection
@endif
