@extends('layouts.dashboardTenant')

@section('content')

<div id="content" class="app-content">
    <!-- BEGIN breadcrumb -->
    <!-- BEGIN breadcrumb -->

    <!-- END breadcrumb -->
    <!-- BEGIN page-header -->
    <h1 class="page-header">HRIS | Policy's & SOP's</h1>





    <div class="row">
        <!-- BEGIN col-6 -->
        <div class="col-xl-15" id="SOPJs">
            <!-- BEGIN nav-tabs -->
            <ul class="nav nav-tabs" id="SOPJs">
                <li class="nav-item">
                    <a href="#default-tab-1" data-bs-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Tab 1</span>
                        <span class="d-sm-block d-none">Policy's</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#default-tab-2" data-bs-toggle="tab" class="nav-link">
                        <span class="d-sm-none">Tab 2</span>
                        <span class="d-sm-block d-none">SOP's</span>
                    </a>
                </li>

            </ul>
            <!-- END nav-tabs -->
            <!-- BEGIN tab-content -->
            <div class="tab-content panel m-0 rounded-0 p-3">
                <!-- BEGIN tab-pane -->
                <div class="tab-pane fade active show" id="default-tab-1">
                    <h3 class="mt-10px"></i> Policy's List </h3>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" data-bs-toggle="modal" id="addButton1" class="btn btn-primary">+ New Policy's</a>
                    </div>
                    <div class="panel-body">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th width="9%" data-orderable="false" class="align-middle">Action</th>
                                    <th class="text-nowrap">Policy Name</th>
                                    <th class="text-nowrap">Document Title</th>
                                    <th class="text-nowrap">Description</th>
                                    <th class="text-nowrap">Attachment</th>
                                    <th class="text-nowrap">Added By</th>
                                    <th class="text-nowrap">Added Time</th>
                                    <th class="text-nowrap">Modified By</th>
                                    <th class="text-nowrap">Modified Time</th>



                                </tr>
                            </thead>
                            <tbody>
                                @if ($policys)
                                    @foreach ($policys as $policy)
                                    <tr>
                                        <td><a href="javascript:;" data-bs-toggle="modal" id="editButton1" data-id="{{$policy->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a id="deleteButton1" data-id="{{$policy->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                        <td>{{$policy->policy}}</td>
                                        <td>{{$policy->file}}</td>
                                        <td>{{$policy->desc}}</td>
                                        <td><a target="_blank" href="/storage/app/{{$policy->file}}">{{$policy->file}}</a></td>
                                        <td>{{$policy->addedBy}}</td>
                                        <td>{{$policy->created_at}}</td>
                                        <td>{{$policy->modifiedBy}}</td>
                                        <td>{{$policy->updated_at}}</td>
                                    </tr>
                                    @endforeach
                                @endif

                        </tbody>
                    </table>
                </div>



            </div>
            <!-- END tab-pane -->
            <!-- BEGIN tab-pane -->
            <div class="tab-pane fade" id="default-tab-2">
                <h3 class="mt-10px"></i> SOP's List </h3>
                <div class="panel-heading-btn">
                    <a href="javascript:;" data-bs-toggle="modal" id="addButton2" class="btn btn-primary">+ New SOP's</a>
                </div>
                <div class="panel-body">
                    <table id="data-table-default2" class="table table-striped table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="10%" data-orderable="false" class="align-middle">Action&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                <th class="text-nowrap">SOP Name</th>
                                <th class="text-nowrap">Document Title</th>
                                <th class="text-nowrap">Description</th>
                                <th class="text-nowrap">Attachment</th>
                                <th class="text-nowrap">Added By</th>
                                <th class="text-nowrap">Added Time</th>
                                <th class="text-nowrap">Modified By</th>
                                <th class="text-nowrap">Modified Time</th>



                            </tr>
                        </thead>
                        <tbody>
                            @if ($SOPs)
                                @foreach ($SOPs as $SOP)
                                <tr>
                                    <td><a href="javascript:;" data-bs-toggle="modal" id="editButton2" data-id="{{$SOP->id}}" class="btn btn-outline-green"><i class="fa fa-pencil-alt"></i></a> <a id="deleteButton2" data-id="{{$SOP->id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i></a></td>
                                    <td>{{$SOP->SOPName}}</td>
                                    <td>{{$SOP->file}}</td>
                                    <td>{{$SOP->desc}}</td>
                                    <td>{{$SOP->file}}</td>
                                    <td>{{$SOP->addedBy}}</td>
                                    <td>{{$SOP->created_at}}</td>
                                    <td>{{$SOP->modifiedBy}}</td>
                                    <td>{{$SOP->updated_at}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- END col-4 -->
        </div>
        <!-- END row -->
    </div>
</div>
<!-- END #content -->
<div class="modal fade" id="addModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Policy's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm1">

                    <div class="mb-3">
                        <label>Policy's Code </label><br><br>
                        <input type="text" class="form-control" name="code" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Policy's Name </label><br><br>
                        <input type="text" class="form-control" name="policy" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3" name="desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveButton1">Save</button>
            </div>
        </div>
    </div>
</div>
<!--

-->
<div class="modal fade" id="editModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Policy's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm1">

                    <div class="mb-3">
                        <label>Policy's Code </label><br><br>
                        <input type="text" class="form-control" id="code" name="code" placeholder="">
                        <input type="hidden" class="form-control" id="idP" name="id" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Policy's Name </label><br><br>
                        <input type="text" class="form-control" id="policy" name="policy" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3" name="desc" id="desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" multiple="multiple" name="file"></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateButton1">Save</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<div class="modal fade" id="addModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New SOP's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm2">

                    <div class="mb-3">
                        <label>SOP's Code </label><br><br>
                        <input type="text" class="form-control" name="SOPCode" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>SOP's Name </label><br><br>
                        <input type="text" class="form-control" name="SOPName" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3" name="desc"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveButton2">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update SOP's</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm2">

                    <div class="mb-3">
                        <label>SOP's Code </label><br><br>
                        <input type="text" class="form-control" name="SOPCode" id="SOPCode" placeholder="">
                        <input type="hidden" class="form-control" name="id" id="idS" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>SOP's Name </label><br><br>
                        <input type="text" class="form-control" name="SOPName" id="SOPName" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label>Description </label><br><br>
                        <textarea class="form-control" rows="3" name="desc" id="descr"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>File Upload </label><br><br>
                        <input id="fileupload" type="file" name="file" multiple="multiple" ></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateButton2">Save</button>
            </div>
        </div>
    </div>
</div>


@endsection