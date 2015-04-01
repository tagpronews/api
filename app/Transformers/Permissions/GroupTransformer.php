<?php namespace TagProNews\Transformers\Permissions;

use League\Fractal\TransformerAbstract;
use TagProNews\Models\Group;

/**
 * Created by PhpStorm.
 * User: steve
 * Date: 29.01.15
 * Time: 21:42
 */
class GroupTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['roles'];

    /**
     * @param Group $group
     * @return mixed
     * @internal param $item
     */
    public function transform(Group $group)
    {
        return [
            'name' => $group->name,
            'created' => $group->created_at,
            'updated' => $group->updated_at
        ];
    }

    public function includeRoles(Group $group)
    {
        $roles = $group->roles()->get();

        return $this->collection($roles, new RoleTransformer);
    }
}