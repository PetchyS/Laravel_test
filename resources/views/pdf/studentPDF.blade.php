<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
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
                    <td>
                        <a href="{{ route('edit', $data['id']) }}" class="btn btn-primary">แก้ไข</a>
                        <a href="{{ route('delete', $data['id']) }}" class="btn btn-danger"
                            onclick="return confirm('คุณต้องการลบข้อมูล {{ $data['name'] . '  ' . $data['surname'] }} นี้ ใช่หรือไม่')">ลบ</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
