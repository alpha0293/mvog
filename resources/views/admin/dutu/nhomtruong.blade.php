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
<select name="cars" id="cars">
  <option>Chọn khu vực sinh hoạt</option>
  @foreach($lstzone as $zone)
    <option value="{{$zone->id}}">{{$zone->name}}</option>
  @endforeach
  </select>
<h2>Xét duyệt nhóm trưởng cho từng khu vực sinh hoạt</h2>
<h3>Nhóm trưởng có chức năng điểm danh sinh hoạt cho từng nhóm vào các tháng</h3>

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
                          @foreach ($lstnhomtruong as $i)
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
                            <td><input type="checkbox" name="{{$i->id}}"></td>
                          </tr>
                        @endforeach
                    </tr>
                  </tbody>
</table>
<button>Xác nhận</button>
</body>
</html>
