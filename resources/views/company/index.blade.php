@extends('layouts.layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Company Details
                <a href="{{ route('company.create') }}" class="btn btn-warning btn-sm float-end">Add Company</a>
              </h6>

            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logo</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Website</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                  <tr>
                    <td>
                        <div class="align-middle text-center">
                            {{ ++$i }}
                        </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="/image/{{ $company->image }}" width="100px" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                        </div>
                    </td>
                    <td>
                      {{ $company->name }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $company->email }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $company->website }}
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('company.edit',$company->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                      <a href="{{ route('company.delete',$company->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">{{ $companies->links() }}</div>
  </div>
@endsection
