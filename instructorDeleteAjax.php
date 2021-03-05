<?php 
/** 
 * Plugin Name: Delete Instructors
 * Plugin URI: https://www.roamingrolls.com/Gyms
 * Description: Dynamically delete instructors from gym page.
 */

add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'instructorsajax', plugins_url('/Instructorsajax.js', __FILE__), true);

    $localize = array( 'ajax_url' => admin_url( 'admin-ajax.php' ) );
    wp_localize_script( 'instructorsajax', 'ajax_object', $localize );
});

add_action( 'wp_ajax_delete_instructors', 'delete_instructors' );
add_action( 'wp_ajax_nopriv_delete_instructors', 'delete_instructors' );

function delete_instructors() {


    if (isset($_POST['minus_id']) && !empty($_POST['minus_id'])) {

    $minusID = $_POST['minus_id'];
    $number = $minusID[15];

    $post_id = get_the_ID();
    delete_post_meta($post_id, 'instructorName'.$number); 
    delete_post_meta($post_id, 'instructorImg'.$number); 
    delete_post_meta($post_id, 'instructorDes'.$number); 
    delete_post_meta($post_id, 'beltLevel'.$number); 

    echo "<script>alert('deleted".$number."')</script>";

    }

    wp_die(); // this is required to terminate immediately and return a proper response
}



//     $post_id = get_the_ID();
//     delete_post_meta($post_id, 'instructorName2'); 
//     delete_post_meta($post_id, 'instructorImg2'); 
//     delete_post_meta($post_id, 'instructorDes2'); 
//     delete_post_meta($post_id, 'beltLevel2'); 
//     echo "<script>alert('deleted2!')</script>";
//   }

//   $post_id = get_the_ID();
//   delete_post_meta($post_id, 'instructorName3'); 
//   delete_post_meta($post_id, 'instructorImg3'); 
//   delete_post_meta($post_id, 'instructorDes3'); 
//   delete_post_meta($post_id, 'beltLevel3');

//   echo "<script>alert('deleted3!')</script>";
// }

// $post_id = get_the_ID();
// delete_post_meta($post_id, 'instructorName4'); 
// delete_post_meta($post_id, 'instructorImg4'); 
// delete_post_meta($post_id, 'instructorDes4'); 
// delete_post_meta($post_id, 'beltLevel4');

// echo "<script>alert('deleted4!')</script>";
// }

// {
//     $post_id = get_the_ID();
//     delete_post_meta($post_id, 'instructorName5'); 
//     delete_post_meta($post_id, 'instructorImg5'); 
//     delete_post_meta($post_id, 'instructorDes5'); 
//     delete_post_meta($post_id, 'beltLevel5');

//     echo "<script>alert('deleted5!')</script>";
//   }

    


