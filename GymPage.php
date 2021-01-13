<?php

global $current_user;
wp_get_current_user();

$kv_author =get_the_author_meta('ID'); 	

 if($current_user->ID == $kv_author){
    echo "<style>#uploadImages{display:none !important;}</style>";
    echo "<style>#editDes{display:none !important;}</style>";
    echo "<style>#plusInstructor{display:none !important;}</style>";
    echo "<style>#minusInstructor{display:none !important;}</style>";
    echo "<style>.inup{display:none !important;}</style>";
 } 

$id = get_the_ID();
?>
<style type="text/css">



     /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
      
        height: 50%;
        width:50%;
      }

      body {
        
      }
     
</style>

<body>
  
<div class="headContain">

<div class="mySlideD">
<i id="cameraOverlay" class="fas fa-camera"></i>
    <img onclick="showslide()" id="displayImg" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png">
  </div>

  <form id="_imagesForm" action="" method="post">
    <input id="_imagesInput" type="file" style="display:none" multiple>
</form>

  <div class="flex-container">

  <div class="flex-item1">
  <h1 id="gymTitle"><?php the_title()?></h1>
  <div id="gymLocation">
  <i class="fas fa-map-marker-alt"></i> 
  <h6 id="street"><?php 
  $address = get_post_meta($id,'address_1',true);
  echo $address;?>,
  <?php
  $taxonomy = wp_get_object_terms($id, 'country_state_city');
  $value = ""; 
  if (sizeof($taxonomy) == 0) {echo "<script>alert('failed')</script>";}else {
  
      $value = $taxonomy[0]->name; 
      print_r($value);
 
}?>
  , <?php
  $taxonomy = wp_get_object_terms($id, 'country_state_city');
  $value = ""; 
  if (sizeof($taxonomy) == 0) {echo "<script>alert('failed')</script>";}else {
  
      $value = $taxonomy[1]->name; 
      print_r($value);
 
}?>, <?php
$taxonomy = wp_get_object_terms($id, 'country_state_city');
$value = ""; 
if (sizeof($taxonomy) == 0) {echo "<script>alert('failed')</script>";}else {

    $value = $taxonomy[2]->name; 
    print_r($value);

}?></h6>
</div>
</div>

<div id="picPlusCon">
<div id="picSlidePlus">
<button type="button" onclick="$('#_imagesInput').click()" id="uploadImages" class="plusPic"><i class="fas fa-edit"></i></button>
</div>
    </div>

<div class="flex-item2">
  <h1>Icons</h1>
</div>

</div>
 
<div id="pageSecContain">
<div id="pageSectionMenu">
  <div class="menuContainer">
  <a class ="pageSecLinks" href = "#gymDescription">
  <button id="pageTab1" class="pageSecTab">
    Instructors
</button>
    </a>
  <a class ="pageSecLinks" href = "#visitt">
  <button id="pageTab2" class="pageSecTab">
    Prices
</button>
    </a>
<a class ="pageSecLinks" href = "#plink">
<button id="pageTab3" class="pageSecTab">
Schedule
</button>
    </a>
<a class ="pageSecLinks" href = "#slink">
<button id="pageTab4" class="pageSecTab">
Facilities
</button>
</a>
<div class="pageSecLinks">
<button id="pageTab5" onclick="showMap()" class="pageSecTab">
Map
</button>
    </div>
</div>
</div>
</div>


  <div class="center">
<div class="menuContainer">
  <h2 id = "gymDes">Gym Description</h2>
 <button class="plusPic" id="editDes"><i class="fas fa-edit"></i></button>
</div>
</div>

<div class="center">
<textarea id="gymDesIn">
    </textarea>
    </div>

<div class="container">
<div class="center">
<div id="descriptionContain" class="menuContainer">
  <div id="gymDescription">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua<span id="dots">...</span><span><button class="readButtons" id="readMore" onclick="showMore()">Read more</button></span><span id="more">. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><span><button id="readLess" class="readButtons" onclick="showLess()">Read less</button></span></div>
  </div>
</div>
</div>
  
    <div class="bodyPerim">
<div class="bodyContain">
    
<div id="BigContain">
  <div id ="instructcon">
