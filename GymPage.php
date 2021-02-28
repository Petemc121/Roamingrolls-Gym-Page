<?php
global $wpdb;
global $current_user;
wp_get_current_user();

$kv_author =get_the_author_meta('ID'); 	

 if($current_user->ID != $kv_author){
    echo "<style>#uploadImages{display:none !important;}</style>";
    echo "<style>#editDes{display:none !important;}</style>";
    echo "<style>#plusInstructor{display:none !important;}</style>";
    echo "<style>#minusInstructor{display:none !important;}</style>";
    echo "<style>.inup{display:none !important;}</style>";
    echo "<style>#imgRules{display:none !important;}</style>";
 } 

$post_id = get_the_ID();

function GymDesSub() {
if (isset($_POST['ncskfnalvkbahlds']) || wp_verify_nonce($_POST['ncskfnalvkbahlds'], 'create_gym_des' )) {

  $gymDes = sanitize_text_field($_POST['gymDesIn']);

  $uploaded = 0;

  if ($gymDes =='') {
      echo "<style>#desAlert{display:block !important;}</style>";
      return false;
  }else {
    return true;
  }

}else {
  return false;
}
}

if(isset($_POST['ncskfnalvkbahlds'])) {
  if(is_user_logged_in()) {
    if(GymDesSub()) {
     if (metadata_exists('post',$post_id,'gymDes')) {
      $gymDes = sanitize_text_field($_POST['gymDesIn']);
        update_post_meta($post_id, 'gymDes', $gymDes);
     } else {
      add_post_meta($post_id, 'gymDes', $gymDes);
    }

  }
}
}



