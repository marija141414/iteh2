<?php

namespace App\Http\Controllers;

use App\Models\Pol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Pol as ResursPol;

class PolController extends SuccessErrorController
{
    public function index()
    {
        $polovi = Pol::all();
        return $this->uspesnoOdgovor(ResursPol::collection($polovi), 'Vraceni svi podaci o polovima..');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'pol' => 'required',
            'skracenoPol' => 'required',
        ]);
        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $pol = Pol::create($input);

        return $this->uspesnoOdgovor(new ResursPol($pol), 'Novi pol je kreiran.');
    }


    public function show($id)
    {
        $pol = Pol::find($id);
        if (is_null($pol)) {
            return $this->greskaOdgovor('Pol sa zadatim id-em ne postoji.');
        }
        return $this->uspesnoOdgovor(new ResursPol($pol), 'Pol sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $pol = Pol::find($id);
        if (is_null($pol)) {
            return $this->greskaOdgovor('Pol sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'pol' => 'required',
            'skracenoPol' => 'required',
        ]);

        if($validator->fails()){
            return $this->greskaOdgovor($validator->errors());
        }

        $pol->pol = $input['pol'];
        $pol->skracenoPol = $input['skracenoPol'];
        $pol->save();

        return $this->uspesnoOdgovor(new ResursPol($pol), 'Pol je azuriran.');
    }

    public function destroy($id)
    {
        $pol = Pol::find($id);
        if (is_null($pol)) {
            return $this->greskaOdgovor('Pol sa zadatim id-em ne postoji.');
        }
        $pol->delete();
        return $this->uspesnoOdgovor([], 'Pol je obrisan.');
    }
}
