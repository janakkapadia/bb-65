<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PropertyController extends Controller
{
    public function index()
    {
        return inertia('Properties/Index',['properties' => Property::paginate()]);
    }

    public function create()
    {
        return inertia('Properties/Form');
    }

    public function store(PropertyRequest $request)
    {
        if ($request->file('image')) {
            $image = Image::make($request->file('image'));
            $image->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $full_filename = $request->file('image')->getFilename().$request->file('image')->getClientOriginalExtension();

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $location = storage_path('app/public/thumb/') . $filename;

            $thumb = $image->save($location);
            $request->file('image')->store('public/full',config('filesystems.disks.public'));

            $request->request->add(['image_thumbnail' => '/storage/thumb/'.$filename, 'image_full' => "/storage/full/".$full_filename]);
        }

        Property::create($request->all());

        return redirect()->route('properties.index');
    }

    public function edit(Property $property)
    {
        return inertia('Properties/Form', ['property' => $property]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
