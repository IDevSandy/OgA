function RecordView() {
  // alert("hi");
  destroyTable();
    // document.getElementById("loader")
    //     .style.display = "block";
    $.ajax({
        type: "POST",
        url: "api-controller.php",
        data: {
            action: 'get_records',tbl:'categories'
        },
         async: true,
         dataType: "json",
         success: function(data) {
            // document.getElementById("loader")
            //     .style.display = "none";
            var dynHTML = '';
            if (data.RESPONSE_CODE == '2XX') {
                var allData = data.DATA;
                var tbl="categories";
                for (i = 0; i < allData.length; i++) {
                    id = allData[i].id;
                    pttl = allData[i].title;
                    st = allData[i].status;

                    if (st != "1") {
                        sts = '<span class="chip red lighten-5"><span class="red-text">Inactive</span></span>';
                    } else {
                        sts = '<span class="chip green lighten-5"><span class="green-text">Active</span></span>';
                    }
                    dynHTML += '<tr class="gradeX"><td>'+id+'</td><td>' + pttl + '</td><td>' + sts + '</td><td><a href="categories.php?id=' + id + '"><i class="material-icons">edit</i></a></td><td><a href="javascript:void(0);" class="cs-delete" onclick="javascript:deleteRow(' + id + ',\'categories\')" ><i class="material-icons">delete_sweep</i></a></td></tr>';
                }
            } else {
            emptyRecord();
            }
            document.getElementById("tbl")
                .innerHTML = dynHTML;
            $('#users-list-datatable')
                .dataTable({
                    "aaSorting": [
                        [0, "desc"]
                    ]
                });
            },
            error: function(errormsg) {
                serverError();
            }
        });
}
function destroyTable() {
    $("#users-list-datatable")
        .dataTable()
        .fnDestroy();
        return true;
}
function sendData() {
    if (document.getElementsByName('title')[0].value != "" && document.getElementsByName('status')[0].value != "") {
        $.ajax({
            type: 'post',
            cache: false,
            url: 'api-controller.php',
            data: $('#form1').serialize(),
            success: function(data) {
                $('#form1').trigger("reset");
              var allData=data.DATA;
              Message(allData['type'],allData['msg']);
              //destroyTable();
              // RecordView();
            },
            error: function(errormsg) {
              serverError();
            }
        });
        } else {
          swal({
            title: 'Field Should not be Blank!',
            icon: 'warning',
            timer: 2e3
          });
    }
}