<div class="center">
<div class="menuContainer">
  <h2>Instructors</h2>
</div>
</div>

<div class="center">
<div id="inpm">
<button type="button" id="plusInstructor" class="plusevent"><i class="fas fa-plus-circle fa-lg"></i></button>
<button type="button" id="minusInstructor" class="plusevent"><i class="fas fa-minus-circle fa-lg"></i></button>
</div>
</div>

<script>


  </script>

<div class="center">
<div id="instructorCards" class="center">
  <div class="inAccord" id="instructors2">
    <div class="inCard2">
      <div class="instruct-card" id="inPic1" data-toggle="collapse" data-target="#inCollapse2" aria-expanded="true" aria-controls="collapseOne">
        <img id = "InImage1" class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif">
        <button onclick="$('#imageUpload1').click()" id ="inup1" class="inup"><i class="fas fa-file-upload"></i></button>
        <input id="imageUpload1" onchange="fasterPreview(this, '#InImage1')" type="file" 
       name="profile_photo" placeholder="Photo" required="" capture>
      <div class="candTContainer">
        <input class="titIn" placeholder="Instructor Name"></input>
        <div class=tAndDropCon">
          <div class="drop">
            <form>
            <label class="beltLabel" for="belts">Belt:</label>
            <select id="beltLevel1" class="beltLevel" name="belts">
              <option value="Black">Black</option>
              <option value="Brown">Brown</option>
              <option value="Purple">Purple</option>
              <option value="Blue">Blue</option>
            </select>
            </form>
          </div>
        </div>
      </div>
    </div>
      <div id="inCollapse2" class="collapse hide" aria-labelledby="inPic1" data-parent=".inCard2">
        <div class="card-body">
        <textarea class="desIn" name="desin1" placeholder="Describe your instructor here."></textarea>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>

    </div>

<div class="menuContainer">
<div id="visitt">
  <h2>Visitor Pricing</h2>
</div>
</div>

<div class="form-group" id="prices">
<div id="PriceCardCon">
  <div class="input-group-prepend">
    <div class="adultcard " aria-label="With textarea"><div class="adults"><div class="adultcontain"><h6 class="titleinputs Options">1 Class</h6><input class="titleinputs" type="text" placeholder="Price ($)"></input></div></div><input class="adultin" placeholder="Include a short description" contenteditable></input>
  </div>
</div>
<div class="input-group-prepend">
    <div class="adultcard " aria-label="With textarea"><div class="adults"><div class="adultcontain"><h6 class="titleinputs Options">1 Day</h6><input class="titleinputs" type="text" placeholder="Price ($)"></input></div></div><input class="adultin" placeholder="Include a short description" contenteditable></input>
  </div>
</div>
<div class="input-group-prepend">
    <div class="adultcard " aria-label="With textarea"><div class="adults"><div class="adultcontain"><h6 class="titleinputs Options">1 Week</h6><input class="titleinputs" type="text" placeholder="Price ($)"></input></div></div><input class="adultin" placeholder="Include a short description" contenteditable></input>
  </div>
</div>
</div>
</div>


 <!-- <div id="gi" class="center">

            <label class="price-check-label" for="exampleCheck1">Do you offer gi rental?</label>
          </div>
          <p>

          <div class="center">
          <div id="checkcon">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="price-check-label" for="exampleCheck1">Yes</label>
    </div>

    <div id="nogi">
      <input type="checkbox" class="form-check-input" id="exampleCheck2">
    <label  class="price-check-label" for="exampleCheck2">No</label>
    
  </div>
     -->
  

  <!-- <p>
    </p>

  <div id="giPrice" class="center">

<input placeholder="Gi Price" id="giPriceIn"></input>
</div>
    </div>-->
    </div> 
    

<div class="center">
  <h6 id="fullPrice">Add a link to your full pricing page below</h6>
</div>

<div class="center">
<div id="plink">
  <input id="priceLink"></input>
</div>
</div>

<div class="center">
  <button id="update1">Update</button>
</div>


<div class="center">
<div  class="menuContainer">
  <h2 id="schedulet" >Schedule</h2>
</div>
</div>

