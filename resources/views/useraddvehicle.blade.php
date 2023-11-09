<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADD NEW PARKING SPOT') }}
        </h2>

        <div class="mt-3 d-flex align-items-center justify-content-center">
            <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="container-fluid">
                        <form action="/usernew" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="nameInput" class="form-label">REGISTRAION</label>
                                        <input name="reg" value="{{ old('name') }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="typeInput" class="form-label">TYPE</label>
                                        <select name="type" class="form-select" id="typeInput">
                                            <option value="two_wheeler">Two Wheeler</option>
                                            <option value="four_wheeler">Four Wheeler</option>
                                        </select>
                                    </div>
    
                                    <input type="hidden" name="ownerid" value="{{ auth()->user()->id }}">
                                
    
                                   
    
                                    <button type="submit" class="btn btn-dark">Submit</button>
                                </div>
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </x-slot>


   
     
</x-app-layout>