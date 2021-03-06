<?php

namespace App\Http\Controllers\Game;

use App\AuthServer;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthServerController extends Controller
{
    public function auth(){
        $launcheron = file_get_contents('php://input');
        $json = json_decode($launcheron, true);
        if (Auth::attempt(['email' => $json['username'], 'password' => $json['password']])) {
            if(Auth::user()->hasVerifiedEmail() !== FALSE) {
                $id = Auth::user()->id;
                $user = AuthServer::find($id);
                $access_token = bin2hex(openssl_random_pseudo_bytes(16));
                if(empty(AuthServer::where('uuid',$user->uuid)->value('client_token')) AND empty(AuthServer::where('uuid',$user->uuid)->value('access_token')) OR AuthServer::where('uuid',$user->uuid)->value('client_token') === $json['clientToken']){
                    if (isset($json['clientToken'])) {
                        $client_token = $json['clientToken'];
                    } else {
                        $client_token = bin2hex(openssl_random_pseudo_bytes(16));
                    }
                    $user->access_token = $access_token;
                    $user->client_token = $client_token;
                    $user->play_token = $access_token;
                    $user->save();

                    $response = array(
                        'accessToken' => $access_token,
                        'clientToken' => $client_token,
                    );
                    $response['selectedProfile'] = array(
                        'id' => AuthServer::where('client_token', $client_token)->value('uuid'),
                        'name' => Auth::user()->name
                    );
                    $response['availableProfiles'] = array(
                        array(
                            'id' => AuthServer::where('client_token', $client_token)->value('uuid'),
                            'name' => Auth::user()->name
                        )
                    );

                    if (isset($json['requestUser']) && $json['requestUser'] === true) {
                        $response['user'] = array(
                            'id' => AuthServer::where('client_token', $client_token)->value('uuid')
                        );
                    }
                    return response()->json($response);
                }

                if(empty(AuthServer::where('uuid',$user->uuid)->value('client_token_2')) AND empty(AuthServer::where('uuid',$user->uuid)->value('access_token_2')) OR AuthServer::where('uuid',$user->uuid)->value('client_token_2') === $json['clientToken']){
                    if (isset($json['clientToken'])) {
                        $client_token = $json['clientToken'];
                    } else {
                        $client_token = bin2hex(openssl_random_pseudo_bytes(16));
                    }
                    $user->access_token_2 = $access_token;
                    $user->client_token_2 = $client_token;
                    $user->play_token = $access_token;
                    $user->save();

                    $response = array(
                        'accessToken' => $access_token,
                        'clientToken' => $client_token,
                    );
                    $response['selectedProfile'] = array(
                        'id' => AuthServer::where('client_token_2', $client_token)->value('uuid'),
                        'name' => Auth::user()->name
                    );
                    $response['availableProfiles'] = array(
                        array(
                            'id' => AuthServer::where('client_token_2', $client_token)->value('uuid'),
                            'name' => Auth::user()->name
                        )
                    );

                    if (isset($json['requestUser']) && $json['requestUser'] === true) {
                        $response['user'] = array(
                            'id' => AuthServer::where('client_token_2', $client_token)->value('uuid')
                        );
                    }
                    return response()->json($response);
                }

                if(empty(AuthServer::where('uuid',$user->uuid)->value('client_token_3')) AND empty(AuthServer::where('uuid',$user->uuid)->value('access_token_3')) OR AuthServer::where('uuid',$user->uuid)->value('client_token_3') === $json['clientToken']){
                    if (isset($json['clientToken'])) {
                        $client_token = $json['clientToken'];
                    } else {
                        $client_token = bin2hex(openssl_random_pseudo_bytes(16));
                    }
                    $user->access_token_3 = $access_token;
                    $user->client_token_3 = $client_token;
                    $user->play_token = $access_token;
                    $user->save();

                    $response = array(
                        'accessToken' => $access_token,
                        'clientToken' => $client_token,
                    );
                    $response['selectedProfile'] = array(
                        'id' => AuthServer::where('client_token_3', $client_token)->value('uuid'),
                        'name' => Auth::user()->name
                    );
                    $response['availableProfiles'] = array(
                        array(
                            'id' => AuthServer::where('client_token_3', $client_token)->value('uuid'),
                            'name' => Auth::user()->name
                        )
                    );

                    if (isset($json['requestUser']) && $json['requestUser'] === true) {
                        $response['user'] = array(
                            'id' => AuthServer::where('client_token_3', $client_token)->value('uuid')
                        );
                    }
                    return response()->json($response);
                }
                if(!empty(AuthServer::where('uuid',$user->uuid)->value('access_token')) AND !empty(AuthServer::where('uuid',$user->uuid)->value('access_token_2')) AND !empty(AuthServer::where('uuid',$user->uuid)->value('access_token_3'))){
                    $error = array(
                        'error' => 'ForbiddenOperationException',
                        'errorMessage' => 'Too many aunthenticated devices! Remove one at platform site.'
                    );
                    echo json_encode($error);
                }
            }else{
                $error = array(
                    'error' => 'ForbiddenOperationException',
                    'errorMessage' => 'Please verify your E-Mail address before authenticate.'
                );

                echo json_encode($error);
            }
        }else{
            $error = array(
                'error' => 'ForbiddenOperationException',
                'errorMessage' => 'Invalid credentials. Invalid username or password.'
            );

            echo json_encode($error);
        }
    }

    public function refreshAuth(){
        $launcheron = file_get_contents('php://input');
        $json = json_decode($launcheron, true);

        if($json['accessToken'] == AuthServer::where('access_token',$json['accessToken'])->value('access_token')) {
            $fields=array(
                'access_token'=>bin2hex(openssl_random_pseudo_bytes(16)));

            AuthServer::where('access_token',$json['accessToken'])->update(['access_token' => $fields['access_token'],'play_token' => $fields['access_token']]);

            $response = array(
                'accessToken' => $fields['access_token'],
                'clientToken' => AuthServer::where('access_token',$fields['access_token'])->value('client_token'),
            );
            $response['selectedProfile'] = array(
                'id' =>AuthServer::where('access_token',$fields['access_token'])->value('uuid'),
                'name' => user::where('id',AuthServer::where('access_token',$fields['access_token'])->value('id'))->value('name')
            );
            $response['user'] = array(
                'id' => AuthServer::where('access_token',$fields['access_token'])->value('uuid')
            );
            return response()->json($response);
        }

        if($json['accessToken'] == AuthServer::where('access_token_2',$json['accessToken'])->value('access_token_2')) {
            $fields=array(
                'access_token'=>bin2hex(openssl_random_pseudo_bytes(16)));

            AuthServer::where('access_token_2',$json['accessToken'])->update(['access_token_2' => $fields['access_token'],'play_token' => $fields['access_token']]);
            $response = array(
                'accessToken' => $fields['access_token'],
                'clientToken' => AuthServer::where('access_token_2',$fields['access_token'])->value('client_token_2'),
            );
            $response['selectedProfile'] = array(
                'id' =>AuthServer::where('access_token_2',$fields['access_token'])->value('uuid'),
                'name' => user::where('id',AuthServer::where('access_token_2',$fields['access_token'])->value('id'))->value('name')
            );
            $response['user'] = array(
                'id' => AuthServer::where('access_token_2',$fields['access_token'])->value('uuid')
            );
            return response()->json($response);
        }

        if($json['accessToken'] == AuthServer::where('access_token_3',$json['accessToken'])->value('access_token_3')) {
            $fields=array(
                'access_token'=>bin2hex(openssl_random_pseudo_bytes(16)));

            AuthServer::where('access_token_3',$json['accessToken'])->update(['access_token_3' => $fields['access_token'],'play_token' => $fields['access_token']]);
            $response = array(
                'accessToken' => $fields['access_token'],
                'clientToken' => AuthServer::where('access_token_3',$fields['access_token'])->value('client_token_3'),
            );
            $response['selectedProfile'] = array(
                'id' =>AuthServer::where('access_token_3',$fields['access_token'])->value('uuid'),
                'name' => user::where('id',AuthServer::where('access_token_3',$fields['access_token'])->value('id'))->value('name')
            );
            $response['user'] = array(
                'id' => AuthServer::where('access_token_3',$fields['access_token'])->value('uuid')
            );
            return response()->json($response);
        }
        if(!empty(AuthServer::where('access_token_3',$json['accessToken'])->value('access_token')) AND !empty(AuthServer::where('access_token_2',$json['accessToken'])->value('access_token_2')) AND !empty(AuthServer::where('access_token_3',$json['accessToken'])->value('access_token_3'))){
            header('Content-Type: application/json');
            echo json_encode(array(
                'error' => 'ForbiddenOperationException',
                'errorMessage' => 'Invalid token.'
            ));
        }
    }

    public function validateAuth(){
        $launcheron = file_get_contents('php://input');
        $json = json_decode($launcheron, true);

        if($json['accessToken'] === AuthServer::where('access_token',$json['accessToken'])->value('access_token')) {
            abort(204);
        }else{
            abort(403);
        }
    }

    public function invalidateAuth(){
        $launcheron = file_get_contents('php://input');
        $json = json_decode($launcheron, true);
        if($json['accessToken'] === AuthServer::where('access_token',$json['accessToken'])->value('access_token')){
            AuthServer::where('access_token',$json['accessToken'])->update(['access_token' => '', 'client_token' => '']);
            abort(204);
        }else{
            header('Content-Type: application/json');
            echo json_encode(array(
                'error' => 'ForbiddenOperationException',
                'errorMessage' => 'Invalid token.'
            ));
            abort(403);
        }
    }
}
