<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <form id="crmForm" action="{{route('birthdays.store')}}" method="POST">
@csrf
<div class="row">
    <div class="col-md-12">
        <p>First/Last Name<br />
        <input type="text" class="form-control" name="name" required></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>Email<br />
        <input type="text" class="form-control" name="email" required></p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p>Date of Birth<br />
        <input type="text" class="form-control datepicker" name="birthday" required></p>
    </div>
</div>
<hr />
<p><input type="submit" class="btn btn-primary" type="submit" value="Submit"></p>
</form>
</x-app-layout>
