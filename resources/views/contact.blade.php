@extends('layout.template')
@section('title', 'Contack')
@section('content')
    <u>
        <h3>ช่องทางการติดต่อเรา</h3>
    </u>
    <hr>
    <p>โรงเรียน : {{ $school }}</p>
    <hr>
    <p>ที่อยู่ : {{ $address }}</p>
    <hr>
    <p>เบอร์โทรศัพท์ : {{ $tel }}</p>
    <hr>
    <p>E-mail : {{ $email }}</p>
    <hr>
@endsection
