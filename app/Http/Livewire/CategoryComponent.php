<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;

class CategoryComponent extends Component
{

    public $name, $cid;
    public $old_name, $category_search;

    protected $listeners=[
      "refresh-category"=>'$refresh',
    ];

    public function render()
    {
        $categories=Category::where("name","like",$this->category_search."%")->with("meals")->get();
        return view('livewire.category-component',compact("categories"));
    }

    public function create(){
        $category=Category::create([
            "name"=>$this->name,
        ]);
        session()->flash("createMessage","Category created successfully");
    }

    public function setCID($cid){
        $this->cid=$cid;
    }

    public function setCIDToEdit($cid){
        $this->cid=$cid;
        $category=Category::find($cid);
        $this->old_name=$category->name;
    }

    public function edit(){
        $category=Category::find($this->cid);
        $category->name=$this->old_name;
        $category->save();

        session()->flash("editMessage","Category edited successfully");
    }

    public function delete(){
        $category=Category::find($this->cid);
        $category->delete();

        session()->flash('deleteMessage', 'Category deleted successfully.');
    }

}
