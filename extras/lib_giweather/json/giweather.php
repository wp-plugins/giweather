<?php defined('GIW_JEXEC') or die('Restricted access');

/**
 * @author     Garda Informatica <info@gardainformatica.it>
 * @copyright  Copyright (C) 2015 Garda Informatica. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html  GNU General Public License version 3
 * @package    giWeather Wordpress Widget
 * @link       http://www.gardainformatica.it
 */

/*

This file is part of "giWeather Wordpress Widget".

"giWeather Wordpress Widget" is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

"giWeather Wordpress Widget" is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with "giWeather Wordpress Widget".  If not, see <http://www.gnu.org/licenses/>.

*/

require_once GIW_PLUGIN_PATH . "extras/lib_giweather/json/helper.php";

$helper=new ModgiWeatherHelper();
$helper->CacheLifetime = $params->get("cache_lifetime", 60) * 60;  // Converte da minuti in secondi

$iconset=$params->get("iconset", "forecast_font");
$wind_iconset=$params->get("wind_iconset", "giweather");

list($forecast,$messages) = $helper->getList($params);

$html='';

if (empty($messages)){

ob_start();
?>

	<div class="giw-fc-current-city"><?php  echo $helper->gi_escape_html($forecast['text']);  ?></div>
	<div class="giw-fc-current-date"></div>
	<div class="giw-fc-current-desc"></div>

	<div class="giw-fc-current-main">
		<span class="giw-fc-current-icon">
		</span>
		
		<div class="giw-fc-current-temp">
			<div class="giw-fc-current-temp-val">
				<span class="giw-tc"></span>
				<span class="giw-tf"></span>
			</div>
			<div class="giw-ts-btns"><span class="giw-ts-btn giw-ts-btn-celsius giw-ts-btn-active">°C</span>|<span class="giw-ts-btn giw-ts-btn-fahrenheit">°F</span></div>	
		</div>
		
		<div class="giw-fc-current-right">
		
			<div class="giw-fc-current-text giw-fc-cur-humidity"><?php echo esc_html__("GIWEATHER_HUMIDITY",'giweather');?>: <span></span></div>		
			<div class="giw-fc-current-text giw-fc-cur-pressure"><?php echo esc_html__("GIWEATHER_PRESSURE",'giweather');?>: <span></span></div>		
			<div class="giw-fc-current-text giw-fc-cur-wind"><?php echo esc_html__("GIWEATHER_WIND",'giweather');?>: <span></span></div>		
			<div class="giw-btns">
				
				<div class="giw-btn giw-btn-clicked giw-btn-temp"><?php echo esc_html__("GIWEATHER_TEMPERATURE",'giweather');?></div>
				<div class="giw-btn giw-btn-notclicked giw-btn-wind"><?php echo esc_html__("GIWEATHER_WIND",'giweather');?></div>		
			
			</div>	
			
			
		</div>


		<div style="clear:both;"></div>


		<div class="giw-fc-thumb-list-pane">
			

		<div class="giw-fc-thumb-list-container"><!-- open container -->
		<div class="giw-fc-thumb-list">
		
		<?php
			
			$min_temp=100;
			$max_temp=-100;
			foreach ($forecast['forecasts'] as $fc){
				if ($fc['temp']<$min_temp){
					$min_temp=$fc['temp'];
				}
				if ($fc['temp']>$max_temp){
					$max_temp=$fc['temp'];
				}
			}
			$min_temp-=1.5;
			$max_temp+=1.5;
			
			foreach ($forecast['forecasts'] as $fc){
				if ($fc['dt']<time()){
					continue;
				}
				
				
		?><div class="giw-fc-thumb">
				<div class="giw-fc-thumb-day">
					<?php 
						echo date_i18n( "D, d H:i", $fc['dt'], false );
					?>
				</div>
				<div>
					<?php echo $helper->weather_icon($fc,$iconset);	?>
				</div>
				<div class="giw-fc-thumb-temp">
					<span class="giw-fc-thumb-perc-temp">
						<span class="giw-tc"><?php echo $helper->round($fc['perc_temp']);?>°</span>
						<span class="giw-tf"><?php echo $helper->round(9.0/5.0*$fc['perc_temp']+32);?>°</span>
					</span>
					<span class="giw-fc-thumb-act-temp">
						<span class="giw-tc"><?php echo $helper->round($fc['temp']);?>°</span>
						<span class="giw-tf"><?php echo $helper->round(9.0/5.0*$fc['temp']+32);?>°</span>
					</span>
				</div>
				<?php
					if (isset($fc['humidity'])){
						echo '<div class="giw-fc-thumb-humidity-val">'.$helper->gi_escape_html($fc['humidity'].'%').'</div>';
					}
					if (isset($fc['pressure'])){
						echo '<div class="giw-fc-thumb-pressure-val">'.$helper->gi_escape_html(round($fc['pressure'],2).' hpa').'</div>';
					}
					echo '<div class="giw-fc-thumb-wind-val">'.$helper->gi_escape_html($helper->round($fc['wind_kmh']).' km/h '.$fc['wind_dir']).'</div>';
				?>
				<div class="giw-fc-thumb-wind">
					<div>
						<?php echo $helper->wind_icon($fc,$wind_iconset);	?>
					</div>
					<div class="giw-fc-thumb-wind-speed">
						<?php 
						echo $helper->gi_escape_html($helper->round($fc['wind_kmh']).' km/h');
						?>
					</div>
				</div>
				
				<div class="giw-fc-thumb-temp-hist">
					<?php
					
						$percentual_temp= (100.0*($fc['temp']-$min_temp))/($max_temp-$min_temp);
					?>
				
					<div class="giw-fc-thumb-temp-hist-bar" style="height: <?php echo $percentual_temp;?>%;">
					</div>
				</div>
			</div><?php 
			}
		?>
						

		
		</div>
				
		</div><!-- close container-->

			<!-- Arrow Left -->
			<span class="giw-arrow giw-arrow-left jssora04l" style="width: 28px; height: 40px; top: 62px; left: -10px;"></span>
			<!-- Arrow Right -->
			<span class="giw-arrow giw-arrow-right jssora04r" style="width: 28px; height: 40px; top: 62px; right: -10px"></span>


		</div><!-- close pane -->

		
	</div>


<?php
$html = ob_get_contents();
ob_end_clean();

}

echo json_encode(array('html'=>$html,'messages'=>$messages));