if (isset($_POST['njvkdsnvklsvlnvdf'])) {

        
  $uploadsDir = wp_upload_dir();
  $allowedFileType = array('JPG','jpg','png','jpeg');
  $attachIdArray = array();
  // Validate if files exist
  if ($_FILES) {
  
      $files = $_FILES['SlideImageInput'];

      
      // Loop through file items
      foreach($files['name'] as $id=>$val){
          // Get files upload path
          if ($files['name'][$id]) {

              $file = array (
                              'name' => $files['name'][$id],
                              'type' => $files['type'][$id],
                              'tmp_name' => $files['tmp_name'][$id],
                              'error' => $files['error'][$id],
                              'size' => $files['size'][$id]
              );

      
          
    $filename = $file['name'];
    $filesize = $file['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
      //     // $filepath = $uploadsDir.$filename;

      //    echo "<script>alert('".$filename."')</script>";

          $_FILES = array("SlideImageInput" => $file);

          foreach ($_FILES as $file => $array) {

              if(!in_array($ext, $allowedFileType)){
                  
              
          } else if (
            $filesize > 600000
          ) {
            echo "<script>alert('Your file size is too large! Please choose image files of less than 1MB')</script>";

          } else {
            
      
          // Add into MySQL database
          echo "<script>alert('".$file."')</script>";
            
            $attach_id = insert_attachment($file, $post_id);
            

              if($attach_id) {
                array_push($attachIdArray, $attach_id);
                  echo "<script>alert('success!')</script>";
              } else {
                  echo "<script>alert('Oh No!')</script>";
                  
                  
              }
          }
          
      }
      


  } else {
      echo "<script>alert('Error!')</script>";
      
  }
} 

update_post_meta($post_id, 'slide_img_array', $attachIdArray);

}
}



function uploadInstructFile($file, $meta_key,$fileIn) {

  $post_id = get_the_ID();
  $uploadsDir = wp_upload_dir();
  $allowedFileType = array('jpg','png','jpeg');
  $filename = $file['name'];
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
  echo "<script>alert('".$filename."')</script>";
  echo "<script>alert('".$imageFileType."')</script>";


      $check = getimagesize($file["tmp_name"]);
      if($check !== false) {
        echo "<script>alert('success!')</script>";
        $uploadOk = 1;
      } else {
        echo "<script>alert('invalid file!')</script>";
        $uploadOk = 0;
      }
  
    

    if(in_array($imageFileType, $allowedFileType)) {
      echo "<script>alert('correct file type!')</script>";
      $uploadOk = 1;
    } else {
      echo "<script>alert('incorrect file type!')</script>";
      $uploadOk = 0;
    }

    if ($file["size"] > 600000) {
      echo "<script>alert('Too large')</script>";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "<script>alert('Your file was not uploaded!')</script>";
      return false;
    } else {

       


      $attach_id = insert_attachment($fileIn, $post_id);
      update_post_meta($post_id, $meta_key, $attach_id);
      echo "<script>alert('success!')</script>";
      
    }
  
  }


if (isset($_POST['njvkddsbhjdsbvhsdb'])) {
  
  if(wp_verify_nonce($_POST['njvkddsbhjdsbvhsdb'], 'instructor_upload' )) {
  
if (!empty($_FILES['imageUpload1']['name'])) {

  $img1 = $_FILES['imageUpload1'];

  uploadInstructFile($img1, 'instructorImg1', 'imageUpload1');

}

if (!empty($_FILES['imageUpload2']['name'])) {
  $img2 = $_FILES['imageUpload2'];
  uploadInstructFile($img1, 'instructorImg1', 'imageUpload2');
}

  if (!empty($_FILES['imageUpload3']['name'])) {
    $img3 = $_FILES['imageUpload3'];
    uploadInstructFile($img3, 'instructorImg3', 'imageUpload3');
  }
  
    if (!empty($_FILES['imageUpload4']['name'])) {
      $img4 = $_FILES['imageUpload4'];
      uploadInstructFile($img4, 'instructorImg4', 'imageUpload4');
    }
    

      if (!empty($_FILES['imageUpload5']['name'])) {
        $img5 = $_FILES['imageUpload5'];
        uploadInstructFile($img5, 'instructorImg5', 'imageUpload5');
      }
    




function addMeta($formPost, $metaKey, &$postVar) {
  $post_id = get_the_ID();
  if (isset($formPost)) {
    $postVar = sanitize_text_field($formPost);
    
    if ($postVar !== '') {
      update_post_meta($post_id, $metaKey, $postVar);
    
      }
    }

}

addMeta($_POST['instructorNameUp1'], 'instructorName1', $instructor1 );
addMeta($_POST['beltLevelUp1'], 'beltLevel1', $beltLevelUp1 );
addMeta($_POST['instructorDesUp1'], 'instructorDes1', $instructorDesUp1 );
addMeta($_POST['instructorNameUp2'], 'instructorName2', $instructor2 );
addMeta($_POST['beltLevelUp2'], 'beltLevel2', $beltLevelUp2 );
addMeta($_POST['instructorDesUp2'], 'instructorDes2', $instructorDesUp2 );
addMeta($_POST['instructorNameUp3'], 'instructorName3', $instructor3 );
addMeta($_POST['beltLevelUp3'], 'beltLevel3', $beltLevelUp3 );
addMeta($_POST['instructorDesUp3'], 'instructorDes2', $instructorDesUp2 );
addMeta($_POST['instructorNameUp4'], 'instructorName4', $instructor4 );
addMeta($_POST['beltLevelUp4'], 'beltLevel4', $beltLevelUp4 );
addMeta($_POST['instructorDesUp4'], 'instructorDes4', $instructorDesUp4 );
addMeta($_POST['instructorNameUp5'], 'instructorName5', $instructor5 );
addMeta($_POST['beltLevelUp5'], 'beltLevel5', $beltLevelUp5 );
addMeta($_POST['instructorDesUp5'], 'instructorDes5', $instructorDesUp5 );






  
//   if (instructorVal()) {

//     if ($img1 !== '') {
//   uploadInstructFile($img1, 'instructorImg1');
//   }

//   if ($img2 !== '') {
//     uploadInstructFile($img1, 'instructorImg2');
//     }

//     if ($img3 !== '') {
//       uploadInstructFile($img1, 'instructorImg3');
//       }

//       if ($img4 !== '') {
//         uploadInstructFile($img1, 'instructorImg4');
//         }

//         if ($img5 !== '') {
//           uploadInstructFile($img1, 'instructorImg5');
//           }

// }

  }
}

?>
<style type="text/css">



     /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
      
        height: 50%;
        width:50%;
      }
/* 
      body {
        max-width:80%;
        margin:auto;
      }

      @media only screen and (max-width: 700px) {
      body {
        max-width:90%;
        margin:auto;
      } 
    } */

    
     
     
</style>

<body>
  
