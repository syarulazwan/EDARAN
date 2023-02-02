<div class="tab-pane fade" id="v-pills-entitlement" role="tabpanel" aria-labelledby="v-pills-entitlement-tab">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Edaran Berhad
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show bg-white" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-white bg-gray-100">
                                    <h4 class="fw-bold">
                                        Entitlement
                                    </h4>
                                    {{-- <p class="fw-light">
                                        Approval Hierarchy
                                    </p> --}}
                                    </div>
                                <div class="card-body">
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Approver*</label>
                                        <input type="text" class="form-control" name="" id="" readonly value="RM">
                                    </div>
                                    <div class=" form-check-inline">
                                        <p class="form-label">Status</p>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    <div class="row p-2">
                                        <label for="firstname" class="form-label">Approver*</label>
                                        <input type="text" class="form-control" name="" id="" readonly value="RM">
                                    </div>
                                    <div class=" form-check-inline">
                                        <p class="form-label">Status</p>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio3" value="option3">
                                        <label class="form-check-label" for="inlineRadio3">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio4" value="option4">
                                        <label class="form-check-label" for="inlineRadio4">No</label>
                                    </div>
                                    {{-- <button type="button" class="btn btn-primary float-end mt-3">
                                        Save
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header bg-gray-100">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="fw-bold">
                                                 History
                                            </h4>
                                            
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-white float-end" data-bs-toggle="dropdown">
                                                Filter content
                                                <i class="fa fa-filter text-dark"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item">Company</a>
                                                <a href="#" class="dropdown-item">Department</a>
                                                <a href="#" class="dropdown-item">Unit</a>
                                                <a href="#" class="dropdown-item">Branch</a>
                                                <a href="#" class="dropdown-item">Job Grade</a>
                                                <a href="#" class="dropdown-item">Designation</a>
                                                <a href="#" class="dropdown-item">Employment Type</a>
                                                <a href="#" class="dropdown-item">Supervisor</a>
                                                <a href="#" class="dropdown-item">Clear Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="container">
                                        <ul class="timeline-with-icons">
                                            @if ($jobHistorys)
                                                @foreach ($jobHistorys as $jobHistory)
                                                    <li class="timeline-item mb-5 ">
                                                        <span class="timeline-icon">
                                                            <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                                        </span>

                                                        <div class="card p-3 bg-white">
                                                            <p class="fw-bold">{{ $jobHistory->employmentDetail ?? '' }}</p>
                                                            <p class="text-muted mb-2 fw-bold">{{ $jobHistory->effectiveDate ?? '' }}</p>
                                                            <p class="text-muted">
                                                                Effective Date: {{ $jobHistory->effectiveDate ?? '' }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <button type="button" class="btn btn-primary float-end mt-3 col-md-2">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                Edaran Communication
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body bg-white">
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white bg-gray-100">
                                <h4 class="fw-bold">
                                    Entitlement
                                </h4>
                                {{-- <p class="fw-light">
                                    Approval Hierarchy
                                </p> --}}
                                </div>
                            <div class="card-body">
                                <div class="row p-2">
                                    <label for="firstname" class="form-label">Approver*</label>
                                    <input type="text" class="form-control" name="" id="" readonly value="RM">
                                </div>
                                <div class=" form-check-inline">
                                    <p class="form-label">Status</p>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                                <div class="row p-2">
                                    <label for="firstname" class="form-label">Approver*</label>
                                    <input type="text" class="form-control" name="" id="" readonly value="RM">
                                </div>
                                <div class=" form-check-inline">
                                    <p class="form-label">Status</p>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio3" value="option3">
                                    <label class="form-check-label" for="inlineRadio3">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio4" value="option4">
                                    <label class="form-check-label" for="inlineRadio4">No</label>
                                </div>
                                {{-- <button type="button" class="btn btn-primary float-end mt-3">
                                    Save
                                </button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-gray-100">
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-bold">
                                             History
                                        </h4>
                                        
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-white float-end" data-bs-toggle="dropdown">
                                            Filter content
                                            <i class="fa fa-filter text-dark"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" class="dropdown-item">Company</a>
                                            <a href="#" class="dropdown-item">Department</a>
                                            <a href="#" class="dropdown-item">Unit</a>
                                            <a href="#" class="dropdown-item">Branch</a>
                                            <a href="#" class="dropdown-item">Job Grade</a>
                                            <a href="#" class="dropdown-item">Designation</a>
                                            <a href="#" class="dropdown-item">Employment Type</a>
                                            <a href="#" class="dropdown-item">Supervisor</a>
                                            <a href="#" class="dropdown-item">Clear Filter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <ul class="timeline-with-icons">
                                        @if ($jobHistorys)
                                            @foreach ($jobHistorys as $jobHistory)
                                                <li class="timeline-item mb-5 ">
                                                    <span class="timeline-icon">
                                                        <i class="fas fa-rocket text-primary fa-sm fa-fw"></i>
                                                    </span>

                                                    <div class="card p-3 bg-white">
                                                        <p class="fw-bold">{{ $jobHistory->employmentDetail ?? '' }}</p>
                                                        <p class="text-muted mb-2 fw-bold">{{ $jobHistory->effectiveDate ?? '' }}</p>
                                                        <p class="text-muted">
                                                            Effective Date: {{ $jobHistory->effectiveDate ?? '' }}
                                                        </p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                     <button type="button" class="btn btn-primary float-end mt-3 col-md-2">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
