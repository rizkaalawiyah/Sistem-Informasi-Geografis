<?php
include "koneksi.php";
$Q = mysqli_query($koneksi,"SELECT * FROM tb_rs where id_rs=".$id)or die(mysqli_error($Q));
if($Q){
 $posts = array();
      if(mysqli_num_rows($Q))
      {
             while($post = mysqli_fetch_assoc($Q)){
                     $posts[] = $post;
             }
      }  
      $data = json_encode(array('results'=>$posts));             
}

?>