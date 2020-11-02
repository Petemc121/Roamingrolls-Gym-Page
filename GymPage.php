<?php
/* Template Name:Gym Page*/
get_header();

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
  <script type="text/javascript">


</script>

<div class="mySlideD">
<i id="cameraOverlay" class="fas fa-camera"></i>
    <img onclick="showslide()" id="displayImg" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png">
  </div>

  <div class="flex-container">

  <div class="flex-item1">
  <h1 id="gymTitle">Gym Title</h1>
  <div id="gymLocation">
  <i class="fas fa-map-marker-alt"></i> 
  <h6 id="street">Street, City, Country.</h6>
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
    Prices
</button>
<a class ="pageSecLinks" href = "#plink">
<button id="pageTab2" class="pageSecTab">
Schedule
</button>
    </a>
<a class ="pageSecLinks" href = "#slink">
<button id="pageTab3" class="pageSecTab">
Facilities
</button>
</a>
<div class="pageSecLinks">
<button id="pageTab4" onclick="showMap()" class="pageSecTab">
Map
</button>
    </div>
    <div class="pageSecLinks">
    <a class ="pageSecLinks" href = "#gymDescription">
<button id="pageTab5" class="pageSecTab">
Events
</button>
</a>
    </div>
</div>
</div>
</div>


  <div class="center">
<div class="menuContainer">
  <h2 id="desTitle">Gym Description</h2>
</div>
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
<div class="center">
<div class="menuContainer">
  <h2 id="desTitle">Instructors</h2>
</div>
</div>

<div class="center">
<div id="inpm">
<button type="button" id="plusInstructor" class="plusevent"><i class="fas fa-plus-circle fa-lg"></i></button>
<button type="button" id="minusInstructor" class="plusevent"><i class="fas fa-minus-circle fa-lg"></i></button>
</div>
</div>


<div id="instructorCards" class="center">
  <div class="inAccord" id="instructors2">
    <div class="inCard2">
      <div class="instruct-card" id="inPic1" data-toggle="collapse" data-target="#inCollapse2" aria-expanded="true" aria-controls="collapseOne">
        <img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png">
      <div class="candTContainer">
        <input class="titIn" placeholder="Instructor Name"></input>
        <div class=tAndDropCon">
          <div class="drop">
            <form>
            <label id="beltLabel" for="belts">Belt:</label>
            <select id="beltLevel" name="belts">
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

<div class="center">

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
  </div>

  <p>
    

  <div id="giPrice" class="center">

<input placeholder="Gi Price" id="giPriceIn"></input>
</div>

    </div>



<div class="center">
<div id="plink">
  <button class="porspagebtn"><h5 id="desTitle"><a class="porslink" href="">Full pricing page</a></h5></button>
</div>
</div>


<div class="center">
<div id="schedulet" class="menuContainer">
  <h2 id="desTitle">Schedule</h2>
</div>
</div>

<div id="schedule-container">
<div id="schedulein">
<h3>Weekly Schedule</h3>
<div id = "Rowin1" class="Rowin">
<div id = "contain">
</div>
</div>
<button type="button" id="plusevent1" class="plusevent"><i class="fas fa-plus-circle fa-lg"></i></button>
<button type="button" id="minusevent" class="plusevent"><i class="fas fa-minus-circle fa-lg"></i></button>
</div>
</div>

<div class="center">
<div id="slink">
  <button class="porspagebtn"><h5 id="desTitle"><a class="porslink" href="">Schedule Page</a></h5></button>
</div>
</div>



<div class="center">
<div id="facilitiest" class="menuContainer">
  <h2 id="desTitle">Facilities</h2>
</div>
</div>

<div class="center">
<div id="facDes">
<h6>Add pictures of your facilities.</h6>
</div>
</div>

<div id = "carousel" class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="fImage d-block w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="fImage d-block w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="fImage d-block w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png" alt="Third slide">
    </div>
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


