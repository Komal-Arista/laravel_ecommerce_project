<!DOCTYPE html>
<html>
  <head> 
    @include('admin.layouts.css')
  </head>
  <body>
    @include('admin.layouts.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.layouts.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="title"><strong class="d-block">Add Category</strong></div>
                                <div class="block-body">
                                    <form>
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
      </div>
    </div>
    @include('admin.layouts.javascript')
  </body>
</html>