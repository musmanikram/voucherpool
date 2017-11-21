<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use App\Repositories\Contracts\RecipientRepository;
use Illuminate\Http\Request;

use App\Transformers\RecipientTransformer;


class RecipientsController extends Controller
{

	use ResponseTrait;

	/**
	 * Instance of UserRepository
	 *
	 * @var UserRepository
	 */
	private $recipientRepository;

	/**
	 * Instanceof UserTransformer
	 *
	 * @var UserTransformer
	 */
	private $recipientTransformer;


	/**
	 * RecipientsController constructor.
	 *
	 * @param RecipientRepository $recipientRepository
	 * @param RecipientTransformer $recipientTransformer
	 */
	public function __construct(RecipientRepository $recipientRepository, RecipientTransformer $recipientTransformer)
	{
		$this->recipientRepository = $recipientRepository;
		$this->recipientTransformer = $recipientTransformer;

		parent::__construct();
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	    $recipients = $this->recipientRepository->findBy($request->all());
    	//$recipients = Recipient::all();

	    return $this->respondWithCollection($recipients, $this->recipientTransformer);
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
		    'name' => 'required|max:255',
		    'email' => 'required|email|unique:recipients|max:255',
	    ]);

	    if ($validatorResponse !== true) {
		    return $this->sendInvalidFieldResponse($validatorResponse);
	    }

	    $recipient = new Recipient;
	    $recipient->name = $request->input('name');
	    $recipient->email = $request->input('email');

	    if (!$recipient->saveOrFail()) {
		    return response()->json(['message' => "Error occurred on creating user"], 500);
	    }

	    return response()->json(['data' => ['id' => $recipient->id, 'name' => $recipient->name]], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
	    $recipient = Recipient::find($id);

	    if (!$recipient instanceof Recipient) {
		    return $this->sendNotFoundResponse("The recipient with id {$id} doesn't exist");
	    }
	    return $this->respondWithItem($recipient, $this->recipientTransformer);
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
