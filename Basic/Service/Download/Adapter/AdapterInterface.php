<?php
namespace Download\Adapter;

use User;

interface AdapterInterface
{
    /**
     * @param $file
     * @param User $user
     * @return string
     */
    public function download($file, User $user);
}