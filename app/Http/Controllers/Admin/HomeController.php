<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\User;
use App\Models\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

        $visitsCount = Visitor::count();
        $pageCount = Page::count();
        $userCount = User::count();
        $interval = intval($request->input('interval', 30));

        $datelimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
        $onlineList = Visitor::select('ip')->where('date_access', '>=', $datelimit)->groupBy('ip')->get();
        $onlineCount = count($onlineList);

        $pagePie = [];
        $visitsAll = Visitor::selectRaw('page, count(page) as c')->groupBy('page')->get();
        foreach ($visitsAll as $visit){
            $pagePie[ $visit['page'] ] = intval($visit['c']);
        }

        $pageLabels = json_encode(array_keys($pagePie));
        $pageValues = json_encode(array_values($pagePie));

        return view('admin.home', [
            'visitsCount' => $visitsCount,
            'onlineCount' => $onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            'pageLabels' => $pageLabels,
            'pageValues' => $pageValues,
            'dateInterval' => $interval
        ]);
    }
}
