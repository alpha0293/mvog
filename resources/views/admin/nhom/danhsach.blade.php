 <!-- Content Wrapper. Contains page content -->

	@extends('admin.layout.index')
	@section('content')
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <!-- thu nhe -->

        <div class="container">
 
 
    <!-- The Modal them nhom moi -->
    <div id="addModal" class="modal">
        <!-- Nội dung form đăng nhập -->
        <div class="modal-content" style="width: 40%">
            <form action="#">
                <span id="addClose" class="close">&times;</span>
                <h2 id="tieude_add">Thêm nhóm mới</h2>
                <div class="fomrgroup">
                    <span>Mã nhóm:</span>
                    <input class="form-control" placeholder="Mã nhóm ..." disabled="" name="manhom">
                </div>
                <div class="fomrgroup">
                    <span>Tên nhóm:</span>
                    <input type="text" class="form-control" placeholder="Nhập tên nhóm ..." name="tennhom">
                </div>
                 </form>
                 <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Thêm nhóm</button>
                
                 </div>
           
        </div>
    </div>

    <!-- het model them -->
     <!-- The Modal sua nhom -->
    <div id="editModal" class="modal">
        <!-- Nội dung form đăng nhập -->
        <div class="modal-content" style="width: 40%">
            <form action="#">
                <span id="editClose" class="close">&times;</span>
                <h2 id="tieude_add">Chỉnh sửa tên nhóm</h2>
                <div class="fomrgroup">
                    <span>Mã nhóm:</span>
                    <input class="form-control" placeholder="Mã nhóm ..." disabled="" name="manhom">
                </div>
                <div class="fomrgroup">
                    <span>Tên nhóm:</span>
                    <input type="text" class="form-control" placeholder="Nhập tên nhóm ..." name="tennhom">
                </div>
                 </form>
                 <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Đồng ý</button>
                
                 </div>
           
        </div>
    </div>


        <!-- het thu --> 
        <div class="col-md-12" id="danhsach_nhom">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title" id="addnhom_title">Danh sách các nhóm sinh hoạt</h3>
              </div>
            
              <!-- /.card-header -->
              <div class="card-body">
                <div>
                   <button type="button" class="btn btn-outline-primary fa fa-plus-square" id="myBtn">  Thêm nhóm mới</button>
                   <button type="button" class="btn btn-outline-warning fas fa-file-word" id="xxx">  Xuất file</button>
                </div>
               
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã nhóm</th>
                    <th>Tên nhóm(s)</th>
                    <th>Linh mục phụ trách</th>
                    <th>Chức năng</th>
                  </tr>
                  </thead>
                  <tbody>
                  	<?php for ($i=0; $i < 2; $i++) { ?>
                  <tr>
                    <td>1</td>
                    <td>1
                    </td>
                    <td>Hà Nội</td>
                    <td>Anton Võ Thành Công</td>
                    <td>
                      <i id="iconEdit" class="fa fa-edit" style="color:blue; padding-right: 10%"></i>
                      <i class="fas fa-trash-alt" style="color:red"></i>
                    </td>

                  </tr>
                  	<?php } ?>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              
            </div>
        </div>
       </div>
      </div>
   </section>
  </div>
  <!-- /.content-wrapper -->
  @endsection