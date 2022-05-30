
        function NumberOnly(e) {
            e = e || window.event;
            ch = e.which || e.keyCode;
            if (ch != null) {
                if ((ch >= 48 && ch <= 57)
                       || ch == 0 || ch == 8 || ch == 9 || ch == 39 || ch == 37
                       || ch == 13 || ch == 45 || ch == 40 || ch == 41 || ch == 44 || ch == 43 || ch == 46) return true;
            }
            return false;
        }

       //  function Button() {
       //      $('#example').dataTable().fnDestroy();
       //      var Size = $.trim($('#<%=DDSize.ClientID %>').val());
       //      var Name = $.trim($('#<%=txtSerach.ClientID %>').val());
       //      document.getElementById("loader").style.display = "block";
       //      $.ajax({
       //          type: "POST",
       //          contentType: "application/json; charset=utf-8",
       //          url: "OpeningStock.aspx/BindDatatable",
       //          data: "{'Size':'" + Size + "','name':'" + Name + "'}",
       //          dataType: "json",
       //          success: function (data) {
       //
       //              $("#tbody tr").remove();
       //
       //              for (var i = 0; i < data.d.length; i++) {
       //                  $("#tbody").append("<tr><td>" + data.d[i].ID + "</td><td>" + data.d[i].Dated + "</td><td>" + data.d[i].Name + "</td><td>" + data.d[i].Branch + "</td><td>" + data.d[i].Amount + "</td><td>" + data.d[i].IGst + "</td><td>" + data.d[i].Discount + "</td><td>" + data.d[i].NetTotal + "</td><td><a style='cursor:pointer;' class='btn btn-primary btn-xs' href='PrintBarCode.aspx?ID=" + data.d[i].ID + "' target='_blank'><i class='fa fa-print' ></i></a>&nbsp;&nbsp<a style='cursor:pointer;' class='btn btn-primary btn-xs' onclick='FindRecord(" + data.d[i].ID + ")' ><i class='fa fa-edit' ></i></a>&nbsp;&nbsp</a><a class='btn btn-danger btn-xs' onclick='DeleteRecord(" + data.d[i].ID + ")'><i class='fa fa-trash-o'></i></a></td></tr>");
       //              }
       //              document.getElementById("loader").style.display = "none";
       //              $('#example').DataTable({
       //                  dom: 'Bfrtip',
       //                  buttons: [
       //     'copy', 'csv', 'excel', 'pdf', 'print'
       // ]
       //              });
       //          },
       //          error: function (result) {
       //              alert("Error");
       //          }
       //      });
       //  };

        function sum() {
            var yourTable = document.all("dataTable");
            var Amount = 0;
            var Total = 0;
            var tax = 0;
            var taxAmount = 0;
            var DisAmt = 0;
            var DisTotal = 0;
            var SubTotal = 0;
            var TotalVat = 0;
            var ItemTotal = 0;
            var TaxTotal = 0;

            var OtherAmt = 0;
            var RoundOff = 0;
            var NetPay = 0;
            var Paid = 0;

            for (var i = 1; i < yourTable.rows.length; i++) //setting the incrementor=0, but if you have a header set it to 1
            {
                Total = parseFloat(yourTable.rows[i].cells[2].childNodes[1].value) * parseFloat(yourTable.rows[i].cells[3].childNodes[1].value);
                yourTable.rows[i].cells[4].childNodes[1].value = Total.toString();

                taxAmount = Math.round(((Total * parseFloat(yourTable.rows[i].cells[5].childNodes[1].value)) / 100), 2);
                yourTable.rows[i].cells[6].childNodes[1].value = Math.round(((Total * parseFloat(yourTable.rows[i].cells[5].childNodes[1].value)) / 100), 2);

                SubTotal = Total + parseFloat(yourTable.rows[i].cells[6].childNodes[1].value);

                if ((yourTable.rows[i].cells[7].childNodes[1].value) != "") {
                    DisAmt = Math.round(((SubTotal * parseFloat(yourTable.rows[i].cells[7].childNodes[1].value)) / 100), 2);

                    yourTable.rows[i].cells[8].childNodes[1].value = parseFloat(DisAmt);
                    yourTable.rows[i].cells[9].childNodes[1].value = ((parseFloat(Total) + parseFloat(taxAmount)) - parseFloat(DisAmt));
                }
                else {
                    yourTable.rows[i].cells[8].childNodes[1].value = 0;
                    yourTable.rows[i].cells[9].childNodes[1].value = ((parseFloat(Total) + parseFloat(taxAmount)));
                }

                if (!isNaN(yourTable.rows[i].cells[4].childNodes[1].value))
                    ItemTotal = ItemTotal + parseFloat(yourTable.rows[i].cells[4].childNodes[1].value);
                TaxTotal = TaxTotal + parseFloat(yourTable.rows[i].cells[6].childNodes[1].value);
                DisTotal = DisTotal + parseFloat(yourTable.rows[i].cells[8].childNodes[1].value);
                NetPay = NetPay + parseFloat(yourTable.rows[i].cells[9].childNodes[1].value);
            }

            $.trim($('#<%=txtItemTotal.ClientID %>').val(ItemTotal));
            $.trim($('#<%=txtGSTAmt.ClientID %>').val(TaxTotal / 2));
            $.trim($('#<%=txtSGStAmt.ClientID %>').val(TaxTotal / 2));
            $.trim($('#<%=txtDiscount.ClientID %>').val(DisTotal));
            $.trim($('#<%=txtNTotal.ClientID %>').val(NetPay));
        }


        function addRow(tableID) {

            var table = document.getElementById(tableID);

            var rowCount = table.rows.length;
            // alert(rowCount);
            var row = table.insertRow(rowCount);

            var colCount = table.rows[0].cells.length;



            for (var i = 0; i < colCount; i++) {

                var newcell = row.insertCell(i);

                newcell.innerHTML = table.rows[1].cells[i].innerHTML;
                // alert(newcell.childNodes);
                switch (newcell.childNodes[0].type) {
                    case "text":
                        newcell.childNodes[0].value = "";
                        break;
                    case "checkbox":
                        newcell.childNodes[0].checked = false;
                        break;
                    case "select":
                        newcell.childNodes[0].value = "";
                        // $(".select2").select2();
                        break;
                }

            }

        }





        function deleteRow(element) {
            try {

                var table = document.all("dataTable");
                var b = element.parentNode.parentNode.rowIndex;
                //for (var i = 0; i < rowCount; i++) {
                //    var row = table.rows[i];

                //if (null != chkbox && true == chkbox.checked) {
                var rowCount = table.rows.length;
                if (rowCount <= 2) {
                    // $.messager.alert({	// show error message
                    //     title: 'Error',
                    //     msg: 'Cannot delete all the rows.'
                    // });
                    alert("Error! Cannot delete all the rows");
                    return false;
                }
                table.deleteRow(b);
                //}
                // sum();
                // }
            } catch (e) {
                alert(e);
            }
        }


        // $(document).ready(function () {
        //     $.ajax({
        //         type: "POST",
        //         contentType: "application/json; charset=utf-8",
        //         url: "OpeningStock.aspx/BindDatatoDropdown",
        //         data: "{}",
        //         dataType: "json",
        //         success: function (data) {
        //             var opt = document.createElement("DDSupplier");
        //             var str = "";
        //             str += '<option value=0>Select Account</option>';
        //             $.each(data.d, function (key, value) {
        //                 opt.text = value.Code;
        //                 opt.value = value.Name;
        //
        //                 str += '<option value="' + opt.text + '">' + opt.value + '</option>';
        //                 // Add an Option object to Drop Down List Box
        //             });
        //             document.getElementById("ContentPlaceHolder1_DDSupplier").innerHTML = str;
        //
        //         },
        //         error: function (result) {
        //             alert("Error123");
        //         }
        //     });
        // });






        // $(document).ready(function () {
        //     $.ajax({
        //         type: "POST",
        //         contentType: "application/json; charset=utf-8",
        //         url: "OpeningStock.aspx/Items",
        //         data: "{}",
        //         dataType: "json",
        //         success: function (data) {
        //             var opt = document.createElement("country");
        //             var str = "";
        //             str += '<option value=0>Select Product</option>';
        //             $.each(data.d, function (key, value) {
        //                 opt.text = value.Code;
        //                 opt.value = value.Name;
        //
        //                 str += '<option value="' + opt.text + '">' + opt.value + '</option>';
        //                 // Add an Option object to Drop Down List Box
        //             });
        //             document.getElementById("ContentPlaceHolder1_country").innerHTML = str;
        //
        //         },
        //         error: function (result) {
        //             alert("Error123");
        //         }
        //     });
        // });








        // function find(tableID) {
        //     var value = document.getElementById("ContentPlaceHolder1_country").innerHTML;
        //     var yourTable = document.all("dataTable");
        //     if (!document.getElementsByTagName || !document.createTextNode) return;
        //     var rows = document.getElementById(tableID).getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        //     for (i = 0; i < rows.length; i++) {
        //         rows[i].onclick = function () {
        //             var b = this.rowIndex;
        //             var data = yourTable.rows[b].cells[0].childNodes[1].value;
        //
        //             if (data.length != 0) {
        //                 //Jquery ajax call to server side method
        //
        //                 $.ajax({
        //                     type: "POST",
        //                     dataType: "json",
        //                     contentType: "application/json; charset=utf-8",
        //                     //Url is the path of our web method (Page name/function name)
        //                     url: "OpeningStock.aspx/ItemRate",
        //                     //Pass paramenters to the server side function
        //                     data: "{'JobCode':'" + data + "'}",
        //                     success: function (response) {
        //                         var Account = response.d;
        //                         //                                 yourTable.rows[b].cells[2].childNodes[1].value = Account.Rate;
        //                         yourTable.rows[b].cells[5].childNodes[1].value = Account.GSTRate;
        //
        //
        //                         sum();
        //                     },
        //                     error: function (xhr, textStatus, error) {
        //                         //Show error message(if occured)
        //                         $.messager.alert({	// show error message
        //                             title: 'Error',
        //                             msg: error
        //                         });
        //                     }
        //                 });
        //             }
        //
        //         }
        //     }
        // }

        function Clearfeilds() {
            $.trim($('#<%=txtINVNo.ClientID %>').val(''));
            $.trim($('#<%=txtPBillNo.ClientID %>').val(''));
            $.trim($('#<%=txtRemarks.ClientID %>').val(''));
            $.trim($('#<%=txtItemTotal.ClientID %>').val(''));
            $.trim($('#<%=txtGSTAmt.ClientID %>').val(''));
            $.trim($('#<%=txtSGStAmt.ClientID %>').val(''));
            $.trim($('#<%=txtIGst.ClientID %>').val(''));
            $.trim($('#<%=txtDiscount.ClientID %>').val(''));
            $.trim($('#<%=txtNTotal.ClientID %>').val(''));
            $.trim($('#<%=HFMode.ClientID %>').val('I'));


            var table = document.getElementById('dataTable');
            var rowCount = table.rows.length;

            for (var i = 2; i < rowCount; i++) {
                var row = table.rows[i];
                if (rowCount <= 1) {
                    break;
                }
                table.deleteRow(i);
                rowCount--;
                i--;
            }
            table.rows[1].cells[0].childNodes[1].value = "Select Product";
            table.rows[1].cells[1].childNodes[1].value = "";
            table.rows[1].cells[2].childNodes[1].value = "";
            table.rows[1].cells[3].childNodes[1].value = "";
            table.rows[1].cells[4].childNodes[1].value = "";
            table.rows[1].cells[5].childNodes[1].value = "";
            table.rows[1].cells[6].childNodes[1].value = "";
            table.rows[1].cells[7].childNodes[1].value = "";
            table.rows[1].cells[8].childNodes[1].value = "";
            table.rows[1].cells[9].childNodes[1].value = "";
        }


        function validateform() {
            if (document.getElementById("<%=DDSupplier.ClientID%>").value == "0") {
                $('#modal-primary').modal('show');
                document.getElementById("content").innerHTML = "Please Enter Account Group....";
                document.getElementById("<%=DDSupplier.ClientID%>").focus();
                return false;
            }



            return true;
        }

        function SaveRecord() {
            var msg = "";
            if (validateform() == true) {
                document.getElementById("loader").style.display = "block";
                var JSONObject = new Array();
                var yourTable = document.all("dataTable");
                for (var i = 0; i < yourTable.rows.length; i++) {
                    var obj = new Object();
                    obj["ID"] = $.trim($('#<%=txtINVNo.ClientID %>').val());
                    obj["Dated"] = $.trim($('#<%=txtDate.ClientID %>').val());
                    obj["Account_Code"] = $.trim($('#<%=DDSupplier.ClientID %>').val());

                    obj["Remarks"] = $.trim($('#<%=txtRemarks.ClientID %>').val());
                    obj["Total"] = $.trim($('#<%=txtItemTotal.ClientID %>').val());
                    obj["CGst"] = $.trim($('#<%=txtGSTAmt.ClientID %>').val());
                    obj["SGst"] = $.trim($('#<%=txtSGStAmt.ClientID %>').val());
                    obj["IGst"] = $.trim($('#<%=txtIGst.ClientID %>').val());
                    obj["Discount"] = $.trim($('#<%=txtDiscount.ClientID %>').val());
                    obj["NetTotal"] = $.trim($('#<%=txtNTotal.ClientID %>').val());
                    obj["Mode"] = $.trim($('#<%=HFMode.ClientID %>').val());

                    if (i > 0) {
                        if (!isNaN(yourTable.rows[i].cells[1].childNodes[1].value)) {
                            obj["PCode"] = yourTable.rows[i].cells[0].childNodes[1].value;
                            obj["PSerial"] = yourTable.rows[i].cells[1].childNodes[1].value;
                            obj["Qty"] = yourTable.rows[i].cells[2].childNodes[1].value;
                            obj["Rate"] = yourTable.rows[i].cells[3].childNodes[1].value;
                            obj["Amount"] = yourTable.rows[i].cells[4].childNodes[1].value;
                            obj["Gst"] = yourTable.rows[i].cells[5].childNodes[1].value;
                            obj["TaxAmt"] = yourTable.rows[i].cells[6].childNodes[1].value;
                            obj["DP"] = yourTable.rows[i].cells[7].childNodes[1].value;
                            obj["DiscAmt"] = yourTable.rows[i].cells[8].childNodes[1].value;
                            obj["ITotal"] = yourTable.rows[i].cells[9].childNodes[1].value;
                        }
                    }
                    JSONObject[i] = obj;

                }


                if (msg.length == 0) {
                    //Jquery ajax call to server side method

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: 'OpeningStock.aspx/SaveBookDetails',
                        data: JSON.stringify({ 'cs': JSONObject }),
                        contentType: "application/json;charset=utf-8",
                        success: function (data, status, xhr) {
                            document.getElementById("loader").style.display = "none";
                            if (data.d == 0) {
                                alert("The result is : Record Update Sucessfully");
                                Clearfeilds();
                            }
                            else {
                                alert("Invalid Transaction : Some thing wrong with this trasaction");
                            }
                        },
                        error: function (xhr) {
                            alert(xhr.responseText);
                        }
                    });
                }
            }
        }


        function FindRecord(data) {
            Clearfeilds();

            if (data.length != 0) {
                //Jquery ajax call to server side method
                document.getElementById("loader").style.display = "block";
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    contentType: "application/json; charset=utf-8",
                    //Url is the path of our web method (Page name/function name)
                    url: "OpeningStock.aspx/getDate",
                    //Pass paramenters to the server side function
                    data: "{'JobCode':'" + data + "'}",
                    success: function (response) {
                        var Account = response.d;
                        $.trim($('#<%=txtINVNo.ClientID %>').val(Account[0].ID));
                        $.trim($('#<%=txtDate.ClientID %>').val(Account[0].Dated));
                        $.trim($('#<%=DDSupplier.ClientID %>').val(Account[0].Account_Code));




                        $.trim($('#<%=txtRemarks.ClientID %>').val(Account[0].Remarks));

                        $.trim($('#<%=txtItemTotal.ClientID %>').val(Account[0].Amount));
                        $.trim($('#<%=txtGSTAmt.ClientID %>').val(Account[0].CGst));
                        $.trim($('#<%=txtSGStAmt.ClientID %>').val(Account[0].SGst));
                        $.trim($('#<%=txtIGst.ClientID %>').val(Account[0].IGst));
                        $.trim($('#<%=txtDiscount.ClientID %>').val(Account[0].DiscAmt));
                        $.trim($('#<%=txtNTotal.ClientID %>').val(Account[0].NetTotal));

                        var j = 1;
                        var yourTable = document.getElementById('dataTable');

                        for (var i = 0; i < response.d.length; i++) {
                            if (j > 1) {
                                addRow("dataTable");
                            }
                            yourTable.rows[j].cells[0].childNodes[1].value = Account[i].PCode;
                            yourTable.rows[j].cells[1].childNodes[1].value = Account[i].PSerial;
                            yourTable.rows[j].cells[2].childNodes[1].value = Account[i].Qty;
                            yourTable.rows[j].cells[3].childNodes[1].value = Account[i].Rate;
                            yourTable.rows[j].cells[4].childNodes[1].value = Account[i].Amount;
                            yourTable.rows[j].cells[5].childNodes[1].value = Account[i].Gst;
                            yourTable.rows[j].cells[6].childNodes[1].value = Account[i].TaxAmt;
                            yourTable.rows[j].cells[7].childNodes[1].value = Account[i].DP;
                            yourTable.rows[j].cells[8].childNodes[1].value = Account[i].Discount;
                            yourTable.rows[j].cells[9].childNodes[1].value = Account[i].ITotal;
                            j++;
                        }
                        $.trim($('#<%=HFMode.ClientID %>').val('U'));

                        document.getElementById("Add").className = "active";
                        document.getElementById("Manage").className = "";

                        document.getElementById("tab_1").className = " tab-pane active";
                        document.getElementById("tab_2").className = "tab-pane";
                        document.getElementById("loader").style.display = "none";
                    },
                    error: function (xhr, textStatus, error) {
                        //Show error message(if occured)
                        alert("Error");
                    }
                });

            }
        }


        function DeleteRecord(data) {
            if (data.length != 0) {
                //Jquery ajax call to server side method
                var r = confirm('Are you sure you want to remove this Item?')
                document.getElementById("loader").style.display = "block";
                if (r) {
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        //Url is the path of our web method (Page name/function name)
                        url: "OpeningStock.aspx/DeleteRec",
                        //Pass paramenters to the server side function
                        data: "{'JobCode':'" + data + "', 'TableName':'Opening'}",
                        success: function (response) {
                            alert(response.d);
                            Button();
                            document.getElementById("loader").style.display = "none";
                        },
                        error: function (xhr, textStatus, error) {
                            //Show error message(if occured)
                            $.messager.alert({	// show error message
                                title: 'Error',
                                msg: error
                            });
                        }
                    });


                };
            }
        }
