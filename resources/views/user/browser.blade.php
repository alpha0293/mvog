@extends('admin.layout.layout')
@section('content')

<!-- BEGIN CONTENT -->
<section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-lg-12">
            <h3 class="card-title" style="color: #0d83c5cc;margin-top: 15px; margin-bottom: 15px;" id="addnhom_title">Danh sách người dùng hệ thống</h3>
       
                <div class="portlet light portlet-fit bordered">
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a id="sample_editable_1_new" class="btn btn-primary" href="{{ route('user.add.get') }}"><i class="fa fa-plus"></i> Thêm mới
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="ds_nguoi_dung">
                            <thead>
                                <tr>
                                    <th> STT</th>
                                    <th> Họ Tên </th>
                                    <th> Email </th>
                                    <th> Quyền </th>
                                    <th> Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php $stt = 1; @endphp
                                    @foreach( $users as $v )
                                    <tr>
                                        <td> {{ $stt }} </td>
                                        <td> {{ $v->name }} </td>
                                        <td> {{ $v->email }} </td>
                                        <td>
                                            @foreach($v->roles as $role)
                                                {{ $role->display_name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="btn btn-xs yellow-gold" href="{{ route('user.edit.get', $v->id) }}" title="Xem"> <i class="fa fa-edit" style="color:green;"></i> </a>
                                            <a class="btn btn-xs red-mint" href="{{ route('user.delete.get', $v->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');" title="Xóa"> <i style="color:red" class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                    @php $stt++; @endphp
                                    @endforeach
                            </tbody>
                        </table>
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
<script>
    jQuery(document).ready(function() {
        var table = $('#ds_nguoi_dung');

        var oTable = table.dataTable({

            "lengthMenu": [
                [10, 20, 50, -1],
                [10, 20, 50, "Tất cả"] // change per page values here
            ],

            "pageLength": 10,
    
            "language": {
                "lengthMenu": "Hiển thị _MENU_ bản ghi / trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang hiển thị _PAGE_ / _PAGES_",
                "infoEmpty": "Không có bản ghi nào",
                "infoFiltered": "(chọn lọc từ _MAX_ bản ghi)",
                "search": "Tìm kiếm",
                "paginate": {
                    "first":      "Đầu",
                    "last":       "Cuối",
                    "next":       "Sau",
                    "previous":   "Trước"
                },
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                // [0, "asc"]
            ] // set first column as a default sort by asc
        });
    });
</script>
@endsection

