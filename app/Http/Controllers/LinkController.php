<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortenedLink;
use LaraCrafts\UrlShortener;
class LinkController extends Controller

{
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {
        $shortLinks = ShortenedLink::latest()->get();
        return view('shortenLink', compact('shortLinks'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)

    {

        $request->validate([
           'link' => 'required|url'
        ]);
   

        $input['link'] = $request->link;
        $shortener = app('url.shortener');

        $input['code'] = explode(".com/",$shortener->shorten($request->link))[1];
        ShortenedLink::create($input);
        return redirect('/generate-link')

             ->with('success', 'Shortened Link Generated Successfully!');

    }
    /**

     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function shortenLink($code)

    {
        $find = ShortenedLink::where('code', $code)->first();
        visits($find)->seconds(15)->increment();
        return redirect($find->link);

    }

}