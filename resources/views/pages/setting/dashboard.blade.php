@extends('layouts.dashboardTenant')

@section('content')
<div id="content" class="app-content">
    <h3 class="page-header">Setting <small>| Show and change application settings</small></h3>
    <div class="panel panel">
        <div class="panel-body">
            <h3 class="mt-10px"></i> General Settings</h3><br>
            <div class="row text-center">
                <div class="col-lg-2" >
                    <a class="mb-10px" href="/role"><i class="fas fa-circle-user fa-4x text-blue" ></i></a><br><br>
                    <h5 class="mb-5px" >Roles</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/company"><i class="fas fa-home fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Company</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/department"><i class="fas fa-users fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Department</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/unit"><i class="fas fa-upload fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Unit</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/branch"><i class="fa fa-location-dot fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Branch</h5>
                </div>
            </div><br><br><br>
            <div class="row text-center">
                <div class="col-lg-2" >
                    <a class="mb-10px" href="/jobGrade"><i class="fas fa-upload fa-4x text-blue" ></i></a><br><br>
                    <h5 class="mb-5px" >Job Grade</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/designation"><i class="fas fa-laptop fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Designation</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/sop"><i class="fa fa-circle-info fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">SOP's</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="/news"><i class="fa fa-bell fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">News</h5>
                </div>
            </div>
            <br>
            <h3 class="mt-10px"></i> e-Attendance Settings</h3> <br>
            <div class="row text-center">
                <div class="col-lg-2" >
                    <a class="mb-10px" href="#"><i class="fas fa-clock-rotate-left fa-4x text-blue" ></i></a><br><br>
                    <h5 class="mb-5px" >Clock In Types</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fas fa-chart-line fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Working Patterns</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fa fa-map-location fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Location</h5>
                </div>
            </div><br>
            <h3 class="mt-10px"></i> Timesheets Settings</h3> <br>
            <div class="row text-center">
                <div class="col-lg-2" >
                    <a class="mb-10px" href="#"><i class="fas fa-calendar-days fa-4x text-blue" ></i></a><br><br>
                    <h5 class="mb-5px" >Timesheets Administrator and Timesheets Period</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fas fa-user-group fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Timesheets Group</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fa fa-pen-to-square fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Type of Logs</h5>
                </div>
            </div>
            <br>
            <h3 class="mt-10px"></i> Configuration - eLeave</h3> <br>
            <div class="row text-center">
                <div class="col-lg-2" >
                    <a class="mb-10px" href="#"><i class="fas fa-calendar-day fa-4x text-blue" ></i></a><br><br>
                    <h5 class="mb-5px" >Leave Entitlement</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fas fa-rocket fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Holiday</h5>
                </div>
                <div class="col-lg-2">
                    <a class="mb-10px" href="#"><i class="fa fa-calendar fa-4x text-blue"></i></a><br><br>
                    <h5 class="mb-5px">Leave Types</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
