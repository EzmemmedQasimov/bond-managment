<?php

namespace App\Http\Requests;

use App\Lib\Repositories\BondRepository;
use Illuminate\Contracts\Validation\Validator;

class PurchaseOrderRequest extends AuthorizedFormRequest
{

    public function __construct(private BondRepository $bondRepository)
    {
    }

    public function rules()
    {
        return [
            'order_date'                    =>  'required|date',
            'number_of_bonds_received'      =>  'required|numeric|gte:1',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator) {
                if ($this->order_date <= $this->bondRepository->selectById($this->route('id'))->issue_date) {
                    $validator->errors()->add(
                        'order_date',
                        'Order date must be greater than issue date.'
                    );
                }
                if ($this->order_date > $this->bondRepository->selectById($this->route('id'))->last_circulation_date) {
                    $validator->errors()->add(
                        'order_date',
                        'Order date must be less than last circulation date.'
                    );
                }
            }
        ];
    }
}
