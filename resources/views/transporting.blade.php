@extends('layouts.app')
@section('content')
	<div class="success-box">
		<h4 class="text-center text-capitalize orderHeading">Հարգելի հաճախորդ Ձեր կարծիքը շատ կարևոր է մեզ համար<h4>
	</div>
	  <div class="form-group">
	    <label for="startingPoint">Ապրանքը վերցնելու վայրը</label>
	    <input type="text"
	       name="startingPoint"
	       class="form-control"
	       id="startingPoint"
	       placeholder="Սկզբնական կետ"
	       value="{{ old('startingPoint')}}"
	       >
	     @if ($errors->has('startingPoint'))
              <li>{{ $errors->first('name') }}</li>
          @endif

	  </div>
	  <div class="form-group">
	    <label for="endingPoint">Ապրանքի տեղափոխման վայրը</label>
	    <input 
	       type="text"
	       name="endingPoint"
	       class="form-control"
	        id="endingPoint" 
	        placeholder="Ավարտական կետ"
	        value="{{ old('endingPoint')}}"
	        >
	     @if ($errors->has('endingPoint'))
              <li>{{ $errors->first('name') }}</li>
          @endif
	  </div>

	


	  <div class="form-group">
	  	 <label for="pickUp">Ապրանքի տեղափոխման ժամը</label>
	     <input 
	    	value="{{ date('Y-m-d') }}" 
	    	id="pickUp" 
	    	type="date" 
	    	required="required" 
	    	name="pickUp"
	    	min="{{ date('Y-m-d') }}"  
	    	max="2020-12-31"
	    	>
	  </div>
	 
	  <button type="submit" class="store btn btn-primary">Ուղարկել</button>
@endsection






