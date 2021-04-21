
@extends('admin.layout.layout')
@section('content')

<!-- BEGIN CONTENT -->
<section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 40px;" id="addnhom_title">Tạo quyền mới</b></h3>
      
                <form class="form-horizontal" action="{{ route('save.role') }}" method="POST">
                    @csrf
                    <div class="form-body">
                         <div class="col-md-5" style="float: left;">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="bold">Chi tiết quyền:</h4>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="display_name" class="control-label">Tên hiển thị:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="display_name" value="{{ old('display_name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="name" class="control-label">Slug:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="description" class="control-label">Mô tả:</label>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" class="form-control" name="description" value="{{ old('description') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Lưu
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- END EXAMPLE TABLE PORTLET-->

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="col-md-7" style="float: left;">
                            <div class="portlet light portlet-fit bordered">
                            <div class="portlet-body">
                                <div class="row" style="border-left-style: groove;">
                                    <div class="col-md-12">
                                        <h4 class="bold">Phân quyền:</h4>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                @foreach($permissions as $k => $permission)
                                                <div class="" style="margin: 0 0 10px 0;">
                                                    <input type="checkbox" class="make-switch" data-size="mini" name="permissions[]" data-bootstrap-switch value="{{ $permission->id }}"> {{ $permission->display_name }} <em style="margin-left: 15px;">({{ $permission->description }})</em>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                        
                    </div>
                </form>
            
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
      </div>
    </div>
        <!-- /.row -->
   </div>
 </section>
<!-- END CONTENT -->
<script type="text/javascript">
    $(function(){
        $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    })
</script>

@endsection


