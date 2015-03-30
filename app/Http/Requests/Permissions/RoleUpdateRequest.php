<?php namespace TagProNews\Http\Requests\Permissions;

use TagProNews\Http\Requests\Request;

class RoleUpdateRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->userHasPermission('admin.roles.update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'parent' => 'exists:roles,id',
            'group' => 'exists:groups,id'
        ];
    }

}
