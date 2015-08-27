<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Caster\ExceptionCaster;

class CMSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return redirect('install/create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('install.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        // Validate database information
        $this->validate($request, [
            'SITENAME' => 'required',
            'DB_HOST' => 'required',
            'DB_DATABASE' => 'required',
            'DB_USERNAME' => 'required',
            'DB_PASSWORD' => 'required',
        ]);


        // Set environment variable to user provided information
        $environment = file_get_contents( base_path() . '/.env');
        $environment = preg_replace('#\SITENAME[^\b\s]+#', 'SITENAME=' . $request->get('SITENAME'), $environment);
        $environment = preg_replace('#\DB_HOST[^\b\s]+#', 'DB_HOST=' . $request->get('DB_HOST'), $environment);
        $environment = preg_replace('#\DB_DATABASE[^\b\s]+#', 'DB_DATABASE=' . $request->get('DB_DATABASE'), $environment);
        $environment = preg_replace('#\DB_USERNAME[^\b\s]+#', 'DB_USERNAME=' . $request->get('DB_USERNAME'), $environment);
        $environment = preg_replace('#\DB_PASSWORD[^\b\s]+#', 'DB_PASSWORD=' . $request->get('DB_PASSWORD'), $environment);
        file_put_contents( base_path() . '/.env', $environment);


        // Change blade file for front-page
        $welcome = file_get_contents( app_path() . '/Http/routes.php');
        $welcome = str_replace("view('welcome');", "view('index');", $welcome);
        file_put_contents(  app_path() . '/Http/routes.php', $welcome);


        return redirect('install/show');
    }

    /**
     * Display the specified resource.
     *
     * @return Response
     */
    public function show()
    {
        if(DB::connection()->getDatabaseName())
        {
            return view('install.show');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
