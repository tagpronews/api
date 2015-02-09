<?php namespace TagProNews\Transformers\Permissions;

use League\Fractal\TransformerAbstract;
use TagProNews\Models\Group;
use TagProNews\Models\Role;
use TagProNews\Transformers\BasicTransformer;

/**
 * Created by PhpStorm.
 * User: steve
 * Date: 29.01.15
 * Time: 21:42
 */
class RoleTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['inherits_from', 'permissions'];

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

    public function includeInheritsFrom(Role $role)
    {
        $name = $role->inherits()->first();

        if (is_null($name)) {
            return $this->item(['name' => null], new BasicTransformer);
        }

        return $this->item(['name' => $name->name], new BasicTransformer);
    }

    public function includePermissions(Role $role)
    {
        $permissions = $role->permissions;

        return $this->collection($permissions, new PermissionTransformer);
    }
}