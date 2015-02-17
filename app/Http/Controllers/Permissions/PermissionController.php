<?php namespace TagProNews\Http\Controllers\Permissions;

use Illuminate\Support\Facades\Response;
use TagProNews\Http\Requests;
use TagProNews\Http\Controllers\Controller;
use TagProNews\Http\Requests\Permissions\PermissionListRequest;
use TagProNews\Models\Permission;

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
    public function index(PermissionListRequest $request)
    {
        $permissions = Permission::all();

        return $this->transform('Permissions\PermissionTransformer', $permissions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show()
    {
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
