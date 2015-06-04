<?php namespace TagProNews\Http\Controllers\Admin\Permissions;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use TagProNews\Http\Requests;
use TagProNews\Http\Controllers\Controller;
use TagProNews\Http\Requests\Permissions\RoleCreateRequest;
use TagProNews\Http\Requests\Permissions\RoleDeleteRequest;
use TagProNews\Http\Requests\Permissions\RoleListRequest;
use TagProNews\Http\Requests\Permissions\RoleUpdateRequest;
use TagProNews\Models\Group;
use TagProNews\Models\Role;

class RoleController extends Controller
{

    /**
     * Set up middleware
     */
    public function __construct()
    {
        $this->middleware('v1');

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param RoleListRequest $request
     * @param Group $group
     * @return Response
     */
    public function index(RoleListRequest $request, Group $group)
    {
        $roles = $group->roles()->get();

        return $this->setMeta(['count' => count($roles)])
            ->transform('Permissions\RoleTransformer', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleCreateRequest $request
     * @param $group
     * @return Response
     */
    public function store(RoleCreateRequest $request, Group $group)
    {
        try {
            $group->roles()->create([
                'name' => $request->input('name'),
                'inherits_from' => $request->input('parent')
            ]);
        } catch (QueryException $e) {
            $this->error('Parent does not exist', 404);
        }

        return $this->code(204);
    }

    /**
     * Display the specified resource.
     *
     * @param RoleListRequest $request
     * @param $group
     * @param $role
     * @return Response
     */
    public function show(RoleListRequest $request, Group $group, Role $role)
    {
        return $this->transformItem('Permissions\RoleTransformer', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleUpdateRequest $request
     * @param $group
     * @param $role
     * @return Response
     */
    public function update(RoleUpdateRequest $request, Group $group, Role $role)
    {
        $role->name = $request->input('name');
        $role->parent = $request->input('parent', $role->inherits_from);
        $role->group_id = $request->input('group', $group->id);
        $role->save();

        return $this->code(204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoleDeleteRequest $request
     * @param $group
     * @param $role
     * @return Response
     */
    public function destroy(RoleDeleteRequest $request, Group $group, Role $role)
    {
        $role->delete();

        return $this->code(204);
    }

}