<div class="headContain">

<div class="mySlideD">
    <img onclick="showslide()" id="displayImg" src= '<?php

  $imgArray = get_post_meta($post_id, "slide_img_array", true);
  $image = wp_get_attachment_url($imgArray[0]);
   print_r($image);


?>'>
</div>



  

  <div class="flex-container">

  <div class="flex-item1">
  <h1 id="gymTitle"><?php the_title()?></h1>
  <div id="gymLocation">
  <i class="fas fa-map-marker-alt"></i> 
  <h6 id="street"><?php 
  $address = get_post_meta($post_id,'address_1',true);
  echo $address;?>,
  <?php
  $taxonomy = wp_get_object_terms($post_id, 'country_state_city');
  $value = ""; 
  if (sizeof($taxonomy) == 0) {echo "<script>alert('failed')</script>";}else {
  
      $value = $taxonomy[0]->name; 
      print_r($value);
 
}?>
  , <?php
  $taxonomy = wp_get_object_terms($post_id, 'country_state_city');
  $value = ""; 
  if (sizeof($taxonomy) == 0) {echo "<script>alert('failed')</script>";}else {
  
      $value = $taxonomy[1]->name; 
      print_r($value);
 
}?>, <?php
$taxonomy = wp_get_object_terms($post_id, 'country_state_city');
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
<div id="imgRules"><p>Select your photo real </p>
        <p>(the first image selected will be displayed at the top of your page)</p></div>
 

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
<form method="post">
<?php wp_nonce_field( 'create_gym_des', 'ncskfnalvkbahlds' ); ?>
<textarea name="gymDesIn" id="gymDesIn">
  <?php
    $gymDesOut = get_post_meta($id,'gymDes',true);
    echo $gymDesOut;
  ?>
    </textarea>
    </div>

    <div id="desAlert" class="alert alert-danger" role="alert">
  Don't leave your gym description empty please.
</div>

    <div class="center">
<button type="submit" class="gymSubs" id="gymDesSub">submit</button>
</form>
<button class="cancels" id="cancel1">cancel</button>
    </div>
   




<div class="container">
<div class="center">
<div id="descriptionContain" class="menuContainer">
  <div id="gymDesout">
  <?php 
    $gymDesOut = get_post_meta($id,'gymDes',true);
    echo $gymDesOut;
  ?>
  
  </div>

  
 
  </div>
  
</div>

<button class="readButtons" id="readMore" onclick="showMore()">Read more</button>
<button class="readButtons" id="readLess" onclick="showLess()">Read less</button>
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

</div>
</div>

<button class="plusPic" id="editInstruct"><i class="fas fa-edit"></i></button>





