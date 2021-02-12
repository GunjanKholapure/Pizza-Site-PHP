<script>
var state = ["0","0","0","0","0","0","0","0","0","0","0"];
 function CheckboxClicked(imageid,checkboxid)
{
var length = imageid.length;
var ind = imageid.substring(2,length);
var image = document.getElementById(imageid);
  
if( state[ind] == 0 )
{
   var str = "images\\" + "pizza" +          ind   + "_unchecked.jpg"  ;
   image.src = str;
   document.getElementById(checkboxid).checked = false;
   state[ind] = 1;
}
else 
{
   image.src = "images\\" + "pizza" +          ind  + "_checked.jpg"   ;
   check = document.getElementById( checkboxid);
  check.checked = true;
  state[ind] = 0;
}

}
//CheckboxClicked("i_1","p_1");
</script>
<?php
  $str = "";
  $str .= '<span style="display:none;">
        <input type="checkbox" name="pizza[]" value="1" id="p_1">
      </span>
  <img id="i_1" src="images/pizza1_unchecked.jpg" width="220" height="200" 
    onclick="CheckboxClicked(\'i_1\',\'p_1\')" style="cursor:pointer;">';
  echo $str;
?>