@extends('cars.app')

@section('content')

    @if(session('success'))
       <div class="alert alert-success">
          {{ session('success') }}
       </div>
    @endif
    
    <div class="m-auto w-11/12 lg:w-4/5 py-10">
        <div class="text-center">
           <h1 class="text-3xl sm:text-4xl md:text-5xl uppercase bold">
            Cars
           </h1>
        </div>
        <div class="pt-10">
           <a href="cars/create" class="border-b-2 pb-2 border-dotted italic text-gray-500">Add a new car &rarr;</a>
        </div>
        <div class=" m-auto w-full lg:w-5/6 py-10">
           @foreach ($cars as $car )
           <div class="m-auto border-b-2 pb-4 mb-6">
               <!-- Main Flex Container -->
               <div class="flex flex-col lg:flex-row items-center justify-between">
                   <div class="flex flex-col w-full lg:w-1/3 text-center lg:text-left">
                       <span class="uppercase text-blue-500 font-bold text-xs italic">{{ $car->founded }}</span>
                       <h2 class="text-gray-700 text-3xl sm:text-4xl lg:text-5xl">{{ $car->name }}</h2>
                   </div>
                   <div class=" w-full lg:w-1/3 my-4 lg:my-0 text-center">
                       <img src="{{ asset($car->image) }}" alt="{{ $car->name }}" 
                       class="w-full max-w-sm h-auto object-contain mx-auto">
                   </div>
                   <div class=" w-full lg:w-1/3 text-center lg:text-right">
                       <p>
                           <a href="cars/{{ $car->id }}/edit" class="border-b-2 pb-2 border-dotted italic text-green-500">
                              Edit &rarr;
                           </a>
                       </p>
                       <p>
                        <form action="cars/{{ $car->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="border-b-2 pb-2 border-dotted italic text-green-500">
                                Delete &rarr;
                            </button>
                        </form>
                       </p>
                   </div>
               </div>
               <div class="mt-4">
                   <p class=" text-base sm:text-lg md:text-xl text-gray-700 py-6">{{ $car->description }}</p>
               </div>
           </div>
           @endforeach
        </div>
    {{ $cars->links() }}
    </div>
@endsection
