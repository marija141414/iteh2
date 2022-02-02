<?php

namespace App\Http\Controllers;

use App\Models\Materijal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Materijal as ResursMaterijal;

class MaterijalController extends SuccessErrorController
{
    public function index()
    {
        $materijali = Materijal::all();
        return $this->uspesnoOdgovor(ResursMaterijal::collection($materijali), 'Vraceni svi podaci o materijalima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'tipMaterijala' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $materijal = Materijal::create($input);

        return $this->uspesnoOdgovor(new ResursMaterijal($materijal), 'Novi materijal je kreiran.');
    }


    public function show($id)
    {
        $materijal = Materijal::find($id);
        if (is_null($materijal)) {
            return $this->greskaOdgovor('Materijal sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new ResursMaterijal($materijal), 'Materijal sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $materijal = Materijal::find($id);
        if (is_null($materijal)) {
            return $this->greskaOdgovor('Materijal sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'tipMaterijala' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $materijal->tipMaterijala = $input['tipMaterijala'];
        $materijal->save();

        return $this->uspesnoOdgovor(new ResursMaterijal($materijal), 'Materijal je azuriran.');
    }

    public function destroy($id)
    {
        $materijal = Materijal::find($id);
        if (is_null($materijal)) {
            return $this->greskaOdgovor('Materijal sa zadatim id-em ne postoji.');
        }

        $materijal->delete();
        return $this->uspesnoOdgovor([], 'Materijal je obrisan.');
    }
}
