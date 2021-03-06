<?php
# -- BEGIN LICENSE BLOCK ----------------------------------
# This file is part of dcQRcode, a plugin for Dotclear 2.
# 
# Copyright (c) 2009-2011 JC Denis and contributors
# jcdenis@gdwd.com
# 
# Licensed under the GPL version 2.0 license.
# A copy of this license is available in LICENSE file or at
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
# -- END LICENSE BLOCK ------------------------------------

if (!defined('DC_CONTEXT_ADMIN')){return;}

dcQRcode::defineCachePath($core);

# Load _wigdets.php
require dirname(__FILE__).'/_widgets.php';

# Plugin menu
$_menu['Plugins']->addItem(
	__('QR code'),
	'plugin.php?p=dcQRcode','index.php?pf=dcQRcode/icon.png',
	preg_match('/plugin.php\?p=dcQRcode(&.*)?$/',$_SERVER['REQUEST_URI']),
	$core->auth->check('admin',$core->blog->id)
);

$core->addBehavior('adminDashboardFavs',array('dcQRcodeAdminBehaviors','dashboardFavs'));
 
class dcQRcodeAdminBehaviors
{
    public static function dashboardFavs($core,$favs)
    {
        $favs['qrcode'] = new ArrayObject(array(
            'qrcode',
            __('QR code'),
            'plugin.php?p=dcQRcode&amp;tab=create',
            'index.php?pf=dcQRcode/icon.png',
            'index.php?pf=dcQRcode/icon-big.png',
            'admin',
            null,
            null
		));
    }
}
?>