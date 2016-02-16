<html>
	<head>
		<title>Home - Leila</title>
        <link href="res/css/temp-luca.css" rel="stylesheet" type="text/css">
		<?php
			include("functions.php");
			getResource();
		?>
	</head>
	<body >
        <div class="main">
			<div id="news-container">
            <?php 
              $mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
              $result= mysqli_query($mysqli,"select * from db_notizie_source a, db_notizie_aggiornate b where a.id in (b.idSource) order by ordine asc,date desc");
              $source=0;
              while($r=mysqli_fetch_array($result)){
              	if($source!=$r['idSource']){
                	echo '<h4 class="category">'.$r['nome'].' - '.$r['fonte'].'</h4>';
                	$source=$r['idSource'];
                }
 				echo'<div class="news"><a href="'.$r['link'].'" target="_blank" style="width:100%;display:flex;color:#333333;text-decoration:none;">
                	<div style="width:80%;height:100%;">
                		<p class="news-title">'.($r['title']).'</p>
                		<p class="news-desc">'.($r['desc']).'</p>
                        </div>
                    <div class="news-img" style="background-image:url('.$r['img'].')"></div>
                     </a></div>';
  			  }                              
                ?>
            </div>
		</div>
    </body>
</html>