<div class="center">
<div id="instructorCards" class="center">
<form id="instructorForm" enctype="multipart/form-data" method="post">
<?php wp_nonce_field( 'instructor_upload', 'njvkddsbhjdsbvhsdb' ); ?>
  <?php 
  
  $imgArray = array(
    get_post_meta($post_id, "instructorImg1", true),
    get_post_meta($post_id, "instructorImg2", true),
    get_post_meta($post_id, "instructorImg3", true),
    get_post_meta($post_id, "instructorImg4", true),
    get_post_meta($post_id, "instructorImg5", true)
  );

  $nameArray = array(
    get_post_meta($post_id, "instructorName1", true),
    get_post_meta($post_id, "instructorName2", true),
    get_post_meta($post_id, "instructorName3", true),
    get_post_meta($post_id, "instructorName4", true),
    get_post_meta($post_id, "instructorName5", true)
    
  );

  $beltArray = array(
    get_post_meta($post_id, "beltLevel1", true),
    get_post_meta($post_id, "beltLevel2", true),
    get_post_meta($post_id, "beltLevel3", true),
    get_post_meta($post_id, "beltLevel4", true),
    get_post_meta($post_id, "beltLevel5", true)
  );

  $instructorDesArray = array(
    get_post_meta($post_id, "instructorDes1", true),
    get_post_meta($post_id, "instructorDes2", true),
    get_post_meta($post_id, "instructorDes3", true),
    get_post_meta($post_id, "instructorDes4", true),
    get_post_meta($post_id, "instructorDes5", true)
  );

  for($i=0;$i < sizeof($nameArray); $i++) {


    $imgSrc = '';

    if ($imgArray[$i] != "") {
      $imgSrc = wp_get_attachment_url($imgArray[$i]);
    } else {
      $imgSrc = "https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif";
    }

    if ($nameArray[$i] != "") {

    echo '<div class="inAccord" id="instructors'.$i.'"><div id = "inCard'.$i.'" class="inCard"><button type="button" class="minusInstructor" id="minusInstructor'.$i.'"><i class="fas fa-minus-circle fa-lg"></i></button><div class="instruct-card" class="inPic" data-toggle="collapse" data-target="#inCollapse'.$i.'" aria-expanded="true" aria-controls="collapseOne"><img id = "InImage'.$i.'" class="InImage w-100" src="'.$imgSrc.'"><button type="button" class="inup" id ="inup'.$i.'"><i class="fas fa-file-upload"></i></button><div class="candTContainer"><input name="instructorName'.$i.'" id="instructorNameTemp'.$i.'" class="titIn" placeholder="Instructor Name"></input><div class="titOut">'.$nameArray[$i].'</div><div class=tAndDropCon"><div class="drop"><label class="beltLabel" for="belts">Belt:</label><div class="beltLevelOut">'.$beltArray[$i].'</div><select  id="beltLevelTemp'.$i.'" class="beltLevelIn" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></div></div></div></div><div id="inCollapse'.$i.'" class="collapse hide" aria-labelledby="inPic3" data-parent="#inCard'.$i.'"><div class="card-body"><div class="desOut" id ="instructorDesOut'.$i.'">'.$instructorDesArray[$i].'</div><textarea class="desIn" id="instructorDesTemp'.$i.'" name="instructorDes3" placeholder="Describe your instructor here."></textarea></div></div></div></div>';
    }
  }


  
  ?>
</div>

    </div>
  </div>

    <input name="imageUpload1" id="imageUpload1" onchange="fasterPreview(this, '#InImage1')" type="file" capture>

    <input name= "imageUpload2" class="hideImageUp" id="imageUpload2" onchange="fasterPreview(this, '#InImage2')" type="file" 
         capture>
       <input name= "imageUpload3" class="hideImageUp" id="imageUpload3" onchange="fasterPreview(this, '#InImage3')" type="file" 
        capture>
       <input name= "imageUpload4" class="hideImageUp" id="imageUpload4" onchange="fasterPreview(this, '#InImage4')" type="file" 
        capture>
       <input name= "imageUpload5" class="hideImageUp" id="imageUpload5" onchange="fasterPreview(this, '#InImage5')" type="file" 
      capture>

       <input name="instructorNameUp1" id="instructorUp1" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp2" id="instructorUp2" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp3" id="instructorUp3" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp4" id="instructorUp4" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp5" id="instructorUp5" class="titleUp" placeholder="Instructor Name">

       <input name="instructorDesUp1" id="instructorDesUp1" class="titleUp" placeholder="Instructor Name">
       <input name="instructorDesUp2" id="instructorDesUp2" class="titleUp"  placeholder="Instructor Name">
       <input name="instructorDesUp3" id="instructorDesUp3" class="titleUp"  placeholder="Instructor Name">
       <input name="instructorDesUp4" id="instructorDesUp4" class="titleUp"  placeholder="Instructor Name">
       <input name="instructorDesUp5" id="instructorDesUp5" class="titleUp"  placeholder="Instructor Name">


      <select name="beltLevelUp1" id="beltLevelUp1" class="beltLevelUp">
              <option value="Black">Black</option>
              <option value="Brown">Brown</option>
              <option value="Purple">Purple</option>
              <option value="Blue">Blue</option>
            </select>

      <select name="beltLevelUp2" id="beltLevelUp2" class="beltLevelUp">
        <option value="Black">Black</option>
        <option value="Brown">Brown</option>
        <option value="Purple">Purple</option>
        <option value="Blue">Blue</option>
      </select>

      <select name="beltLevelUp3" id="beltLevelUp3" class="beltLevelUp">
        <option value="Black">Black</option>
        <option value="Brown">Brown</option>
        <option value="Purple">Purple</option>
        <option value="Blue">Blue</option>
      </select>

      <select name="beltLevelUp4" id="beltLevelUp4" class="beltLevelUp">
        <option value="Black">Black</option>
        <option value="Brown">Brown</option>
        <option value="Purple">Purple</option>
        <option value="Blue">Blue</option>
      </select>

      <select name="beltLevelUp5" id="beltLevelUp5" class="beltLevelUp">
        <option value="Black">Black</option>
        <option value="Brown">Brown</option>
        <option value="Purple">Purple</option>
        <option value="Blue">Blue</option>
      </select>

    <div class="center">
    <button type="submit" class="gymSubs" id="instructSub">Submit</button>

    </form>
    <button class="cancels" type="button" id="instructCan">Cancel</button>

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
    
    
  
    <?php 
  
  // if (isset($_POST['njvkdsnvklsvlnvdf']) || wp_verify_nonce($_POST['njvkdsnvklsvlnvdf'], 'gym_pic_upload' )) {



  // }

  
  
  ?>   





