<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5 mb-2 d-flex justify-content-between">
                <button class="btn btn-info" data-toggle="modal" data-target="#addMealModal"><i class="fa fa-plus"></i> Add new meal</button>
                <input type="search" wire:model="meal_search" class="form-control w-75" placeholder="Search by category name">
            </div>
            <div class="col-12">
                <table class="table table-light table-hover">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($meals as $meal)
                        <tr>
                            <td>{{$meal->id}}</td>
                            <td>{{$meal->name}}</td>
                            <td>{{$meal->category->name}}</td>
                            <td>{{$meal->price}}</td>
                            <td>{{$meal->description}}</td>
                            <td>
                                <img src="{{asset('storage/'.$meal->image)}}" width="50" height="50" alt="">
                            </td>
                            <td>
                                <button class="btn btn-primary" wire:click="setMIDToEdit({{$meal->id}})" data-toggle="modal" data-target="#editMealModal">Edit</button>
                                <button class="btn btn-danger" wire:click="setMID({{$meal->id}})" data-toggle="modal" data-target="#confirmDeleteModal">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(session()->has("deleteMessage"))
                    <div class="alert alert-danger">{{session("deleteMessage")}}</div>
                @endif
                @if(session()->has("editMessage"))
                    <div class="alert alert-success">{{session("editMessage")}}</div>
                @endif
                @if(session()->has("createMessage"))
                    <div class="alert alert-success">{{session("createMessage")}}</div>
                @endif
            </div>
        </div>

        <div wire:ignore class="modal fade" id="addMealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="create()"  >
                            @csrf
                            <div class="form-group">
                                <label for="meal-name" class="col-form-label">Name</label>
                                <input type="text" wire:model="name" class="form-control" id="meal-name">
                            </div>
                            <div class="form-group">
                                <label for="meal-category" class="col-form-label">Category</label>
                                <select class="form-control" wire:model="category" id="meal-category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meal-price" class="col-form-label">Price</label>
                                <input type="number" start="1" wire:model="price" class="form-control" id="meal-price">
                            </div>
                            <div class="form-group">
                                <label for="meal-description" class="col-form-label">Description</label>
                                <textarea type="text" wire:model="description" class="form-control" id="meal-description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meal-image" class="col-form-label">Image</label>
                                <input type="file" wire:model="image" class="form-control" id="meal-image">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{--Edit Meal Modal--}}
        <div wire:ignore class="modal fade" id="editMealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Meal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="edit()"  >
                            @csrf
                            <div class="form-group">
                                <label for="meal-name" class="col-form-label">Name</label>
                                <input type="text" wire:model="new_name" class="form-control" id="meal-name">
                            </div>
                            <div class="form-group">
                                <label for="meal-category" class="col-form-label">Category</label>
                                <select class="form-control" wire:model="new_category" id="meal-category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($category->id==$new_category) selected @endif>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meal-price" class="col-form-label">Price</label>
                                <input type="number" start="1" wire:model="new_price" class="form-control" id="meal-price">
                            </div>
                            <div class="form-group">
                                <label for="meal-description" class="col-form-label">Description</label>
                                <textarea type="text" wire:model="new_description" class="form-control" id="meal-description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meal-image" class="col-form-label">Image</label>
                                <input type="file" wire:model="new_image" class="form-control" id="meal-image">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Confirm Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div wire:ignore class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this meal?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" wire:click="delete">Confirm</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
