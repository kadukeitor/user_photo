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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

OCP\JSON::checkLoggedIn();
OCP\JSON::checkAppEnabled('user_photo');
OCP\JSON::callCheck();

$exist = OC_Preferences::getValue( OCP\USER::getUser() , 'photo', 'path' );

if ($exist) {
    OC_Preferences::deleteKey( OCP\USER::getUser() , 'photo', 'path');
    OCP\JSON::success(array('data' => array( 'webROOT' => OC::$WEBROOT , 'user' => OCP\USER::getUser() ,'message' => 'The photo has been deleted' )));
} else {
    OCP\JSON::error(array('data' => array( 'message' => 'This user does not have photo' )));
}
