<?php
declare(strict_types=1);

namespace App\Policy;
use App\Model\Table\PeticionesTable;
use Authorization\IdentityInterface;

/**
 * Peticiones policy
 */
class PeticionesTablePolicy
{
    public function canAdmin(IdentityInterface $user)
    {
        if($user['role']=='admin')return true;
        return false;
    }
}
