

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

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                        {{$error}}
                        </div>
                        @endforeach
                        @endif
                    <form action="/position" method="POST" >
                        @csrf
                        <div class="form-row align-items-center">
                          <div class="col-auto">

                            <label class="sr-only" for="inlineFormInput">Position</label>
                            @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            <input type="text" name="position" class="form-control mb-2" id="inlineFormInput" placeholder=" должности">

                        </div>
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                          </div>
                        </div>
                      </form>
                      <table class="table table-striped table-hover datatable dt-responsive">
                    <thead>
                        <tr>
                        <th>ID</th>
                        <th>Position</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $position)
                        <tr>
                        <td>
                            <a href="#">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-blue mr-3"></div>{{$position->id ?? 'n/a'  }}</div>
                            </div>
                            </a>
                        </td>
                        <td>{{ $position->position ?? 'n/a' }}</td>



                        </tr>

                        @endforeach
                    </tbody>
                    </table>
              </div>
              </div>
           </section>
        </main>






        @endsection