function checkAll(me) {
    var ele = document.getElementsByClassName("arc_id");
    var eles = [];
    for (i = 0; i < ele.length; i++) {
        if (me.checked == false) {
            ele[i].checked = false;
        } else {
            ele[i].checked = true;
        }
    }
}
function deleteAllRow() {
    document.getElementById("menu2")
        .className = "tab-pane";
    var eles = document.getElementsByClassName("arc_id");
    var ids = [];
    for (i = 0; i < eles.length; i++) {
        if (eles[i].checked == true) {
            ids.push(eles[i].value);
        }
    }
    if (ids != "") {
        var c1 = confirm("Do you really want to delete");
        if (c1 == true) {
            document.getElementById("loader")
                .style.display = "block";
            $.ajax({
                type: "POST"
                , url: "admin-controller.php"
                , data: {
                    action: 'delete_category'
                    , id: ids.toString()
                    , access_token: enc
                }
                , async: false
                , success: function(pass) {
                    destroyTable();
                    if (pass == "SUCCESS") {
                        toastr["success"]("Deleted Successfully.", "Success!")
                        toastr.options = {
                            "closeButton": true
                            , "debug": false
                            , "newestOnTop": true
                            , "progressBar": true
                            , "positionClass": "toast-top-right"
                            , "preventDuplicates": false
                            , "onclick": null
                            , "showDuration": "300"
                            , "hideDuration": "1000"
                            , "timeOut": "5000"
                            , "extendedTimeOut": "1000"
                            , "showEasing": "swing"
                            , "hideEasing": "linear"
                            , "showMethod": "fadeIn"
                            , "hideMethod": "fadeOut"
                        }
                        RecordView();
                    } else {
                        toastr["error"]("Failed to Delete! Try Again.", "Error!")
                        toastr.options = {
                            "closeButton": true
                            , "debug": false
                            , "newestOnTop": true
                            , "progressBar": true
                            , "positionClass": "toast-top-right"
                            , "preventDuplicates": false
                            , "onclick": null
                            , "showDuration": "300"
                            , "hideDuration": "1000"
                            , "timeOut": "5000"
                            , "extendedTimeOut": "1000"
                            , "showEasing": "swing"
                            , "hideEasing": "linear"
                            , "showMethod": "fadeIn"
                            , "hideMethod": "fadeOut"
                        }
                        RecordView();
                    }
                },
                error: function(errormsg) {
                    alert(errormsg);
                }
            });
        } else {
            document.getElementById("loader")
                .style.display = "none";
        }
    } else {
        alert("Please select checkbox first");
    }
}
function deleteRow(idm,tbl) {
    // document.getElementById("menu2")
    //     .className = "tab-pane";
    var c1 = confirm("Do you really want to delete");
    if (c1 == true) {
        // document.getElementById("loader")
        //     .style.display = "block";
        $.ajax({
            type: "POST"
            , url: "api-controller.php"
            , data: {
                action: 'delete_this_record',
                id: idm
                , tbl: tbl
            }
            , async: false
            , success: function(data) {
              var allData=data.DATA;
              Message(allData['type'],allData['msg']);
                    // RecordView();

            },
            error: function(errormsg) {
              serverError();
            }
        });
    }
}
function bindData(idm) {
    // document.getElementById("menu2")
    //     .className = "tab-pane active";
    $.ajax({
        type: "POST"
        , url: "api-controller.php"
        , data: {
            action: 'get_records'
            , id: idm,
            tbl:'categories'
        }
        , async: true
        , dataType: "json"
        , success: function(data) {
            if (data.RESPONSE_CODE == '2XX') {
                var allData = data.DATA;
                // console.log(allData['id']);
                var id = allData['id'];
                var ttl = allData['title'];
                var status = allData['status'];
                // var finalTBL = '<input type="hidden" value="' + enc + '" name="access_token"><input type="hidden" name="action" value="category"><input type="hidden" name="id" value=' + id + '><div class="form-group"><label for="title">TITLE</label><input type="text" class="form-control" name="title" value="' + ttl + '" maxlength="100"></div><div class="form-group"> <label for="meta_title">META TITLE</label> <input type="text" name="meta_title" id="meta_title" class="form-control" value="' + meta_ttl + '" maxlength="100"/></div><div class="form-group"> <label for="meta_keys">META KEYWORD</label> <input type="text" name="meta_keys" id="meta_keys" class="meta_keys" maxlength="150" value="' + meta_keys + '"/></div><div class="form-group"> <label for="meta_desc">META DESCRIPTION</label><textarea class="form-control" name="meta_desc" maxlength="250">' + meta_desc + '</textarea></div><div class="form-group"> <label for="status">STATUS</label> <select name="status" class="form-control" id="sts" value=""><option value="">Please Select</option><option value="1">Active</option><option value="0">Inactive</option></select></div><div class="form-group text-center"><button type="button" class="btn btn-primary btn-md" onclick="javascript:updateData();">UPDATE</button></div>';
                //   document.getElementById("edit")
                //     .innerHTML = '<form role="form" id="form2" name="form2" class="form2" action="#" method="post">' + finalTBL + '</form>';
                document.getElementById("users-list-status").value = status;
                document.getElementById("name4").value = ttl;
                document.getElementById("id").value = id;
// alert(status);
            } else {
              serverError();
            }
        },
        error: function(errormsg) {
            serverError();        }
    });
}

function serverError() {
  swal({
          title: "Internal Server Error!",
          icon: "error",
          timer: 2e3
        });
}
function emptyRecord() {
  swal({
          title: "No Record Found!",
          icon: "error",
          timer: 2e3
        });
}
