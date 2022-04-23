<form action="{{ route('user-profile-information.update')}}?pills=bank" method="post" >
    @csrf
    @method('put')

    <x-card>

         
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="form-group">
                    <label for="bank_account">Nomor Rekening</label>
                    <select name="bank_id" id="bank_id" class="custom-select @error('bank_id') is-invalid @enderror">
                        <option disable selected>Pilih salah satu</option>
                        @foreach ($bank  as $key => $item)
                            <option value="{{ $key }}" {{ old('bank_id') == $key ? 'selected' : '' }}>{{ $item }}</option>   
                        @endforeach
                    </select>
                    @error('bank_id')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                 <div class="form-group">
                    <label for="account">Nomer Rekening</label>
                    <input type="text" class="form-control @error('account') is-invalid @enderror" name="account" 
                        id="account" value=" {{  old('account') }}">
                    @error('account')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                 <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                        id="name" value=" {{  old('name') }}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- <div class="row justify-content-center">
            <div class="col-lg-4">
                    <label for="account">Nomor Rekening</label>
                    <input type="text" class="form-control @error('account') is-invalid @enderror" name="account" 
                        id="account" value=" {{  old('account') ?? $user->account}}">
                    @error('account')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                        id="name" value=" {{  old('name') ?? $user->name}}">
                    @error('name')
                    <span class="invalid-feedback">{{ $message}}</span>
                    @enderror
                </div>
            </div>
        </div> --}}


        <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-card>

</form>

<x-card>
    <x-slot name="header">
        <h5 class="card-title">Daftar Bank</h5>
    </x-slot>
    <x-table>
        <x-slot name="thead">
            <th width= 5%;>No</th>
            <th>Nama</th>
            <th>Nomor Rekening</th>
            <th>Nama</th>
            <th width= 15%;><i class="fas fa-cog"></i></th>
        </x-slot>
        @foreach ($user->bank_user as $key => $item)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{ $item->pivot->name }}</td>
            <td>{{ $item->pivot->account }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form action="{{ route('profile.bank.delete', $item->id)}}" method="post">
                    @csrf
                    @method('delete')
                    
                    <button class="btn btn-link text-danger" onclick="return confirm('Yakin ingin menghapus data?')">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </x-table>
</x-card>