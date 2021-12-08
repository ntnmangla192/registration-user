<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function loginPage(Request $request)
    {
        return view('login');
    }
    public function loginUser(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken($request->email)->accessToken;

            if ($request->path()=='api/login')
            {
                return response()->json(['token' => $token->token], 200);
            }else
            {
                return view('home');
            }


        } else {

            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }
}
