<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Xét duyệt dự tu SH</h2>
<table>
  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã</th>
                    <th>Tên thành viên(s)</th>
                    <th>Ngày sinh</th>
                    <th>Trường học</th>
                    <th>Ngành học</th>
                    <th>Giáo xứ</th>
                    <th>Năm dự tu</th>
                    <th>Nhóm</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                          @foreach ($lstxetduyet as $i)
                          <tr>
                            <td id="stt">{{$index++}}</td>
                            <td id="ma">{{$i->holyname}}</td>
                            <td id="ten">{{$i->name}}</td>
                            <td id=ns>{{$i->dob}}</td>
                            <td id="truong">{{$i->school}}</td>
                            <td id="nganh">{{$i->majors}}</td>
                            <td id="xu">{{$i->parish}}</td>
                            <td id="nam">{{$i->nameyear->name}}</td>
                            <td id="nhom">{{$i->namezone->name}}</td>
                            <td id="trangthai"><small class="badge badge-primary">{{$i->namestatus->name}}</small></td>
                            <td>
                              <a class="fa fa-eye" style="color:green; padding-right: 10%" href="{{url('dutu',$i->id)}}"></a>
                <a class="fa fa-trash-alt" style="color:green; padding-right: 10%" href="{{url('dutu/delete',$i->id)}}" onclick="return confirm('Bạn có chắc chắn muốn xóa Dự tu này không?');" title="Xóa"></a>
                              <i class="fas fa-edit" style="color:red"></i>
                            </td>
                          </tr>
                        @endforeach
                    </tr>
                  </tbody>
</table>
<button>Xác nhận</button>
</body>
</html>
