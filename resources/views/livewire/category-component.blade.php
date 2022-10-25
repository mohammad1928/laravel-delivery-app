<div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 mt-5 mb-2 d-flex justify-content-between">
                <button class="btn btn-info" data-toggle="modal" data-target="#addCategoryModal"><i class="fa fa-plus"></i> Add new category</button>
                <input type="search" wire:model="category_search" class="form-control w-75" placeholder="Search by category name">
            </div>
            <div class="col-12">
                <table class="table table-light table-hover">
                    <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Meals</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{count($category->meals)}}</td>
                            <td>
                                <button class="btn btn-primary" wire:click="setCIDToEdit({{$category->id}})" data-toggle="modal" data-target="#editCategoryModal">Edit</button>
                                <button class="btn btn-danger" wire:click="setCID({{$category->id}})" data-toggle="modal" data-target="#confirmDeleteModal">Delete</button>
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

        <div wire:ignore class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="category-name" class="col-form-label">Name</label>
                                <input type="text" wire:model="name" class="form-control" id="category-name">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        {{--Edit Category Modal--}}
        <div wire:ignore class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="edit()"  >
                            @csrf
                            <div class="form-group">
                                <label for="category-name" class="col-form-label">Name</label>
                                <input type="text" wire:model="old_name" class="form-control" id="category-name">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Edit</button>
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
                        Are you sure you want to delete this category?
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
