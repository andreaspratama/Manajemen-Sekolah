<a href="{{url('logout')}}" class="btn btn-primary">Metu</a>

<form action="{{url('logout')}}" method="POST">
    @csrf
    <button class="btn btn-primary">Metu</button>
</form>