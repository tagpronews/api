<?php namespace TagProNews\Http\Controllers\Permissions;

use Illuminate\Support\Facades\Response;
use TagProNews\Http\Requests;
use TagProNews\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TagProNews\Http\Requests\Permissions\RoleListRequest;
use TagProNews\Models\Group;
use TagProNews\Models\Role;

class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param RoleListRequest $request
     * @return Response
     */
    public function index(RoleListRequest $request, $group)
    {
        $group = Group::find($group);

        if (is_null($group)) {
            return $this->error('Group not found', 404);
        }

        $roles = $group->roles()->get();

        return $this->setMeta(['count' => count($roles)])
            ->transform('Permissions\RoleTransformer', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
