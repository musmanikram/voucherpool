<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SpecialOffer extends Model
{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'special_offers';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	protected $fillable = ['offer_name'];

	/**
	 * Get the vouchers for the special offer.
	 */
	public function vouchers()
	{
		return $this->hasMany(VoucherCode::class, 'foreign_key', 'fk_specialoffer_id');
	}

	/**
	 * Get the users for the special offer.
	 */
	public function receipents()
	{
		return $this->hasMany(Recipient::class, 'foreign_key', 'fk_receipent_id');
	}
}
