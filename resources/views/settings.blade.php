@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:20px">
        <div class="col-md-7">
            <table class="table table-striped table-hover">
                <thead style="color: #566787;">
                    <tr>
                        <th>#</th>                        
                        <th>Nom</th>
                        <th>Email</th>    					
                        <th>Action</th>    					
                    </tr>
                </thead>
                <tbody id="tbody">
                    @foreach($allusers as $key=>$alluser)
                    <tr>
                        <td>{{$key+1}}</td>                       
                        <td>{{$alluser->name}}</td>
                        <td>{{$alluser->email}}</td>                        
                        <td><a href="{{route('settings.destroy',[$alluser->id])}}" onclick="return confirm('Are you sure to delete?')"><i class="material-icons" style="color:#F44336;">&#xE872;</i></a></td>	                        
                    </tr>
                    <!--<tr>
                        <td>2</td>
                        <td>Craponne</td>
                        <td>Camry</td>
                        <td>2012</td>
                        <td>Non</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Hyundai</td>
                        <td>Elantra</td>
                        <td>2010</td>
                        <td>Oui</td>
                    </tr>-->
                   @endforeach 		
                </tbody>
            </table>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="mycard-header">
                    {{ __("Fiche Administrateur") }}
                    <p style="color:white; font-size:15px; margin-bottom:0px;">Fichier descriptive de l'administrateur</p>
                </div>

                <div class="mycard-body">
                    <form method="POST" action="{{ route('addregister') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <!-- <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->

                            <div class="col-md-6 offset-md-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->

                            <div class="col-md-6 offset-md-3">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->

                            <div class="col-md-6 offset-md-3">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> -->

                            <div class="col-md-6 offset-md-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4" style="text-align:center">
                                <button type="submit" class="btn btn-primary mybtn">
                                    {{ __("Enregsitrer") }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
