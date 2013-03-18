<?php
//load the required files

OCP\Util::addscript( 'user_photo', 'user_photo');
OCP\Util::addstyle( 'user_photo', 'styles');
OCP\App::registerPersonal('user_photo','index');
