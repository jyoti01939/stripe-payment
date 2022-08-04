@extends('layouts.layout')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="font-weight-bold">Company</h3>
                </div>

            </div>
            </div>
        </div>
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Employee</h4>
                  @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }} </strong>
                  </div>
                  @endif
                  <form class="pt-3 ml-5" action="{{ route('employee.update',$employee->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">First Name </label>
                      <input type="text" class="form-control" name="first_name" value="{{ $employee->first_name }}" >
                    </div>
                    @error('first_name')
                    <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="name">Last Name </label>
                    <input type="text"  class="form-control" name="last_name" value="{{ $employee->last_name }}" >
                  </div>
                  @error('last_name')
                  <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                      {{ $message }}
                  </div>
              @enderror
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email"  class="form-control" name="email" value="{{ $employee->email }}" >
                    </div>
                    @error('email')
                  <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                      {{ $message }}
                  </div>
              @enderror
                    <div class="form-group">
                      <label for="number">Mobile no</label>
                      <input type="number"  class="form-control" name="mobile" value="{{ $employee->mobile}}"  >
                    </div>
                    @error('mobile_no')
                  <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                      {{ $message }}
                  </div>
              @enderror
              <div class="form-group">
                        <label for="number">Company</label>
                        <select   class="w-100 bb niceSelect form-control{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company" >
                        <option data-display="Select Company *"
                            value="" style="color: white;">Select Company
                    </option>
                    @foreach($company as $value)
                    <option value="{{$value->id}}">{{@$value->name}}</option>
                @endforeach
                        </select>
                </div>
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
       </div>
     </div>
@endsection


