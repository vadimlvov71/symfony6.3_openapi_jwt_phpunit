<?php

// This file was generated by running "composer dump-env prod"

return array (
  'APP_ENV' => 'dev',
  'APP_SECRET' => 'cced317c23dbd19c40a526c1130925a3',
  'DATABASE_URL' => 'mysql://root:secret@mysql:3306/tasks',
  'MESSENGER_TRANSPORT_DSN' => 'doctrine://default?auto_setup=0',
  'MAILER_DSN' => 'null://null',
  'JWT_SECRET_KEY' => '%kernel.project_dir%/config/jwt/private.pem',
  'JWT_PUBLIC_KEY' => '%kernel.project_dir%/config/jwt/public.pem',
  'JWT_PASSPHRASE' => '26106394fe6146f0516c3c94c164bad2c2b8ec099dd5f7405267930199d2dd2a'
);
