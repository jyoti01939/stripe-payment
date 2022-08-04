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
                  <h4 class="card-title">Edit Company</h4>
                  @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }} </strong>
                  </div>
                  @endif
                  <form class="pt-3 ml-5" action="{{ route('company.update',$company->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">Company Name </label>
                      <input  class="form-control" name="name" placeholder="Enter Your Company Name" value="{{ $company->name }}">
                    </div>
                    @error('name')
                    <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                        {{ $message }}
                    </div>
                @enderror
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input  class="form-control" name="email" placeholder="Enter Your Email" value="{{ $company->email }}">
                    </div>
                    @error('email')
                  <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                      {{ $message }}
                  </div>
              @enderror
                    <div class="form-group">
                      <label for="website">Website/label>
                      <input  class="form-control" name="website" placeholder="Enter Your Website" value="{{ $company->website }}">
                    </div>
                    @error('website')
                  <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                      {{ $message }}
                  </div>
              @enderror
                    <div class="form-group">
                        <label for="file">Logo</label>
                        <input type="file" class="form-control" name="image" >
                        <img src="/image/{{ $company->image }}" width="300px">
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

