@extends('layout.template')
@section('title', 'Student Edit')
@section('content')
    <h3>แก้ไขข้อมูลนักเรียน</h3>
    <hr>
    <form method="POST" action="{{ route('update', $student->id) }}" enctype="multipart/form-data">
        @csrf
        
        @if ($student->images != "")
            <img src="/images/student/{{ $student->images }}" alt="" width="100">
        @endif

        <div class="form-group py-2">
            <label for="images">รูปภาพ </label>
            <input type="file" name="images" class="form-control" accept="image/*">
        </div>
        @error('images')
            <span class="text-danger">{{ $message }}</span>
        @enderror


        <div class="form-group py-2">
            <label for="name">ชื่อ</label>
            <input type="text" name="name" class="form-control" value="{{ $student->name }}">
        </div>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group py-2">
            <label for="surname">สกุล</label>
            <input type="text" name="surname" class="form-control" value="{{ $student->surname }}">
        </div>
        @error('surname')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group py-3">
            <label for="title" class="px-2">ชาย </label><input type="radio" name="gender" value="1"
                {{ $student->gender == 1 ? 'checked' : '' }}>
            <label for="title" class="px-2">หญิง</label> <input type="radio" name="gender" value="2"
                {{ $student->gender == 2 ? 'checked' : '' }}>
        </div>
        @error('gender')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <hr>
        <input type="submit" class="btn btn-success" value="แก้ไขข้อมูล"
            onclick="return confirm('คุณต้องการแก้ไขข้อมูลนี้ ใช่หรือไม่')">
        <a href="{{ route('student') }}" class="btn btn-danger">ข้อมูลนักเรียนทั้งหมด</a>
    </form>
@endsection
