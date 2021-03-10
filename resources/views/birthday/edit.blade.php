<form id="crmForm" action="{{route('birthdays.update',['birthday' => $birthday ->id])}}" method="POST">
@csrf
@method('PUT')
<div class="row">
    <div class="col-md-12">
        <p>First/Last Name<br />
        <input type="text" class="form-control" name="name" value="{{$birthday -> name}}" required></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>Email<br />
        <input type="text" class="form-control" name="email" value="{{$birthday -> email}}" required></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>Date of Birth<br />
        <input type="text" class="form-control datepicker" name="birthday" value="{{$birthday -> birthday}}" required></p>
    </div>
</div>
<hr />
<p><input type="submit" class="btn btn-primary" type="submit" value="Submit"></p>
</form>

