 @extends('admin.layout.index')
	@section('content')

       
        <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
       <div class="row">
        <!-- thu nhe -->

        <div class="container">
        <div style="width: 40%; margin: 0 auto;
   			 width: 62%;
   			text-align: center;
   			 padding-top: 10%;">
            <form action="#">
               
                <h2 id="tieude_add">Sửa tên nhóm</h2>
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
</div>
</section>
</div>
   @endsection