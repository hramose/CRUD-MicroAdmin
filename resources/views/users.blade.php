@extends('layouts.master')

@section('content')
    <meta id="token" name="token" value="{{ csrf_token() }}">

    <div class="container" id="users">

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-user">
                        Create User
                    </button>
                </div>
            </div>
        </div>

        <!-- Item Listing -->
        <table class="table table-bordered">
            <tr>
                <th>First Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th width="200px">Action</th>
            </tr>
            <tr v-for="user in users">
                <td>@{{ user.name }}</td>
                <td>@{{ user.surname }}</td>
                <td>@{{ user.email }}</td>
                <td>
                    <button class="btn btn-primary" @click="editUser(user)">Edit</button>
                    <button class="btn btn-danger" @click="deleteUser(user)">Delete</button>
                </td>
            </tr>
        </table>

        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li v-if="pagination.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click="changePage(pagination.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#"
                       @click="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" aria-label="Next"
                       @click="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Create Item Modal -->
        <div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create User</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createUser">

                            <div class="form-group">
                                <label for="title">First Name:</label>
                                <input type="text" name="name" class="form-control" v-model="newUser.name" />
                                <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Surname:</label>
                                <input type="text" name="surname" class="form-control" v-model="newUser.surname" />
                                <span v-if="formErrors['surname']" class="error text-danger">@{{ formErrors['surname'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Email:</label>
                                <input type="text" name="email" class="form-control" v-model="newUser.email" />
                                <span v-if="formErrors['email']" class="error text-danger">@{{ formErrors['email'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Password:</label>
                                <input type="text" name="password" class="form-control" v-model="newUser.password" />
                                <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'] }}</span>
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
        <div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateUser(fillUser.)">

                            <div class="form-group">
                                <label for="title">Name:</label>
                                <input type="text" name="name" class="form-control" v-model="fillUser.name" />
                                <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Surname:</label>
                                <input type="text" name="surname" class="form-control" v-model="fillUser.surname" />
                                <span v-if="formErrorsUpdate['surname']" class="error text-danger">@{{ formErrorsUpdate['surname'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Email:</label>
                                <input type="text" name="email" class="form-control" v-model="fillUser.email" />
                                <span v-if="formErrorsUpdate['email']" class="error text-danger">@{{ formErrorsUpdate['email'] }}</span>
                            </div>

                            <div class="form-group">
                                <label for="title">Password:</label>
                                <input type="text" name="password" class="form-control" v-model="fillUser.password" />
                                <span v-if="formErrorsUpdate['password']" class="error text-danger">@{{ formErrorsUpdate['password'] }}</span>
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
