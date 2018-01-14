<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use App\Models\MBWorks;
use App\Models\MBWorks_translations;
use App\Models\MBWorksResourcesConnections;
use Illuminate\Routing\Controller;

class MBWorksController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /mbworks
	 *
	 * @return Response
	 */
	public function index()
	{
        $config['tableName'] = trans('app.Projects list');
        $config['ignore'] = ['id', 'count', 'created_at', 'updated_at', 'deleted_at'];
        $config['list'] = MBWorks::get()->toArray();
        $config['route'] = route('app.works.create');
        $config['create'] = 'app.works.create';
        $config['edit'] = 'app.works.edit';
        $config['delete'] = 'app.works.destroy';
        $config['show'] = 'app.works.show';
        $config['resource'] = 'app.resources.create';
        return view('admin.adminList',$config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mbworks/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $lang = new Helper();
        $config['lang'] = $lang->getActiveLanguages();
	    $config['titleForm'] = 'Create projects';
        $config['route'] = route('app.works.create');
        $config['back'] = route('app.works.index');
		return view('admin.createWorks', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mbworks
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = request()->all();
        $record = MBWorks::create($data);
        $data['record_id'] = $record->id;
        MBWorks_translations::create($data);

        return redirect(route('app.works.index'));
	}

	/**
	 * Display the specified resource.
	 * GET /mbworks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $data = MBWorks::find($id)->toArray();
        $config['title'] = $data['translation']['title'];
        $config['description'] = $data['translation']['description'];
        $config['url'] = $data['url'];
        $config['edit'] = route('app.works.edit', $id);
        $config['back'] = route('app.works.index');
        return view('admin.showWorks', $config);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /mbworks/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $lang = new Helper();
        $config['lang'] = $lang->getActiveLanguages();
        $record = MBWorks::find($id)->toArray();
        $record['title'] = $record['translation']['title'];
        $record['description'] = $record['translation']['description'];
        $record['language_code'] = $record['translation']['language_code'];
        $config['record'] = $record;
        $config['titleForm'] = 'Edit projects';
        $config['route'] = route('app.works.edit', $id);
        $config['back'] = route('app.works.index');

        return view('admin.createWorks', $config);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /mbworks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{   $data = request()->all();

        $record = MBWorks::find($id);
        $record->update($data);
        $data['record_id'] = $id;
        MBWorks_translations::updateOrCreate([
            'record_id' => $id,
            'language_code' => $data['language_code']
        ], $data);

        return redirect(route('app.works.index'));

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mbworks/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        MBWorks_translations::destroy(MBWorks_translations::where('record_id', $id)
                            ->pluck('id')->toArray());
        MBWorksResourcesConnections::where('work_id', $id)->delete();
        MBWorks::destroy($id);
        return ["success" => true, "id" => $id];
	}

}