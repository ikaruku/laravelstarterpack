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
          <h1 class="m-0">Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">users</a></li>
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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-add">
                Add
              </button>
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
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-edit{{ $r->id }}">
                          <i class="fas fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                          data-target="#modal-delete"
                          onclick="setDeleteUrl('{{ route('sysadmin.users.delete', ['id' => $r->id]) }}')">
                          <i class="far fa-trash-alt"></i>
                        </button>
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

<!-- Modal Add -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('sysadmin.users.add') }}" method="post">
        {{ csrf_field() }}

        <div class="modal-header">
          <h4 class="modal-title">Add Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="card card-primary">
            <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required>
                @error('name')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                @error('password')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Save changes</button>
        </div>

      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
@foreach($userlist as $r)
  <div class="modal fade" id="modal-edit{{ $r->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('sysadmin.users.update') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{ $r->id }}">

          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="frme_name" class="form-control" placeholder="Name" value="{{ $r->name }}" readonly>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="frme_email" class="form-control" placeholder="Email" value="{{ $r->email }}" readonly>
                </div>

                <div class="form-group">
                  <label>Change Password</label>
                  <input type="password" name="frme_password" class="form-control" required>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endforeach

<!-- Modal Delete -->
<div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Confirmation Delete Data</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
    Are you sure you want to delete this data??
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
    <!-- Formulir penghapusan yang akan dikirim -->
    <form id="delete-form" method="post" style="display: inline;">
      @csrf
      <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </div>
  </div>
  </div>
</div>
<script>
  let deleteUrl = '';
  function setDeleteUrl(url) {
  document.getElementById('delete-form').action = url;
  }
</script>

@endsection
