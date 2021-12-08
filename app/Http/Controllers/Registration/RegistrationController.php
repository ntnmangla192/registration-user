<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Services\Registration\RegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class RegistrationController extends Controller
{
    /**
     * @var RegistrationService
     */
    public $registrationService;

    /**
     * @param RegistrationService $registrationService
     */
    public function __construct(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('registration');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function registerUser(Request $request)
    {
        $isUserAlreadyExists = $this->registrationService->userEmailExists($request->email);
        if ($isUserAlreadyExists == true) {
            return trans('general.messages.errors.email_exists');
        }
        $user = $this->registrationService->saveUserDetails($request->all());


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where('email', $request->email)->first();
            $accessToken = $user->createToken($request->email)->accessToken;
            $user->access_token = $accessToken->token;
            $user->save();
        }
        if ($request->path() == "api/register") {
            return $user;
        } else {
            return view('home');
        }

    }

}