<button id="cancelPics" class="plusPic" >Cancel</button>
<form id="_imagesForm" action="" enctype="multipart/form-data" method="post">
<?php wp_nonce_field( 'gym_pic_upload', 'njvkdsnvklsvlnvdf' ); ?>

    <input id="_imagesInput" name="SlideImageInput[]" type="file" style="display:none" multiple>
    <button id="savePics" class="plusPic" type="submit">Save</button>

<div id="slideshow-container">
<div onclick="hideslide()" id = "block2" class = "blocker"></div>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

  <ul class="carousel-inner" id ="carousel-inner">

  <?php

      $imgArray = get_post_meta($post_id, "slide_img_array", true);
      foreach($imgArray as $key => $img) {
        if ($key == 0) {
        $imageSrc = wp_get_attachment_url($imgArray[$key]);
  echo "<li id='Pslide-".$key."' class='carousel-item active' name = 'Pslide-".$key."'><img class='d-block w-100' src='".$imageSrc."'> </li>";
    } else {
      $imageSrc = wp_get_attachment_url($imgArray[$key]);
      echo "<li id='Pslide-".$key."' class='carousel-item' name = 'Pslide-".$key."'><img class='d-block w-100' src='".$imageSrc."'> </li>";
    }
  }
 ?>
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
  </form>
    


<div id="mapContain">
<div onclick="hideMap()" id = "block3" class = "blocker"></div>
<div id="map">
    </div>
    </div>

   
    

<br>

    </div>
    </div>

<script>


    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }


  var editDes = document.getElementById("editDes");
  var desIn = document.getElementById("gymDesIn");
  var desOut =document.getElementById("gymDesout");
  var desSub = document.getElementById("gymDesSub");
  var cancel1 = document.getElementById("cancel1");

      editDes.addEventListener("click", function() {
        desIn.style.display = "block";
        desOut.style.display = "none";
        desSub.style.display = "block";
        cancel1.style.display = "block";

      });

      cancel1.addEventListener("click", function() {

        cancel1.style.display = "none";
        desIn.style.display = "none";
        desSub.style.display = "none";
        desOut.style.display = "block";
        desOut.style.margin = "0 auto";
      })

    //   let map;

    //   function initMap() {
    //     map = new google.maps.Map(document.getElementById("map"), {
    //       zoom: 2,
    //       center: new google.maps.LatLng(2.8, -187.3),
    //       mapTypeId: "terrain",
    //     });
    //     // Create a <script> tag and set the USGS URL as the source.
    //     const script = document.createElement("script");
    //     // This example uses a local copy of the GeoJSON stored at
    //     // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
    //     script.src =
    //       "https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js";
    //     document.getElementsByTagName("head")[0].appendChild(script);
    //   }

    //   // Loop through the results array and place a marker for each
    //   // set of coordinates.
    //   const eqfeed_callback = function (results) {
    //     for (let i = 0; i < results.features.length; i++) {
    //       const coords = results.features[i].geometry.coordinates;
    //       const latLng = new google.maps.LatLng(coords[1], coords[0]);
    //       new google.maps.Marker({
    //         position: latLng,
    //         map: map,
    //       });
    //     }
    //   };
    // </script>

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
// $('#_uploadImages').click(function () {
//     $('#_imagesInput').click();

//     setTimeout(activeness(), 5000)
// });
function copyVal(source, output) {
$(source).on('keyup', function(){
    var val = $(this).val();
    $(output).val(val);
  })
}

