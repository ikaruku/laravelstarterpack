@extends('main')

@section('title')
<!-- Isi -->
@endsection

@section('navi')
  <!-- Isi -->
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Permissions</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">permission</a></li>
            <li class="breadcrumb-item active">sysadmin</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
              <table id="defaultTable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($userlist as $r)
                    <tr>
                      <td>{{ $r->id }}</td>
                      <td>{{ $r->name }}</td>
                      <td>{{ $r->email }}</td>
                      <td>
                        <a href="{{ route('sysadmin.permissions.detail', ['id' => $r->id]) }}">
                          <button type="button" class="btn btn-secondary btn-sm">
                            <i class="fas fa-eye"></i>
                          </button>
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
  </section>
</div>
@endsection
