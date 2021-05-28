<!DOCTYPE html>
<html lang="vi">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('toastr/toastr.min.css')}}">
     @include('user.layout.head')
   
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Theme style -->
    
   
    <link rel="stylesheet" href="{{asset('user_asset/assets/css/them.css')}}">
</head>

<body>


   @include('user.layout.loader')
    <!-- ***** Preloader End ***** -->
 
<div class="container">
   @include('user.layout.header')
   @include('user.layout.menu')
   @include('user.layout.chuchay')
  <section id="sliderSection">
    <div class="row">
  
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
     <div class="header-attend">
      <h3><b>Điểm danh nhóm {{$lstdutu->first()->namezone->name}}</b></h3>
      <h4 style="padding:15px;">Trưởng nhóm: {{Auth::user()->name}}</h4>
      <select aria-label="Tháng" name="month" id="month" title="Tháng" class="sl_at">
        <option value="0">Tháng</option>
        @for($i=1; $i<=12; $i++)
            <option @if($i==date("m")) selected @endif value="@if($i<10)0{{$i}}@else{{$i}}@endif">Tháng {{$i}}</option>
        @endfor
      </select>
      <!-- select năm -->
      <select aria-label="Năm" name="year" id="year" title="Năm" class="sl_at">
        <option value="0">Năm học</option>
                      @for($i=2016; $i<=date("Y"); $i++)
                      @if(date("m")<9)
                      <option @if($i==date("Y")) selected @endif value="{{$i-1}}-{{$i}}">{{$i-1}}-{{$i}}</option>
                      @else
                      <option @if($i==date("Y")) selected @endif value="{{$i}}-{{$i+1}}">{{$i}}-{{$i+1}}</option>
                      @endif
                      @endfor
        <!-- <option value="0">Năm</option>
        @for($i=2019; $i<=date("Y"); $i++)
        <option @if($i==date("Y")) selected @endif value="{{$i}}">{{$i}}</option>
        @endfor -->
      </select>
    </div>
    <div class="card">
              <div class="card-header">
                <select style="float: left;  margin-bottom: 7px; border-radius: 9px;" aria-label="Năm SH" name="ac_year" id="ac_year" title="Năm SH" class="custom-select sl_at">
                   <option value="ALL">Năm Sinh hoạt</option>
                    @for($i=1; $i<=3; $i++)
                        <option value="{{$i}}">Năm {{$i}}</option>
                    @endfor
                    <option value="4">Dự tu tự do</option>
                  </select>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="clear: left;">
                <table id="tableID" class="table table-striped table-bordered"><thead>
                    <tr>
                      <th style="width: 10px">STT</th>
                      <th>Tên dự tu</th>
                      <th>Giáo xứ</th>
                      <th hidden="true" >Năm SH</th>
                      <th style="width: 100px">Trạng thái</th>
                      <th style="min-width: 180px;">Ghi chú</th>
                    </tr>
                  </thead>
                  <tbody> 
                 @foreach($lstdutu as $dutu)
                    <tr>
                      <td>{{$index++}}</td>
                      <td> {{$dutu->holyname.' '.$dutu->fullname.' '.$dutu->name}}</td>
                      <td>{{$dutu->parish}}</td>
                      <td hidden="true" >{{$dutu->idyear}}</td>
                      <td>
                        <input namdutu="{{$dutu->idyear}}" name="{{$dutu->id}}" style="min-width: 20px" type="checkbox" id="checkboxPrimary2">
                      </td>
                      <td>
                        <input name="note_{{$dutu->id}}" type="text" class="form-control" maxlength="255">
                      </td>
                    </tr>
                    @endforeach          
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
    </div>
            <button class="btn btn-warning" id="Save" >Save</button>
       </div>
     </div><hr  width="100%" size="10px" align="center"  />  
    
  </section>

 @include('user.layout.footer')
</div>

<!--script-->

  @include('user.layout.script')
 <script src="{{asset('toastr/toastr.min.js')}}"></script>
          <script type="text/javascript">
       $('#Save').click(function () {
          statusList = jQuery('input[type=checkbox]')
          data = []
          for(i=0;i<statusList.length;i++) {
              if (jQuery(statusList[i]).attr('namdutu')===jQuery('[name=ac_year]').val() || jQuery('[name=ac_year]').val()==="ALL") {
                std = {
                'iddutu': jQuery(statusList[i]).attr('name'),
                'status': jQuery(statusList[i]).prop('checked'),
                'note': jQuery('[name=note_'+jQuery(statusList[i]).attr('name')+']').val(),
                'month': jQuery('[name=month]').val(),
                'year': jQuery('[name=year]').val(),
                'created_at': '{{now()}}',
                'iduser': {{Auth::id()}}
                    }
                    data.push(std)
              }
              
            }
              $.post('{{ route('save.attend') }}',
                {'_token': "{{ csrf_token() }}",
                'data': JSON.stringify(data)} 
                ,function(data){
                  toastr.success(data,'THÔNG BÁO');
              });

            });
    </script>
    <script type="text/javascript">
      var previous;
      $('#ac_year').click( function(){
         previous = this.value;
      });
      $('#ac_year').change( function(){
          var sl, filter, table, tr, td, i, slValue;
          sl = $('#ac_year');
          filter = sl.val();
          table = $("#tableID");
          tr = $("tr");
           var chk = jQuery('input[type=checkbox]');
           for(j=0;j<chk.length;j++) {
            
              if (jQuery(chk[j]).prop('checked') == true ) { //if 1
                 // console.log(jQuery(chk[j]).attr('namdutu'));
                 if (confirm('Bạn chưa xác nhận điểm danh, bạn muốn chuyển qua điểm danh năm khác?')) { // if 2
                     for(k=0;k<chk.length;k++){
                      jQuery(chk[k]).prop("checked", false);
                     }
                     if (filter === 'ALL' ) {
                         $ ('tr').show ();
                     }
                     else{
                      for (i = 1; i < tr.length; i++) {
                            td = tr[i].children[3];
                            if (td) {
                              slValue = td.textContent || td.innerText;
                              if (slValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                              } else {
                                tr[i].style.display = "none";
                              }
                            }       
                          }
                     }
                     } 
                else { //else if 2
                  // break;
                  filter = previous;
                  this.value = previous;
                  }
              }
              else{ // else if 1
                if (filter === 'ALL') {
                         $ ('tr').show ();
                     }
                     else{
                      for (i = 1; i < tr.length; i++) {
                            td = tr[i].children[3];
                            if (td) {
                              slValue = td.textContent || td.innerText;
                              if (slValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                              } else {
                                tr[i].style.display = "none";
                              }
                            }       
                          }
                     }
              }
           }
         });

    </script>
      <script language = "text/Javascript"> 
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
            }
        }
        
       </script>
  </body>
</html>
