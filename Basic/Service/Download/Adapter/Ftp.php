<?php
namespace Download\Adapter;

use User;

class Ftp implements AdapterInterface
{
    public function download($file, User $user)
    {
        // Check permissions to determine if user can download that file.
        // Logic to download the file //
        return $file;
    }
} 