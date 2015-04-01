<?php namespace TagProNews\Http\Requests\Permissions;

use TagProNews\Http\Requests\Request;

class GroupCreateRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->userHasPermission('admin.groups.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:groups,name'
        ];
    }

}
