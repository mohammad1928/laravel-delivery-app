<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Meal;
use Livewire\Component;
use Livewire\WithFileUploads;

class MealComponent extends Component
{
    use WithFileUploads;

    public $meal_search, $mid;
    public $name, $category, $price, $description, $image;
    public $new_name, $new_category, $new_price, $new_description, $new_image;

    public function render()
    {
        $meals=Meal::where("name","like",$this->meal_search."%")->with("category")->get();
        $categories=Category::all();
        return view('livewire.meal-component',compact("meals", "categories"));
    }

    public function create(){
        $image_path=$this->image->store("public/images");

        $meal=Meal::create([
            "name"=>$this->name,
            "category_id"=>$this->category,
            "price"=>$this->price,
            "description"=>$this->description,
            "image"=>substr($image_path,7),
        ]);

        $meal->save();

        session()->flash("createMessage","Meal created successfully");
    }

    public function setMID($mid){
        $this->mid=$mid;
    }

    public function setMIDToEdit($mid){
        $this->mid=$mid;
        $meal=Meal::find($mid);
        $this->new_name=$meal->name;
        $this->new_category=$meal->category_id;
        $this->new_price=$meal->price;
        $this->new_description=$meal->description;
    }

    public function edit(){
        $meal=Meal::find($this->mid);
        $meal->name=$this->new_name;
        $meal->category_id=$this->new_category;
        $meal->price=$this->new_price;
        $meal->description=$this->new_description;
        if(isset($this->new_image)){
            $image_p=$this->new_image->store('public/images');
            $meal->image=substr($image_p,7);
        }
        $meal->save();

        session()->flash("editMessage","Meal edited successfully");
    }

    public function delete(){
        $meal=Meal::find($this->mid);
        $meal->delete();

        session()->flash('deleteMessage', 'Meal deleted successfully.');
    }

}
