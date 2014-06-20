<?php

require_once __DIR__ . '/../Entities/User.php';
require_once __DIR__ . '/../Entities/Address.php';

require_once __DIR__ . '/../Service/Log/Logger.php';
require_once __DIR__ . '/../Service/Log/LoggerProxy.php';

require_once __DIR__ . '/../Service/Download/Adapter/AdapterInterface.php';
require_once __DIR__ . '/../Service/Download/Adapter/Ftp.php';
require_once __DIR__ . '/../Service/Download/Manager.php';

require_once __DIR__ . '/../Service/Mail/AbstractMail.php';