<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Hi...{{Auth::user()->name}}
        </h2>
        <b style="float:right">Total User <span style="color:red">{{count($users)}}</span></b>
    </x-slot>

    <div class="py-12">
        <div class="container">
        <div class="row">

        <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Created_AT</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
    </div>
</x-app-layout>
