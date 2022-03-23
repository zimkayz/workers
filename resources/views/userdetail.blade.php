@foreach ($userdetails as $detail)
@if(isset(Auth::user()->id) && Auth::user()->id == $detail->user_id)
<script>window.location.href = '{{ route('home') }}'</script>
@else
@extends('layouts.ud')

@section('content-ud')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
            <div class="col-md-6 offset-3 mt-5">
                <div class="card">
                    <div class="card-header" style="background-color:#012970;">
                        <h6 class="text-white">Должность and Навыки</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-right mb-3">
                                <a href="{{ url('home') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <form method="post" action="userdetail" enctype="multipart/form-data" name="userdetails" id="userdetails">
                            @csrf
                            <label>Должность</label>
                            <input type="hidden"  name="position" class="d.none" value="{{ '/' }}" >
                            <input type="hidden"  name="user_id" class="d.none" value="{{ Auth::user()->id }}" >
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="pos_id">
                                    @foreach ($positions as $position)
                                  <option value="{{ $position->id }}">{{ $position->position }}</option>

                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label><strong>Навыки:</strong></label><br>
                                @foreach ($skills as $skill )
                                <label style="margin-left: 20px"><input type="checkbox" style="margin-right:20px;"  name="skill[]" value="{{ $skill->skills }}">{{ $skill->skills }}</label>
                                @endforeach

                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @endif
    @endforeach
