@extends('panel.layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
</div>

<section class="section dashboard">
    <div class="row">
        <!-- Card Users -->
        <div class="col-lg-6 col-md-6">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle bg-primary text-white p-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $totalUsers }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Employees -->
        <div class="col-lg-6 col-md-6">
            <div class="card info-card">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle bg-success text-white p-3">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $totalEmployees }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
