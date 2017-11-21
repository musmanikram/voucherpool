<?php

namespace App\Repositories;

use App\Repositories\Contracts\SpecialOfferRepository;
use App\Models\SpecialOffer;

class EloquentSpeicalOfferRepository extends AbstractEloquentRepository implements SpecialOfferRepository
{
	/**
	 * Model name
	 *
	 * @var string
	 */
	protected $modelName = SpecialOffer::class;


	public function save(array $data)
	{


		$data['percentage'] = number_format($data['percentage'], 2);
		print_r($data);
		$offer = parent::save($data);

		print_r($offer);
		echo $offer->id;
		exit;

		return $offer;
	}
}