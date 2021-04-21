
@extends('admin.layout.layout')
@section('content')

<!-- BEGIN CONTENT -->
<section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 40px;" id="addnhom_title">Chỉnh sửa quyền <b>{{ $role->display_name }}</b></h3>
      
                    <div class="form-body">
                         <div class="col-md-5" style="float: left;">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet light portlet-fit bordered">
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-md-12" style="background-color: #83986b75;">
                                        <div class="col-md-8">
                                            <h3 class="page-title">
                                                <i class="fa fa-user-secret"></i>
                                                {{ $role->display_name }} <br><small style="margin-left: 25px;"><em>{{ $role->name }}</em></small>
                                            </h3>
                                        </div>
                                        <h6>
                                            {{ $role->description }}
                                        </h6>
                                        <div class="col-md-4 text-right" style="margin: 25px 0;">
                                            <div class="btn-group">
                                                <a id="sample_editable_1_new" class="btn btn-primary" href="{{ route('edit.role', $role->id) }}"><i class="fa fa-edit"></i> Chỉnh sửa
                                                </a>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- END EXAMPLE TABLE PORTLET-->

                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="col-md-7" style="float: left; ">
                            <div class="portlet light portlet-fit bordered">
                            <div class="portlet-body">
                                <div class="row" style="border-left-style: groove;">
                                    <div class="col-md-12">
                                        <h4 class="bold">Phân quyền:</h4>
                                        <div class="form-group">
                                            @foreach($permissions as $k => $permission)
                                            <div class="" style="margin: 0 0 10px 0;">
                                                <input disabled type="checkbox" class="make-switch" data-size="mini" data-bootstrap-switch name="permissions[]" value="{{ $permission->name }}" {{ (in_array($permission->name, $role->permissions->pluck('name')->toArray()))?"checked":"" }}> {{ $permission->display_name }} <em style="margin-left: 15px;">({{ $permission->description }})</em>
                                            </div>
                                            @endforeach
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
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
