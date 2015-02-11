<?php namespace TagProNews\Http\Controllers\Permissions;

use TagProNews\Http\Requests;
use TagProNews\Http\Controllers\Controller;

use Illuminate\Http\Request;
use TagProNews\Http\Requests\Permissions\GroupCreateRequest;
use TagProNews\Http\Requests\Permissions\GroupListRequest;
use TagProNews\Models\Group;

class GroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param GroupListRequest $request
     * @return Response
     */
    public function index(GroupListRequest $request)
    {
        $groups = Group::all();

        return $this->transform('Permissions\GroupTransformer', $groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GroupCreateRequest $request
     * @return Response
     */
    public function store(GroupCreateRequest $request)
    {
        $group = new Group;
        $group->name = $request->input('name');
        $group->save();

        return $this->code(204);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(GroupListRequest $request, $id)
    {
        $group = Group::find($id);

        if (is_null($group)) {
            return $this->error('Group not found', 404);
        }

        return $this->transformItem('Permissions\GroupTransformer', $group);
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
