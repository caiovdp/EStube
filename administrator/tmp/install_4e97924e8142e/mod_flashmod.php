<?php 
/**
* The Flash Mod 
* @ version 1.0
* @ package mod_flashmod
* @ Released under GNU/GPL License - http://www.gnu.org/copyleft/gpl.htm
* @ copyright (C) 2005 by Michael Carico - All rights reserved
* @ website http://www.kabam.net
**/

# Don't allow direct acces to the file
  defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

# Ensure access to core functions
  global $mainframe;

#--------------------------------------
# Parameters
#--------------------------------------
$fm_path    = $params->def('fm_path','images/flash/');
$fm_source  = $params->def('fm_source','');
$fm_width   = $params->def('fm_width','');
$fm_height  = $params->def('fm_height','');
$fm_version = $params->def('fm_version','6.0.29.0');
$fm_quality = $params->def('fm_quality','high');


echo "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"";
echo "codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=".$fm_version."\""; 
echo " width=\"".$fm_width."\""; 
echo " height=\"".$fm_height."\">";
echo " <param name=\"movie\" value=\"".$fm_path.$fm_source."\"/>";
echo " <param name=\"quality\" value=\"".$fm_quality."\" />";
echo "<embed src=\"".$fm_path.$fm_source."\""; 
echo " quality=\"".$fm_quality."\"";
echo " pluginspage=\"http://www.macromedia.com/go/getflashplayer\""; 
echo " type=\"application/x-shockwave-flash\"";
echo "width=\"".$fm_width."\""; 
echo "height=\"".$fm_height."\"";
echo "></embed>";
echo "</object>";
?>