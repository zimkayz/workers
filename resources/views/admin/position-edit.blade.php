
        @extends('layouts.admin')

        @section('content-admin')
        <div class="container" style="margin-bottom:-80px">
            <div class="row py-5">
                <div class="col-12">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                              <a class="nav-link" href="{{ url('dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('admin.position') }}">Positions</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Add Skills</a>
                       </li>
                    </ul>

                </div>
            </div>
        </div>
            <div class="container">
                <div class="row py-5">
                <div class="col-12">

                    <form action="{{ route('position.update',$position->id) }}" method="POST" >

                        @csrf
                        <div class="form-row align-items-center">
                          <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Position</label>
                            <input type="text" name="position" class="form-control mb-2" id="inlineFormInput" value="{{ $position->position }}">
                          </div>
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                          </div>
                        </div>
                      </form>

                </div>
                </div>
            </div>





        @endsection


