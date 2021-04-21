
@extends('admin.layout.layout')
@section('content')
<style type="text/css">
    .mt-element-ribbon.bg-grey-steel {
    background-color: cadetblue;
    margin-bottom: 14px;
    border-style: dashed;
}
</style>
<!-- BEGIN CONTENT -->
<section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách quyền của hệ thống</h3>
       
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="row">
                            @foreach($roles as $role)
                            <div class="col-md-4">
                                <div class="mt-element-ribbon bg-grey-steel">
                                    <div class=".ribbon-wrapper.ribbon-lg .ribbon uppercase">
                                        <div class="ribbon-sub ribbon-bookmark"></div>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="ribbon ribbon-left ribbon-clip ribbon-shadow ribbon-round ribbon-border-dash-hor ribbon-color-info uppercase">
                                        <div class="ribbon-sub ribbon-clip ribbon-left"></div> {{ $role->display_name }} </div>
                                    <p class="ribbon-content">{{ $role->description }}</p>
                                    <div class="btn-group">
                                        <a href="{{ route('show.role', $role->id) }}" class="btn blue"><i class="fa fa-eye"></i> Chi tiết</a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{ route('edit.role', $role->id) }}" class="btn btn-default"><i class="fa fa-edit"></i> Chỉnh sửa</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
           
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
      </div>
    </div>
        <!-- /.row -->
   </div>
 </section>
<!-- END CONTENT -->

@endsection
