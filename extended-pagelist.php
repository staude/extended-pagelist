<?php
/*
Plugin Name: Extended Pagelist
Plugin URI:  http://staude.net/wordpress/extended-pagelist/
Description: List subpages and siblings from pages via shortcode
Author: Frank Staude
Version: 0.1
Text Domain: extended-pagelist
Domain Path: languages
Author URI: http://www.staude.net/
Compatibility: WordPress 4.2
*/

/*  Copyright 2014-2015  Frank Staude  (email : frank@staude.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (!class_exists( 'extended_pagelist' ) ) {

    include_once dirname( __FILE__ ) .'/class-extended-pagelist.php';

    $extended_pagelist = new extended_pagelist();
}
