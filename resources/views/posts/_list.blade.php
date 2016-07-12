@if (count($posts))
    <table class="table table-responsive">
        <tr><th>#</th><th>Title</th><th>Date</th><th>Manage</th></tr>
        @foreach($posts as $key => $post)
        <tr>
            <td style="background-color: {{$post['color']}}">{{$key + 1}}</td>
            <td><a href="{{action('PostController@edit', ['id' => $post['id']])}}">{{$post['title']}}</a></td>
            <td>{{date('Y-m-d H:i:s', strtotime($post['date']))}}</td>
            <td>
                <a href="{{action('PostController@edit', ['id' => $post['id']])}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href=""><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </td>
        </tr>
        @endforeach
    </table>
@endif