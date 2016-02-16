<html>
	<head>
		<title>Home - Leila</title>
        <link href="res/css/temp-luca.css" rel="stylesheet" type="text/css">
		<?php
			include("functions.php");
			getResource();
		?>
		
	</head>
	<body>
		<div id="forecast-container">
                        <?php
                        	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            $result= mysqli_query($mysqli,"select * from db_meteo_previsioni a, db_meteo_scelte b where a.idCitta in (b.id)");
                            $n=0;
                            while($r=mysqli_fetch_array($result)){
                            	$n++;
                            	echo '<div id="'.$n.'-forecast" class="forecast" >
                                        <div id="weather_wrapper">
                                        <div style="height:50px;background:#7ED088;width:100%"><p class="location" style="line-height:50px">'.utf8_encode($r['citta']).'</p></div>
                                            <div class="weatherCard">
                                                <div class="currentTemp"><span class="temp">'.$r['day1_max'].'°</span>
                                                </div>
                                                <div class="currentWeather">
                                                    <span class="conditions"><i class="wi '.$r['day1_icon'].'" style=" font-size: 85px;"></i></span>
                                                    <div class="info">
                                                        <span class="w-rain" style="font-size: 24px;">'.$r['day1_rain'].' %</span>
                                                        <span class="wind" style="font-size: 24px;">'.$r['day1_wind'].' KM/H</span>
                                                    </div>
                                                </div>
												 <div class="griglia_giorni">
													<div class="giorno">'.$r['day2'].' <i class="wi '.$r['day2_icon'].'"></i></div>
													<div class="giorno">'.$r['day3'].' <i class="wi '.$r['day3_icon'].'"></i></div>
													<div class="giorno">'.$r['day4'].' <i class="wi '.$r['day4_icon'].'"></i></div>
												</div>
                                                 </div>
                                           
                                         </div>
                                     </div>';
                            }
                           
                        ?>
                        
                   
    </body>
</html>