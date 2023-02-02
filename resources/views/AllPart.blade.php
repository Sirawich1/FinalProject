@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row">
            @include('partials.sidebar')
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active" aria-current="page">รายการอะไหล่ทั้งหมด</li>
                    </ol>
                </nav>
                <div class="container">
                    <div class="d-flex bd-highlight mb-3">
                        <div class="p-2 bd-highlight">
                            <h1 class="h2 text-3xl font-bold underline">
                                อะไหล่
                            </h1>
                <!-- เพิ่มอะไหล่ -->
                        </div>
                        <div class="ms-auto p-2 bd-highlight">
                            <a class="btn btn-primary" href="/AddPart" role="button">เพิ่มอะไหล่</a>
                        </div>
                    </div>
                </div>

                <!-- แสดงอะไหล่ทั้งหมด -->
                <div class="row g-3">
                    @foreach($showparts as $row)
                    <div class="card col" style="width: 18rem;">
                        <img src="https://climate.onep.go.th/wp-content/uploads/2020/01/default-image.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">ชื่อ: {{ $row->Parts_Name }}</h5>
                            <p class="card-text">คำอธิบาย: {{ $row->Parts_Description }}</p>
                            <p class="card-text">ราคา: {{ $row->Parts_UnitPrice }} &nbsp&nbsp เหลือ: {{ $row->Parts_InStock }}</p>
                            <a href="#" class="btn btn-primary position-absolute bottom-0 end-0">แก้ไข</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                @include('partials.footer')
            </main>
        </div>
    </div>

    @endsection