function copySelect(source, output) {
$(source).on('change', function(){
    var val = $(this).val();
    $(output).val(val);
  })
}

copySelect('#beltLevelTemp0', '#beltLevelUp1')



copyVal('#instructorNameTemp0', '#instructorUp1');
copyVal('#instructorDesTemp0', '#instructorDesUp1');


const imgUp = document.getElementById("uploadImages");
const imgRules = document.getElementById("imgRules");


imgUp.addEventListener('mouseover', function() {
  imgRules.style.opacity = "100";
})
imgUp.addEventListener('mouseout', function() {
  imgRules.style.opacity = "0";
})


$('#_imagesInput').on('change', function () {

  var output = document.getElementById("carousel-inner");

    output.innerHTML = "";
    handleFileSelect();
});
}





let imageArray = []


function handleFileSelect() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {

        var files = event.target.files; //FileList object
        var output = document.getElementById("carousel-inner");
        var arrFilesCount = [];
        var start = $(output).find('li').length;
        var display =  document.getElementById("displayImg");
        var end = start + files.length;
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
            var readFile = URL.createObjectURL(files[i]);

            
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



          if(current_i == 0) {

                output.innerHTML = output.innerHTML + '<li id="slide-' + current_i + '" class="carousel-item active" name = "slide-' + current_i + '">' + "<img class='d-block w-100' src='" + picFile.result + "'" + "title=''/>" + '</li>'; 
                
                } else {

                  output.innerHTML = output.innerHTML + '<li id="slide-' + current_i + '" class="carousel-item" name = "slide-' + current_i + '">' + "<img class='d-block w-100' src='" + picFile.result + "'" + "title=''/>" + '</li>'; 

                  }
                

             
                

                var save = document.getElementById('savePics');
                var cancel = document.getElementById('cancelPics');
                var upload = document.getElementById('uploadImages')

                save.style.display = "block";
                cancel.style.display = "block";
                upload.style.display = "none";
                
             if (current_i == 0) {
                display.src = picFile.result;
             }
               
            });
            //Read the image
            picReader.readAsDataURL(file);
           
        }
       
      
    } else {
        console.log("Your browser does not support File API");
    }
}



 




var slideContain = document.getElementById('slideshow-container');
var displayImg = document.getElementById("displayImg")

// var showmap = document.getElementById("mapContain")
var title = document.getElementById("gymTitle")
var gymDes = document.getElementById("gymDesout")
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
     
     }

   
  

          
 





function hideslide() {
  slideContain.style.display = "none"
  displayImg.style.display ="block";
  title.style.marginTop = "0px";
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

    
    // if ($("#carousel-inner").find('li')) {
         

    //   $("#carousel-inner").find(".carousel-item").removeClass("active");
         

         
    //        }
    

}

// function showMap() {
//     showmap.style.display = "block";
//     displayImg.style.display ="none";
//     title.style.marginTop = "80px";
//   description.style.display = "block";
//     gymDes.style.display = "none";
//     instructCon.style.display = "none";
//     desTitle.style.display = "none";
//     prices.style.display = "none";
//     pagesecmenu.style.display = "none";
//     visitT.style.display = "none";
//     plink.style.display = "none";
//     slink.style.display = "none";
//     schedulet.style.display = "none";
//     bigCon.style.display = "none";
//     editDes.style.display = "none";
//     fullPrice.style.display = "none";
//     update1.style.display = "none";
//     update2.style.display = "none";
//     checkB.style.display = "none";
//     scheduleP.style.display = "none";

    
    
// }

// function hideMap() {

//  showmap.style.display = "none"
//   displayImg.style.display ="block";
//   title.style.marginTop = "0px";
//   description.style.display = "block";
//   gymDes.style.display = "block";
//     desTitle.style.display = "block";
//     instructCon.style.display = "block";
//     prices.style.display = "block";
//     pagesecmenu.style.display = "block";
//     visitT.style.display = "block";
//     plink.style.display = "block";
//     slink.style.display = "block";
//     schedulet.style.display = "block";
//     bigCon.style.display = "block";
//     editDes.style.display = "block";
//     fullPrice.style.display = "block";
//     update1.style.display = "block";
//     update2.style.display = "block";
//     checkB.style.display = "block";
//     scheduleP.style.display = "block";


    

