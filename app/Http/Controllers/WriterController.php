<?php
namespace App\Http\Controllers;
use App\Http\Resources\WriterResource;
use App\Http\Controllers\csrf;
use Illuminate\Http\Request;
use App\Http\Middleware;
use App\Models\Writer;
class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers=Writer::all();
        // dd($writers);
        return WriterResource::collection($writers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "store";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Writer $writer)
    {  
        //    dd( $request->name);
        // return 'store';
        return csrf_token();
        // $writer=new Writer();
        // $writer->id=$request->id;
        // $writer->name=$request->name;
        // $writer->save();
        // $writer = Writer::create($request->all());
        // return new writerResource($writer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $writers=Writer::find($id);
        dd($writers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,Writer $writer)
    {

        // $writers=Writer::find($id);
        // $writers->id=$request->id;
        // $writers->name=$request->name;
        // $writers->save();
        $writer->update($request->all());
        
        return new writerResource($writer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Writer $writer)
    {
        // $writers=Writer::find($id);
        $writer->delete();
        
        return response(null, 204);
    }
}
