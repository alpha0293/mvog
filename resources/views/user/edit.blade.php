
@extends('admin.layout.layout')
@section('content')
<style type="text/css">

  label:not(.form-check-label):not(.custom-file-label) {
    float: right;
}
</style>
  <!-- /.row -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Chỉnh sửa người dùng hệ thống</h3>
               @if($errors->any())
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                    @foreach($errors->all() as $error)
                        <p> {{ $error }} </p>
                    @endforeach
                </div>
                @endif
        <!-- Horizontal Form -->
            <div class="card card-info col-sm-6" style="margin: 0 auto;">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('user.edit.post') }}" method="post" id="form_sample_3" enctype="multipart/form-data"> @csrf
                
                <div class="card-body">
                  <input type="hidden" name="id" value="{{ $user->id }}">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Họ tên</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="" placeholder="Họ tên">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="Email" class="form-control" id="inputEmail3" name="email" value="{{ $user->email }}" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Mật khẩu</label>
                    <div class="col-sm-9">
                      <input autocomplete="new-password" type="password" class="form-control" name="password" value="" id="inputPassword3" placeholder="********" >
                      <span id="name-error" class="help-block help-block-error">Để trống để giữ nguyên.</span>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Quyền</label>
                    <div class="col-sm-9">
                      <select  multiple="multiple" class="form-control select2" name="role[]">
                           @foreach($roles as $role)
                            <option value="{{ $role->id }}" 
                              @foreach($user->roles as $item)
                               @if($item->id == $role->id)
                                selected='selected'
                               @endif
                            @endforeach > {{ $role->display_name  }}</option>
                         @endforeach
                    </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Lưu</button>
                </div>
                <!-- /.card-footer -->
              </form>
              <div class="clearfix"></div>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
       </div>
     </section>
@endsection