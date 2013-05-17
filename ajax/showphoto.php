<?php

/**
* ownCloud - user_photo
*
* @author Jorge Rafael García Ramos
* @copyright 2012 Jorge Rafael García Ramos <kadukeitor@gmail.com>
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library. If not, see <http://www.gnu.org/licenses/>.
*
*/

OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('user_photo');

$owner = OC_Util::sanitizeHTML($_GET['user']) ;
$img = OC_Preferences::getValue( $owner , 'photo', 'path' );

if ( $img ) {

if( strpos($img, 'http://www.gravatar.com/avatar/' ) === 0 ){
	header("Location:".$img);
exit();
}

$fileView = new \OC\Files\View('/' . $owner . '/files');
$mime = $fileView->getMimeType($img);

list($mimePart,) = explode('/', $mime);
if ($mimePart === 'image') {
$local = $fileView->getLocalFile($img);
$rotate = false;
if (is_callable('exif_read_data')) { //don't use OC_Image here, using OC_Image will always cause parsing the image file
$exif = @exif_read_data($local, 'IFD0');
if (isset($exif['Orientation'])) {
$rotate = ($exif['Orientation'] > 1);
}
}
if ($rotate) {
$image = new OC_Image($local);
$image->fixOrientation();
$image->show();
} else { //use the original file if we dont need to rotate, saves having to re-encode the image
header('Content-Type: ' . $mime);
readfile($local);
}
}

} else {

$local = OC_App::getAppPath('user_photo')."/img/photo.jpg";
$image = new OC_Image($local);
$image->show();

}











