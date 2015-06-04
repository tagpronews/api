<?php namespace TagProNews\Http\Controllers\Admin\Permissions;

use Illuminate\Support\Facades\Response;
use TagProNews\Http\Requests;
use TagProNews\Http\Controllers\Controller;
use TagProNews\Http\Requests\Permissions\PermissionCreateRequest;
use TagProNews\Http\Requests\Permissions\PermissionListRequest;
use TagProNews\Models\Group;
use TagProNews\Models\Permission;
use TagProNews\Models\Role;

class PermissionController extends Controller
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
     * @param PermissionListRequest $request
     * @return Response
     */
    public function index(PermissionListRequest $request, Group $group, Role $role)
    {
        $permissions = $role->permissions();

        return $this->transform('Permissions\PermissionTransformer', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionCreateRequest $request
     * @return Response
     */
    public function store(PermissionCreateRequest $request, Group $group, Role $role)
    {
        $permission = new Permission;
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');

        $role->permissions()->save($permission);

        return $this->code(204);
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show(Group $group, Role $role, Permission $permission)
    {
        return $this->transformItem('Permissions\PermissionTransformer', $permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update()
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy()
    {
    }

}
