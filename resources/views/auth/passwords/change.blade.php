@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đổi mật khẩu</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('change.password') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Mật khẩu cũ</label>
                            <div class="col-md-6">
                                <input id="current_password" name ="current_password" type="password" required autofocus> 
                            </div>
                            <div>
                                @if($errors->has('current_password'))
                                    <span class="error">{{ $errors->first('current_password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>
                            <div class="col-md-6">
                                <input id="new_password" name="new_password" type="password" required autofocus> 
                            </div>
                            <div>
                                @if($errors->has('new_password'))
                                    <span class="error">{{ $errors->first('new_password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu</label>
                            <div class="col-md-6">
                                <input id="re_new_password" name="re_new_password" type="password" required autofocus> 
                            </div>
                            <div>
                                @if($errors->has('re_new_password'))
                                    <span class="error">{{ $errors->first('re_new_password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