<div class="center">
<div id="facDes">
<h6>Add a facility with its description</h6>
</div>
</div>

<div class="center">
<div id="facpm">
<button type="button" id="plusFacility" class="plusevent"><i class="fas fa-plus-circle fa-lg"></i></button>
<button type="button" id="minusFacility" class="plusevent"><i class="fas fa-minus-circle fa-lg"></i></button>
</div>
</div>

<div class="center">
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <input class="titIn" placeholder="e.g. Weight room"></input>
    </div>
    <div id="collapseOne" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <textarea class="desIn" placeholder="Include a short description of your facility here"></textarea>
      </div>
    </div>
  </div>
</div>
</div>




<div id="slideshow-container">
<div onclick="hideslide()" id = "block2" class = "blocker"></div>
<div id="slideBlock">
<div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img class="slideimg" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png">
    
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img class="slideimg" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/searchbackground4.png" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img class="slideimg" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/taiwan.jpg" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
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

var yesCheck = document.getElementById("exampleCheck1")
      var nocheck = document.getElementById("exampleCheck2")
      var giPrice = document.getElementById("giPrice")
      var giPriceIn = document.getElementById("giPriceIn")
 
       
      nocheck.addEventListener("change", function() {

        if (this.checked) {
        
        giPrice.style.display = "none";
        giPriceIn.style.display = "none";
        yesCheck.checked = false;

        } else {

          giPrice.style.display = "block";
          giPriceIn.style.display = "block";
      
        }

      });

  


      
      yesCheck.addEventListener("change", function() {


        if (this.checked) {

      giPrice.style.display = "block";
      giPriceIn.style.display = "block";
      nocheck.checked = false;

        }

        

        });


var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}

const slideContain = document.getElementById('slideshow-container');
var displayImg = document.getElementById("displayImg")

var showmap = document.getElementById("mapContain")
var title = document.getElementById("gymTitle")
var description = document.getElementById("gymDescription")
var desTitle = document.getElementById("desTitle")
var dots =  document.getElementById("dots")
var more =  document.getElementById("more")
var readMore = document.getElementById("readMore")
var readLess =  document.getElementById("readLess")
var prices =  document.getElementById("prices")
var scheduleIn = document.getElementById("schedulein")
var pagesecmenu = document.getElementById("pageSecContain")
var visitT = document.getElementById("visitt")
var plink = document.getElementById("plink")
var schedulet = document.getElementById("schedulet")
var slink = document.getElementById("slink")
var carousel = document.getElementById("carousel")
var facilitiest = document.getElementById("facilitiest")
var accordion =  document.getElementById("accordionExample")
var facpm = document.getElementById("facpm")
var facDes = document.getElementById("facDes")
var bigCon = document.getElementById("BigContain")




function scrollto(element) {
        // get the element on the page related to the button
        var scrollToId = element.getAttribute("data-scroll");
        var scrollToElement = document.getElementById(scrollToId);
        // make the page scroll down to where you want
        // ...
    }




function showslide() {
    slideContain.style.display = "block";
    displayImg.style.display ="none";
    title.style.marginTop = "80px";
    description.style.display = "none";
    desTitle.style.display = "none";
    prices.style.display = "none";
    scheduleIn.style.display = "none";
    pagesecmenu.style.display = "none";
    visitT.style.display = "none";
    plink.style.display = "none";
    slink.style.display = "none";
    schedulet.style.display = "none";
    carousel.style.display = "none";
    facilitiest.style.display = "none";
    accordion.style.display = "none";
    facpm.style.display = "none";
    facDes.style.display = "none";
    bigCon.style.display = "none";
    
 


}