<!-- <div id="schedule-container">
<div id="schedulein">
<h3>Weekly Schedule</h3>
<div id = "Rowin1" class="Rowin">
<div id = "contain">
</div>
</div>
<button type="button" id="plusevent1" class="plusevent"><i class="fas fa-plus-circle fa-lg"></i></button>
<button type="button" id="minusevent" class="plusevent"><i class="fas fa-minus-circle fa-lg"></i></button>
</div>
</div> -->

<div> 
  <img>
</div>

      <div class="center">
  <h6 id="scheduleP">Add a link to your schedule page below</h6>
    </div>

<div class="center">
<div id="slink">
  <input type="text" id="Schedulelink"> 
</input>
</div>
</div>

<div class="center">
  <button id="update2">Update</button>
</div>


<div id="fac">
<div id="facCon" class="center">

<div  id="facilitiest" class="menuContainer">
  <h2 id="desTitle">Facilities</h2>
</div>
</div>
</div>


<div id="checkB" class="right">
<div  class="checkbox-grid">
  <div><input type="checkbox" name="text1" value="value1" /><label for="text1">Locker Room</label></div>
  <div><input type="checkbox" name="text2" value="value2" /><label for="text2">Showers</label></div>
  <div><input type="checkbox" name="text3" value="value3" /><label for="text3">Weight room</label></div>
  <div><input type="checkbox" name="text4" value="value4" /><label for="text4">Water dispenser</label></div>
  <div><input type="checkbox" name="text5" value="value5" /><label for="text5">Gi rental</label></div>
  <div><input type="checkbox" name="text6" value="value6" /><label for="text6">Food and drinks</label></div>
  <div><input type="checkbox" name="text7" value="value7" /><label for="text7">Free Wifi</label></div>
  <div><input id="otherCheck" type="checkbox" name="text8" value="value8" /><label for="text8">Other (specify)</label></div>
</div>
</div>

<div class="center">
<textarea id="other">

</textarea>
</div>





<!-- <div class="center">
<h6 id="facDes">Add a facility with its description</h6>
</div>
    </div>

<div class="center">
<div id="facpm">
<button type="button" id="plusFacility" class="plusevent"><i class="fas fa-plus-circle fa-lg"></i></button>
<button type="button" id="minusFacility" class="plusevent"><i class="fas fa-minus-circle fa-lg"></i></button>
</div>
</div>

<div class="center">
<div id="facilityCards" class="center">
  <div class="FacAccord" id="Facility2">
    <div class="FacCard2">
      <div class="instruct-card" id="FacPic1" data-toggle="collapse" data-target="#FacCollapse1" aria-expanded="true" aria-controls="collapseOne">
        <img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png">
      <div class="TContainer">
        <input class="titIn" placeholder="Facility Name"></input>
      </div>
    </div>
      <div id="FacCollapse1" class="collapse hide" aria-labelledby="inPic1" data-parent=".inCard2">
        <div class="card-body">
        <textarea class="desIn" name="desin1" placeholder="Describe your facility here."></textarea>
        </div>
      </div>
    </div>
  </div>
</div>-->
    
    
    








<div id="slideshow-container">
<div onclick="hideslide()" id = "block2" class = "blocker"></div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <ul class="carousel-inner" id ="carousel-inner">
 
  </ul>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
    


<div id="mapContain">
<div onclick="hideMap()" id = "block3" class = "blocker"></div>
<div id="map">
    </div>
    </div>

   
    

<br>

    </div>
    </div>

<script>

  var editDes = document.getElementById("editDes")
  var desIn = document.getElementById("gymDesIn")
  var desOut =document.getElementById("descriptionContain")

      editDes.addEventListener("click", function() {
        desIn.style.display = "block";
        desOut.style.display = "none";

      });

      let map;

      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 2,
          center: new google.maps.LatLng(2.8, -187.3),
          mapTypeId: "terrain",
        });
        // Create a <script> tag and set the USGS URL as the source.
        const script = document.createElement("script");
        // This example uses a local copy of the GeoJSON stored at
        // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        script.src =
          "https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js";
        document.getElementsByTagName("head")[0].appendChild(script);
      }

      // Loop through the results array and place a marker for each
      // set of coordinates.
      const eqfeed_callback = function (results) {
        for (let i = 0; i < results.features.length; i++) {
          const coords = results.features[i].geometry.coordinates;
          const latLng = new google.maps.LatLng(coords[1], coords[0]);
          new google.maps.Marker({
            position: latLng,
            map: map,
          });
        }
      };
    </script>

    <script>

