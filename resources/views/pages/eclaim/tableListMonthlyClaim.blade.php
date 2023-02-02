<div class="form-control">
    <div class="row p-2">
        <h4>Personal Claims Table List:</h4>
    </div>
    <div class="row">
        <div class="">
            <table id="claimtable1" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th class="text-nowrap">Applied Date</th>
                        <th class="text-nowrap">Claim Category</th>
                        <th class="text-nowrap">Amount</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Attachment</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($personalClaims)
                        @foreach ($personalClaims as $personal)
                            <tr>
                                <td><a data-bs-toggle="modal" id="btn-view" class="btn btn-primary btn-sm">Delete</a></td>
                                <td>{{ $personal->applied_date ?? '-' }}</td>
                                <td>{{ getClaimCategoryById($personal->claim_category)->claim_catagory ?? '-' }}</td>
                                <td>{{ $personal->amount ?? '-' }}</td>
                                <td>{{ $personal->desc ?? '-' }}</td>
                                <td>{{ $personal->file_upload ?? '-' }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row p-2">
        <h4>Travelling & Subsistence & Accomodation Table List:</h4>
    </div>
    <div class="row">
        <div class="">
            <table id="traveltable" class="table table-striped table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th class="text-nowrap">Travel Date</th>
                        <th class="text-nowrap">Project Name</th>
                        <th class="text-nowrap">Claim Category</th>
                        <th class="text-nowrap">Amount</th>
                        <th class="text-nowrap">Description</th>
                        <th class="text-nowrap">Attachment</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($travelClaims)
                        @foreach ($travelClaims as $travel)
                            <tr>
                                <td><a data-bs-toggle="modal" id="btn-view" class="btn btn-primary btn-sm">Delete</a></td>
                                <td>{{ $travel->travel_date ?? '-' }}</td>
                                <td>{{ getProjectById($travel->project_id)->project_name ?? '-' }}</td>
                                <td>{{ $travel->claim_category ?? '-' }}</td>
                                <td>{{ $travel->amount ?? '-' }}</td>
                                <td>{{ $travel->desc ?? '-' }}</td>
                                <td>{{ $travel->file_upload ?? '-' }}</td>
                            </tr>
                        @endforeach

                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>