function hideslide() {
  slideContain.style.display = "none"
  displayImg.style.display ="block";
  title.style.marginTop = "0px";
  description.style.display = "block";
    desTitle.style.display = "block";
    prices.style.display = "block";
    scheduleIn.style.display = "block";
    pagesecmenu.style.display = "block";
    visitT.style.display = "block";
    plink.style.display = "block";
    slink.style.display = "block";
    schedulet.style.display = "block";
    carousel.style.display = "block";
    facilitiest.style.display = "block";
    accordion.style.display = "block";
    facpm.style.display = "block";
    facDes.style.display = "block";
    bigCon.style.display = "block";

    

}

function showMap() {
    showmap.style.display = "block";
    displayImg.style.display ="none";
    title.style.marginTop = "80px";
    description.style.display = "none";
    desTitle.style.display = "none";
    prices.style.display = "none";
    scheduleIn.style.display = "none";
    pagesecmenu.style.display = "none";
    visitT.style.display = "none";
    plink.style.display = "none";
    slink.style.display = "none";
    schedulet.style.display = "none";
    carousel.style.display = "none";
    facilitiest.style.display = "none";
    accordion.style.display = "none";
    facpm.style.display = "none";
    facDes.style.display = "none";
    bigCon.style.display = "none";
    
}

