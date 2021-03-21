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
    echo "<style>#editInstruct{display:none !important;}</style>";
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

function addMeta($formPost, $metaKey, &$postVar) {
  $post_id = get_the_ID();


  if (isset($formPost)) {
    $postVar = sanitize_text_field($formPost);
    
    if ($postVar !== '') {
      update_post_meta($post_id, $metaKey, $postVar);
    
      }
    }

}

function is_valid_domain_name($domain_name)
{
    return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain_name) //valid chars check
            && preg_match("/^.{1,253}$/", $domain_name) //overall length check
            && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain_name)   ); //length of each label
}


if (isset($_POST['sbhkdvhjsbhkvbhkvb'])) {

  if(wp_verify_nonce($_POST['sbhkdvhjsbhkvbhkvb'], 'price_update' )) {
      if(is_user_logged_in()) {

        if (isset($_POST['classPrice'])) {

          if($_POST['classPrice'] != "") {


          $classPrice = sanitize_text_field($_POST['classPrice']);

          if(is_numeric($classPrice)) {
                update_post_meta($post_id, 'classPrice', $classPrice);

          } else {
                  echo "<style>#priceAlert{display:block !important;}</style>";

          }
        }

        }

         if (isset($_POST['dayPrice'])) {

          if($_POST['dayPrice'] != "") {


          $dayPrice = sanitize_text_field($_POST['dayPrice']);

          if(is_numeric($dayPrice)) {
                update_post_meta($post_id, 'dayPrice', $dayPrice);

          } else {

                  echo "<style>#priceAlert{display:block !important;}</style>";

          }
        }

        }

         if (isset($_POST['weekPrice'])) {

          if($_POST['weekPrice'] != "") {

          $weekPrice = sanitize_text_field($_POST['weekPrice']);

          if(is_numeric($weekPrice)) {
                update_post_meta($post_id, 'weekPrice', $weekPrice);

          } else {
                  echo "<style>#priceAlert{display:block !important;}</style>";

          }

          }

        }

        if($_POST['classDes'] != "") {
          addMeta($_POST['classDes'], 'classDes', $classDes );

        }

          if($_POST['dayDes'] != "") {
          addMeta($_POST['dayDes'], 'dayDes', $dayDes );

          
        }

          if($_POST['weekDes'] != "") {
          addMeta($_POST['weekDes'], 'weekDes', $weekDes );

        }

         if($_POST['priceLink'] != "") {

          
           if(is_valid_domain_name($_POST['priceLink']) === true) {

          addMeta($_POST['priceLink'], 'priceLink', $priceLink );
                  echo "<script>alert('successpr3!')</script>";

        } else {
                  echo "<script>alert('Please enter a valid URL')</script>";
                  echo "<script>alert('".$_POST['priceLink']."')</script>";
        }

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
  
if (!empty($_FILES['imageUpload0']['name'])) {

  $img1 = $_FILES['imageUpload0'];

  uploadInstructFile($img1, 'instructorImg0', 'imageUpload0');

}

if (!empty($_FILES['imageUpload1']['name'])) {
  $img2 = $_FILES['imageUpload1'];
  uploadInstructFile($img2, 'instructorImg1', 'imageUpload1');
}

  if (!empty($_FILES['imageUpload2']['name'])) {
    $img3 = $_FILES['imageUpload2'];
    uploadInstructFile($img3, 'instructorImg2', 'imageUpload2');
  }
  
    if (!empty($_FILES['imageUpload3']['name'])) {
      $img4 = $_FILES['imageUpload3'];
      uploadInstructFile($img4, 'instructorImg3', 'imageUpload3');
    }
    

      if (!empty($_FILES['imageUpload4']['name'])) {
        $img5 = $_FILES['imageUpload4'];
        uploadInstructFile($img5, 'instructorImg4', 'imageUpload4');
      }
    







if($_POST['instructorNameUp0'] !== '') {

 if($_POST['instructorNameUp0'] !== 'deleted') {

addMeta($_POST['instructorNameUp0'], 'instructorName0', $instructor0 );
addMeta($_POST['beltLevelUp0'], 'beltLevel0', $beltLevelUp0 );
addMeta($_POST['instructorDesUp0'], 'instructorDes0', $instructorDesUp1 );
  }
  
  else {

    $post_id = get_the_ID();
    delete_post_meta($post_id, 'instructorName0'); 
    delete_post_meta($post_id, 'instructorImg0'); 
    delete_post_meta($post_id, 'instructorDes0'); 
    delete_post_meta($post_id, 'beltLevel0'); 

    echo "<script>alert('deleted0!')</script>";

  }
}



  if($_POST['instructorNameUp1'] !== '') {

     if($_POST['instructorNameUp1'] !== 'deleted') {

addMeta($_POST['instructorNameUp1'], 'instructorName1', $instructor1 );
addMeta($_POST['beltLevelUp1'], 'beltLevel1', $beltLevelUp1 );
addMeta($_POST['instructorDesUp1'], 'instructorDes1', $instructorDesUp2 );
  } 

  else {
    $post_id = get_the_ID();
    delete_post_meta($post_id, 'instructorName1'); 
    delete_post_meta($post_id, 'instructorImg1'); 
    delete_post_meta($post_id, 'instructorDes1'); 
    delete_post_meta($post_id, 'beltLevel1'); 
    echo "<script>alert('deleted1!')</script>";
  }
}

  if($_POST['instructorNameUp2'] !== '') {

         if($_POST['instructorNameUp2'] !== 'deleted') {

addMeta($_POST['instructorNameUp2'], 'instructorName2', $instructor2 );
addMeta($_POST['beltLevelUp2'], 'beltLevel2', $beltLevelUp2 );
addMeta($_POST['instructorDesUp2'], 'instructorDes2', $instructorDesUp2 );
  }

   else {
    $post_id = get_the_ID();
    delete_post_meta($post_id, 'instructorName2'); 
    delete_post_meta($post_id, 'instructorImg2'); 
    delete_post_meta($post_id, 'instructorDes2'); 
    delete_post_meta($post_id, 'beltLevel2');

    echo "<script>alert('deleted2!')</script>";
  }
}

  if($_POST['instructorNameUp3'] !== '') {

         if($_POST['instructorNameUp3'] !== 'deleted') {


addMeta($_POST['instructorNameUp3'], 'instructorName3', $instructor3 );
addMeta($_POST['beltLevelUp3'], 'beltLevel3', $beltLevelUp3 );
addMeta($_POST['instructorDesUp3'], 'instructorDes3', $instructorDesUp4 );
  }

 else {
    $post_id = get_the_ID();
    delete_post_meta($post_id, 'instructorName3'); 
    delete_post_meta($post_id, 'instructorImg3'); 
    delete_post_meta($post_id, 'instructorDes3'); 
    delete_post_meta($post_id, 'beltLevel3');

    echo "<script>alert('deleted3!')</script>";
  }
}
 

  if($_POST['instructorNameUp4'] !== '') {

         if($_POST['instructorNameUp4'] !== 'deleted') {


addMeta($_POST['instructorNameUp4'], 'instructorName4', $instructor4 );
addMeta($_POST['beltLevelUp4'], 'beltLevel4', $beltLevelUp4 );
addMeta($_POST['instructorDesUp4'], 'instructorDes4', $instructorDesUp5 );
 
} 
 else {
    $post_id = get_the_ID();
    delete_post_meta($post_id, 'instructorName4'); 
    delete_post_meta($post_id, 'instructorImg4'); 
    delete_post_meta($post_id, 'instructorDes4'); 
    delete_post_meta($post_id, 'beltLevel4');

    echo "<script>alert('deleted4!')</script>";
  }
}




  
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
<button type="button" id="minusInstructor" class="plusevent"><i class="fas fa-minus-circle fa-lg"></i></button>

</div>
</div>

<button class="plusPic" id="editInstruct"><i class="fas fa-edit"></i></button>





<div class="center">
<div id="instructorCards" class="center">
<form id="instructorForm" enctype="multipart/form-data" method="post">
<?php wp_nonce_field( 'instructor_upload', 'njvkddsbhjdsbvhsdb' ); ?>
  <?php 
  
  $imgArray = array(
    get_post_meta($post_id, "instructorImg0", true),
    get_post_meta($post_id, "instructorImg1", true),
    get_post_meta($post_id, "instructorImg2", true),
    get_post_meta($post_id, "instructorImg3", true),
    get_post_meta($post_id, "instructorImg4", true)
  );

  $nameArray = array(
    get_post_meta($post_id, "instructorName0", true),
    get_post_meta($post_id, "instructorName1", true),
    get_post_meta($post_id, "instructorName2", true),
    get_post_meta($post_id, "instructorName3", true),
    get_post_meta($post_id, "instructorName4", true)
    
  );

  $beltArray = array(
    get_post_meta($post_id, "beltLevel0", true),
    get_post_meta($post_id, "beltLevel1", true),
    get_post_meta($post_id, "beltLevel2", true),
    get_post_meta($post_id, "beltLevel3", true),
    get_post_meta($post_id, "beltLevel4", true)
  );

  

  $instructorDesArray = array(
    get_post_meta($post_id, "instructorDes0", true),
    get_post_meta($post_id, "instructorDes1", true),
    get_post_meta($post_id, "instructorDes2", true),
    get_post_meta($post_id, "instructorDes3", true),
    get_post_meta($post_id, "instructorDes4", true)
  );

  for($i=0; $i < sizeof($nameArray); $i++) {

    if ($nameArray[0] == "") {
      array_splice($nameArray, 0 , 1);
      array_splice($beltArray, 0 , 1);
      array_splice($instructorDesArray, 0 , 1);
      array_splice($imgArray, 0 , 1);
    }
    if ($nameArray[$i] == "") {
      array_splice($nameArray, $i, 1);
      array_splice($beltArray, $i, 1);
      array_splice($instructorDesArray, $i, 1);
      array_splice($imgArray, $i , 1);

    }
  }


  for($i=0;$i < sizeof($nameArray); $i++) {


    $imgSrc = '';
    if ($imgArray[$i] != "") {
      $imgSrc = wp_get_attachment_url($imgArray[$i]);
        } else {
          $imgSrc = "https://www.roamingrolls.com/wp-content/uploads/2020/11/avatar.gif";
        }

 
      if ($nameArray[$i] != "") {

    echo '<div class="inAccord" id="instructors'.$i.'"><div id = "inCard'.$i.'" class="inCard"><button type="button" class="inup" id ="inup'.$i.'"><i class="fas fa-file-upload"></i></button><div class="instruct-card" class="inPic" data-toggle="collapse" data-target="#inCollapse'.$i.'" aria-expanded="true" aria-controls="collapseOne"><img id = "InImage'.$i.'" class="InImage w-100" src="'.$imgSrc.'"><div class="candTContainer"><input name="instructorName'.$i.'" id="instructorNameTemp'.$i.'" class="titIn" placeholder="Instructor Name"></input><div class="titOut">'.$nameArray[$i].'</div><div class=tAndDropCon"><div class="drop"><label class="beltLabel" for="belts">Belt:</label><div class="beltLevelOut">'.$beltArray[$i].'</div><select  id="beltLevelTemp'.$i.'" class="beltLevelIn" name="belts"><option value="Black">Black</option><option value="Brown">Brown</option><option value="Purple">Purple</option><option value="Blue">Blue</option></select></div></div></div></div><div id="inCollapse'.$i.'" class="collapse hide" aria-labelledby="inPic3" data-parent="#inCard'.$i.'"><div class="card-body"><div class="desOut" id ="instructorDesOut'.$i.'">'.$instructorDesArray[$i].'</div><textarea class="desIn" id="instructorDesTemp'.$i.'" name="instructorDes3" placeholder="Describe your instructor here."></textarea></div></div></div></div>';
      }
    } 
  


  
  ?>
</div>

    </div>
  </div>

    <input name="imageUpload0" id="imageUpload0" class="hideImageUp" onchange="fasterPreview(this, '#InImage0')" type="file" capture>

    <input name= "imageUpload1" class="hideImageUp" id="imageUpload1" onchange="fasterPreview(this, '#InImage1')" type="file" 
         capture>
       <input name= "imageUpload2" class="hideImageUp" id="imageUpload2" onchange="fasterPreview(this, '#InImage2')" type="file" 
        capture>
       <input name= "imageUpload3" class="hideImageUp" id="imageUpload3" onchange="fasterPreview(this, '#InImage3')" type="file" 
        capture>
       <input name= "imageUpload4" class="hideImageUp" id="imageUpload4" onchange="fasterPreview(this, '#InImage4')" type="file" 
      capture>

       <input name="instructorNameUp0" id="instructorUp0" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp1" id="instructorUp1" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp2" id="instructorUp2" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp3" id="instructorUp3" class="titleUp" placeholder="Instructor Name">
       <input name="instructorNameUp4" id="instructorUp4" class="titleUp" placeholder="Instructor Name">

       <input name="instructorDesUp0" id="instructorDesUp0" class="titleUp" placeholder="Instructor Des">
       <input name="instructorDesUp1" id="instructorDesUp1" class="titleUp"  placeholder="Instructor Des">
       <input name="instructorDesUp2" id="instructorDesUp2" class="titleUp"  placeholder="Instructor Des">
       <input name="instructorDesUp3" id="instructorDesUp3" class="titleUp"  placeholder="Instructor Des">
       <input name="instructorDesUp4" id="instructorDesUp4" class="titleUp"  placeholder="Instructor Des">


      <select name="beltLevelUp0" id="beltLevelUp0" class="beltLevelUp">
              <option value="Black">Black</option>
              <option value="Brown">Brown</option>
              <option value="Purple">Purple</option>
              <option value="Blue">Blue</option>
            </select>

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

<div id="priceRules">
Add visitor prices - 
  (1 class, 1 day, 1 week)
(Boxes without prices wont be displayed, type "FREE" in the price section if you don't charge for that time period)</div>


<button class="plusPic" id="editPricing"><i class="fas fa-edit"></i></button>

<form method="post">

<?php wp_nonce_field( 'price_update', 'sbhkdvhjsbhkvbhkvb' ); ?>

<div class="center">
    <div id="priceAlert" class="alert alert-danger" role="alert">
  Make sure your price fields are numeric.
</div>
  </div>

<div class="form-group" id="prices">
<div id="PriceCardCon">
  <div class="input-group-prepend">
    <div id="class" class="adultcard " aria-label="With textarea">
      <div class="adults">
        <div class="adultcontain">
        <h6 class="titleinputs Options">1 Class</h6>
    <input class="priceIn" type="text" name="classPrice" placeholder="Price ($)" value="<?php
     $classPriceOut = get_post_meta($id,'classPrice',true);
    echo $classPriceOut;
    ?>
   ">
    <div class="priceOut">
    <?php
     $classPriceOut = get_post_meta($id,'classPrice',true);
    echo "$".$classPriceOut;
    ?>
    </div>
  
  </div>
<div>
</div>
</div>
<input class="PriceDesIn" name="classDes"  placeholder="Include a short description" value="<?php
     $classDesOut = get_post_meta($id,'classDes',true);
    echo $classDesOut;
    ?>">
  <div class="priceDesOut">

<?php
     $classDesOut = get_post_meta($id,'classDes',true);
    echo $classDesOut;
    ?>
  </div>
  </div>
</div>
<div class="input-group-prepend">
    <div id="day" class="adultcard " aria-label="With textarea"><div class="adults"><div class="adultcontain"><h6 class="titleinputs Options">1 Day</h6>
    
    <input class="priceIn"  name="dayPrice"  type="text" placeholder="Price ($)" value="<?php
     $dayPriceOut = get_post_meta($id,'dayPrice',true);
    echo $dayPriceOut;
    ?>"> 

    <div class="priceOut">

   <?php
     $dayPriceOut = get_post_meta($id,'dayPrice',true);
    echo "$".$dayPriceOut;
    ?>
    </div>
  
</div></div><input class="PriceDesIn" name="dayDes" placeholder="Include a short description" value="<?php
     $dayDesOut = get_post_meta($id,'dayDes',true);
    echo $dayDesOut;
    ?>">
  <div class="priceDesOut">

<?php
     $dayDesOut = get_post_meta($id,'dayDes',true);
    echo $dayDesOut;
    ?>
    </div>
    
  </div>
</div>
<div class="input-group-prepend">
    <div id="week" class="adultcard " aria-label="With textarea"><div class="adults"><div class="adultcontain"><h6 class="titleinputs Options">1 Week</h6>
    <input class="priceIn"  name="weekPrice"  type="text" placeholder="Price ($)" value="<?php
     $weekPriceOut = get_post_meta($id,'weekPrice',true);
    echo $weekPriceOut;
    ?>">
  
    <div class="priceOut">
  <?php
     $weekPriceOut = get_post_meta($id,'weekPrice',true);
    echo "$".$weekPriceOut;
    ?>
    </div>
  </div></div>
  <input class="PriceDesIn" name="weekDes" placeholder="Include a short description" value="
  <?php
     $weekDesOut = get_post_meta($id,'weekDes',true);
    echo $weekDesOut;
    ?>
    ">
  <div class="priceDesOut">
  <?php
     $weekDesOut = get_post_meta($id,'weekDes',true);
    echo $weekDesOut;
    ?>
  </div>
   
  </div>
</div>
</div>
</div>

<?php

if ($classPriceOut != "") {
  echo "<style>#class{display:block !important}</style>";
} else {
  echo "<style>#class{display:none !important}</style>";

}

if ($dayPriceOut != "") {
  echo "<style>#day{display:block !important}</style>";
}else {
  echo "<style>#class{display:none !important}</style>";

}

if ($weekPriceOut != "") {
  echo "<style>#week{display:block !important}</style>";
}else {
  echo "<style>#class{display:none !important}</style>";

}

?>



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

  <button id="priceLinkOut" class="gymSubs" ><a href="<?php
$priceLink = get_post_meta($id,'priceLink',true);
    echo $priceLink;
   ?>">Full pricing page</a></button> 
  <input id="priceLink" name="priceLink" value="<?php
$priceLink = get_post_meta($id,'priceLink',true);
    echo $priceLink;
   ?>">

</div>
</div>


<div class="center">
   <button type="submit" class="gymSubs" id="priceSub">Submit</button>

  </form>

 <button class="cancels" type="button" id="priceCan">Cancel</button>
</div>


<div class="center">
<div  class="menuContainer">
  <h2 id="schedulet" >Schedule</h2>
</div>
</div>

  <button class="plusPic" id="editschedule"><i class="fas fa-edit"></i></button>

<form method="post">

<?php wp_nonce_field( 'schedule_update', 'dsssssssachadhkbhjl' ); ?>



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



      <div class="center">
  <h6 class="scheduleEdit" id="scheduleP">Add a link to your schedule page below</h6>
    </div>

  

<div class="center">
<div id="slink">
  <input class="scheduleEdit" type="text" name="scheduleLink"  id="Schedulelink"> 
</input>
</div>
</div>

<div class="center">
  <button id="scheduleLinkOut" class="scheduleOutput gymSubs" >
  <a href="<?php
    $priceLink = get_post_meta($id,'priceLink',true);
    echo $priceLink;
    ?>">Full pricing page
   </a>
  </button> 
</div>

<div class="center">
   <button type="submit" class="gymSubs scheduleEdit" id="scheduleSub">Submit</button>

  </form>

 <button class="cancels scheduleEdit" type="button" id="scheduleCan">Cancel</button>
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
     print_r($imgArray);
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


    

</script>



</body>

<div>

<?php

get_footer();

?>

</div>




