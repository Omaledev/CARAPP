@extends('cars.app')
   <div class="m-auto w-4/8 py-24">
      <div class="text-center">
         <h1 class="text-5xl uppercase-bold">Update Car</h1>
       </div>
   </div>

   <div class="flex justify-center pt-20">
     
    <form action="/cars/{{ $car->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="block">
          <input 
          type="text"
          class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
          name="name"
          value="{{ $car->name }}" 
          id="name" required>

          <input 
          type="text"
          class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
          name="founded"
          value="{{ $car->founded }}"  
          id="founded" required>
          
          
          <input 
           type="file"
           class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
           name="image"  
           id="image">


          
           <textarea 
           class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
           name="description"
           rows="4"
           id="description"
           required>{{ $car->description }}</textarea>
       

          <button type="submit" class="bg-green-500 block-shadow-5xl mb-10 p-2  w-80 uppercase font-bold">
            Submit
          </button>
        </div>
       </form>
  </div>
@section('content')

    
@endsection