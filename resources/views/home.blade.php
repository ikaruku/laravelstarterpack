@extends('main')

@section('title')

@endsection

@section('navi')

@endsection

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fixed Layout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Title</h3>
              </div>
              <div class="card-body">
                Start creating your amazing application!
                <br>
                {{-- Nama route --}}
                Current Route: {{ Route::currentRouteName() }}
                <br>

                {{-- URI route --}}
                Current URI: {{ Request::path() }}
                <br>

                {{-- Nama controller dan method (jika pakai route controller) --}}
                Controller@Method: {{ Route::currentRouteAction() }}
              </div>
              <div class="card-footer">
                Footer
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
