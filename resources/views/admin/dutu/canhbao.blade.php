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
                    <th>Trạng thái</th>
                    <th>Nhóm</th>
                    <th>Số lần vắng</th>
                    <th>Chức năng</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                          @foreach ($lstdutu2 as $i)
                          <tr>
                            <td id="stt">{{$index++}}</td>
                            <td id="ma">{{$i['holyname']}}</td>
                            <td id="ten">{{$i['name']}}</td>
                            <td id=ns>{{$i['dob']}}</td>
                            <td id="truong">{{$i['school']}}</td>
                            <td id="nganh">{{$i['majors']}}</td>
                            <td id="xu">{{$i['parish']}}</td>
                            <td id="nam">{{$i['namestatus']['name']}}</td>
                            <td id="nhom">{{$i['namezone']['name']}}</td>
                            <td id="trangthai">{{$i['vang']}}<small class="badge badge-primary"></small></td>
                            <td></td>
                          </tr>
                        @endforeach
                    </tr>
                  </tbody>
</table>
<button>Xác nhận</button>
</body>
</html>