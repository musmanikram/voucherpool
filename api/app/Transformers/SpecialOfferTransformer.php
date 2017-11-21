<?php

namespace App\Transformers;

use App\Models\SpecialOffer;
use League\Fractal\TransformerAbstract;

class SpecialOfferTransformer extends TransformerAbstract
{
	public function transform(SpecialOffer $offer)
	{

		$formattedOffer = [
			'id'                    =>  $offer->id,
			'name'                  =>  $offer->offer_name,
			'percentage'            =>  $offer->percentage,
			'createdAt'             =>  (string) $offer->created_at

		];

		return $formattedOffer;
	}
}