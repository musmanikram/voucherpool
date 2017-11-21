<?php

namespace App\Repositories;

use App\Repositories\Contracts\RecipientRepository;
use App\Repositories\Contracts\UserRepository;
use App\Models\Recipient;
use Illuminate\Support\Facades\Hash;

class EloquentRecipientRepository extends AbstractEloquentRepository implements RecipientRepository
{
	/**
	 * Model name
	 *
	 * @var string
	 */
	protected $modelName = Recipient::class;
}