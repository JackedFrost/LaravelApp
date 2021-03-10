
<x-slot name="heading">
    <h1 class= ""><i class="fa fa-lgfa-fw fa-users"></i> Contacts</h1>
</x-slot>

@section('content')
<div class="container-fluid">
    @if (session('status'))
        <div class= "alert alert-success">
            {{session('status')}}
        </div>
    @endif
        <div class="flex">
        <p><a href="{{route('birthdays.create')}}" class= "focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg" data-title="<i class='fa fa-users'></i> Add Contact"> Add A Contact </a></p>
        </div>
        </br>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table id="bseda-table" class=class="min-w-full divide-y divide-gray-200 DataTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th aria-sort="ascending" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birthday</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($birthdays as $birthday)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><a href="{{route('birthdays.show',[$birthday-> id])}}">{{$birthday->name}}
                                </a></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a href="mailto:{{$birthday-> email}}">{{$birthday->email}}
                                </a></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$birthday-> birthday}}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><a href="{{route('birthdays.edit',['birthday' => $birthday->id])}}"
                                class="form-btn" data-title="<i class='fa fa-users'></i> Edit Contact"><svg class="w-6 h-6 text-gray-500 hover:text-gray-200" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg></a>
                                <a href="{{route('birthdays.destroy',['birthday' => $birthday->id])}}" class= "delete-btn"><svg class="w-6 h-6 text-gray-500 hover:text-gray-200"  fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    </br>
                    </div>
                    <p><a href="{{route('birthdays.create')}}" class="focus:outline-none text-white text-sm py-2.5 px-5 rounded-md bg-blue-500 hover:bg-blue-600 hover:shadow-lg" data-title="<i class='fa fa-users'></i> Add Contact">Add A Contact</a></p>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#bseda-table, #bsedc-table').DataTable({
            "paging":true,
            "lengthChange":true,
            "searching":true,
            "ordering":true,
            "info":false,
            "autowidth":false,
            "lengthMenu": [[10,25,50,-1],[10,25,50,"All"]]
        });
    });
</script>
@endsection