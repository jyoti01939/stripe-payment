@extends('layouts.layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Employee Details
                <a href="{{ route('employee.create') }}" class="btn btn-warning btn-sm float-end">Add Employee</a>
              </h6>

            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">First Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile No</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                  <tr>
                    <td>
                        <div class="align-middle text-center">
                            {{ ++$i }}
                        </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      {{ $employee->first_name }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $employee->last_name }}
                      </td>
                    <td class="align-middle text-center text-sm">
                        {{ $employee->email }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $employee->mobile }}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $employee->company_name }}
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('employee.edit',$employee->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        Edit
                      </a>
                      <a href="{{ route('employee.delete',$employee->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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

    <div class="row">{{ $employees->links() }}</div>
  </div>
@endsection

