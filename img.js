function CheckboxClicked(imageid,checkboxid,numid)
{


  var img = document.getElementById(imageid);
  var num = document.getElementById(numid);

  var len = img.src.length;
   
   var ind  = img.src.lastIndexOf('.');
   var start = img.src.substring(0,ind);
   var end = img.src.substring(ind+1,len);
   
   var str;
if( ind>7 && img.src.substring(ind-7,ind)=="Checked" )
{
    check = document.getElementById( checkboxid);
  check.checked = false;
  str = img.src.substring(0,ind-7) + img.src.substring(ind,len) ;
  img.src = str;
  num.style = "display:none";

}
else 
{
    str = start + "Checked." + end; 
   img.src = str;
   document.getElementById(checkboxid).checked = true;
   num.style = "display:inline";

}

}
