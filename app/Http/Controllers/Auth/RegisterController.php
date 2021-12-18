<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    private function getRoute() {
        return '/';
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'profile_image' => ['string', 'max:255'],
            'self_introduction' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'age' => ['integer'],
            'sex' => ['required','string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     *     /**
     **/
     
    protected function create(array $data)
    {
        ### ローカルストレージに画像をアップロード ###
        // 画像のファイル名の設定と、画像のアップロード
        if(!isset($data['profile_image'])) {
            $fileName = 'default.png';
        } else {
            $file = $data['profile_image'];
            $fileName = time() . '.' . $file->getClientOriginalName();
            $target_path = public_path('/images/profile/');
            $file->move($target_path,$fileName);
        }

        //ユーザーの新規登録
        $user = User::create([
            'name' => $data['name'],
            'profile_image' => $fileName,
            'self_introduction'=>$data['self_introduction'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'age' => $data['age'],
            'sex' => $data['sex']
        ]);

        toastr()->success('ユーザー登録が完了しました');

        return $user;
    }
}
