<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class AboutController extends Controller
{
    public function aboutPage(){
        
        $aboutPage = About::find(1);

        return view('admin.about_page.about_page_all', compact('aboutPage'));

    }// End Method

    public function updateAbout(Request $request){

        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            $imageR = ImageManager::imagick()->read($image)->resize(523,605)->save('upload/about/'.$name_gen);

            $save_url = 'upload/about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url
            ]);

            $notification = array(
                'message'       => 'About Page Update with Image Successfully',
                'alert-type'    =>  'success'
            );

            return redirect()->back()->with($notification);
            
        }else{
            
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description
            ]);

            $notification = array(
                'message'       => 'About Page Update without Image Successfully',
                'alert-type'    =>  'success'
            );

            return redirect()->back()->with($notification);
        }// End Else

    }// End Method
}
