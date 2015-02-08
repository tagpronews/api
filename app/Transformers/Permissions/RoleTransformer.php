<?php namespace TagProNews\Transformers\Permissions;

use League\Fractal\TransformerAbstract;
use TagProNews\Models\Group;
use TagProNews\Models\Role;

/**
 * Created by PhpStorm.
 * User: steve
 * Date: 29.01.15
 * Time: 21:42
 */
class RoleTransformer extends TransformerAbstract
{
    /**
     * @param Role $role
     * @return array
     */
    public function transform(Role $role)
    {
        return [
            'name' => $role->name,
            'created' => $role->created_at,
            'updated' => $role->updated_at
        ];
    }
}