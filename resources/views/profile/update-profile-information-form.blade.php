<form action="{{ route('user-profile-information.update')}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <x-card>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="text-center">
                    <img src="{{ url(auth()->user()->path_image  ?? '')}}" alt="" class="img-thumbnail preview-path_image" width="200">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="path_image" id="path_image" onchange="preview('.preview-path_image', this.files[0])">
                        <label for="path_image" class="custom-file-label">Choose File</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                 <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                        id="name" value=" {{  old('name') ?? auth()->user()->name}}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                        id="email" value="{{ old('email') ?? auth()->user()->email}}">
                    @error('email')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <input class="form-control @error('role') is-invalid @enderror"  
                        id="role" value="{{ old('role') ?? auth()->user()->role->name}}" readonly>
                    @error('role')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>
            </div>
            <div class="col-lg-4">
                 <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" 
                        id="phone" value="{{ old('phone') ?? auth()->user()->phone}}">
                    @error('phone')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" 
                        id="gender" value="{{ old('gender') ?? auth()->user()->gender}}">
                        <option selected disable>Pilih salah satu</option>
                        <option value="laki-laki" {{auth()->user()->gender == 'laki-laki' ? 'selected' : ''}} >Laki-laki</option>
                        <option value="perempuan" {{auth()->user()->gender == 'perempuan' ? 'selected' : ''}} >Perempuan</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" 
                        id="birth_date" value="{{ old('birth_date') ?? auth()->user()->birth_date}}">
                    @error('birth_date')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="job">Job</label>
                    <input type="text" class="form-control @error('job') is-invalid @enderror" name="job" 
                        id="job" value="{{ old('job') ?? auth()->user()->job}}">
                    @error('job')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea type="text" class="form-control @error('address') is-invalid @enderror" name="address" 
                        id="address" value="">{{ old('address') ?? auth()->user()->address}}</textarea>
                    @error('address')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea type="text" class="form-control @error('about') is-invalid @enderror" name="about" 
                        id="about" value="">{{ old('about') ?? auth()->user()->about}}</textarea>
                    @error('about')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror

                </div>
            </div>
        </div>
       
       

        

        <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-card>
</form>