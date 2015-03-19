/**
 * @author     Garda Informatica <info@gardainformatica.it>
 * @copyright  Copyright (C) 2015 Garda Informatica. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-3.0.html  GNU General Public License version 3
 * @package    giWeather Joomla Extension
 * @link       http://www.gardainformatica.it
 */


function OnGIWAllSourceChange(){
	jQuery('.widget-giweather-start').each(function(){
		var widget=jQuery(this).parent();
		var source=jQuery('.giw-source',widget);
		var meteoam_id=jQuery('.giw-meteoam_id',widget);
		var owm_id=jQuery('.giw-owm_id',widget);
		var owm_lang=jQuery('.giw-owm_lang',widget);
		
		if (source.val()=='owm'){
			meteoam_id.closest('p').hide();
			owm_id.closest('p').show();
			owm_lang.closest('p').show();
		}else{
			meteoam_id.closest('p').show();
			owm_id.closest('p').hide();
			owm_lang.closest('p').hide();
		}
		
	});
}	


jQuery( document ).ready(function($) {
	OnGIWAllSourceChange();
	jQuery(document).ajaxSuccess(function(){
		OnGIWAllSourceChange();
	});
});
