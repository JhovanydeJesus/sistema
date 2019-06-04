 @if(count($errors)>0)
        <div class="alert alert-danger">
          <li class="glyphicon glyphicon-warning-sign"></li>
           <strong>Al parecer algo salió mal.</strong><br><br>
                <ul>
                   @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
          </div>
 @endif