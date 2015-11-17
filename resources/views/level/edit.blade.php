@extends('app')

@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-10 col-md-offset-1">
     <div class="panel panel-default">
       <div class="panel-heading">Edit Level</div>

       <div class="panel-body">
          <form method="post" action="{{url('level/edit/'.$data->id)}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <table class="table">
             <tr>
               <td>Parent</td>
               <td>
                 <select name="parent" class="form-control">
                   @foreach ($all as $key)
                     <option value="{{ $key->id }}" @if ($data->parent === $key->id) selected @endif>{{ $key->nama }}</option>
                   @endforeach
                 </select>
               </td>
             </tr>
              <tr>
                <td>Nama</td>
                <td><input name="nama" class="form-control" value="{{$data->nama}}"></td>
              </tr>
              <tr>
                <td>Posisi</td>
                <td><input name="posisi" class="form-control" value="{{$data->posisi}}"></td>
              </tr>
              <tr>
                <td></td>
                <td><button class="btn btn-primary">Submit</button></td>
              </tr>
           </table>
          </form>
       </div>
     </div>
   </div>
 </div>
</div>
@endsection
