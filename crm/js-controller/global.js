/******************* Move to Bin *******************/
 function deleteThisRow(idm,tbl)
 {
     var c1=confirm("Do you really want to move to bin folder?");
     if(c1==true){
         document.getElementById("loader").style.display="block";
      $.ajax({ type: "POST",
          url: "engine-controller.php",
              data:{action:'move_to_bin',id:idm,tbl:tbl},
          async: false,
            success : function(pass)
          {
          document.getElementById("loader").style.display="none";

               if(pass == "success") {
                 swal({
                      title: "Record Moved to Trash!",
                      icon: "success",
                      timer: 2e3
                       });
                          RefreshView();
               } else if( type == "error") {
                 swal({
                        title: "Error in Moving Trash!",
                        icon: "error",
                        timer: 2e3
                      });
                         // RefreshView();
               }
          },

          error : function (errormsg)
          {
              alert(errormsg);
          }


         });

 }
 }
 /*******************end_side_delete**************************/
 // *** Change Status**//
 function updateStatus(val,id,tbl){

   $.ajax({ type: "POST",
       url: "engine-controller.php",
           data:{action:'update_status',id:id,sts:val,tbl:tbl},
       async: false,
         success : function(pass)
       {
       document.getElementById("loader").style.display="none";
    //location.reload();
    if(pass=="success") {
        RefreshView();
    }
    // self.location="categories.php?m=active";
       },

       error : function (errormsg)
       {
           alert(errormsg);
       }


      });
 }
 // ************ End Status Update************//
 // ********** Restore ***********//
 function restore(id,tbl){
   document.getElementById("loader").style.display="block";

   $.ajax({ type: "POST",
       url: "engine-controller.php",
           data:{action:'restore',id:id,tbl:tbl},
       async: false,
         success : function(pass)
       {
       document.getElementById("loader").style.display="none";

            if(pass == "success") {
              swal({
                   title: "Record Restored Successfully!",
                   icon: "success",
                   timer: 2e3
                    });
                       RefreshView();
            } else if( type == "error") {
              swal({
                     title: "Error in Restoring Record!",
                     icon: "error",
                     timer: 2e3
                   });
                      // RefreshView();
            }

             },

       error : function (errormsg)
       {
           alert(errormsg);
       }


      });
 }