// }

function showMore() {

 
  readMore.style.display= "none";
  readLess.style.display = "inline-block";
  gymDes.style.maxHeight = "400px";
}

function showLess() {

  
  readMore.style.display= "inline-block";
  readLess.style.display = "none";
  gymDes.style.maxHeight = "100px";



  

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
      
let beltOut = document.getElementsByClassName('beltLevelOut');
let beltIn = document.getElementsByClassName('beltLevelIn');
let nameOut = document.getElementsByClassName('titOut');

let deleteButtons = document.getElementsByClassName('minusInstructor');
let nameIn = document.getElementsByClassName('titIn');

   
     var plusInstructor = document.getElementById("plusInstructor")

     var i = 0;

     var plusClicked = 0


     plusInstructor.addEventListener("click", function() {


   

       plusClicked++

       let cardLength = document.getElementsByClassName('inAccord').length

       i = cardLength -1;

       i++

      let instructorForm =  document.getElementById('instructorForm');

      let appendedCard = '<div class="inAccord" id="instructors'+i+'"><div id = "inCard'+i+'" = class="inCard"><button type="button" class="minusInstructor"><i class="fas fa-minus-circle fa-lg"></i></button><div class="instruct-card" id="inPic'+i+'" data-toggle="collapse" data-target="#inCollapse'+i+'" aria-expanded="true" aria-controls="collapse'+i+'"><img id = "InImage'+i+'" class="InImage w-100" src="https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif"><button class="inup" id ="inup'+i+'"><i class="fas fa-file-upload"></i></button><div class="candTContainer"><input name="instructorName'+i+'" id="instructorNameTemp'+i+'" class="titIn" placeholder="Instructor Name"></input><div style="display:none;" class="titOut"></div><div class=tAndDropCon"><div class="drop"><label class="beltLabel" for="belts">Belt:</label><div class="beltLevelOut" style="display:none;"></div><select  id="beltLevelTemp'+i+'" class="beltLevelIn" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></div></div></div></div><div id="inCollapse'+i+'" class="collapse hide" aria-labelledby="inPic'+i+'" data-parent="#inCard'+i+'"><div class="card-body"><div class="desOut" style="display:none;" id ="instructorDesOut'+i+'"></div><textarea class="desIn" name="instructorDes'+i+'" id="instructorDesTemp'+i+'" placeholder="Describe your instructor here."></textarea></div></div></div></div>';

  
    

      appendedHTML = [];

      appendedHTML.push(appendedCard);

      if (cardLength < 5) {
        instructorForm.innerHTML = instructorForm.innerHTML  + appendedCard;
      }else {
        alert("You've reached your maximum number of instructors!")
        plusClicked--;
      }


for(let i = 0; i<deleteButtons.length; i++) {
          deleteButtons[i].onclick = removeCard;
        }

     elementDisBlock(beltIn[i]);
     elementDisBlock(nameIn[i]);

    
      for(i=0;i<deleteButtons.length;i++) {
     elementDisBlock(deleteButtons[i]);
   }

   $("#inup0").click(function(e) {
          $("#imageUpload1").click();
          });

        $("#inup1").click(function(e) {
          $("#imageUpload2").click();
          });

          $("#inup2").click(function(e) {
          $("#imageUpload3").click();
          });

          $("#inup3").click(function(e) {
          $("#imageUpload4").click();
          });

          $("#inup4").click(function(e) {
          $("#imageUpload5").click();
          });

          function copyVal(source, output) {
          $(source).on('keyup', function(){
            var val = $(this).val();
            $(output).val(val);
          });
          }

          copyVal('#instructorNameTemp0', '#instructorUp1');
          copyVal('#instructorNameTemp1', '#instructorUp2');
          copyVal('#instructorNameTemp2', '#instructorUp3');
          copyVal('#instructorNameTemp3', '#instructorUp4');
          copyVal('#instructorNameTemp4', '#instructorUp5');

          copyVal('#instructorDesTemp1', '#instructorDesUp2');
          copyVal('#instructorDesTemp2', '#instructorDesUp3');
          copyVal('#instructorDesTemp3', '#instructorDesUp4');
          copyVal('#instructorDesTemp4', '#instructorDesUp5');
         
          function copySelect(source, output) {
          $(source).on('change', function(){
            var val = $(this).val();
            $(output).val(val);
          })
          }

          copySelect('#beltLevelTemp1', '#beltLevelUp2');
          copySelect('#beltLevelTemp2', '#beltLevelUp3');
          copySelect('#beltLevelTemp3', '#beltLevelUp4');
          copySelect('#beltLevelTemp4', '#beltLevelUp5');
          

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

    //  var minusInstructor = document.getElementById("minusInstructor")
    //  var inCard = document.getElementsByClassName("inAccord")
            
        
    //      minusInstructor.addEventListener("click", function() {

    //     inCard[inCard.length-1].remove();               

    //     });

var instructEdit = document.getElementById('editInstruct');
let inCard = document.getElementsByClassName('inCard');
let instructCard = document.getElementsByClassName('instruct-card');
var inPlus = document.getElementById('plusInstructor');
var inMinus = document.getElementById('minusInstructor');
var InImage = document.getElementsByClassName('InImage');
var collapse = document.getElementsByClassName('collapse');
var inSub = document.getElementById('instructSub');
var inCan = document.getElementById('instructCan');
var imgup = document.getElementsByClassName('inup')
let cardArray = document.getElementsByClassName('inAccord');
let inDesOut = document.getElementsByClassName('desOut');
let inDesIn = document.getElementsByClassName('desIn');



function resetIds(idName, className) {
  for(i=0;i<className.length;i++) {
 className[i].id = idName + i;
  }
}

function resetDataTarget(dataName, className) {
  for(i=0;i<className.length;i++) {
 className[i].dataset.target = dataName + i;
 className[i].dataset.parent = dataName + i;
  }
}

function removeCard(eventObj) {
  var deleteButton = eventObj.target;

   if (confirm('Are you sure you want to delete this existing instructor?')) {
    deleteButton.parentNode.parentNode.parentNode.parentNode.removeChild(deleteButton.parentNode.parentNode.parentNode);
  plusClicked--;
  resetIds("instructors", cardArray);
  resetIds("inup", imgup);
  resetIds("instructorDesTemp", inDesIn);
  resetIds("instructorDesOut", inDesOut);
  resetIds("beltLevelTemp", beltIn);
  resetIds("inCard", inCard);
  resetIds("inPic", instructCard);
  // resetIds("InImage", InImage);
  resetIds("instructorNameTemp", nameIn);
  resetIds("inCollapse", collapse);
  resetDataTarget("#inCard", collapse);

} 

}


 instructEdit.addEventListener('click', function() {

  for(let i = 0; i<deleteButtons.length; i++) {
          deleteButtons[i].onclick = removeCard;
        }
  
        
 

 


   plusClicked = 0;
  //  elementDisBlock(inMinus);
   elementDisBlock(inPlus);
   elementDisBlock(inSub);
   elementDisBlock(inCan);

   for(i=0;i<deleteButtons.length;i++) {
     elementDisBlock(deleteButtons[i]);
     elementDisBlock(imgup[i]);
     elementDisBlock(inDesIn[i]);
     elementDisNone(inDesOut[i]);
     
     
   }


 })

 inCan.addEventListener('click', function() {


  window.location.reload();

  // // elementDisNone(inMinus);
  // elementDisNone(inPlus);
  // elementDisNone(inSub);
  // elementDisNone(inCan);

  
  // for(i=0;i<deleteButtons.length;i++) {
  //    elementDisNone(deleteButtons[i]);
  //    elementDisNone(imgup[i]);
  //    elementDisBlock(inDesOut[i]);
  //    elementDisNone(inDesIn[i]);
  //    elementDisNone(beltIn[i]);
  //    elementDisBlock(beltOut[i]);
  //    elementDisNone(nameIn[i]);
  //    elementDisBlock(nameOut[i]);
  //  }

  //  cardLength = cardArray.length;

  //  if (plusClicked > 0) {
  //    for (i=cardLength -1;i>cardLength - (plusClicked + 1);i--) {
  //      cardArray[i].parentNode.removeChild(cardArray[i])
  //    }
  //  }

 });


 function elementDisNone(element) {
   element.style.display ="none";
 }

 function elementDisBlock(element) {
   element.style.display ="block";
 }



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




