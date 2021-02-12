<script type="text/javascript">
/* 
   Image Checkboxes
   Version 1.0
   February 14, 2010

   Will Bontrager
   http://www.willmaster.com/
   Copyright 2010 Bontrager Connection, LLC

   Bontrager Connection, LLC grants you 
   a royalty free license to use or modify 
   this software provided this notice appears 
   on all copies. This software is provided 
   "AS IS," without a warranty of any kind.
*/

// Leave next 2 lines as is. Customization is a few lines down.
var CheckboxUncheckedImage = new Image(); // Declare an image variable.
var CheckboxCheckedImage = new Image(); // Declare another image variable.


// Customization section:
//
// Specify the relative or absolute URL of each image. Examples:
//    /images/unchecked-box.jpg
//    http://example.com/images/unchecked-box.jpg

CheckboxUncheckedImage.src = "hc1.jpg";
CheckboxCheckedImage.src = "abc.png";


/*---------------------------------*/
/* No other customizations needed. */
/* Comments embedded for tutorial. */
/*---------------------------------*/

function CheckboxClicked(imageid,checkboxid) {

// Use imageid to find the image that was clicked.

var image = document.getElementById(imageid);

// Check if the clicked image has the same src as 
//    the one representing a checked checkbox.

if(image.src == CheckboxCheckedImage.src) {

// If yes, switch to image representing unchecked and 
//    also change the checkbox form field's checked 
//    status to false (unchecked).

   image.src = CheckboxUncheckedImage.src;
   document.getElementById(checkboxid).checked = false;
   }

else {

// Otherwise, switch to image representing checked and 
//    also change the checkbox form field's checked 
//    status to true (checked).

   image.src = CheckboxCheckedImage.src;
   document.getElementById(checkboxid).checked = true;
   }

// Return value false to keep the browser from doing 
//    anything else with the click.

return false;
}
</script>

<span style="display:none;">
<input 
   type="checkbox" 
   name="thisbox1" 
   value="yes" 
   id="CheckboxFieldID1">
</span>
<img 
   id="CheckboxImageID1" 
   src="hc1.jpg" 
   width="41" 
   height="38" 
   onclick="CheckboxClicked('CheckboxImageID1','CheckboxFieldID1')" 
   style="cursor:pointer;">


