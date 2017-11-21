<?php

namespace App\Http\Controllers;

use App\Models\SpecialOffer;
use App\Repositories\Contracts\SpecialOfferRepository;
use App\Transformers\SpecialOfferTransformer;
use Illuminate\Http\Request;

class SpecialOffersController extends Controller
{

	use ResponseTrait;

	/**
	 * Instance of UserRepository
	 *
	 * @var UserRepository
	 */
	private $specialOfferRepository;

	/**
	 * Instanceof UserTransformer
	 *
	 * @var UserTransformer
	 */
	private $specialOfferTransformer;


	/**
	 * RecipientsController constructor.
	 *
	 * @param RecipientRepository $recipientRepository
	 * @param RecipientTransformer $recipientTransformer
	 */
	public function __construct(SpecialOfferRepository $specialOfferRepository, SpecialOfferTransformer $specialOfferTransformer)
	{
		$this->specialOfferRepository = $specialOfferRepository;
		$this->specialOfferTransformer = $specialOfferTransformer;

		parent::__construct();
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    $offers = $this->specialOfferRepository->findBy($request->all());

	    return $this->respondWithCollection($offers, $this->specialOfferTransformer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $validatorResponse = $this->validateRequest($request, [
		    'offer_name' => 'required|max:255',
		    'expiry' => 'required|date_format:"Y-m-d"',
		    'percentage' => 'required|numeric|between:0.00,100.00'

	    ]);

	    if ($validatorResponse !== true) {
		    return $this->sendInvalidFieldResponse($validatorResponse);
	    }

	    $specialOffer = $this->specialOfferRepository->save($request->all());

	    if (!$specialOffer instanceof SpecialOffer) {
		    return $this->sendCustomResponse(500, 'Error occurred on creating User');
	    }

	    return $this->setStatusCode(201)->respondWithItem($specialOffer, $this->specialOfferTransformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
