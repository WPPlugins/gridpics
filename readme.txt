=== GridPics ===
Contributors: konduit
Donate link: http://nickgrant.io/
Tags: gallery
Requires at least: 3.0.1
Tested up to: 3.9
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

GridPics allows you to upload pictures, and display them randomly in a responsive grid

== Description ==

GridPics allows you to upload pictures, and display them in a responsive grid using shortcodes.
The default shortcode is [gridpics] and will render a 4x4 grid.

There are also a few other options for your shortcodes. The possible options for your shortcode are:

*   rows: The number of rows your grid will contain. Defaults to 4
*   columns: The number of columns your grid will contain. Defaults to 4
*   random: By setting this to false, GridPics will load your images by the date they were added, instead of in a random order. Defaults to true
*   caption: Tells GridPics to include the title of the image as a caption. Possible values are: left, right, top, bottom, inner-top, and inner-bottom. Defaults to false


== Installation ==

Manual Installation:

1. Unzip GridPic.zip
2. Upload `GridPics` folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. Place the [gridpics] shortcode on your site

From WordPress

1. From WordPress dashboard, select Plugins->Add New
2. Search for `GridPics`
3. Click `Install Now`
4. Activate the plugin through the 'Plugins' menu in WordPress
5. Place the [gridpics] shortcode on your site

== Frequently Asked Questions ==

= My pictures don't form a complete grid =

GridPics loads as many pictures as it can to fill out your grid, if you have not uploaded enough pictures, GridPics cannot fill out your grid completely.

= What options does the shortcode provide? =

The possible options for your shortcode are:

*   rows: The number of rows your grid will contain. Defaults to 4
*   columns: The number of columns your grid will contain. Defaults to 4
*   random: By setting this to false, GridPics will load your images by the date they were added, instead of in a random order. Defaults to true
*   caption: Tells GridPics to include the title of the image as a caption. Possible values are: left, right, top, bottom, inner-top, and inner-bottom. Defaults to false

= Can I change how it is styled? = 

If you include a file in your template root called gridpics.css that file will be loaded instead of the default gridpics.css file included in the plugin.
This will allow you to modify the css as you see fit. However, most of the sizing is handled by javascript.

== Screenshots ==

1. The GridPics edit screen
2. A view of all upload pictures into GridPics
3. The output of [gridpics rows="2" columns="2"]

== Changelog ==

= 1.1 =
* Added in ability to load in non-random order
* Added in ability to include captions with images
* Fixed small bug caused by custom loop
* Added check to see if CPT class was already definied.

= 1.0 =
* Initial Version