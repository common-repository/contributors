=== SX Welcome Pages ===
Plugin Name:  SX Welcome Pages
Version:      0.0.4
Plugin URI:   https://www.seomix.fr
Description:  A WordPress plugin to display a welcome page with quick actions and a list of website contributors.
Usage: No configuration necessary. Upload, activate and done.
Availables languages : en_EN, fr_FR
Tags: login, community, members, users, welcome page
Author: confridin
Author URI: https://www.seomix.fr
Contributors: confridin, willybahuaud, seomix
Requires at least: 4.4
Tested up to: 6.5
Stable tag: trunk
License: GPL v3

SX Welcome Pages is a WordPress plugin to display a welcome page for user, with quick actions and the list of all website contributors.

== Description ==

SX Welcome Pages is a WordPress plugin to display an admin page showing all contributors. After user login, he will be redirected to a welcome page with quick actions (add new post, edit my profil...) an another tab with a list of all WordPress contributors.

This plugin is a use case to show what can be done in order to create a community. It can also be used as a member directory basis.

Feel free to contribute on BitBucket : <a href="https://bitbucket.org/seomix/contributors">https://bitbucket.org/seomix/contributors</a>

Created by Daniel Roch (you can contact me on <a href="http://www.seomix.fr">SeoMix</a>).

== Installation ==

No configuration is necessary. Upload, activate and done.

== Screenshots ==

1. Main admin page for Contributors Plugin
2. Second page showing active users

== Changelog ==

= 0.0.4bis =

* Plugin name changed from "Contributors" to "SX Welcome Pages"

= 0.0.4 =

* traduction fixes

= 0.0.3 =

* use admin-home-data as header for both tabs… 
* devs can filter roles with hook seomix.contributors.roles
* devs can add tabs with hook seomix.contributors.pages
* devs can add actions with hook seomix.contributors.actions
* use esc_html, sprintf and _n for text strings (and translation…)

All 0.0.3 updates from Willy Bahuaud (thanks)


= 0.0.2 =
* translation ready
* better french translation ("plugin" => "extension")
* adding post number
* reduce description length if user description is too long
* order change : users are now listed with Post Count DESC

= 0.0.1 =
* first release

== Frequently Asked Questions ==

= Do I need to do anything else for this to work? =

No : just install it ;)