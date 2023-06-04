<?php

use Libraries\Config;
use function DI\create;
use Libraries\SmsSender;
use Libraries\EmailSender;
use eftec\bladeone\BladeOne;
use Service\DatabaseService;

return [
	Config::class			=> create(Config::class),
	BladeOne::class			=> create(BladeOne::class)->constructor('../views', '../cache'),
	Notification::class		=> create(Notification::class)->constructor(new EmailSender(), new SmsSender()),
	'db'                    => DatabaseService::create()
];
