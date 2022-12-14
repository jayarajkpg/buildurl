<?php  
    
namespace App\Http\Controllers;  
     
use Illuminate\Http\Request;  
use App\Models\ShortLink;  
use Illuminate\Support\Str;
    
class ShortLinkController extends Controller  
{  
    /**  
     * It is used to show the resource list.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function index()  
    {  
        $shortLinks = ShortLink::latest()->get();  
     
        return view('shortenLink', compact('shortLinks'));  
    }  
       
    /**  
     * It is used to show the resource list.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function store(Request $request)  
    {  
        $request->validate([  
           'link' => 'required|url'  
        ]);  
     
        $input['link'] = $request->link;  
        $input['code'] = Str::random(4);  
     
        ShortLink::create($input);  
    
        return redirect('generate-link')->with('success', 'Short Link created');  
    }  
     
    /**  
     * It is used to show the resource list.  
     *  
     * @return \Illuminate\Http\Response  
     */  
    public function shortenLink($code)  
    {  
        $find = ShortLink::where('code', $code)->first();  
     
        return redirect($find->link);  
    }  
}  