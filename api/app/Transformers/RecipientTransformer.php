<?php

namespace App\Transformers;

use App\Models\Recipient;
use League\Fractal\TransformerAbstract;

class RecipientTransformer extends TransformerAbstract
{
	public function transform(Recipient $recipient)
	{
		$vouchers = [];
		foreach ($recipient->vouchers as $voucher){
			$vouchers[] =  ['code'          => $voucher->code,
			                'expiry_date'   => (string) $voucher->expire_dtm,
			                'is_used'       => $voucher->is_used,
			];
		}

		$formattedRecipient = [
			'id'                    =>  $recipient->id,
			'name'                  =>  $recipient->name,
			'email'                 =>  $recipient->email,
			'createdAt'             =>  (string) $recipient->created_at,
			'updatedAt'             =>  (string) $recipient->updated_at,
			'vouchers'              =>  $vouchers
		];

		return $formattedRecipient;
	}
}