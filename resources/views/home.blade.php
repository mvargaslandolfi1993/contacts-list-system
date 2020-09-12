@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 style="display: inline-block;">List of contacts</h3> 
                            </div>
                            <div class="col-md-4" style="text-align: right;">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#contacts">
                                Create Contact
                                </button>
                            </div>    
                            <div class="input-group col-md-4">
                                <form action="/search" style="display: inline-flex;">
                                <input type="text" name="search" class="form-control" placeholder="Search Contact" aria-label="Search Contact" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="contacts" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Create New Contact</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/create-contact" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="firstName">Firstname</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="lastname">Lastname</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="phone">Phone Numer</label>
                                            <input type="tel" class="form-control" id="phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">FirstName</th>
                                <th scope="col">LastName</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <th scope="row">{{$contact->id}}</th>
                                <td>{{$contact->firstname}}</td>
                                <td>{{$contact->lastname}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phonenumber}}</td>
                                <td>
                                    <a class="btn btn-primary" href="/update-contact/{{$contact->id}}">Update</a>
                                    <a class="btn btn-danger" href="/delete-contact/{{$contact->id}}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    {{ $contacts->links() }}
    </div>
</div>
@endsection
