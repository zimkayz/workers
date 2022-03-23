@extends('layouts.ad')

        @section('content-ad')

        <main id="main" class="main">

            <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
                <li class="breadcrumb-item active">Навык</li>
                </ol>
            </nav>
            </div>

           <section class="section">
              <div class="row">
                 <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Skills Table</h5>
                          <a href="{{ route('add-skills') }}" type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Add Навык</a>
                          @if(session()->has('success'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session()->get('success') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                      @endif
                          <table class="table table-striped table-hover datatable dt-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Skills</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($skills as $skill)
                                        <tr>
                                            <th scope="row">{{ $skill->id }}</th>
                                            <td>{{ $skill->skills ?? 'n/a' }}</td>
                                            <td> <a href="{{ route('skill-edit',$skill->id) }}" type="button" class="btn btn-outline-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('skill.delete') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="skid" value="{{ $skill->id }}">

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                  </div>
               </div>
            </section>
        </main>
        @endsection

