<?php //app/Providers/RepositoriesServiceProvider.php

namespace App\Providers;

use App\Repositories\Contracts\SpecialOfferRepository;
use App\Repositories\EloquentSpeicalOfferRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\RecipientRepository;
use App\Repositories\EloquentRecipientRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(RecipientRepository::class, EloquentRecipientRepository::class);

		$this->app->bind(SpecialOfferRepository::class, EloquentSpeicalOfferRepository::class);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [
			RecipientRepository::class,
			SpecialOfferRepository::class
		];
	}
}