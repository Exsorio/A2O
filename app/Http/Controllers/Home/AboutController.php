<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use App\Models\MultiImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Carbon\Carbon;

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


    public function homeAbout(){

        $aboutPage = About::find(1);
        return view('frontend.about_page',  compact('aboutPage'));
    }// End Method

    
    public function aboutMultiImage(){
        return view('admin.about_page.multipage');
    }// End Method


    public function storeMultiImage(Request $request){
        $images = $request->file('multi_image');

        foreach ($images as  $multi_image) {
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();

            $imageR = ImageManager::imagick()->read($multi_image)->resize(220,220)->save('upload/multi/'.$name_gen);

            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at'  => Carbon::now()
            ]);

        }// End foreach

        $notification = array(
            'message'       => 'Multi image Update with Image Successfully',
            'alert-type'    =>  'success'
        );

        return redirect()->route('all.multi.image')->with($notification);

    }

    public function allMultiImage(){

        $allMultiImage = MultiImage::all();

        return view('admin.about_page.all_multi_image', compact('allMultiImage'));
    }// End Method


    public function editMultiImage($id){

        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image', compact('multiImage'));

    }// End Method

    public function updateMultiImage(Request $request){
        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            $imageR = ImageManager::imagick()->read($image)->resize(220,220)->save('upload/multi/'.$name_gen);

            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image' => $save_url
            ]);

            $notification = array(
                'message'       => 'Multi image Update with Image Successfully',
                'alert-type'    =>  'success'
            );

            return redirect()->route('all.multi.image')->with($notification);
            
        }
    }// End Method

    public function deleteMultiImage($id){

        $multiImage = MultiImage::findOrFail($id);
        $img = $multiImage->multi_image;
        unlink($img);
        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message'       => 'Multi image Delete Successfully',
            'alert-type'    =>  'success'
        );

        return redirect()->back()->with($notification);

    }// End Method
}
