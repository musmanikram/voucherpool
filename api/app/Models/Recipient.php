<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'recipients';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email'];

	/**
	 * Get the vouchers for a user.
	 */
	public function vouchers()
	{
		return $this->hasMany(VoucherCode::class, 'fk_receipent_id', 'id');
	}
}
