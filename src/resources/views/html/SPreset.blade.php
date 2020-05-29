<p>
    <h2>{{$data->name ?? ''}} Password Reset</h2><br>
    <br>
    <u>
        <li>
            Email Address : {{$data->email ?? ''}}
        </li>
        <li>
            New Password : {{$data->pdw ?? ''}}
        </li>
    </u>    
</p>