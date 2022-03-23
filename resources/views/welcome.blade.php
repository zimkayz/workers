@extends('layouts.user')

@section('content-user')

<main class="user">

    <section class="section user">
        <div class="row">


            <div class="col-lg-12">



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

                            @foreach ($userdetails as $detail)
                            <tr>
                            <td>

                                <div class="d-flex align-items-center">
                                    @auth
                                    <div class="avatar avatar-blue mr-3">{{ substr($detail->user->name ,0,1) }} {{ substr($detail->user->surname ,0,1) }}</div>

                                    <div class="">
                                    <p class="font-weight-bold mb-0">{{$detail->user->name }}</p>
                                    <p class="text-muted mb-0">{{$detail->user->middle_name ?? 'n/a'}} {{$detail->user->surname }}</p>
                                    </div>
                                </div>

                                @endauth
                                @guest
                                    <p>**********</p>
                                @endguest
                            </td>

                            <td>  @auth
                                {{ $detail->user->email }}
                                @endauth
                                @guest
                                    <p>**********</p>
                                @endguest
                            </td>
                            <td>  @auth{{$detail->user->phone }}
                                @endauth
                                @guest
                                    <p>**********</p>
                                @endguest
                            </td>
                            <td>{{ $detail->pos->position ?? 'n/a' }}

                            </td>
                            <td>
                                @foreach($detail->skill as $value)
                                {{$value}},
                            @endforeach
                            </td>

                            </tr>

                            @endforeach



                        </tbody>
                        </table>
                    </div>
        </div>
    </section>

</main>




    @endsection
