<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ADD NEW PARKING SPOT') }}
        </h2>

        <div class="mt-3 d-flex align-items-center justify-content-center">
            <div class="max-w-1xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-secondary overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="container-fluid">
                        <form action="/adminadduser" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="mb-3">
                                        <label for="nameInput" class="form-label">NAME</label>
                                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="nameInput" aria-describedby="nameHelp">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
    
                                    <div class="mb-3">
                                        <label for="locationInput" class="form-label">EMAIL</label>
                                        <input name="email" value="{{ old('date') }}" type="text" class="form-control" id="locationInput" aria-describedby="dateHelp">
                                        @error('location')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="passwordInput" class="form-label">PASSWORD</label>
                                        <input name="password" type="password" class="form-control" id="passwordInput">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="roleSelect" class="form-label">ROLE(2 for admin, 1 for bookie )</label>
                                        <select name="role" class="form-select" id="roleSelect">
                                            <option value="1" @if(old('role') == 1) selected @endif>Role 1</option>
                                            <option value="2" @if(old('role') == 2) selected @endif>Role 2</option>
                                        </select>
                                        @error('role')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                   
    
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