$(document).ready(function () {
    $("#calendar").datepicker({
        todayHighlight: true,
        autoclose: true,
        orientation: "bottom",
        format: "yyyy-mm-dd",
    });

    $(document).on("click", "#editButton2", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleavesecond = myleave2(id);
        // console.log(myleaveData2);

        myleavesecond.done(function (data) {
            $("#datafullname").val(data[0].fullName);
            $("#applieddate").val(data[0].applied_date);
            $("#type1").val(data[0].leave_types);
            $("#dayapplied").val(data[0].day_applied);
            $("#leavedate").val(data[0].leave_date);
            $("#startdate").val(data[0].start_date);
            $("#enddate").val(data[0].end_date);
            $("#totaldayapplied").val(data[0].total_day_applied);
            $("#reason1").val(data[0].reason);
            $("#iddata").val(data[0].id);
            console.log(data[0]);

            if (data[0].up_rec_status === "1") {
                $("#status_1").text("Pending");
            } else if (data[0].up_rec_status === "2") {
                $("#status_1").text("Pending");
            } else if (data[0].up_rec_status === "3") {
                $("#status_1").text("Reject");
            } else if (data[0].up_rec_status === "4") {
                $("#status_1").text("Approved");
            }

            if (data[0].up_app_status === "1") {
                $("#status_2").text("Pending");
            } else if (data[0].up_app_status === "2") {
                $("#status_2").text("Pending");
            } else if (data[0].up_app_status === "3") {
                $("#status_2").text("Reject");
            } else if (data[0].up_app_status === "4") {
                $("#status_2").text("Approved");
            }

            if (data[0].leave_session === "1") {
                $("#leavesession").text("Morning");
            } else if (data[0].leave_session === "2") {
                $("#leavesession").text("Evening");
            } else {
                $("#menu01").hide();
            }

            if (data[0].username1) {
                $("#recommended_by").text(data[0].username1);
            } else {
                $("#recommended_by").text("");
            }

            if (data[0].username2) {
                $("#approved_by").text(data[0].username2);
            } else {
                $("#approved_by").text("");
            }

            if (data[0].file_document) {
                var filename = data[0].file_document.split("/").pop();
                $("#fileDownloadPolicya").html(
                    '<a href="/storage/' +
                        data[0].file_document +
                        '" download="' +
                        filename +
                        '">Download : ' +
                        filename +
                        "</a>"
                );
            } else {
                $("#fileDownloadPolicya").html("No File Upload");
            }
        });
    });

    function myleave2(id) {
        return $.ajax({
            url: "/getuserleaveApprhod/" + id,
        });
    }

    $(document).on("click", "#editButton3", function () {
        var id = $(this).data("id");
        // console.log(id);
        var myleaveget = myleave(id);
        // console.log(myleaveData2);

        myleaveget.done(function (data) {
            $("#datafullname2").val(data[0].username);
            $("#applieddate2").val(data[0].applied_date);
            $("#type2").val(data[0].leave_types);
            $("#dayapplied2").val(data[0].day_applied);
            $("#leavedate2").val(data[0].leave_date);
            $("#startdate2").val(data[0].start_date);
            $("#enddate2").val(data[0].end_date);
            $("#totaldayapplied2").val(data[0].total_day_applied);
            $("#reason2").val(data[0].reason);
            $("#iddata2").val(data[0].id);
            console.log(data[0]);

            if (data[0].up_rec_status === "1") {
                $("#status_2").text("Pending");
            } else if (data[0].up_rec_status === "2") {
                $("#status_2").text("Pending");
            } else if (data[0].up_rec_status === "3") {
                $("#status_2").text("Reject");
            } else if (data[0].up_rec_status === "4") {
                $("#status_2").text("Approved");
            }

            if (data[0].leave_session === "1") {
                $("#leavesession2").text("Morning");
            } else if (data[0].leave_session === "2") {
                $("#leavesession2").text("Evening");
            } else {
                $("#menu10").hide();
            }

            if (data[0].username1) {
                $("#recommended_by2").text(data[0].username1);
            } else {
                $("#recommended_by2").text("");
            }

            if (data[0].username2) {
                $("#approved_by2").text(data[0].username2);
            } else {
                $("#approved_by2").text("");
            }

            if (data[0].file_document) {
                var filename = data[0].file_document.split("/").pop();
                $("#fileDownloadPolicya2").html(
                    '<a href="/storage/' +
                        data[0].file_document +
                        '" download="' +
                        filename +
                        '">Download : ' +
                        filename +
                        "</a>"
                );
            } else {
                $("#fileDownloadPolicya2").html("No File Upload");
            }
        });
    });

    function myleave(id) {
        return $.ajax({
            url: "/getuserleaveApprhod/" + id,
        });
    }

    $("#updateButton").click(function (e) {
        $("#updateForm").validate({
            // Specify validation rules
            rules: {},

            messages: {},
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updateForm")
                    );
                    var id = $("#iddata").val();
                    // console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updatehod/" + id,
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function () {
                            if (data.type == "error") {
                            } else {
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });

    $("#updateButtonreject").click(function (e) {
        $("#updatereject").validate({
            // Specify validation rules
            rules: {
                reasonreject: "required",
            },

            messages: {
                reasonreject: "you must insert reason why you reject",
            },
            submitHandler: function (form) {
                requirejs(["sweetAlert2"], function (swal) {
                    var data = new FormData(
                        document.getElementById("updatereject")
                    );
                    var id = $("#iddata2").val();
                    // console.log(id);
                    // return false;

                    $.ajax({
                        type: "POST",
                        url: "/updatehodreject/" + id,
                        data: data,
                        dataType: "json",
                        async: false,
                        processData: false,
                        contentType: false,
                    }).done(function (data) {
                        swal({
                            title: data.title,
                            text: data.msg,
                            type: data.type,
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then(function () {
                            if (data.type == "error") {
                            } else {
                                location.reload();
                            }
                        });
                    });
                });
            },
        });
    });
});
