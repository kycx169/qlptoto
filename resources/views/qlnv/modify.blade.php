@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý nhân viên
                <!-- <small>Optional description</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sửa thông tin nhân viên</h3>
                        </div>
                        <!-- form start -->
			            <form action="{{ url(route('editUser',$users->id)) }}" enctype="multipart/form-data" method="POST">
		            	{{ csrf_field() }}
			              <div class="box-body">
			                <div class="form-group">
			                  <label>Tên đăng nhập: </label>
			                  <input type="text" class="form-control" id="user" value="{{$users->user}}" name="user">
                              <label class="err1 label label-danger"></label>
			                </div>
			                <div class="form-group">
			                  <label>Mật khẩu: </label>
			                  <input type="password" class="form-control" id="password" value="{{$users->password}}" name="pass">
                              <label class="err2 label label-danger"></label>
			                </div>
			                <div class="form-group">
			                  <label>Tên nhân viên: </label>
			                  <input type="text" class="form-control" id="username" value="{{$users->name}}" name="username">
                              <label class="err3 label label-danger"></label>
			                </div>
			                <div class="form-group">
			                  <label>Ngày sinh: </label>
			                  <input type="text" class="form-control" id="birthday" value="{{$users->birth_day}}" name="birthday">
			                </div>
			                <div class="form-group">
			                  <label>Địa chỉ: </label>
			                  <input type="text" class="form-control" id="address" value="{{$users->address}}" name="address">
							</div>
							  <div class="form-group">
								  <label>Vai trò: </label>
								  <select id="role" name="role" required>
									  <option value="{{$users->role}}" selected>{{$users->role == 1 ? "Nhân viên" : "Quản trị viên"}}</option>
									  <option value="{{1 - $users->role}}">{{$users->role == 1 ? "Quản trị viên" : "Nhân viên"}}</option>
								  </select>
							  </div>
		                @if($users->avatar!="avatar/")
		                	<img id="imgloaded" src="{{url($users->avatar)}}" style="width: 50px; height: 50px;">
			            @endif
			                <div class="form-group">
			                  <label>Chọn hình đại diện mới: </label>
			                  <input type="file" id="exampleInputFile" name="file" accept="image/*" >
			                </div>
			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" class="btn btn-primary" onclick="return validate();">Hoàn thành</button>
			              </div>
			            </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script type="text/javascript">
    	function validate() {
    		if($('#user').val()=="") {
				$('.err1').text("Tên đăng nhập không được để trống!");
				return false;
    		} else {
    			$('.err1').hide();
    			// return true;
    		}
    		if($('#password').val()=="" || $('#password').val().length<6) {
				$('.err2').text("Mật khẩu không được để trống và phải lớn hơn 5 ký tự!");
				return false;
    		} else {
    			$('.err2').hide();
    		}
            if($('#username').val()=="") {
                $('.err3').text("Tên nhân viên không được để trống!");
                return false;
            } else {
                $('.err3').hide();
            }
    	}
    </script>
@endsection