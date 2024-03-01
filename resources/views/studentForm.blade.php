{{-- @extends('layout.template') --}}
@extends('layouts.app')
@section('title', 'Student Form')
@section('content')
    <h3>เพิ่มข้อมูลนักเรียน</h3>
    <hr>
    <form method="POST" action="{{ route('insert') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group py-2">
            <label for="images">รูปภาพ </label>
            <input type="file" name="images" class="form-control" accept="image/*">
        </div>
        @error('images')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        
        <div class="form-group py-2">
            <label for="name">ชื่อ</label>
            <input type="text" name="name" class="form-control">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group py-2">
            <label for="surname">สกุล</label>
            <input type="text" name="surname" class="form-control">
        </div>
        @error('surname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group py-3">
            <label for="title" class="px-2">ชาย </label><input type="radio" name="gender" value="1">
            <label for="title" class="px-2">หญิง</label> <input type="radio" name="gender" value="2">
        </div>
        @error('gender')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <hr>
        <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล"
            onclick="return confirm('คุณต้องการบันทึกข้อมูลนี้ ใช่หรือไม่')">
        <a href="{{ route('student') }}" class="btn btn-success">ข้อมูลนักเรียนทั้งหมด</a>
    </form>
@endsection
