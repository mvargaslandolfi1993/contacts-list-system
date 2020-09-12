@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
                	<h5>Update Contact</h5>
				</div>
                @foreach($contacts as $contact)                           
	                <div class="form-group col-md-6">
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
                @endforeach
			</div>
		</div>
	</div>
@endsection