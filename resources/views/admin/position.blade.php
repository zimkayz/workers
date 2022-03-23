
        @extends('layouts.ad')

        @section('content-ad')

        <main id="main" class="main">

            <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ 'dashboard' }}">Home</a></li>
                <li class="breadcrumb-item active">Должность</li>
                </ol>
            </nav>
            </div>

           <section class="section">
              <div class="row">
                 <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Positions view</h5>
                          @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session()->get('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                          <a href="{{ route('pos-create') }}" type="button" class="btn btn-primary"><i class="bi bi-pen"></i> Add Должность</a>
                          <table class="table table-striped table-hover datatable dt-responsive">
                                    <thead>
                                         <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                         </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($positions as $position)
                                            <tr>
                                                <th scope="row">{{ $position->id }}</th>
                                                <td>{{ $position->position ?? 'n/a' }}</td>
                                                <td><a href="{{ route('position.edit',$position->id) }}" type="button" class="btn btn-outline-primary">Edit</a></td>
                                                <td>
                                                    <form action="{{ route('position.delete') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="pid" value="{{ $position->id }}">

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


