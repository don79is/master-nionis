<?php

namespace App\Http\Controllers;


use App\Models\MBLanguage_codes;
use App\Models\MBWorks;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;


class FrontendController extends Controller
{
    use ValidatesRequests;

    /**
     * Display a listing of the resource.
     * GET /frontend
     *
     * @return Response
     *
     */
    public function index()
    {
        $config['works'] = MBWorks::get()->toArray();

        return view('Frontend.info', $config);
    }

    /**
     * Show the form for creating a new resource.
     * GET /frontend/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /frontend
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /frontend/{id}
     *
     * @param  int $id
     * @return Response
     *
     */

    public function show($language, $id)
    {
        $data = MBWorks::find($id)->toArray();
        $config['title'] = $data['translation']['title'];
        $config['description'] = $data['translation']['description'];
        $config['url'] = $data['url'];
        $config['path'] = $data['resources_conn'];
        $config['back'] = "/#portfolio";

        return view('frontend.work', $config);
    }

    /**
     * Show the form for editing the specified resource.
     * GET /frontend/{id}/edit
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
     * PUT /frontend/{id}
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
     * DELETE /frontend/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function postContact(Request $request)

    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'min:3',
            'text' => 'min:10'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->text
        );
        Mail::send('frontend.emails', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('renginiuvedejasnionis@gmail.com');
            $message->subject($data['subject']);
            $message->subject($data['text']);

        });
        return redirect('/');
    }

}