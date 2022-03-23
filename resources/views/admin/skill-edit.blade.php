
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
                            <a class="nav-link active" href="{{ url('admin.position') }}">Positions( должности
                                )</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('admin.skills') }}">Skills(навыкам)</a>
                       </li>
                    </ul>

                </div>
            </div>
        </div>
            <div class="container">
                <div class="row py-5">
                <div class="col-12">
                    <h3  id="Greeting User"></h3>
                    <form action="{{ route('skill-update',$skill->id) }}" method="POST" >

                        @csrf
                        <div class="form-row align-items-center">
                          <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Skill</label>
                            <input type="text" name="skills" class="form-control mb-2" id="inlineFormInput" value="{{ $skill->skills }}">
                          </div>
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                          </div>
                        </div>
                      </form>

                </div>
                </div>
            </div>



             <script>
                var myDate = new Date();
                var hrs = myDate.getHours();

                var greet;

                if (hrs < 12)
                    greet = 'Good Morning';
                else if (hrs >= 12 && hrs <= 17)
                    greet = 'Good Afternoon';
                else if (hrs >= 17 && hrs <= 24)
                    greet = 'Good Evening';

                document.getElementById('Greeting User').innerHTML =
                    '<b>' + greet + '</b>  {{ Auth::user()->name }} {{ Auth::user()->surname }}';
            </script>



        @endsection


