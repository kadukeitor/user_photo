<?php

    OCP\App::checkAppEnabled('user_photo');

    $tmpl = new OCP\Template('user_photo', 'settings');

    $tmpl->assign('webROOT', OC::$WEBROOT );
    $tmpl->assign('user',OCP\USER::getUser());

    return $tmpl->fetchPage();

    
    
    
    