// var yesCheck = document.getElementById("exampleCheck1")
//       var nocheck = document.getElementById("exampleCheck2")
//       var giPrice = document.getElementById("giPrice")
//       var giPriceIn = document.getElementById("giPriceIn")
 
       
//       nocheck.addEventListener("change", function() {

//         if (this.checked) {
        
//         giPrice.style.display = "none";
//         giPriceIn.style.display = "none";
//         yesCheck.checked = false;

//         } else {

//           giPrice.style.display = "block";
//           giPriceIn.style.display = "block";
      
//         }

//       });

  


      
//       yesCheck.addEventListener("change", function() {


//         if (this.checked) {

//       giPrice.style.display = "block";
//       giPriceIn.style.display = "block";
//       nocheck.checked = false;

//         }

        

//         });


window.onload = function() {
$('#_uploadImages').click(function () {
    $('#_imagesInput').click();

    setTimeout(activeness(), 5000)
});

$('#_imagesInput').on('change', function () {
    handleFileSelect();
});
}


// <div id="slideshow-container">
// <div onclick="hideslide()" id = "block2" class = "blocker"></div>
// <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
//   <div class="carousel-inner">
//     <div class="carousel-item active">
//       <img class="d-block w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png" alt="First slide">
//     </div>
//     <div class="carousel-item">
//       <img class="d-block w-100" src="..." alt="Second slide">
//     </div>
//     <div class="carousel-item">
//       <img class="d-block w-100" src="..." alt="Third slide">
//     </div>
//     <div class="carousel-item">
//       <img class="d-block w-100" src="..." alt="4th slide">
//     </div>
//   </div>
//   <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
//     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
//     <span class="sr-only">Previous</span>
//   </a>
//   <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
//     <span class="carousel-control-next-icon" aria-hidden="true"></span>
//     <span class="sr-only">Next</span>
//   </a>
// </div>
// </div> 







function handleFileSelect() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("carousel-inner");
        var arrFilesCount = [];
        var start = $(output).find('li').length;
        var display =  document.getElementById("displayImg");
        var end = start+ files.length;
        var nonImgCount = 0;
        for (var i = start; i < end; i++) {
            arrFilesCount.push(i); // push to array
        }
        
        if(start !== 0){
            $(output).find('li > nav > a.prev').first().attr('href','#slide-' + (end-1));
            $(output).find('li > nav > a.next').last().attr('href','#slide-'+start);

            
        }


        
        for (var i = 0; i < files.length; i++) {

            var file = files[i];

           

            //Only pics
            if (!file.type.match('image')) {nonImgCount++; continue;}

            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;

                current_i = arrFilesCount.shift();
                if (current_i === 0) {
                    prev_i = files.length - 1; //This is for the first element. The previous slide will be the last image. (i=length-1)
                } else {
                    prev_i = current_i - 1;
                }
                if (arrFilesCount.length - nonImgCount === 0) {
                    next_i = 0;
                } else {
                    next_i = current_i + 1; //This is for the last element. The next slide will be the first image (i=0)
                }
                

                

                output.innerHTML = output.innerHTML + '<li id="slide-' + current_i + '" class="carousel-item">' + "<img class='d-block w-100' src='" + picFile.result + "'" + "title=''/>" + '</li>'; // TODO: Enter Title
                
             if (current_i == 0) {
                display.src = picFile.result
             }
               
                
            });
            //Read the image
            picReader.readAsDataURL(file);
           
        }
       
      
    } else {
        console.log("Your browser does not support File API");
    }
}







const slideContain = document.getElementById('slideshow-container');
var displayImg = document.getElementById("displayImg")

