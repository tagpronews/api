<?php namespace TagProNews\Http\Requests\Permissions;

use TagProNews\Http\Requests\Request;

class PermissionListRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->userHasPermission('admin.permissions.read');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }

}
