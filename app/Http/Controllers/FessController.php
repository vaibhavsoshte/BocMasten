<?php

namespace App\Http\Controllers;

use App\Models\feestbl;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FessController extends Controller
{
    //fetch fess record
    public function fetchfess()
    {
        $fetchfess=feestbl::all();
        return $fetchfess;
    }

    //fetch all branch

    public function fetchallbranch()
    {
        $fetchallbranch=DB::select("SELECT * FROM `fesstypetbl`");
        return $fetchallbranch;
    }
}