var showmap = document.getElementById("mapContain")
var title = document.getElementById("gymTitle")
var description = document.getElementById("gymDescription")
var gymDes = document.getElementById("gymDes")
var editDes = document.getElementById("editDes")
var desTitle = document.getElementById("desTitle")
var more =  document.getElementById("more")
var readMore = document.getElementById("readMore")
var readLess =  document.getElementById("readLess")
var instructCon = document.getElementById("instructcon");
var prices =  document.getElementById("prices")
var fullPrice = document.getElementById("fullPrice")
var pagesecmenu = document.getElementById("pageSecContain")
var visitT = document.getElementById("visitt")
var plink = document.getElementById("plink")
var schedulet = document.getElementById("schedulet")
var slink = document.getElementById("slink")
var bigCon = document.getElementById("BigContain")
var update1 = document.getElementById("update1")
var update2 = document.getElementById("update2")
var scheduleP = document.getElementById("scheduleP")
var checkB = document.getElementById("checkB")










function showslide() {
    slideContain.style.display = "block";
    displayImg.style.display ="none";
    title.style.marginTop = "80px";
    description.style.display = "none";
    gymDes.style.display = "none";
    desTitle.style.display = "none";
    instructCon.style.display = "none";
    prices.style.display = "none";
    pagesecmenu.style.display = "none";
    visitT.style.display = "none";
    plink.style.display = "none";
    slink.style.display = "none";
    schedulet.style.display = "none";
    bigCon.style.display = "none";
    editDes.style.display = "none";
    fullPrice.style.display = "none";
    update1.style.display = "none";
    update2.style.display = "none";
    checkB.style.display = "none";
    scheduleP.style.display = "none";

    

    if ($("#carousel-inner").find('li')) {
         
         var slide1 = document.getElementById("slide-0");
         

         slide1.classList.add("active");

      
    }

   
  

          
 


}


function hideslide() {
  slideContain.style.display = "none"
  displayImg.style.display ="block";
  title.style.marginTop = "0px";
  description.style.display = "block";
  gymDes.style.display = "block";
    desTitle.style.display = "block";
    instructCon.style.display = "block";
    prices.style.display = "block";
    pagesecmenu.style.display = "block";
    visitT.style.display = "block";
    plink.style.display = "block";
    slink.style.display = "block";
    schedulet.style.display = "block";
    bigCon.style.display = "block";
    editDes.style.display = "block";
    fullPrice.style.display = "block";
    update1.style.display = "block";
    update2.style.display = "block";
    checkB.style.display = "block";
    scheduleP.style.display = "block";

    
    if ($("#carousel-inner").find('li')) {
         

      $("#carousel-inner").find(".carousel-item").removeClass("active");
         

         
           }
    

}

function showMap() {
    showmap.style.display = "block";
    displayImg.style.display ="none";
    title.style.marginTop = "80px";
  description.style.display = "block";
    gymDes.style.display = "none";
    instructCon.style.display = "none";
    desTitle.style.display = "none";
    prices.style.display = "none";
    pagesecmenu.style.display = "none";
    visitT.style.display = "none";
    plink.style.display = "none";
    slink.style.display = "none";
    schedulet.style.display = "none";
    bigCon.style.display = "none";
    editDes.style.display = "none";
    fullPrice.style.display = "none";
    update1.style.display = "none";
    update2.style.display = "none";
    checkB.style.display = "none";
    scheduleP.style.display = "none";

    
    
}

function hideMap() {

 showmap.style.display = "none"
  displayImg.style.display ="block";
  title.style.marginTop = "0px";
  description.style.display = "block";
  gymDes.style.display = "block";
    desTitle.style.display = "block";
    instructCon.style.display = "block";
    prices.style.display = "block";
    pagesecmenu.style.display = "block";
    visitT.style.display = "block";
    plink.style.display = "block";
    slink.style.display = "block";
    schedulet.style.display = "block";
    bigCon.style.display = "block";
    editDes.style.display = "block";
    fullPrice.style.display = "block";
    update1.style.display = "block";
    update2.style.display = "block";
    checkB.style.display = "block";
    scheduleP.style.display = "block";


    

}

function showMore() {

  dots.style.display = "none";
  more.style.display = "block";
  readMore.style.display= "none";
  readLess.style.display = "inline-block";

}

