<?php
namespace api;
session_start();
/* PHP SDK
 * @version 2.0.0
 * @author connect@qq.com
 * @copyright © 2013, Tencent Corporation. All rights reserved.
 */
define("QQ_CONNECT_SDK_ROOT",dirname(__FILE__)."/");
define("QQ_CONNECT_SDK_CLASS_PATH",QQ_CONNECT_SDK_ROOT."class/");
require_once(dirname(__FILE__)."/comm/config.php");
require_once(QQ_CONNECT_SDK_CLASS_PATH."QC.php");
