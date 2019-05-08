@extends('home')
@section('title','danh sách nhiệm vụ')
@section('content')
    <div  class="col-12">
        <div  style="text-align: center;color: #761b18">
            <h1 >Tasks List</h1>
        </div>
        <a href="{{route('tasks.create')}}"><button type="button" class="btn btn-primary">CREATE</button> </a>

        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                </p>
            @endif
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên công việc</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Ngày hết hạn</th>
                <th scope="col">Thao Tác</th>
            </tr>
            </thead>
            <tbody>
            @if(count($tasks)==0)
                <tr>
                    <td colspan="4">không có dữ liệu</td>
                </tr>
            @else
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{$task->title}}</td>
                        <td>{{$task->content}}</td>
                        <td><img src="{{asset('storage/'.$task->image)}}" style="width: 150px" /></td>
                        <td>{{$task->due_date}}</td>
                        <td>
                            <a href="{{route('tasks.destroy',['id'=>$task->id])}}"><button type="button" class="btn btn-danger" onclick="return confirm('bạn muốn xóa {{$task->title}}')">DELETE</button> </a>
                            <a href="{{route('tasks.edit',['id'=>$task->id])}}"><button type="button" class="btn btn-primary">UPDATE</button> </a>
                        </td>
                    </tr>
                @endforeach
@endif
            </tbody>
        </table>
    </div>
@endsection