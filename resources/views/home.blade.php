@extends('layouts.user')

@section('content-user')

<main class="user">
    <div class="pagetitle" style="margin-bottom:-80px;">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>

    <section class="section user">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card" style="margin-top:20px">
                        <div class="card-header"> User Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <p>ИФО:{{Auth::user()->name  }}-{{Auth::user()->middle_name }}-{{Auth::user()->surname  }}</p>
                        <p>Phone:{{Auth::user()->phone  }}--Email:{{Auth::user()->email  }}</p>
                                    <a href="{{ url('/') }}">Back</a>
                        </div>
                    </div>


                    <table class="table table-striped table-hover datatable dt-responsive">
                            <thead>
                                <tr>
                                <th>Employee Name(ФИО)</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Position</th>
                                <th>Skills</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($userdetails as $userdetail)
                                <tr>
                                <td>
                                 <p>{{ $userdetail->user->name }} {{ $userdetail->user->middle_name ?? 'n/a'}} {{ $userdetail->user->surname }}</p>
                               </td>
                                <td>{{$userdetail->user->email }}</td>
                                <td>{{ $userdetail->user->phone }}</td>
                                <td>{{$userdetail->pos->position}}</td>
                                <td>
                                    @foreach($userdetail->skill as $value)
                                    <ul>
                                        <li>

                                        {{$value}}

                                        </li>
                                    </ul>
                                    @endforeach

                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
            </div>
        </div>
    </section>
@endsection






