<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreSkillRequest;
use App\Http\Requests\Dashboard\UpdateSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{


    public function index(Request $request)
    {
        $this->authorize('view_skills');
        if ($request->ajax()){
            return response(getModelData(model: new Skill()));
        }
        else
            return view('dashboard.skills.index');
    }
 

    
    public function store(StoreSkillRequest $request)
    {
         $data          = $request->validated();
        $data['image'] = uploadImageToDirectory($request->file('image'), "Skills"); 
        Skill::create($data);

        return response(["skill created successfully"]);
    }

 
    public function update(UpdateSkillRequest $request, Skill $Skill)
    {
      
        // Validate the incoming request
        $data = $request->validated();
    
        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Assuming the uploadImageToDirectory function will handle the image upload
            $data['image'] = uploadImageToDirectory($request->file('image'), "Skills");
    
            // Optionally delete the old image from storage if it exists
            if ($Skill->image) {
                deleteImageFromDirectory($Skill->image, "Skills");
            }
        }
    
        // Update the existing 'vision' model with the validated data
        $Skill->update($data);
    
        // Return a success response
        return response(["Skill updated successfully"], 200);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $this->authorize('delete_skills');
        $skill->delete();
        return response(["skill deleted successfully"]);
    }


    public function deleteSelected(Request $request)
    {
        $this->authorize('delete_skills');
        Skill::whereIn('id', $request->selected_items_ids)->delete();
        return response(["Skill deleted successfully"]);
    }

    public function restoreSelected(Request $request)
    {
        $this->authorize('delete_skills');
        Skill::withTrashed()->whereIn('id', $request->selected_items_ids)->restore();

        return response(["skills restored successfully"]);
    }


}