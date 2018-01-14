<?php namespace App\Http\Controllers;

use App\Models\MBResources;
use App\Models\MBWorks;
use App\Models\MBWorksResourcesConnections;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;

class MBResourcesController extends Controller
{


    public function upload(UploadedFile $file)
    {
        $data =
            [
                "size" => $file->getsize(),
                "mime_type" => $file->getMimetype(),
            ];
        $path = '/upload/' . date("Y/m/d/");
        $fileName = Carbon::now()->timestamp . '-' . $file->getClientOriginalName();
        $file->move(public_path($path), $fileName);
        $data["path"] = $path . $fileName;
        return MBResources::create($data);
    }

    /**
     * Display a listing of the resource.
     * GET /mbresources
     *
     * @return Response
     */
    public function index()
    {
        $config['tableName'] = trans('app.Resources list');
        $config['ignore'] = ['id', 'count', 'created_at', 'updated_at', 'deleted_at'];
        $config['list'] = MBResources::get()->toArray();
        $config['delete'] = 'app.resources.destroy';
        return view('admin.adminList',$config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /mbresources/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /mbresources
     *
     * @return Response
     */
    public function store(MBWorks $MBWorks)
    {
        $data = request()->all();

        if (isset($data['files'])) {
            if ($data['files'] != null) {
                $resourcesId = [];
                foreach ($data['files'] as $resource) {
                    $record = $this->upload($resource, null);
                    $resourcesId[] = $record->id;
                }
                foreach ($resourcesId as $id) {
                    MBWorksResourcesConnections::create([
                        'work_id' => $MBWorks->id,
                        'resource_id' => $id
                    ]);
                }
            }
        }
        return redirect(route('app.works.index'));
    }

    /**
     * Display the specified resource.
     * GET /mbresources/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /mbresources/{id}/edit
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
     * PUT /mbresources/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /mbresources/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        MBResources::destroy($id);

        MBWorksResourcesConnections::where('resource_id', $id)->delete();

            return json_encode(["success" => true, "id" => $id]);

    }

}