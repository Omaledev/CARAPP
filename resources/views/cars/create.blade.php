@extends('cars.app')
   <div class="m-auto w-4/8 py-24">
      <div class="text-center">
         <h1 class="text-5xl uppercase-bold">Create Car</h1>
       </div>
   </div>

   @if($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif


   <div class="flex justify-center pt-16">
     <div class="block">
      <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <input 
          type="text"
          class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
          name="name"
          placeholder="Brand Name..." 
          id="name" required>

          <input 
          type="text"
          class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
          name="founded"
          placeholder="Founded..." 
          id="founded" required>

          <div class="block shadow-5xl mb-10 p-2 w-80">
            <label 
                for="image" 
                class="bg-gray-100 cursor-pointer text-center italic placeholder-gray-400 hover:bg-gray-200 block p-2">
                Upload Image
            </label>
            <input 
                type="file" 
                name="image" 
                id="image"
                >
          </div>
        

          <textarea name="description" 
          id="description" 
          rows="4"
          class="block shadow-5xl mb-10 p-2 w-80 italic placeholder-gray-400"
          placeholder="Description"></textarea>

          <button type="submit" class="bg-green-500 block-shadow-5xl mb-10 p-2  w-80 uppercase font-bold">
            Submit
          </button>
       </form>
     </div>
   </div>
@section('content')

    
@endsection