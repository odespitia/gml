<?php

namespace App\Http\Controllers\User;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'error' => true,
            'code' => 406,
            'msg' => 'aqui',
        ], 406);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request) : JsonResponse
    {
        try {

            DB::beginTransaction();

            $profile = new User();
            $profile->document = $request->documento;
            $profile->email = $request->email;
            $profile->first_name = $request->nombres;
            $profile->last_name = $request->apellidos;
            $profile->movil = $request->movil;
            $profile->address = $request->direccion;
            $profile->country = $request->pais;
            $profile->category_id = $request->categoria;
            $profile->status_id = 1;
            if (!empty($request->contraseña)) {
                $profile->password = Hash::make($request->contraseña);
            }else{
                $profile->password = Hash::make($request->documento);
            }
            $profile->save();

            DB::commit();
            // call our event here
           UserRegistered::dispatch($profile);

            return response()->json([
                'error' => false,
                'msg' => 'Se registró usuario exitosamente',
                'data' => $profile 
            ]);

        } catch (Exception $th) {
            DB::rollBack();
            $msj = 'Ocurrió un problema, intente nuevamente.';
            $codeError = ($th->getCode() === 409) ? 409 : 406;
            return response()->json([
                'error' => true,
                'code' => $codeError,
                'msg' => $th->getMessage(),
            ], $codeError);
        }
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
