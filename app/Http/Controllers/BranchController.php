<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branchtbl;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    //fetch branch
    public function fetchbranch()
    {
        $fetchbranch=branchtbl::all();
        return $fetchbranch;
    }
}
