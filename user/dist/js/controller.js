/*************Select Locality*******************/
function selectLocality(id)
{
var datetime= new Date();
$.get("common.php?action=selectLocality&datetime="+datetime+"&city_id="+id, function(data)
	{
	document.getElementById("locality_id").innerHTML=data;
});
}

/****************End Select Locality**************************/

/*************Select Sublocality*******************/
function selectSublocality(id)
{
var datetime= new Date();
$.get("common.php?action=selectSublocality&datetime="+datetime+"&locality_id="+id, function(data)
	{
	document.getElementById("sublocality_id").innerHTML=data;
});
}

/****************End Select Locality**************************/

/***********Get Date and Time of Emailer**********/
function getDateTime(id) 
{
$.get("common.php?action=getDateTime&campaign_id="+id,function (data)
	{
	var val=data.split("+");
	var date=val[0];
	var time=val[1];
	document.getElementById("ssd").value=date;
	document.getElementById("sst").value=time;
	
});
}

/****************End*************/