<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
    @if (session('status'))
        <div class ="alert alert-success">
            {{session('status')}}
        </div>
    @endif
     <div class="row">
        <div class="col-md-6">
            <div class="section-content">
                <h2 class="section-heading">Contact Information</h2>
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <p>Name<br />
                            <strong> {{$birthday->name}}</strong></p>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                            <p> Email<br />
                            <strong><a href="mailto:{{$birthday->email}}">{{$birthday->email}}</a></strong></p>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                            <p>Birthday<br />
                            <strong> {{$birthday->birthday}}</strong></p>
                            </div>
                        </div>
                        <hr />
                            <p><a href="{{route('birthdays.edit',['birthday' => $birthday->id])}}" class="btn btn-primary form-btn" data-title="<i class=' fa fa-users></i> Edit Contact">Edit this Contact</a></p>
                    </div>
</x-app-layout>
