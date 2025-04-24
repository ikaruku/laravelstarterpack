@extends('main')

@section('title')
<!-- Isi -->
@endsection

@section('navi')
  <!-- Isi -->
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Menus</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">menus</a></li>
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
            <div class="card-body p-0">
              <table class="table table-hover">
                <tbody>
                  @foreach($menulist as $r)
                    @if($r->parent_id == 0)
                      {{-- LEVEL 1 (Parent) --}}
                      <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                          <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                          {{ $r->name }}
                          <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-edit{{$r->id}}">
                            <i class="fas fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete"
                            onclick="setDeleteUrl('{{ route('sysadmin.menus.delete', ['id' => $r->id]) }}')">
                            <i class="far fa-trash-alt"></i>
                          </button>
                        </td>
                      </tr>

                      {{-- CHILDREN OF PARENT --}}
                      <tr class="expandable-body">
                        <td>
                          <div class="p-0">
                            <table class="table table-hover">
                              <tbody>
                                @foreach($menulist as $child)
                                  @if($child->parent_id == $r->id)
                                    {{-- LEVEL 2 (Child) --}}
                                    <tr data-widget="expandable-table" aria-expanded="false">
                                      <td>
                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                        {{ $child->name }}
                                        <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-edit{{$child->id}}">
                                          <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete"
                                          onclick="setDeleteUrl('{{ route('sysadmin.menus.delete', ['id' => $child->id]) }}')">
                                          <i class="far fa-trash-alt"></i>
                                        </button>
                                      </td>
                                    </tr>

                                    {{-- GRANDCHILDREN OF CHILD --}}
                                    <tr class="expandable-body">
                                      <td>
                                        <div class="p-0 pl-4">
                                          <table class="table table-hover">
                                            <tbody>
                                              @foreach($menulist as $grandchild)
                                                @if($grandchild->parent_id == $child->id)
                                                  {{-- LEVEL 3 (Grandchild) --}}
                                                  <tr>
                                                    <td>
                                                      {{ $grandchild->name }}
                                                      <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-edit{{$grandchild->id}}">
                                                        <i class="fas fa-edit"></i>
                                                      </button>
                                                      <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete"
                                                        onclick="setDeleteUrl('{{ route('sysadmin.menus.delete', ['id' => $grandchild->id]) }}')">
                                                        <i class="far fa-trash-alt"></i>
                                                      </button>
                                                    </td>
                                                  </tr>
                                                @endif
                                              @endforeach
                                            </tbody>
                                          </table>
                                        </div>
                                      </td>
                                    </tr>

                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> <!-- /.card -->
        </div> <!-- /.col -->
      </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
  </section>
</div>

<!-- Modal Add -->
<div class="modal fade" id="modal-add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('sysadmin.menus.add') }}" method="post">
        @csrf
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
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="frm_name">
              </div>
              <div class="form-group">
                <label>Route</label>
                <input type="text" class="form-control" placeholder="URL" name="frm_route">
              </div>
              <div class="form-group">
                <label>Icon</label>
                <input type="text" class="form-control" placeholder="fas-copy" name="frm_icon">
              </div>
              <div class="form-group">
                <label>Type</label>
                <select class="form-control select2" name="frm_type" style="width: 100%;">
                  <option value="" disabled selected>Select an option</option>
                  <option value="menu">Menu</option>
                  <option value="action">Action</option>
                </select>
              </div>
              <div class="form-group">
                <label>Parent</label>
                <select class="form-control select2" name="frm_parent" style="width: 100%;">
                  <option value="">None</option>
                  @foreach($menuform as $p)
                    <option value="{{$p->id}}">{{$p->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
@foreach($menulist as $r)
  <div class="modal fade" id="modal-edit{{ $r->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form action="{{ route('sysadmin.menus.update') }}" method="post">
          @csrf
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-primary">
              <div class="card-body">
                <input type="hidden" name="frme_id" value="{{ $r->id }}">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Name" name="frme_name" value="{{ $r->name }}">
                </div>
                <div class="form-group">
                  <label>Route</label>
                  <input type="text" class="form-control" placeholder="Route" name="frme_route" value="{{ $r->route }}">
                </div>
                <div class="form-group">
                  <label>Icon</label>
                  <input type="text" class="form-control" placeholder="fas-copy" name="frme_icon" value="{{ $r->icon }}">
                </div>
                <div class="form-group">
                  <label>Type</label>
                  <select class="form-control select2" name="frme_type" style="width: 100%;">
                    <option value="" disabled selected>Select an option</option>
                    <option value="menu" <?php  if ($r->type == 'menu') echo 'selected'; ?>>Menu</option>
                    <option value="action" <?php  if ($r->type == 'action') echo 'selected'; ?>>Action</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control select2" name="frme_parent" style="width: 100%;">
                    <option value="">None</option>
                    @foreach($menuform as $p)
                      <option value="{{$p->id}}" @if($r->parent_id == $p->id) selected @endif>{{$p->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endforeach

<!-- Modal Delete Confirmation -->
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
        Are you sure you want to delete this data?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
