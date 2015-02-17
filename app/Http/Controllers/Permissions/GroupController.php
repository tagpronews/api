<?php namespace TagProNews\Http\Controllers\Permissions;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Response;
use TagProNews\Http\Requests;
use TagProNews\Http\Controllers\Controller;
use TagProNews\Http\Requests\Permissions\GroupCreateRequest;
use TagProNews\Http\Requests\Permissions\GroupDeleteRequest;
use TagProNews\Http\Requests\Permissions\GroupListRequest;
use TagProNews\Http\Requests\Permissions\GroupUpdateRequest;
use TagProNews\Models\Group;

/**
 * Class GroupController
 * @package TagProNews\Http\Controllers\Permissions
 */
class GroupController extends Controller
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
     * @param GroupListRequest $request
     * @param $group
     * @return Response
     */
    public function show(GroupListRequest $request, Group $group)
    {
        return $this->transformItem('Permissions\GroupTransformer', $group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GroupUpdateRequest $request
     * @param $group
     * @return Response
     */
    public function update(GroupUpdateRequest $request, Group $group)
    {
        $group->name = $request->input('name');

        try {
            $group->save();
        } catch (QueryException $e) {
            return $this->error('Group already exists', 409);
        }

        return $this->code(204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GroupDeleteRequest $request
     * @param $group
     * @return Response
     */
    public function destroy(GroupDeleteRequest $request, Group $group)
    {
        $group->delete();

        return $this->code(204);
    }

}