function hideMap() {

 showmap.style.display = "none"
  displayImg.style.display ="block";
  title.style.marginTop = "0px";
  description.style.display = "block";
    desTitle.style.display = "block";
    prices.style.display = "block";
    scheduleIn.style.display = "block";
    pagesecmenu.style.display = "block";
    visitT.style.display = "block";
    plink.style.display = "block";
    slink.style.display = "block";
    schedulet.style.display = "block";
    carousel.style.display = "block";
    facilitiest.style.display = "block";
    accordion.style.display = "block";
    facpm.style.display = "block";
    facDes.style.display = "block";
    bigCon.style.display = "block";

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

var plusevent = document.getElementById("plusevent1");

       let appendArr = [
     
        function()  {

         $("#contain").append('<div id="event1" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes(this)"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes1"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

        },

        function() {

          $("#contain").append('<div id="event2" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes2()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes2"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

          },

          function() {

          $("#contain").append('<div id="event3" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes3()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes3"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

          },

          function() {

          $("#contain").append('<div id="event4" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes4()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes4"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

          },

          function() {

          $("#contain").append('<div id="event5" class="eventcopy"><h6> Class: </h6><div class="inputs" contenteditable></div><h6> Time: </h6><div class="inputs" contenteditable></div><h6> Duration: </h6><div class="inputs" contenteditable></div><form><div class="multiselect"><div class="selectBox" onclick="showCheckboxes5()"><div><div class="repeat">Days <i class="fas fa-sort-down"></i></div></div><div class="overSelect"></div></div><div id="checkboxes5"><label for="days"><input type="checkbox" class="days"/>Sunday</label><label for="days"><input type="checkbox" class="days" id="Monday"/>Monday</label><label for="days"><input type="checkbox" class="days"/>Tuesday</label><label for="days"><input type="checkbox"  class="days"/>Wednesday</label><label for="days"><input type="checkbox" class="days"/>Thursday</label><label for="days"><input type="checkbox"  class="days"/>Friday</label><label for="days"><input type="checkbox" class="days"/>Saturday</label></div></div></form></div>');

          }

        ];

        let i=0;


        plusevent.onclick = function() {

          

          appendArr[i++ % appendArr.length]();

          
                  };

    var eventCopy = document.getElementsByClassName("eventcopy")

document.getElementById('minusevent').addEventListener("click", function() {

$(eventCopy[eventCopy.length - 1]).remove();

});



          var plusFacility = document.getElementById("plusFacility") 

          let appendFac = [
     
     function()  {

      $("#accordionExample").append(' <div class="card"><div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><input placeholder= "Facility name" class="titIn"></input></div><div id="collapseTwo" class="collapse hide" aria-labelledby="headingTwo" data-parent="#accordionExample"><div class="card-body"><textarea class="desIn" placeholder="Include a short description of your facility"></textarea></div></div></div>');
     },

     function()  {

      $("#accordionExample").append(' <div class="card"><div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><input  placeholder= "Facility name"  class="titIn"></input></div><div id="collapseThree" class="collapse hide" aria-labelledby="headingThree" data-parent="#accordionExample"><div class="card-body"><textarea class="desIn" placeholder="Include a short description of your facility"></textarea></div></div></div>');
      },

      function()  {

$("#accordionExample").append(' <div class="card"><div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><Input  placeholder= "Facility name"  class="titIn"></input></div><div id="collapseFour" class="collapse hide" aria-labelledby="headingFour" data-parent="#accordionExample"><div class="card-body"><textarea class="desIn" placeholder="Include a short description of your facility"></textarea></div></div></div>');
},

function()  {

$("#accordionExample").append(' <div class="card"><div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><Input  placeholder= "Facility name"  class="titIn"></input></div><div id="collapseFive" class="collapse hide" aria-labelledby="headingFive" data-parent="#accordionExample"><div class="card-body"><textarea class="desIn" placeholder="Include a short description of your facility"></textarea></div></div></div>');
},

     ]

     plusFacility.onclick = function() {

      appendFac[i++ % appendFac.length]();

     }

     var minusFacility = document.getElementById("minusFacility")
     var card = document.getElementsByClassName("card")
            
        
         minusFacility.addEventListener("click", function() {

        card[card.length-1].remove();

        })



      

          let appendIn = [
     
     function()  {

      $("#instructorCards").append('<div class="inAccord" id="instructors3"><div class="inCard2"><div class="instruct-card" id="inPic2" data-toggle="collapse" data-target="#inCollapse3" aria-expanded="true" aria-controls="collapseOne"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label id="beltLabel" for="belts">Belt:</label><select id="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse3" class="collapse hide" aria-labelledby="inPic2" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin1" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     },

     function()  {

      $("#instructorCards").append('<div class="inAccord" id="instructors4"><div class="inCard2"><div class="instruct-card" id="inPic3" data-toggle="collapse" data-target="#inCollapse3" aria-expanded="true" aria-controls="collapseOne"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label id="beltLabel" for="belts">Belt:</label><select id="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse3" class="collapse hide" aria-labelledby="inPic2" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin1" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     },

      function()  {

        $("#instructorCards").append('<div class="inAccord" id="instructors3"><div class="inCard2"><div class="instruct-card" id="inPic4" data-toggle="collapse" data-target="#inCollapse3" aria-expanded="true" aria-controls="collapseOne"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label id="beltLabel" for="belts">Belt:</label><select id="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse3" class="collapse hide" aria-labelledby="inPic2" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin1" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     },

function()  {

  $("#instructorCards").append('<div class="inAccord" id="instructors3"><div class="inCard2"><div class="instruct-card" id="inPic5" data-toggle="collapse" data-target="#inCollapse3" aria-expanded="true" aria-controls="collapseOne"><img class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/08/Untitled-design-20.png"><div class="candTContainer"><input class="titIn" placeholder="Instructor Name"></input><div class=tAndDropCon"><div class="drop"><form><label id="beltLabel" for="belts">Belt:</label><select id="beltLevel" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></form></div></div></div></div><div id="inCollapse3" class="collapse hide" aria-labelledby="inPic2" data-parent=".inCard2"><div class="card-body"><textarea class="desIn" name="desin1" placeholder="Describe your instructor here."></textarea></div></div></div></div>');
     }
     ]

     var plusInstructor = document.getElementById("plusInstructor")

     plusInstructor.onclick = function() {

      appendIn[i++ % appendIn.length]();

     }

     var minusInstructor = document.getElementById("minusInstructor")
     var inCard = document.getElementsByClassName("inAccord")
            
        
         minusInstructor.addEventListener("click", function() {

        inCard[inCard.length-1].remove();

        })



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