// *********** End Restore **********//
	function allowNumeric(element,event)	{
   if((event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 0)
   {   }
   else
   {
     event.preventDefault();
   }
 }
// ********** Allow Numeric End **********//
function btnHide() {
//    alert('HI');
// $("#data-table-simple").DataTable({responsive:!0});
// $(".select2").select2("destroy").select2();
      $(".select2").select2();
  }

  function setDate() {
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();
   if(dd<10){
          dd='0'+dd
      }
      if(mm<10){
          mm='0'+mm
      }

  today = yyyy+'-'+mm+'-'+dd;
  document.getElementById("datefield").setAttribute("min", today);
  document.getElementById("datefield").value=today;
  }
  /*********** Delete All Records **********/
function deleteAllRecords(tbl) {
  var c1=confirm("Do you really want to delete all Records?");
  if(c1==true){
      document.getElementById("loader").style.display="block";
   $.ajax({ type: "POST",
       url: "engine-controller.php",
           data:{action:'delete_all_records',tbl:tbl},
       async: false,
         success : function(pass)
       {
       document.getElementById("loader").style.display="none";
   //location.reload();
   if(pass=="success") {
       RefreshView();
   }
       },

       error : function (errormsg)
       {
           alert(errormsg);
       }


      });

}
}
/*********** Delete All Records  Ends**********/
/*********** Delete This Records**********/
function deleteThisRecord(idm,tbl)
{
    var c1=confirm("Do you really want to delete this record permanently?");
    if(c1==true){
        // document.getElementById("loader").style.display="block";
     $.ajax({ type: "POST",
         url: "engine-controller.php",
             data:{action:'delete_this_record',id:idm,tbl:tbl},
         async: false,
           success : function(pass)
         {
         // document.getElementById("loader").style.display="none";
     //location.reload();

     if(pass == "success") {
       swal({
            title: "Record Deleted Successfully!",
            icon: "success",
            timer: 2e3
             });
                RefreshView();
     } else if( type == "error") {
       swal({
              title: "Error in Deleting Record!",
              icon: "error",
              timer: 2e3
            });
               // RefreshView();
     }
         },

         error : function (errormsg)
         {
             alert(errormsg);
         }


        });

}
}
/*********** Delete This Records Ends**********/
// Set Featured Image
 function setFeatured(val,id,tbl,pid){
if(val != '') {
  $.ajax({ type: "POST",
      url: "engine-controller.php",
          data:{action:'set_featured',id:id,sts:val,tbl:tbl,pid:pid},
      async: false,
        success : function(pass)
      {
      document.getElementById("loader").style.display="none";
   //location.reload();
   if(pass == "success") {
     swal({
          title: "Set Featured Successfully!",
          icon: "success",
          timer: 2e3
           });
              RefreshView();
   } else if( type == "error") {
     swal({
            title: "Error in Featuring Record!",
            icon: "error",
            timer: 2e3
          });
             // RefreshView();
   }
      },

      error : function (errormsg)
      {
          alert(errormsg);
      }


     });
}

  }
  // End Set Featured Image

  function getFilterSubcategory(ele) {
 $.ajax({ type: "POST",
         url: "api-controller.php",
			data:{action:'get_subcategory',id:ele},
         async: true,
		dataType:"json",
		  success : function(data)
         {
	  if(data.RESPONSE_CODE=='2XX')
			 {
		  var allData=data.DATA;
      // console.log(allData.title);
		  var dynHTML='';
		  for(i=0;i<allData.length;i++)
				 {
			id=allData[i].id;
			ttl=allData[i].title;
			dynHTML +='<option value="'+id+'">'+ttl.toUpperCase()+'</option>';
				 }
         // alert(dynHTML + document.getElementById('subcategory').innerHTML);
         // document.getElementsByName('subcategory_id')[0].innerHTML='<option value="">Please Select</option>'+dynHTML;
         document.getElementById('subCategory').innerHTML=dynHTML;
			 }
			 else
			 {
			 // alert("Internal Server Error!");
			 }
         },

		error : function (errormsg)
		{
			alert("Internal Server Error!");
		}
  });
}

  // get subcategory
  function getSubcategory(ele) {
	// try
	// {
	// document.getElementsByClassName('subcat-loader')[0].style.display="block";
	// document.getElementsByClassName('subcat-loader')[1].style.display="block";
	// }
	// catch (e)
	// {}
 $.ajax({ type: "POST",
         url: "api-controller.php",
			data:{action:'get_subcategory',id:ele},
         async: true,
		dataType:"json",
		  success : function(data)
         {
	  if(data.RESPONSE_CODE=='2XX')
			 {
		  var allData=data.DATA;
      // console.log(allData.title);
		  var dynHTML='';
		  for(i=0;i<allData.length;i++)
				 {
			id=allData[i].id;
			ttl=allData[i].title;
			dynHTML +='<option value="'+id+'">'+ttl.toUpperCase()+'</option>';
				 }
         // alert(dynHTML + document.getElementById('subcategory').innerHTML);
         // document.getElementsByName('subcategory_id')[0].innerHTML='<option value="">Please Select</option>'+dynHTML;
         document.getElementById('subcategory').innerHTML=dynHTML;
			 }
			 else
			 {
			 // alert("Internal Server Error!");
			 }
         },

		error : function (errormsg)
		{
			alert("Internal Server Error!");
		}
  });
}

// get Designations
function getDesignation(ele,m = '') {
$.ajax({ type: "POST",
       url: "api-controller.php",
    data:{action:'get_designation',id:ele},
       async: true,
  dataType:"json",
    success : function(data)
       {
  if(data.RESPONSE_CODE=='2XX')
     {
    var allData=data.DATA;
    // console.log(allData.title);
    var dynHTML='';
    for(i=0;i<allData.length;i++)
       {
    id=allData[i].id;
    ttl=allData[i].title;
    dynHTML +='<option value="'+id+'">'+ttl.toUpperCase()+'</option>';
       }
       if(m == 1) {
          document.getElementById('desig').innerHTML=dynHTML;
       } else {
         document.getElementById('designation').innerHTML=dynHTML;
       }
     }
     else
     {
     // alert("Internal Server Error!");
     }
       },

  error : function (errormsg)
  {
    alert("Internal Server Error!");
  }
});
}

// get City
function getCity(ele,m = '') {
$.ajax({ type: "POST",
       url: "api-controller.php",
    data:{action:'get_city',id:ele},
       async: true,
  dataType:"json",
    success : function(data)
       {
  if(data.RESPONSE_CODE=='2XX')
     {
    var allData=data.DATA;
    // console.log(allData.title);
    var dynHTML='';
    for(i=0;i<allData.length;i++)
       {
    id=allData[i].id;
    ttl=allData[i].title;
    dynHTML +='<option value="'+id+'">'+ttl.toUpperCase()+'</option>';
       }
       // alert(dynHTML + document.getElementById('subcategory').innerHTML);
       // document.getElementsByName('subcategory_id')[0].innerHTML='<option value="">Please Select</option>'+dynHTML;
       if(m == 1) {
          document.getElementById('ccity').innerHTML=dynHTML;
       } else {
         document.getElementById('city').innerHTML=dynHTML;
       }
     }
     else
     {
     // alert("Internal Server Error!");
     }
       },

  error : function (errormsg)
  {
    alert("Internal Server Error!");
  }
});
}
