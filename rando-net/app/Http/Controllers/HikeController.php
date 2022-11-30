<?php

namespace App\Http\Controllers;

use App\Models\Hike;
use Illuminate\Http\Request;

class HikeController extends Controller
{
    /**
     * Display all the validated Hikes.
     *
     * @return Response
     */
    public function index()
    {
        $hikes = Hike::where("validated", true)->get();
        return view("hike.index", ["hikes" => $hikes]);
    }

    /**
     * Display form for creation of the hikes
     *
     * @return Response
     */
    public function create()
    {
        return view("hike.create");
    }

    /**
     * Edit the chosen hike in the Database
     *
     * @param Request $request
     * @param  int  $id
     */
    public function edit(Request $request, $id)
    {
        $hike = Hike::findOrFail($id);
        $request->validate($hike->request_validator());
        $hike->modify($request, true);
        $hike->update();
    }

    /**
     * Delete the chosen hike from the Database
     *
     * @param  int  $id
     */
    public static function destroy($id)
    {
        $hike = Hike::findOrFail($id);
        $hike->delete();
    }

    /**
     * Determine what action the admin has chosen
     * He can edit and validate the Hike
     * He can delete it and reject it
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $status = "";
        if ($_REQUEST['btnSubmit'] == "validate") {
            HikeController::edit($request, $id);
            $status = "Admin validated hike successfully";
        } else if ($_REQUEST['btnSubmit'] == "reject") {
            HikeController::destroy($id);
            $status = "Hike rejected successfully";
        }
        return redirect()
            ->route("admin.index")
            ->with("success", $status);
    }

    /**
     * Store the Hike in the Database
     *
     * @param  Request  $request
     * @return Response
     */

    public function store(Request $request)
    {
        $hike = new Hike();
        $request->validate($hike->request_validator());

        $hike->modify($request, false);


        $hike->save();

        return redirect()
            ->route("hike.index")
            ->with("success", "Hike created successfully");
    }
}
