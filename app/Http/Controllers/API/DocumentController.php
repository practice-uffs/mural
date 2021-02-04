<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

use App\Document;

use App\Http\Resources\DocumentResource;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DocumentResource::collection(Document::paginate(10000));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($file = $request->file('document')) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $fileExtension = $file->extension();
            $file->storeAs('documents', $fileName);

            $document = Document::create([
                'name' => $fileName,
                'path' => 'documents/' . $fileName,
                'mime_type' => $fileExtension,
                'description' => $request->description,
                'item_id' => $request->item_id
            ]);

            return response(
                new DocumentResource($document),
                Response::HTTP_CREATED
            );
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(
            new DocumentResource(Document::find($id)),
            Response::HTTP_OK
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = Document::find($id);
        
        if ($file = $request->file('document')) {
            Storage::delete('documents/' . $document->name);

            $fileName = time() . '_' . $file->getClientOriginalName();
            $fileExtension = $file->extension();
            $file->storeAs('documents', $fileName);
        
            $document->update([
                'name' => $fileName,
                'path' => 'documents/' . $fileName,
                'mime_type' => $fileExtension,
                'description' => $request->description,
                'item_id' => $request->item_id
            ]);
        
        } else {
            $document->update([
                'description' => $request->description,
                'item_id' => $request->item_id
            ]);
        }

        return response(
            new DocumentResource($document),
            Response::HTTP_OK
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileName = Document::find($id)->name;
        Document::destroy($id);

        Storage::delete('documents/' . $fileName);

        return response(
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
