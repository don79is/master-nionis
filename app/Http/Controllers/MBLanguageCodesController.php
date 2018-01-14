<?php namespace App\Http\Controllers;

use App\Models\MBLanguage_codes;
use Illuminate\Routing\Controller;

class MBLanguageCodesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /mblanguagecodescotroller
	 *
	 * @return Response
	 */
	public function index()
	{
        $config['tableName'] = trans('app.Language list');
        $config['ignore'] = ['id', 'count', 'created_at'];
        $config['callToAction']= 'app.languages.edit';
        $config['list'] = MBLanguage_codes::get()->toArray();

        return view('admin.adminList',$config);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mblanguagecodescotroller/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mblanguagecodescotroller
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /mblanguagecodescotroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /mblanguagecodescotroller/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /mblanguagecodescotroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $data = request()->all();
        $record = MBLanguage_codes::find($id);

        $record->update([
            'is_active' => $data['is_active']
        ]);

        return $record;
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mblanguagecodescotroller/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}