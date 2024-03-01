{{-- @extends('layout.template') --}}
@extends('layouts.app')
@section('title', 'Student System')
@section('content')
    <h3>ข้อมูลนักเรียนทั้งหมด</h3>
    <hr>
    {{-- {{print_r($student)}} --}}

    {{-- @foreach ($student as $index => $data)
        <h3>นักเรียนคนที่ : {{ $index + 1 }} </h3>
        <p>ชื่อ - สกุล : {{ $data['prefix'] . $data['name'] . '  ' . $data['surname'] }}</p>
        @if ($data['gender'] == 1)
            <p>เพศ : ชาย</p>
        @else
            <p>เพศ : หญิง</p>
        @endif

        @if ($data['status'] == true)
            <p class="text-success">สถานะ : ปกติ</p>
        @else
            <p class="text-danger">สถานะ : ไม่ปกติ</p>
        @endif
        <hr>
    @endforeach --}}

    <table class="table text-center table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">รูปภาพ</th>
                <th scope="col">ชื่อ - สกุล</th>
                <th scope="col">เพศ</th>
                <th scope="col">สถานะ</th>
                <th scope="col">เพิ่มเติม</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student as $index => $data)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    {{-- iูปภาพ --}}
                    <th scope="row">
                        @if ($data['images'] != '')
                            <img src="/images/student/{{ $data['images'] }}" width="60">
                            <br>
                            <a href="{{ route('deleteImages', $data['id']) }}" class="btn btn-danger my-2"
                                onclick="return confirm('คุณต้องการลบรูปภาพนี้ ใช่หรือไม่')">ลบ</a>
                        @endif
                    </th>
                    {{--  --}}

                    <td>{{ $data['name'] . '  ' . $data['surname'] }}</td>
                    <td>
                        @if ($data['gender'] == 1)
                            ชาย
                        @else
                            หญิง
                        @endif
                    </td>
                    <td>
                        @if ($data['status'] == true)
                            <a href="{{ route('updateStatus', $data['id']) }}" class="btn btn-success">ปกติ</a>
                        @else
                            <a href="{{ route('updateStatus', $data['id']) }}" class="btn btn-danger">ไม่ปกติ</a>
                        @endif
                    </td>
                    <td style="width: 250px;">
                        {{-- <a href="{{ route('getQrcode', $data['id']) }}" class="btn btn-warning">QR Code</a> --}}
                        <a href="{{ route('edit', $data['id']) }}" class="btn btn-primary">แก้ไข</a>
                        <a href="{{ route('delete', $data['id']) }}" class="btn btn-danger"
                            onclick="return confirm('คุณต้องการลบข้อมูล {{ $data['name'] . '  ' . $data['surname'] }} นี้ ใช่หรือไม่')">ลบ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $student->links() }}
@endsection
