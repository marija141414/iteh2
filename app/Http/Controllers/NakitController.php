<?php

namespace App\Http\Controllers;

use App\Models\Nakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Nakit as ResursNakit;

class NakitController extends SuccessErrorController
{
    public function index()
    {
        $nakit = Nakit::all();
        return $this->uspesnoOdgovor(ResursNakit::collection($nakit), 'Vraceni svi podaci o nakitima!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'model' => 'required',
            'gramaza' => 'required',
            'opis' => 'required',
            'polId' => 'required',
            'materijalId' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $nakit = Nakit::create($input);

        return $this->uspesnoOdgovor(new ResursNakit($nakit), 'Novi nakit je kreiran.');
    }


    public function show($id)
    {
        $nakit = Nakit::find($id);
        if (is_null($nakit)) {
            return $this->greskaOdgovor('Nakit sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new ResursNakit($nakit), 'Nakit sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $nakit = Nakit::find($id);
        if (is_null($nakit)) {
            return $this->greskaOdgovor('Nakit sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'model' => 'required',
            'gramaza' => 'required',
            'opis' => 'required',
            'polId' => 'required',
            'materijalId' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $nakit->model = $input['model'];
        $nakit->gramaza = $input['gramaza'];
        $nakit->opis = $input['opis'];
        $nakit->polId = $input['polId'];
        $nakit->materijalId = $input['materijalId'];
        $nakit->save();

        return $this->uspesnoOdgovor(new ResursNakit($nakit), 'Nakit je azuriran.');
    }

    public function destroy($id)
    {
        $nakit = Nakit::find($id);
        if (is_null($nakit)) {
            return $this->greskaOdgovor('Nakit sa zadatim id-em ne postoji.');
        }

        $nakit->delete();
        return $this->uspesnoOdgovor([], 'Nakit je obrisan.');
    }
}
