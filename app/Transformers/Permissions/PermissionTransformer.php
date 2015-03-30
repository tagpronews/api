<?php namespace TagProNews\Transformers\Permissions;

use League\Fractal\TransformerAbstract;
use TagProNews\Models\Permission;

/**
 * Created by PhpStorm.
 * User: steve
 * Date: 29.01.15
 * Time: 21:42
 */
class PermissionTransformer extends TransformerAbstract
{

    /**
     * @param Permission $permission
     * @return array
     */
    public function transform(Permission $permission)
    {
        return [
            'name' => $permission->name,
            'display_name' => $permission->display_name,
            'created' => $permission->created_at,
            'updated' => $permission->updated_at
        ];
    }
}