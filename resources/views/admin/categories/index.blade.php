@extends('admin.defaultLayout')
@section('title')
    Categories List
@endsection
@section('body')
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="block">
          <div class="title"><strong class="d-block">Category List</strong></div>
          <div class="block-body">
            @if (session('success_message'))
              <div class="alert alert-success" role="alert">
                  {{ session('success_message') }}
              </div>
            @endif
            @if (session('error_message'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error_message') }}
                </div>
            @endif
            <section class="no-padding-top no-padding-bottom">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="block">
                      <div class="table-responsive"> 
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                              <th>#</th>
                              <th>Category Name</th>
                              <th>Status</th>
                              <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($categoryData as $key=>$category)
                                <tr>
                                  <th scope="row">1</th>
                                  <td>{{ $category->name}}</td>
                                  <td>{!! $category->status !!}</td>
                                  <td>{{ $category->created_at}}</td>
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
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
