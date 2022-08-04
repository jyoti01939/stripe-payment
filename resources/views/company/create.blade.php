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
                  <h4 class="card-title">Add Company</h4>
                  @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }} </strong>
                  </div>
                  @endif
                  <form class="pt-3 ml-5" action="{{ route('company.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="name">Company Name </label>
                      <input  class="form-control" name="name" placeholder="Enter Your Company Name">
                    </div>
                    @error('name')
                    <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                        {{ $message }}
                    </div>
                @enderror
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input  class="form-control" name="email" placeholder="Enter Your Email">
                    </div>
                    @error('email')
                  <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                      {{ $message }}
                  </div>
              @enderror
                    <div class="form-group">
                      <label for="website">Website/label>
                      <input  class="form-control" name="website" placeholder="Enter Your Website" required>
                    </div>
                    @error('website')
                  <div class="valid-feedback msg" style="display: block;color:red;background:white;">
                      {{ $message }}
                  </div>
              @enderror
                    <div class="form-group">
                        <label for="new_password">Logo</label>
                        <input type="file" class="form-control" name="image" >
                      </div>

             
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
       </div>
     </div>
@endsection
