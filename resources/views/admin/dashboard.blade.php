@if (Auth::user()->role_as == 'admin')
        @extends('layouts.ad')

            @section('content-ad')



                <main id="main" class="main">

                    <div class="pagetitle">
                    <h1>Dashboard</h1>
                    <nav>
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                    </div>

                    <section class="section dashboard">
                    <div class="row">


                        <div class="col-lg-12">
                        <div class="row">


                            <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">
                                <div class="card-body">
                                <h5 class="card-title">Users</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                    <h6>{{ $countusers }}</h6>
                                    </div>
                                </div>
                                </div>

                            </div>
                            </div>


                            <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">
                                <div class="card-body">
                                <h5 class="card-title">Admin's</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-house"></i>
                                    </div>
                                    <div class="ps-3">
                                    <h6>{{ $countadmin }}</h6>
                                    </div>
                                </div>
                                </div>

                            </div>
                            </div>

                            <div class="col-xxl-4 col-xl-12">

                                <div class="card info-card customers-card">



                                    <div class="card-body">
                                    <h5 class="card-title">Должность <span>| Count</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-circle"></i>
                                        </div>
                                        <div class="ps-3">
                                            <ul id="limheight">
                                            @foreach($countpositions as $countposition)
                                        <li type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="
                                        @forelse ($userdetails as $detail )
                                        @if ($countposition->id == $detail->pos_id)
                                            {{ $detail->user->name }},
                                        @endif
                                        @empty
                                        zero

                                        @endforelse



                                        ">{{ $countposition->position }}:{{ $countposition->usercount_count }}(staff members) </li>
                                        @endforeach
                                    </ul>


                                        </div>
                                    </div>

                                    </div>
                                </div>

                                </div>


                             <div class="col-12">
                                <div class="card recent-sales overflow-auto">
                                    <div class="card-body">
                                    <h5 class="card-title">Сотрудник <span>|Staff</span></h5>

                                    <table class="table table-striped table-hover datatable dt-responsive">
                                        <thead>
                                            <tr>
                                            <th>Employee Name(ФИО)</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Date Registration</th>
                                            <th>Profession</th>
                                            <th>Skills</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                            <td>

                                                    {{ $user->name }}-{{ $user->middle_name ?? 'n/a'}}-{{ $user->surname }}

                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{\Carbon\Carbon::createFromTimestamp(strtotime($user->created_at))->format('d-m-Y') }}</td>

                                                    @if ($user->role_as == 'user')
                                                        @foreach($userdetails as $detail)
                                                        @if($detail->user_id == $user->id)
                                                                <td>
                                                                    {{ $detail->pos->position ?? 'n/a' }}
                                                                </td>
                                                        @endif
                                                        @endforeach
                                                    @elseif ($user->role_as == 'admin')
                                                         <td>
                                                              Admin
                                                        </td>
                                                     @endif



                                                     @if ($user->role_as == 'user')
                                                            <td>
                                                                @foreach($user->userd->skill as $value)
                                                                    <ul class="list">
                                                                        <li>{{$value ?? 'n/a' }},</li>
                                                                    </ul>
                                                                @endforeach
                                                            </td>

                                                     @elseif ($user->role_as == 'admin')
                                                        <td>
                                                            Admin
                                                        </td>
                                                    @endif



                                            <td>
                                                @if(Cache::has('is_online' . $user->id))
                                                <div class="badge bg-success">Online</div>
                                                @else
                                                <div class="badge bg-danger">Offline</div>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ route('employee.show',$user->id) }}" type="button" class="badge bg-success">View</a>
                                            </td>
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
@else
404
@endif
