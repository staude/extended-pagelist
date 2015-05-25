=== Extended Pagelist ===
Contributors:f.staude
Donate link: http://www.staude.net/donate
Tags: page, list, subpages, siblings, pagelist
Requires at least: 3.0
Tested up to: 4.2
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

List subpages and siblings via shortcode, flexible output via templates

== Description ==

English:

This WordPress plugin list subpages and sliblings from a page via shortcode and supports templates for the list.


Deutsch:

Dieses WordPress Plugin listet Unterseiten bzw Geschwisterseiten einer Seite mit Hilfe eines Shortcodes auf.
Es werden Tempaltes für die Gestaltung unterstützt.

== Installation ==

English:

1. Install the plugin from within the Dashboard or upload the directory `extended-pagelist` and all its contents to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the plugin. Now you have some new shortcodes to use.

Deutsch:

1. Installiere das Plugin über den Plugin Dialag von WordPress oder lade das Verzeichnis 'extended-pagelist' und all seinen Inhalt in das Pluginverzeichnis deiner WordPress installaion (normalerweise /wp-content/plugins ) hoch.
2. Aktiviere das Plugin über das Pluginmeü in WordPress
3. Benutze das Plugin.  Nun stehe  die neuen Shortcodes zur Verfügung

== Frequently Asked Questions ==

English:
= Can i use my own templates? =

Yes

= Can i use a other named directory for my templates? =

Yes, use the filter hook 'extended_pagelist_template_folder' to change the directory



Deutsch:

= Kann ich eigene Templates verwenden? =

Ja. Standardmäßig sucht das Plugin innerhalb des aktiven Themes in einem Ordner 'epl-templates' nach einen Unterordner mit dem Templatenamen. Der Ordnername kann über den Filter 'extended_pagelist_template_folder' geändert werden.
Innerhalb des Templateverzeichnisses werden 3 Dateien benötigt.

open.php - der Inhalt dieser Datei wird einmalig zu Begin der Liste ausgegeben.

content.php - der Inalt dieser Datei wird für jedes Listenelement verwendet.

close.php - der Inahlt dieser Datei wird einmalig am Ende der Liste ausgegeben.

Wird die Liste rekursiv verwendet, werden diese 3 Dateien für innerhalb jedes Knotens innerhalb des Baums verwendet.

Für ein Template 'MeinTemplate' sähe die Dateistruktur folgenmdermaßen aus.

+ wp-content
  + themes
    + aktivesTheme
      + epl-templates
        + MeinTemplate
          + open.php
          + content.php
          + close.php

Der Aufruf wäre dann Beispielhalt [ pagelist template='MeinTemplate' ]


= Kann ich einen anders benanntes Verzeichnis für meine Templates verwenden? =

Ja, verwende dazu den Filter Hook 'extended_pagelist_template_folder'.




= Filter =

Folgende Filter stehen bereit um das Plugin zu manipulieren.

- extended_pagelist_translationpath

Beinhaltet den Namen des Verzeichnisses aus dem die Übersetzungsdateien geladen werden. Wenn eigene Übersetzungen aus anderen Verzeichnissen verwendet werden sollen, kann der Pfad über diesen Filter geändert werden.


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

