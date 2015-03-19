=== giWeather ===
Contributors: GardaInformatica
Tags: weather, weather forecast, responsive, mobile ready, deferred load, open weather map, meteoam, meteo, multilanguage
Donate link: http://giweather.gardainformatica.it/
Requires at least: 3.5.1
Tested up to: 4.1.1
Stable tag: 1.1.0
License: GNU/GPL - http://www.gnu.org/licenses/gpl-3.0.html
License URI: http://giweather.gardainformatica.it/

giWeather is a Wordpress widget that shows the weather forecast with a clean, clear and responsive style inspired by Google.

== Description ==
giWeather is a Wordpress widget that shows the weather forecast with a clean, clear and responsive style inspired by Google.

Features:

  * Multiple weather forecast source: OpenWeatherMap (Worldwide), Meteo Aeronautica Militare (only Italy);
  * Many iconset (from near reality to flat icon): Iconvault Forecast (font), Meteocons (font/img) dark and light, gk4 (img), MeteoAM (img, external), OpenWeatherMap (img, external), Yahoo (img, external), Google (img, external);
  * Deferred load of module in order to speed up website loading;
  * Data cache for faster loading and reduce the demands on the forecast source;
  * Fully responsive - will adapt to any device;
  * Advanced touch / swipe support built-in;
  * Wind icons with intensity and direction;
  * Possibility to choose the time horizon of the forecast;
  * Possibility to show or hide the detail sections of the module: Locality, Date, Descriptive weather, Humidity , Pressure , Wind, Thumbnails Forecasts;
  * Multilanguage forecast descriptive text support (OpenWeatherMap): English, Russian, Italian, Spanish, Ukrainian, German, Portuguese, Romanian, Polish, Finnish, Dutch, French, Bulgarian, Swedish, Chinese Traditional, Chinese Simplified, Turkish, Croatian, Catalan;
  * Browser support: Firefox, Chrome, Safari, iOS, Android, IE.
  * Highly customizable with CSS;


== Installation ==
You can either install it automatically from the WordPress admin, or do it manually.

Install from WordPress admin:

   1. In the administrative interface of Wordpress go to **Plugin > Add New**;
   2. Search **giWeather** and choose **Install now**;
   3. Activate the plugin;
   4. Click on **Appearance > Widgets** from the main navigation menu in your Dashboard;
   5. Add giWeather widgets from the Available Widgets section by dragging it to the Sidebar you want to customize;
   6. Configure the widget and save it. 

OR
   
Install manually:

   1. Unzip the archive and put the giweather folder into your plugins folder (/wp-content/plugins/).
   2. In the administrative interface of Wordpress go to **Plugin** and activate giWeather;
   3. Click on **Appearance > Widgets** from the main navigation menu in your Dashboard;
   4. Add giWeather widgets from the Available Widgets section by dragging it to the Sidebar you want to customize;
   5. Configure the widget and save it. 


== Frequently Asked Questions ==

= How can I find an OpenWeatherMap Locality Id of a country or city? =

1. Go to http://openweathermap.org/find
2. Search for your city;
3. Click the result correpondig to your city;
4. The ID is the last part of the url. Eg. If the url is http://openweathermap.org/city/3181554 then the corresponding ID is 3181554.

= How can I find a MeteoAM Locality Id of an Italian city? =

1. Go to http://www.meteoam.it/meteoam/?regione=italia×pread=prev
2. Search for your city;
3. Click the result correpondig to your city;
4. The ID is the last part of the url. Eg. If the url is http://www.meteoam.it/meteoam/?q=ta/previsione/91/BRESCIA then the corresponding ID is 91/BRESCIA.

= How can I place giWeather inside an article or page of Wordpress ? =

You can use the plugin https://wordpress.org/plugins/amr-shortcode-any-widget/

== Screenshots ==

== Changelog ==

= 1.1.0 =
 * First Release of Wordpress version;
 * Added complete Dutch (NL) language thanks to Bert Lammerts van Bueren www.webdiezain.nl
 * Added frontend language: Russian, Spanish, Ukrainian, German, Portuguese, Romanian, Polish, Finnish, French, Bulgarian, Swedish, Chinese Traditional, Chinese Simplified, Turkish, Croatian, Catalan;

= 1.0.0 =
 * First Release (only Joomla)


== Upgrade Notice ==

= 1.1.0 =
This version of giWeather adds support for various languages.