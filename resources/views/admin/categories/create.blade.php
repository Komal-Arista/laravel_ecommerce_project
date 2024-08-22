@extends('admin.defaultLayout')
@section('title')
@if (empty($categoryData)) Add Category @else Update Category @endif
@endsection
@section('body')
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
            <div class="block">
              <div class="title"><strong class="d-block">
                Add Category
              </strong></div>
              <div class="block-body">
                @if (empty($categoryData))
                  <form action="{{ route('admin.categories.store') }}" id="formAccountSettings" method="POST" enctype="multipart/form-data">
                @else
                  <form action="{{ route('admin.categories.update', $categoryData->id) }}" id="formAccountSettings" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                @endif
                @csrf
                    <div class="form-group">
                        <label class="form-control-label">Category Name</label>
                        <input type="text" placeholder="category Name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        <div style="margin-top: 5px;">
                          @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">Category Image</label>
                      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/png, image/gif, image/jpeg" />
                      <div style="margin-top: 5px;">
                        @error('image')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">Parent Category</label>
                    <select name="parent_id" id="parent_id" class="form-control select2 form-select">
                      <option value=""> Select Parent Category</option>
                      @foreach ($categories as $val)
                          <option value="{{ $val->id }}"
                              {{ isset($categoryData->parent_id) ? ($categoryData->parent_id == $val->id ? 'selected' : '') : (old('parent_id') == $val->id ? 'selected' : '') }}>
                              {{ $val->name }}
                          </option>
                      @endforeach
                    </select>
                  </div>
                    <div class="form-group">       
                        <input type="submit" value="Add" class="btn btn-primary" />
                    </div>
                  </form>
                </div>
            </div>
          </div>
      </div>
  </div>
</section>
@endsection
@section('js')
<script>
  $(document).ready(function() {
      $("#parent_id").select2({
          allowClear: true,
          width: 'resolve'
      });
  });
</script>
<!-- Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
@endsection
