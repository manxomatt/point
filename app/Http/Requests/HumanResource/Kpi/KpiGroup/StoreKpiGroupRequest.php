<?php

namespace App\Http\Requests\HumanResource\Kpi\KpiGroup;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreKpiGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name' => [
                'required',
                'unique:tenant.kpi_groups,name,NULL,id,kpi_id,'.$request->get('kpi_id'),
            ],
        ];
    }
}
