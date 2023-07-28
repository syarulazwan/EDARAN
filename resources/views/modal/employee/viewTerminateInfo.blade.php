<div class="modal fade" id="viewTerminateInfo" tabindex="-1" aria-labelledby="viewTerminate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="">Termination of Employment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <input type="hidden" id="idc" name="id" class="form-control" aria-describedby="lastname">

                    <p class="h6 p-2">Employee Infomation</p>
                        <div class="row p-2">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    Employee ID :
                                    <input type="text" readonly id="employeeId" name="" class="form-control" >

                                </div>
                                <div class="mb-3">
                                    Terminate Name :
                                    <input type="text" readonly id="employeeName" name="" class="form-control" >

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    Employee Email :
                                    <input type="text" readonly id="employeeEmail" name="" class="form-control" >
                                </div>
                                <div class="mb-3">
                                    Report to :
                                    <input type="text" readonly id="report_to" name="" class="form-control" >
                                </div>
                            </div>
                            <hr class="border border-black border-bottom">

                            <p class="h6 p-2">Termination Form</p>
                            <div class="row p-2">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        Terminate Date* :
                                        <input type="text" readonly id="effectiveFrom" name="" class="form-control" >
                                    </div>
                                    <div class="mb-3">
                                        Remarks :
                                        <input type="text" readonly id="remarks" name="" class="form-control" >
                                    </div>
                                    <div class="mb-3">
                                        Attachments* : <br/>
                                        Click <a id="attachment"></a> to see attachment.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        Terminate Type* :
                                        <input type="text" readonly id="employmentDetail" name="" class="form-control" >
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>