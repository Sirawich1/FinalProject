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
                        <li class="breadcrumb-item"><a href="/AllCar">รายการอะไหล่ทั้งหมด</a></li>
                        <li class="breadcrumb-item active" aria-current="page">เพิ่มอะไหล่</li>
                    </ol>
                    </nav>
                <div class="container">
                    <!-- Content here -->
                    <div class="container">
                        <h1>เพิ่มรายละเอียดของอะไหล่</h1>
                        @csrf
                        <form class="row g-3" action="add_parts" method="POST">
                            @csrf

                            <div class="form-group col-md-5">
                                <label for="Name">ชื่อ</label>
                                <input type="text" class="form-control bg-white" name="Name" placeholder="ชื่ออะไหล่">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="Price">ราคา</label>
                                <input type="text" class="form-control bg-white" name="Price" placeholder="ราคาอะไหล่">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="Unit">จำนวน</label>
                                <input type="text" class="form-control bg-white" name="Unit" placeholder="จำนวนอะไหล่">
                            </div>

                            <div class="form-group col-md-5">
                                <label for="Descript">คำอธิบาย</label>
                                <input type="text" class="form-control bg-white" name="Descript" placeholder="คำอธิบาย">
                            </div>
                            
                            <div class="form-group col-md-5">
                                <label for="img">อัพโหลดรูปภาพของอะไหล่</label>
                                <input type="text" class="form-control bg-white" name="img">
                            </div>

                            <!-- <div class="col-md-10 mb-3">
                                <label for="img" class="form-label">อัพโหลดรูปภาพของอะไหล่</label>
                                <input class="form-control bg-white" type="file" id="img">
                            </div> -->

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
                            </div>

                        </form>
                    </div>
                </div>
                
                @include('partials.footer')
            </main>
        </div>
    </div>
</div>
@endsection