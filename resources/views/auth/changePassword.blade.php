@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">เปลี่ยนรหัสผ่าน</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('updatePassword') }}" method="post">
                            @csrf
                            <div class="form-group py-2">
                                <label for="oldPassword">รหัสผ่านเดิม</label>
                                <input type="password" name="oldPassword" class="form-control">
                            </div>
                            @error('oldPassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="form-group py-2">
                                <label for="newPassword">รหัสผ่านใหม่</label>
                                <input type="password" name="newPassword" class="form-control">
                            </div>
                            @error('newPassword')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <div class="form-group py-2">
                                <label for="newPassword_confirm">ยืนยันรหัสผ่าน</label>
                                <input type="password" name="newPassword_confirm" class="form-control">
                            </div>
                            @error('newPassword_confirm')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <input type="submit" class="btn btn-success float-end" value="เปลีย่นรหัสผ่าน"
                                onclick="return confirm('คุณต้องการเปลี่ยนรหัสผ่านใหม่นี้ ใช่หรือไม่')">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
