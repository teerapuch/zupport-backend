@push('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
@endpush

@extends('layouts.app')
@section('content')

@php
$res = Cache::get('users');
@endphp

<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <form action="{{ url('/restaurant') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            ชื่อร้านอาหาร
                        </label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="กรอกชื่อร้านอาหาร">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">
                            ที่ตั้งร้านอาหาร
                        </label>
                        <input type="text" class="form-control" id="location" name="location" placeholder="กรอกที่อยู่ร้านอาหาร">
                    </div>
                    <div class="mb-3">
                        <label for="opening" class="form-label">
                            เวลาเปิด - ปิด
                        </label>
                        <input type="text" class="form-control" id="opening" name="opening" placeholder="กรอกเวลาเปิด - ปิด">
                    </div>
                    <div class="mb-3">
                        <label for="dayoff" class="form-label">
                            วันหยุด
                        </label>
                        <input type="text" class="form-control" id="dayoff" name="dayoff" placeholder="กรอกวันหยุด">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">
                            เบอร์โทรศัพท์
                        </label>
                        <input type="text" class="form-control" id="tel" name="tel" placeholder="เบอร์โทรศัพท์">
                    </div>
                    <div class="mb-3">
                        <label for="parking" class="form-label">
                            ที่จอดรถ
                        </label>
                        <select class="form-control" name="parking" id="parking">
                            <option value="1">มีที่จอดรถ</option>
                            <option value="2">ไม่มีที่จอดรถ</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">
                            Website
                        </label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="website">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            บันทึกตำแหน่ง
                        </button>
                    </div>
                </div><!-- /.card-body -->
            </div><!-- /.card -->
        </form>
    </div>
    <div class="col-1"></div>
</div><!-- /.row -->

<br />
@foreach ($res as $u)
{{ $u->email }}
@endforeach

@endsection('content')

@push('scripts')

@endpush