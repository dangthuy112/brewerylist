<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BreweryIndexResource;
use App\Http\Resources\BreweryShowResource;
use App\Models\Brewery;
use Illuminate\Http\Request;

class BreweryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BreweryIndexResource::collection(Brewery::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //if no brewery_id was provided
        if (!$request->brewery_id) {
            return response(
                [
                    'error' => true, 'error-msg' => 'ID parameter required.'
                ],
                400
            );
        }

        //if brewery_id already exist, returns a 403 conflict
        if (Brewery::where('brewery_id', $request->brewery_id)->first()) {
            return response(
                [
                    'error' => true, 'error-msg' => 'Brewery_id already exists.'
                ],
                403
            );
        }

        $brewery = new Brewery();
        $brewery->brewery_id = $request->brewery_id;

        //only set data if the field isn't assigned to null
        //fields that aren't set will be defaulted to NULL in database
        if (!($request->name == 'null')) $brewery->name = $request->name;
        if (!($request->brewery_type == 'null')) $brewery->brewery_type = $request->brewery_type;
        if (!($request->street == 'null')) $brewery->street = $request->street;
        if (!($request->address_2 == 'null')) $brewery->address_2 = $request->address_2;
        if (!($request->address_3 == 'null')) $brewery->address_3 = $request->address_3;
        if (!($request->city == 'null')) $brewery->city = $request->city;
        if (!($request->state == 'null')) $brewery->state = $request->state;
        if (!($request->county_province == 'null')) $brewery->county_province = $request->county_province;
        if (!($request->postal_code == 'null')) $brewery->postal_code = $request->postal_code;
        if (!($request->country == 'null')) $brewery->country = $request->country;
        if (!($request->longitude == 'null')) $brewery->longitude = $request->longitude;
        if (!($request->latitude == 'null')) $brewery->latitude = $request->latitude;
        if (!($request->phone == 'null')) $brewery->phone = $request->phone;
        if (!($request->website_url == 'null')) $brewery->website_url = $request->website_url;
        $brewery->save();

        return response()->json([
            'message' => $brewery->brewery_id . ' created successfully.',
            'code' => 200,
        ]);
    }

    public function resetData(Request $request)
    {
        Brewery::truncate();

        $data = $request->all();
        $dataArray = array();

        //iterate through the array of fetched data
        foreach ($data as $key => $value) {
            array_push($dataArray, array(
                'brewery_id' => $value['id'],
                'name' => $value['name'],
                'brewery_type' => $value['brewery_type'],
                'street' => $value['street'],
                'address_2' => $value['address_2'],
                'address_3' => $value['address_3'],
                'city' => $value['city'],
                'state' => $value['state'],
                'county_province' => $value['county_province'],
                'postal_code' => $value['postal_code'],
                'country' => $value['country'],
                'longitude' => $value['longitude'],
                'latitude' => $value['latitude'],
                'phone' => $value['phone'],
                'website_url' => $value['website_url'],
            ));
        };

        Brewery::insert($dataArray);
        return response()->json([
            'message' => 'Data Resetted.',
            'code' => 200,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BreweryShowResource(Brewery::findOrFail($id));
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
        $brewery = Brewery::find($id);

        if ($brewery) {
            $brewery->delete();
            return response()->json([
                'message' => 'Brewery Deleted.',
                'code' => 200,
            ]);
        } else {
            return response(['error' => true, 'error-msg' => 'Brewery ID does not exist.'], 400);
        }
    }
}
