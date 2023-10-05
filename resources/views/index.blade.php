<html lang="en">
<head>
    <title>Laravel 9 Multiple Image Upload Example - Techsolutionstuff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<div class="container lst">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> something went wrong <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3 class="well">Laravel 9 Multiple Image Upload Example - Techsolutionstuff</h3>

    <form method="post" action="{{url('file')}}" enctype="multipart/form-data">
        @csrf

        <div class="input-group demo control-group lst increment" >
            <input type="file" name="file_names[]" class="myfrm form-control">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button">Add</button>
            </div>
        </div>
        <div class="clone hide">
            <div class="demo control-group lst input-group" style="margin-top:10px">
                <input type="file" name="file_names[]" class="myfrm form-control">
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="button">Remove</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>

    </form>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-success").click(function(){
            var lsthmtl = $(".clone").html();
            $(".increment").after(lsthmtl);
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".demo").remove();
        });
    });
</script>

</body>
</html>
