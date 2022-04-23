<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
// use Str;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderby('name')->get()->pluck('name', 'id');
        return view('campaign.index', \compact('category'));
    }

    public function data(Request $request)
    {
        // dd(Storage::disk('public'));
        $query = Campaign::orderBy('publish_date', 'desc')
            ->when($request->has('status') && $request->status != "", function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when(
                $request->has('start_date') &&
                    $request->start_date != "" &&
                    $request->has('end_date') &&
                    $request->end_date != "",
                function ($query) use ($request) {
                    $query->whereBetween('publish_date', $request->only('start_date', 'end_date'));
                }
            );
        // dd($query->path_image);

        return datatables($query)
            ->addIndexColumn()
            ->editColumn('short_description', function ($query) {
                return $query->title . '<br><small>' . $query->short_description . '</small>';
            })
            ->editColumn('path_image', function ($query) {
                $url = asset('storage/public' . $query->path_image);
                // return '<img src="' . $url . '" class="img-thumbnail"> ';
                return '<img src="' . Storage::disk('public')->url($query->path_image) . '" class="img-thumbnail"> ';
            })
            ->editColumn('status', function ($query) {
                return '<span class="badge badge-' . $query->statusColor() . '">' . $query->status . '</span>';
            })
            ->addColumn('author', function ($query) {
                return $query->user->name;
            })
            ->addColumn('action', function ($query) {
                return '
                    <a href="' . route('campaign.detail', $query->id) . '" class="btn btn-link text-dark"><i class="fas fa-search-plus"></i></a>
                    <button onclick="editForm(`' . route('campaign.show', $query->id) . '`)" class="btn btn-link text-primary"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-link text-danger" onclick="deleteData(`' . route('campaign.destroy', $query->id) . '`)"><i class="fas
                    fa-trash-alt"></i></button>
                ';
            })
            ->rawColumns(['short_description', 'path_image'])
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:8',
            'categories' => 'required|array',
            'short_description' => 'required',
            'body' => 'required|min:8',
            'publish_date' => 'required',
            'status' => 'required|in:public,archived',
            'goal' => 'required|integer',
            'end_date' => 'required',
            'note' => 'nullable',
            'receiver' => 'required',
            'path_image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // return $request->categories;

        $data = $request->except('path_image', 'categories');
        $data['slug'] = Str::slug($request->title);
        $data['path_image'] = upload('campaign', $request->file('path_image'), 'campaign');
        $data['user_id'] = auth()->id();

        $campaign = Campaign::create($data);
        $campaign->category_campaign()->attach($request->categories);

        return response()->json(['data' => $campaign, 'message' => 'Project berhasil ditambah']);

        // dd($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        $campaign->publish_date = date('Y-m-d', \strtotime($campaign->publish_date));
        $campaign->end_date = date('Y-m-d', \strtotime($campaign->end_date));
        $campaign->categories = $campaign->category_campaign;

        return response()->json(['data' => $campaign]);
    }

    /**
     * Show detail.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaign.detail', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:8',
            'categories' => 'required|array',
            'short_description' => 'required',
            'body' => 'required|min:8',
            'publish_date' => 'required',
            'status' => 'required|in:public,archived',
            'goal' => 'required|integer',
            'end_date' => 'required',
            'note' => 'nullable',
            'receiver' => 'required',
            'path_image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('path_image', 'categories');
        $data['slug'] = Str::slug($request->title);
        if ($request->hasFile('path_image')) {
            # code...
            // klo ada image di storage maka dihapus
            if (Storage::disk('public')->exists($campaign->path_image)) {
                # code...
                Storage::disk('public')->delete($campaign->path_image);
            }
            // diupdate di sini fotonya
            $data['path_image'] = upload('campaign', $request->file('path_image'), 'campaign');
        }

        $campaign->update($data);
        $campaign->category_campaign()->sync($request->categories);

        return response()->json(['data' => $campaign, 'message' => 'Project berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        // klo ada image di storage maka di hapus juga
        if (Storage::disk('public')->exists($campaign->path_image)) {
            # code...
            Storage::disk('public')->delete($campaign->path_image);
        }
        $campaign->delete();

        return response()->json(['data' => null, 'message' => 'Project berhasil dihapus']);
    }
}
