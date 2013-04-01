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

$user = isset($_GET['user']) ? $_GET['user'] : '';

$query = OCP\DB::prepare("SELECT configvalue FROM *PREFIX*preferences WHERE userid = ? AND appid = ? AND configkey = ? LIMIT 1");
$result = $query->execute(array($user,'photo','path'))->fetchAll();

if (count($result) > 0) {
    $path = $result[0]['configvalue'];
}

$image = new \OC_Image ;
$result = $image->load($path);

if (!$result) {
    $image->load('apps/user_photo/img/photo.jpg');
}

return $image->show();
