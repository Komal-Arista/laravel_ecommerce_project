@extends('admin.defaultLayout')
@section('title')
    Add Category
@endsection
@section('body')
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
            <div class="block">
              <div class="title"><strong class="d-block">Add Category</strong></div>
              <div class="block-body">
                  <form action="">
                      <div class="form-group">
                          <label class="form-control-label">Category Name</label>
                          <input type="text" placeholder="category Name" name="name" class="form-control">
                      </div>
                      <div class="form-group">       
                          <input type="submit" value="Add" class="btn btn-primary">
                      </div>
                  </form>
              </div>
            </div>
          </div>
      </div>
  </div>
</section>
@endsection
