@extends('layouts.frontend')
@section('content')
    <div class="container">
        <div class="div">
            <div class="col-md-12">

                <h1 class="text-center">Креирајте покани</h1>

                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>



            </div>



            <div class="row">
                <div class="col-md-12">

                    <form>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Внесете име на невестата</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Весна">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Внесете име на младоженецот</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Марко">
                        </div>







                    </form>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12 text-center">
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputAmount">https://dragigosti.com/</label>
                            <div class="input-group">
                                <div class="input-group-addon">https://dragigosti.com/</div>
                                <input type="text" class="form-control" id="exampleInputAmount" placeholder="elena-boban">

                            </div>
                        </div>

                    </form>
                </div>


                <div class="col-md-12">
                    <h2>1. Прикачете заедничка слика</h2>

                    <form action="/target" class="dropzone"></form>
                </div>


                <div class="col-md-12">
                    <h2>2. Прикачете слика од невестата</h2>
                    <form action="/target" class="dropzone"></form>
                </div>


                <div class="col-md-12">
                    <h2>3. Прикачете слика од младоженецот</h2>
                    <form action="/target" class="dropzone"></form>
                </div>






            </div>


            
        </div>
    </div>
@endsection