function showLess() {

  dots.style.display = "inline-block";
  more.style.display = "none";
  readMore.style.display= "inline-block";
  readLess.style.display = "none";
  

}


// var plusevent = document.getElementById("plusevent1");

//        let appendArr = [
     
//         function()  {

//          $("#contain").append('<div id="event1" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes(this)"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes1"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

//         },

//         function() {

//           $("#contain").append('<div id="event2" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes2()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes2"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

//           },

//           function() {

//           $("#contain").append('<div id="event3" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes3()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes3"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

//           },

//           function() {

//           $("#contain").append('<div id="event4" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes4()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes4"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

//           },

//           function() {

//           $("#contain").append('<div id="event5" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes5()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes5"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

//           }

//         ];

//         let i=0;


//         plusevent.onclick = function() {

          

//           appendArr[i++ % appendArr.length]();

          
//                   };

//     var eventCopy = document.getElementsByClassName("eventcopy")

// document.getElementById('minusevent').addEventListener("click", function() {

// $(eventCopy[eventCopy.length - 1]).remove();

// });



//           var plusFacility = document.getElementById("plusFacility") 

//           let appendFac = [
     
//      function()  {

//       $("#facilityCards").append(' <div class="FacAccord" id="Facility3"><div class="FacCard2"><div class="instruct-card" id="FacPic1" data-toggle="collapse" data-target="#FacCollapse1" aria-expanded="true" aria-controls="collapseOne"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="TContainer"><input class="titIn" placeholder="Facility Name"></input></div></div><div id="FacCollapse1" class="collapse hide" aria-labelledby="inPic1" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin2" placeholder="Describe your facility here."></textarea></div></div></div></div>');
//      },

//      function()  {

//       $("#facilityCards").append(' <div class="FacAccord" id="Facility4"><div class="FacCard2"><div class="instruct-card" id="FacPic2" data-toggle="collapse" data-target="#FacCollapse2" aria-expanded="true" aria-controls="collapseTwo"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="TContainer"><input class="titIn" placeholder="Facility Name"></input></div></div><div id="FacCollapse2" class="collapse hide" aria-labelledby="inPic1" data-parent=".inCard3"><div class="card-body"><textarea class="desIn" name="desin3" placeholder="Describe your facility here."></textarea></div></div></div></div>');
//      },

//       function()  {

//         $("#facilityCards").append(' <div class="FacAccord" id="Facility5"><div class="FacCard2"><div class="instruct-card" id="FacPic3" data-toggle="collapse" data-target="#FacCollapse3" aria-expanded="true" aria-controls="collapseOne"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="TContainer"><input class="titIn" placeholder="Facility Name"></input></div></div><div id="FacCollapse3" class="collapse hide" aria-labelledby="inPic1" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin4" placeholder="Describe your facility here."></textarea></div></div></div></div>');
//      },

// function()  {

//         $("#facilityCards").append(' <div class="FacAccord" id="Facility6"><div class="FacCard2"><div class="instruct-card" id="FacPic4" data-toggle="collapse" data-target="#FacCollapse4" aria-expanded="true" aria-controls="collapseOne"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="TContainer"><input class="titIn" placeholder="Facility Name"></input></div></div><div id="FacCollapse4" class="collapse hide" aria-labelledby="inPic1" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin5" placeholder="Describe your facility here."></textarea></div></div></div></div>');
//      },

//      ]

//      plusFacility.onclick = function() {

//       appendFac[i++ % appendFac.length]();

//      }

//      var minusFacility = document.getElementById("minusFacility")
//      var card = document.getElementsByClassName("FacCard2")
            
        
//          minusFacility.addEventListener("click", function() {

//         card[card.length-1].remove();

