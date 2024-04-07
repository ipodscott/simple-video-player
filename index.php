 <?php
// Read the contents of the JSON file into a string
$json_data = file_get_contents('data.json');
$data = json_decode($json_data, true);
if(isset($_GET['u'])) {
  $video_name = isset($_GET['u']) ? $_GET['u'] : '';
  $uValue = $_GET['u'];
  $videoTitle = pathinfo($uValue, PATHINFO_FILENAME);
}

?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title><?php echo $data['site-title']; ?></title>
  <meta name="description" content="<?php echo $data['description']; ?>">
  <meta name="author" content="Hazzard Labs">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, viewport-fit=cover">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="apple-touch-icon" sizes="180x180" href="https://www.radio.dieselpunkindustries.com/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href=https://www.radio.dieselpunkindustries.com/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://www.radio.dieselpunkindustries.com/favicon-16x16.png">
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400;1,500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
</head>

<body style="background-image:url(<?php echo $data['background-image']; ?>)">
  
 
 <?php if(isset($_GET['u'])) {  ?>
   
   <div id="vid-menu" class="vid-menu">
      <div class="buttons">
    
        <?php foreach ($data['movies'] as $movie)  { ?>
        
        <div class="media-btn no-dl">
          <div class="track" data-src="<?php echo $movie['url']  ?>"><?php echo $movie['title']  ?></div>
        </div>
        
        <?php }  ?>
        <div class="media-btn no-dl" id="refreshButton"><div class="reload-btn">Refresh<span class="material-symbols-outlined"> cached </span></div></div>
      </div>
    
    </div>
    
    <div class="menu-overlay"></div>
    
    
    <div class="show-menu">
     <svg height="40" viewBox="0 96 960 960" width="40"><path d="M333.026 758.358 480 611.384l146.974 146.974 35.384-35.384L515.384 576l146.974-146.974-35.384-35.384L480 540.616 333.026 393.642l-35.384 35.384L444.616 576 297.642 722.974l35.384 35.384Zm147.041 197.641q-78.426 0-147.666-29.92t-120.887-81.544q-51.647-51.624-81.58-120.833-29.933-69.21-29.933-147.635 0-78.836 29.92-148.204 29.92-69.369 81.544-120.682 51.624-51.314 120.833-81.247 69.21-29.933 147.635-29.933 78.836 0 148.204 29.92 69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173 0 78.426-29.92 147.666t-81.21 120.887q-51.291 51.647-120.629 81.58-69.337 29.933-148.173 29.933ZM480 905.744q137.795 0 233.769-96.18Q809.744 713.385 809.744 576q0-137.795-95.975-233.769Q617.795 246.256 480 246.256q-137.385 0-233.564 95.975-96.18 95.974-96.18 233.769 0 137.385 96.18 233.564 96.179 96.18 233.564 96.18ZM480 576Z"/></svg>
     </div>
    

 <?php
     } else {
 ?>
     
     <div id="vid-menu" class="vid-menu show">
       <div class="buttons">
     
         <?php foreach ($data['movies'] as $movie)  { ?>
         
         <div class="media-btn no-dl">
           <div class="track" data-src="<?php echo $movie['url']  ?>"><?php echo $movie['title']  ?></div>
         </div>
         
         <?php }  ?>
         <div class="media-btn no-dl" id="refreshButton"><div class="reload-btn">Refresh<span class="material-symbols-outlined"> cached </span></div></div>
       </div>
     
     </div>
     
     <div class="menu-overlay"></div>
     
     
     <div class="show-menu show">
     <svg height="40" viewBox="0 96 960 960" width="40"><path d="M333.026 758.358 480 611.384l146.974 146.974 35.384-35.384L515.384 576l146.974-146.974-35.384-35.384L480 540.616 333.026 393.642l-35.384 35.384L444.616 576 297.642 722.974l35.384 35.384Zm147.041 197.641q-78.426 0-147.666-29.92t-120.887-81.544q-51.647-51.624-81.58-120.833-29.933-69.21-29.933-147.635 0-78.836 29.92-148.204 29.92-69.369 81.544-120.682 51.624-51.314 120.833-81.247 69.21-29.933 147.635-29.933 78.836 0 148.204 29.92 69.369 29.92 120.682 81.21 51.314 51.291 81.247 120.629 29.933 69.337 29.933 148.173 0 78.426-29.92 147.666t-81.21 120.887q-51.291 51.647-120.629 81.58-69.337 29.933-148.173 29.933ZM480 905.744q137.795 0 233.769-96.18Q809.744 713.385 809.744 576q0-137.795-95.975-233.769Q617.795 246.256 480 246.256q-137.385 0-233.564 95.975-96.18 95.974-96.18 233.769 0 137.385 96.18 233.564 96.179 96.18 233.564 96.18ZM480 576Z"/></svg>
     </div>

 <?php
     }
 ?>
 

  <?php if(isset($_GET['u'])) {  ?>
    
    <div class="main-video" style="display:flex; opacity: 1;">
      <video poster="<?php echo $videoTitle; ?>.webp" style="display:flex; opacity: 1;" src="<?php echo $video_name; ?>" id="video-player" muted loop autoplay controls></video>
    </div>
  
  <?php
      } else {
  ?>
      <div class="main-video">
        <video src="<?php echo $video_name; ?>" id="video-player" muted loop autoplay controls></video>
      </div>
  <?php
      }
  ?>
  
  

<body>
  <script src="script.js"></script>
  <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
  <script>
    const player = new Plyr('#video-player');
  </script>
</body>
</html>