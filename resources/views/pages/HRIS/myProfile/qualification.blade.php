<div class="tab-pane fade" id="default-tab-2">
   <div class="card-header">
        <ul class="nav nav-tabs" id="myTab">
            <li class="nav-item">
                <a href="#quali-tab-1" data-bs-toggle="tab" class="nav-link active">
                    <span class="d-sm-none">Education</span>
                    <span class="d-sm-block d-none">Education</span>
                </a>
            </li>
            <li class="nav-item" id="qualifi">
                <a href="#quali-tab-2" data-bs-toggle="tab" class="nav-link">
                    <span class="d-sm-none">Others</span>
                    <span class="d-sm-block d-none">Others</span>
                </a>
            </li>
        </ul>
   </div>
    <div class="tab-content panel m-0 rounded-0 p-3">
        <div class="tab-pane fade active show" id="quali-tab-1">
            <div class="row p-2">
                <button class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#modalladded">Add Education</button>
            </div>
            <div class="row p-2">
                <table id="" class="table table-striped table-bordered align-middle">
                    <thead>
                    <tr>
                        <th data-orderable="false">No</th>	
                        <th data-orderable="false">Action</th>
                        <th class="text-nowrap">From Date</th>
                        <th class="text-nowrap">To Date</th>
                        <th class="text-nowrap">Institute Name</th>
                        <th class="text-nowrap">Highest Level Attained</th>
                        <th class="text-nowrap">Result</th>
                        <th class="text-nowrap">Education Attachments</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php $id = 0 ?>
                    @if ($qualification)
                        @foreach ($qualification as $education)
                        <?php $id++ ?>
                        <tr>
                            <td> {{$id}} </td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    <a href="javascript:;" id="educationModalEdit{{$education->id}}" data-id="{{$education->id}}" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodaledd"> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="deleteEducation{{$education->id}}" data-id="{{$education->id}}" class="dropdown-item" data-bs-toggle="modal"> Delete</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </td>

                            <td> {{ $education->fromDate }} </td>
                            <td> {{ $education->toDate }} </td>
                            <td style="text-transform: uppercase;"> {{ $education->instituteName }} </td>
                            <td style="text-transform: uppercase;"> {{ $education->highestLevelAttained }} </td>
                            <td style="text-transform: uppercase;"> {{ $education->result }} </td>
                        </tr>
                        @endforeach
                    @endif
                    <span style="display: none"><input type="text" id="educationId" value="{{$educationId}}"></span>
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="tab-pane fade show" id="quali-tab-2">
            <div class="row p-2">
                <button class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#addmodalothers">Add Others</button>
            </div>
            <div class="row p-2">
                <table id=""  class="table table-striped table-bordered align-middle">
                    <thead>
                    <tr>
                        <th data-orderable="false">No</th>	
                        <th data-orderable="false">Action</th>
                        <th class="text-nowrap"> Date</th>
                        <th class="text-nowrap">Professional Qualification Details</th>
                        <th class="text-nowrap">Attachments</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{-- <tr>
                        <td>1</td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="javascript:;" id="" data-id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editmodalothers" editmodalothers > Edit</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item"> Delete</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </td>
                        <td>16/09/2022</td>
                        <td>laravel Training</td>
                        <td>laravel.pdf</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Action <i class="fa fa-caret-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="javascript:;" id="" data-id="" class="dropdown-item" > Edit</a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:;" id="" data-id="" class="dropdown-item"> Delete</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </td>
                        <td>17/09/2022</td>
                        <td>Architect</td>
                        <td>Architect.pdf</td>
                    </tr> --}}

                    <?php $id = 0 ?>
                    @if ($qualification)
                        @foreach ($qualification as $others)
                        <?php $id++ ?>
                        <tr>
                            <td> {{$id}} </td>
                            <td>
                                <a href="#" data-bs-toggle="dropdown" class="btn btn-primary dropdown-toggle"><i class="fa fa-cogs"></i> Actions <i class="fa fa-caret-down"></i></a>
                                <div class="dropdown-menu">
                                    <a href="javascript:;" id="othersQualificationModalEdit{{$others->id}}" data-id="{{$others->id}}" class="dropdown-item" data-bs-toggle="modal"> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:;" id="" data-id="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteOthers"> Delete</a>
                                    <div class="dropdown-divider"></div>
                                </div>
                            </td>

                            <td> {{ $others->otherDate }} </td>
                            <td style="text-transform: uppercase;"> {{ $others->otherPQDetails }} </td>
                            <td> {{ $others->supportOtherDoc }} </td>
                        </tr>
                        @endforeach
                    @endif
                    <span style="display: none"><input type="text" id="othersId" value="{{$othersId}}"></span>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row p-2">
        <div class="modal-footer">
            <a class="btn btn-white me-5px btnPrevious">Previous</a>
            
            <a class="btn btn-white me-5px btnNext">Next</a>
        </div>
    </div>
</div>

@include('modal.myProfile.addEducation')
@include('modal.myProfile.editEducation')
@include('modal.myProfile.addOthers')
@include('modal.myProfile.editOthers')