//         })


 var other = document.getElementById("other")
 var otherCheck = document.getElementById("otherCheck")

  otherCheck.addEventListener("change", function() {

    if (this.checked) {
      
      other.style.display = "block";

  } else  {
    other.style.display = "none";
  }
})
      


          let appendIn = [
     
     function()  {

      $("#instructorCards").append('<div class="inAccord" id="instructors3"><div class="inCard2"><div class="instruct-card" id="inPic2" data-toggle="collapse" data-target="#inCollapse3" aria-expanded="true" aria-controls="collapseOne"><img id = "InImage2"class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif"><button class="inup" id ="inup2"><i class="fas fa-file-upload"></i></button><input id="imageUpload2" type="file" name="profile_photo" placeholder="Photo" required="" capture><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label class="beltLabel" for="belts">Belt:</label><select id="beltLevel2" class="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse3" class="collapse hide" aria-labelledby="inPic2" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin1" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     },

     function()  {

      $("#instructorCards").append('<div class="inAccord" id="instructors4"><div class="inCard2"><div class="instruct-card" id="inPic3" data-toggle="collapse" data-target="#inCollapse4" aria-expanded="true" aria-controls="collapseOne"><img id = "InImage3" class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif"><button class="inup" id ="inup3"><i class="fas fa-file-upload"></i></button><input id="imageUpload3" type="file" name="profile_photo" placeholder="Photo" required="" capture><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label class="beltLabel" for="belts">Belt:</label><select id="beltLevel3" class="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse4" class="collapse hide" aria-labelledby="inPic3" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin2" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     },

      function()  {

        $("#instructorCards").append('<div class="inAccord" id="instructors5"><div class="inCard2"><div class="instruct-card" id="inPic4" data-toggle="collapse" data-target="#inCollapse5" aria-expanded="true" aria-controls="collapseOne"><img id = "InImage4" class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif"><button class="inup" id ="inup4"><i class="fas fa-file-upload"></i></button><input id="imageUpload4" type="file" name="profile_photo" placeholder="Photo" required="" capture><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label class="beltLabel" for="belts">Belt:</label><select id="beltLevel4" class="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse5" class="collapse hide" aria-labelledby="inPic4" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin3" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     },

function()  {

  $("#instructorCards").append('<div class="inAccord" id="instructors3"><div class="inCard2"><div class="instruct-card" id="inPic5" data-toggle="collapse" data-target="#inCollapse6" aria-expanded="true" aria-controls="collapseOne"><img id = "InImage5" class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif"><button class="inup" id ="inup5"><i class="fas fa-file-upload"></i></button><input id="imageUpload5" type="file" name="profile_photo" placeholder="Photo" required="" capture><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label class="beltLabel" for="belts">Belt:</label><select id="beltLevel5" class="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse6" class="collapse hide" aria-labelledby="inPic5" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin4" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     }
     ]

   
     var plusInstructor = document.getElementById("plusInstructor")

     var i = 0;

     plusInstructor.addEventListener("click", function() {

       

      appendIn[i++ % appendIn.length]();

    
      

        $("#inup2").click(function(e) {
          $("#imageUpload2").click();
          });

          $("#inup3").click(function(e) {
          $("#imageUpload3").click();
          });

          $("#inup4").click(function(e) {
          $("#imageUpload4").click();
          });

          $("#inup5").click(function(e) {
          $("#imageUpload5").click();
          });

         
          

    $("#imageUpload2").change(function(){
    fasterPreview( this, "#InImage2" );
    });

    $("#imageUpload3").change(function(){
    fasterPreview( this, "#InImage3" );
    });

    $("#imageUpload4").change(function(){
    fasterPreview( this, "#InImage4" );
    });


    $("#imageUpload5").change(function(){
    fasterPreview( this,"#InImage5" );
    });
     });

     

  

  function fasterPreview( uploader, image ) {
    if ( uploader.files && uploader.files[0] ){
          $(image).attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
  }


  



    




     var minusInstructor = document.getElementById("minusInstructor")
     var inCard = document.getElementsByClassName("inAccord")
            
        
         minusInstructor.addEventListener("click", function() {

        inCard[inCard.length-1].remove();

        });



                  var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes1");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

function showCheckboxes2() {
  var checkboxes = document.getElementById("checkboxes2");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

function showCheckboxes3() {
  var checkboxes = document.getElementById("checkboxes3");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes4() {
  var checkboxes = document.getElementById("checkboxes4");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
function showCheckboxes5() {
  var checkboxes = document.getElementById("checkboxes5");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

</script>



</body>


<div>

<?php

get_footer();

?>

</div>




