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
                          @foreach ($lstlenlop as $i)
                          <tr>
                            <td id="stt">{{$index++}}</td>
                            <td id="ma">{{$i->holyname}}</td>
                            <td id="ten">{{$i->name}}</td>
                            <td id="ns">{{$i->dob}}</td>
                            <td id="truong">{{$i->school}}</td>
                            <td id="nganh">{{$i->majors}}</td>
                            <td id="xu">{{$i->parish}}</td>
                            <td id="nam">{{$i->nameyear->name}}</td>
                            <td id="nhom">{{$i->namezone->name}}</td>
                            <td id="trangthai"><small class="badge badge-primary">{{$i->namestatus->name}}</small></td>
                            <td></td>
                          </tr>
                        @endforeach
                    </tr>
                  </tbody>
</table>