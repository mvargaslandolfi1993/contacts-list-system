@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p>List of contacts</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contacts">
                      Create Contact
                    </button>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update{{$contact->id}}">
                                 Update
                                </button>
                                <a class="btn btn-danger" href="/delete-contact/{{$contact->id}}">Delete</a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="update{{$contact->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update Contact</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/update-contact" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" id="id{{$contact->id}}" name="id" value="{{$contact->id}}" style="display: none;"> 
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="firstName">Firstname</label>
                                                    <input type="text" class="form-control" id="firstName{{$contact->id}}" name="firstName" value="{{$contact->firstname}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="lastname">Lastname</label>
                                                    <input type="text" class="form-control" id="lastname{{$contact->id}}" name="lastname" value="{{$contact->lastname}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email{{$contact->id}}" name="email" value="{{$contact->email}}">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="phone">Phone Numer</label>
                                                    <input type="tel" class="form-control" id="phone{{$contact->id}}" name="phone" value="{{$contact->phonenumber}}">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>{{ $contacts->links() }}
@endsection
