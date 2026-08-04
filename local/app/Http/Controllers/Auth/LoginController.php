<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

// ford
use Illuminate\Http\Request;
use Session;
// End ford

use Socialite;
use App\User;
use App\SocialAccounts;
use DB;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Social Login
     */
    public function redirectToProvider($provider = 'facebook')
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = 'facebook')
    {
        $providerUser = Socialite::driver($provider)->stateless()->user();
        
        $member_id = $this->createOrGetUser($provider, $providerUser);

        //dd(redirect()->to('/session_facebook/'.Session::get('member_id')));

        return redirect()->to('/index/'.$member_id);
    }

    public function createOrGetUser($provider, $providerUser)
    {

        //dd($providerUser['email']);
        
        $check_login_facebook = DB::table('lv_member')
            ->where('member_email', '=', $providerUser['email'])
            ->first();

        if(!empty($check_login_facebook)) {
            // update

            $data = array(
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_member')
                ->where('member_email', '=', $check_login_facebook->member_email)
                ->update($data);

            //Session::put('member_id', $check_login_facebook->member_id);

            $member_id = $check_login_facebook->member_id;

        } else {
            // insert

            $data = array(
                'member_name' => $providerUser['name'],
                'member_email' => $providerUser['email'],
                'member_datetime_create' => date('Y-m-d H:i:s'),
                'member_ip_create' => $_SERVER['REMOTE_ADDR'],
                'member_datetime_update' => date('Y-m-d H:i:s'),
                'member_ip_update' => $_SERVER['REMOTE_ADDR']
            );

            DB::table('lv_member')
                ->insert($data);

            $last_member = DB::table('lv_member')
                ->orderBy('member_id', 'desc')
                ->first();

            $member_id = $last_member->member_id;

            /*if(!empty($last_member)) {
                Session::put('member_id', $last_member->member_id);
            }*/
        }

        return $member_id;

        /*$account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->id)
            ->first();
        
        if (!empty($account)) {
            return $account->user;
        } else {

            $userDetail = Socialite::driver($provider)->userFromToken($providerUser->token);

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider,
            ]);

            $email = !empty($providerUser->getEmail()) ? $providerUser->getEmail() : $providerUser->getId() . '@' . $provider . '.com';

            if (auth()->check()) {
                $user = auth()->user();
            }else{
                $user = User::whereEmail($email)->first();
            }
            
            if(!empty($user)) {
                
                $image = $provider . "_" . $providerUser->getId() . ".png";
                $imagePath = public_path(config('app.media.directory') . "users/avatar/" . $image);
                file_put_contents($imagePath, file_get_contents($providerUser->getAvatar()));


                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'username' => $providerUser->getId(),
                    //'avatar' => $image,
                    'password' => bcrypt(rand(1000, 9999)),
                ]);

            }

            $account->user()->associate($user);
            $account->save();

            return $user;
            
        }*/
    }
}
