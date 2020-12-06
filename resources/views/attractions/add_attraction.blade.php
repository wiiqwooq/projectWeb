@extends('attractions.temattraction')

@section('attractions')
<form method="post" action="/store" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <h1 class="centered">Create Trip</h1>
    <div>
      <span>Trip Name : </span>
      <input type="text" name="name" placeholder="Enter trip">
    </div>
    <div>
      <span>Province : </span>
      <input type="text" name="province" placeholder="Enter province">
    </div>
    <div>
        <span>Price : </span>
        <input type="text" name="price" placeholder="Enter price">
      </div>
    <div>
        <input type="submit"></button>
      </div>
  </form>
