<?php

// Is required in autoload.php

declare(strict_types=1);

// This file contains a list of global configuration settings.

return [
    'title'         => 'Project',
    'database_path' => sprintf('sqlite:%s/database/picturethis.db', __DIR__),
];
