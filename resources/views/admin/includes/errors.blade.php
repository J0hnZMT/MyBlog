    @if(count($errors)>0)
    <div class="col-md-12">
        <div class="form-group">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                    <li class="list-group-item">
                    <label class="bmd-label-floating">{{$error}}</label>
                    </li>
                @endforeach
            </ul>  
        </div>
    </div>
     
              
    @endif
