=== Extended Pagelist ===
Contributors:f.staude
Donate link: http://www.staude.net/donate
Tags: page, list, subpages,siblings, pagelist
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

List subpages and siblings via shortcode

== Description ==

English:

TO DO


Deutsch:

TO DO

== Installation ==

1. Install the plugin from within the Dashboard or upload the directory `extended-pagelist` and all its contents to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the plugin.

== Frequently Asked Questions ==

= Kann ich eigene Templates verwenden? =

Ja.

= Kann ich einen ander benanntes Verzeichnis für meine Templates verwenden? =

Ja.


= Filter =

Folgende Filter stehen bereit um das Plugin zu manipulieren.

- extended_pagelist_template_folder

Beinhaltet den Namen des Verzeichnises innerhalb des Themes/Childthemes unter dem die Themespezifische Themes für das Plugin gespeichert sind. Standardmäßig lautet der Name 'epl-templates'. Über diesen Filter kann der Verzeichnisname angepasst werden.

Wenn sie folgende Struktur haben

+wp-content
 + themes
   + yourTheme
     +pagelist_templates
       +mypagelist


Um einen Shortcode wie [pagelist template="mypagelist"]  ausführen zu können, kopieren sie folgenden Code in ihre  functions.php


function change_my_epl_template_folter( $folder ) {
    return ( 'pagelist_templates' );
}
add_filter( 'extended_pagelist_template_folder', 'change_my_epl_template_folder' );


= Ich habe eine neue Übersetzung fertiggestellt  =

Schick sie mir per e-mail an frank@staude.net, ich werde sie dann beim nächsten Update mit einbauen

= Ich habe einen Fehler gefunden  =

Bitte verwende den Issue-Tracker auf GitHub und trage dort einen Fehlerbericht ein.
https:github.com....

= Ich möchte eine neue Funktion vorschlage  =

Bitte verwende den Issue-Tracker auf GitHub und trage dort einen Wunsch als Featurerequest ein.
https:github.com....


== Changelog ==

= 0.1 =
First version.

