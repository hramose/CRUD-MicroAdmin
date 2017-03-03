@extends('layouts.master')

@section('content')
    <meta id="token" name="token" value="{{ csrf_token() }}">

    <div class="container" id="sales">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Sales</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                        Register a Sale
                    </button>
                </div>
            </div>
        </div>

        <!-- Item Listing -->
        <table class="table table-bordered">
            <tr>
                <th>User</th>
                <th>Product</th>
                <th>Price</th>
                <th>Date</th>
                <th width="200px">Action</th>
            </tr>
            <tr v-for="sale in sales">
                <td>@{{ sale.user }}</td>
                <td>@{{ sale.item }}</td>
                <td>@{{ sale.price | currency }}</td>
                <td>@{{ sale.date }}</td>
                <td>

                    <button class="btn btn-danger" @click.prevent="deleteItem(sale)">Delete</button>
                </td>
            </tr>
        </table>


        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li v-if="pagination.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePage(pagination.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#"
                       @click.prevent="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" aria-label="Next"
                       @click.prevent="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create Products</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">

                            <div class="form-group">
                                <label for="title">Select an User:</label>

                                <select name="user_id" class="form-control" v-model="newItem.user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id  }}" selected>{{ $user->name  }}</option>
                                    @endforeach
                                </select>
                                <span v-if="formErrors['user_id']" class="error text-danger">@{{ formErrors['user_id'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Select an Item:</label>

                                <select name="item_id" class="form-control" v-model="newItem.item_id">
                                    @foreach($items as $item)
                                        <option value="{{ $item->id  }}" selected>{{ $item->title  }}</option>
                                    @endforeach
                                </select>

                                <span v-if="formErrors['item_id']" class="error text-danger">@{{ formErrors['item_id'] }}</span>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="user_id" class="form-control" v-model="fillItem.user_id" />
                                <span v-if="formErrorsUpdate['user_id']" class="error text-danger">@{{ formErrorsUpdate['user_id'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="item_id" class="form-control" v-model="fillItem.item_id" />
                                <span v-if="formErrorsUpdate['item_id']" class="error text-danger">@{{ formErrorsUpdate['item_id'] }}</span>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
