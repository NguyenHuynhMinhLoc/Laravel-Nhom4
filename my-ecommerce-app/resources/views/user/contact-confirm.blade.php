@extends('user.layout')

@section('title', 'Xác nhận thông tin liên hệ')

@php
    $wrapperId = 'templatemo_wrapper_sp';
    $headerId = 'templatemo_header_wsp';
    $header_home_subpage = 'header_subpage';
@endphp

@section('content')
    <h2>Xác nhận thông tin bạn đã nhập</h2>
    <div class="cleaner h10"></div>

    <table class="table">
        <tr><th>Name</th><td>{{ $data['name'] }}</td></tr>
        <tr><th>Email</th><td>{{ $data['email'] }}</td></tr>
        <tr><th>Phone</th><td>{{ $data['phone'] ?? 'Không có' }}</td></tr>
        <tr><th>Message</th><td>{{ $data['message'] }}</td></tr>
    </table>

    <div class="cleaner h10"></div>

    <form method="POST" action="{{ url('contact') }}">
        @csrf
        <!-- giữ lại dữ liệu trong input hidden -->
        <input type="hidden" name="name" value="{{ $data['name'] }}">
        <input type="hidden" name="email" value="{{ $data['email'] }}">
        <input type="hidden" name="phone" value="{{ $data['phone'] }}">
        <input type="hidden" name="message" value="{{ $data['message'] }}">

        <button type="submit" class="submit_btn left">Xác nhận gửi</button>
        <a href="{{ url('contact') }}" class="submit_btn submit_right">Quay lại sửa</a>
    </form>
@endsection
