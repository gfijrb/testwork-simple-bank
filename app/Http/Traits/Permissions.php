<?php

namespace App\Http\Traits;

/**
 * Trait Permissions
 * @package App\Http\Traits
 */
trait Permissions
{
    // UserPermissions
    /**
     * Can user transfer balance
     * @param int $status
     * @return bool
     */
    public function canTransfer(int $status):bool
    {
        if(1 === $status) return true;
        return false;
    }

    /**
     * @param int $level
     * @return bool
     */
    public function isBank(int $level):bool
    {
        if(1 === $level) return true;
        return false;
    }

}
