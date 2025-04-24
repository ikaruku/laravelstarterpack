@extends('main')

@section('title')
<!-- Isi -->
@endsection

@section('navi')
  <!-- Isi -->
@endsection

@section('content')
<div class="content-wrapper">
    
    <!-- Header -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">
              User Permission of {{ DB::table('users')->where('id', request()->id)->first()->name }}
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">details</a></li>
              <li class="breadcrumb-item active">permissions</li>
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
            <form action="{{ route('sysadmin.permissions.update') }}" method="POST">
              @csrf
              <div class="card-header">
                <button type="submit" class="btn btn-info">Save Permissions</button>
              </div>
              <div class="card-body p-0">
                <input type="hidden" name="user_id" value="{{ request()->id }}">
                <table class="table table-hover">
                  <tbody>
                    @foreach($menulist as $r)
                      @if($r->parent_id == 0)
                        {{-- LEVEL 1 (Parent) --}}
                        <tr aria-expanded="false">
                          <td>
                            <i class="expandable-table-caret fas fa-clipboard-list fa-fw"></i>
                            {{ $r->name }}
                            <input type="checkbox" name="menus[]" value="{{ $r->id }}"
                                     @if(in_array($r->id, $selectedMenus)) checked @endif>
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
                                      <tr aria-expanded="false">
                                        <td>
                                          <i class="expandable-table-caret fas fa-caret-down fa-fw"></i>
                                          {{ $child->name }}
                                          <input type="checkbox" name="menus[]" value="{{ $child->id }}"
                                                   @if(in_array($child->id, $selectedMenus)) checked @endif>
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
                                                        <input type="checkbox" name="menus[]" value="{{ $grandchild->id }}"
                                                                @if(in_array($grandchild->id, $selectedMenus)) checked @endif>
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
            </form>
          </div> <!-- /.card -->
        </div> <!-- /.col -->
      </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
  </section>
</div>
@endsection