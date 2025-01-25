<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreTagRequest;
use App\Http\Requests\Dashboard\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('view_tags');

        if ( $request->ajax() )
        {
            $tags = getModelData( model : new Tag() );

            return response()->json($tags);
        }

        return view('dashboard.tags.index');
    }

    public function store(StoreTagRequest $request)
    {
        $tag = Tag::create($request->validated());

        return response(["tag created successfully"]);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());

        return response(["tag updated successfully"]);
    }

    public function destroy(Tag $tag)
    {
        $this->authorize('delete_tags');

        $tag->delete();

        return response(["tag deleted successfully"]);
    }

    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_tags');

        Tag::whereIn('id', $request->selected_items_ids)->delete();

        return response(["selected tags deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_tags');

        Tag::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["selected tags restored successfully"]);
    }
}
