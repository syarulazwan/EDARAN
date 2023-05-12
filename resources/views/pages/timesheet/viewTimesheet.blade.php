@extends('layouts.dashboardTenant')@section('content')
<style>
.fc-prev-button, .fc-next-button {
    display: none;
}
</style>

<div id="content" class="app-content">
    <h4 class="">{{ $employee_name }}</h4>
    <div class="row" id="viewTimesheetJs">
        <div class="col-lg">
            <div id="calendar" class="calendar"></div>
            <input type="hidden" id="timesheetApprovalId" value="{{$id}}">
            <input type="hidden" id="timesheetApprovalUserId" value="{{$userId}}">
        </div>
    </div>
    <div class="row p-2">
        <div class=" col d-flex justify-content-end">
            <button class="btn btn-primary" onclick="window.history.back()">Back</button>
        </div>
    </div>
</div>
@include('modal.timesheet.editLogModalView')
@include('modal.timesheet.editEventModalView')
@endsection
