


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>إدارة المواد</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Datatable Dependency end -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
<body>
  <div class="d-flex" id="wrapper" >
    <!-- Sidebar-->
    <div class="border-end bg-white " id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom bg-light">إدارة المستودعات</div>
        <div class="list-group list-group-flush">
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('categorys.index')}}">إدارة الأصناف</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('matters.index')}}">إدارة المواد</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('bills.index')}}">إدارة الفواتير</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('inputs.index')}}">المدخلات</a>
            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('exports.index')}}">المخرجات</a>

        </div>
    </div>

            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
              <!-- Top navigation-->
              <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                  <div class="container-fluid">
                      <button class="btn btn-primary" id="sidebarToggle">إخفاء القائمة</button>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif


                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                  </div>
              </nav>


   <div class="container">

        <div class="col-md-12">
          <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">إضافة</button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">مادة جديدة</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{route('matters.store')}}" method="POST" >
                    @csrf
                      <div class="mb-3">
                       <label for="">رقم المادة</label><input type="text" name="number" class=" form-control">
                      <label for="">اسم المادة</label> <input type="text" name="Nmae" class=" form-control">
                        <label for="">عددها</label><input type="text" name="Count" class="form-control">
                       <label for="">ملاحظات</label>  <textarea name="Notes" id="" cols="30" rows="10" class=" form-control"></textarea>
                       <label for="">اسم الصنف</label>
                       <select class="form-control m-bot15" name="CategoryId"  data-live-search="true">
                        @if($category->count() > 0)
                       @foreach($category as $c)
                        <option value="{{$c->id}}">{{$c->Name}}</option>
                       @endForeach
                       @else
                        No Record Found
                         @endif
                     </select>

                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">إضافة</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
                <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error}}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

                    <table class="table table-bordered table-hover col-10" id="table_id">
                        <thead>
                            <tr>
                              <th>رقم المادة</th>
                              <th>الإسم</th>
                              <th>عدد</th>
                              <th>ملاحظات</th>
                              <th>اسم الصنف</th>
                              <th>حذف</th>
                                <th data-priority="7" >تعديل</th>


                            </tr>
                        </thead>
                        <tbody>
                          @foreach($matters as $m)
                          <tr>
                          <td>{{$m->number}}</td>
                            <td>{{$m->Nmae}}</td>
                            <td>{{$m->Count}}</td>
                            <td>{{$m->Notes}}</td>
                            <td>
                            @foreach($category as $c)
                            @if($m->CategoryId==$c->id)
                            {{$c->Name}}
                            @endif
                            @endforeach
                          </td>
                          <td>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $m->id }}" data-bs-whatever="@mdo">حذف</button>
                    <div class="modal fade" id="delete{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel2">رسالة تحذير</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                        <form action="{{route('matters.destroy',$m->id)}}"  method="post">
                                     @csrf
                                       @method('DELETE')
                                       <p>هل أنت متأكد من عملية الحذف؟</p>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                 <button type="button" class=" btn-outline-primary  m-1" data-bs-dismiss="modal" aria-label="Close">إغلاق</button>

                                  <button type="submit" class="btn  btn-outline-danger m-1">حذف</button>

                                </div>
                                  </form>
                        </div>
                             </td>
                             <td>
                              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit{{ $m->id }}" data-bs-whatever="@mdo">تعديل</button>
                              <div class="modal fade" id="edit{{ $m->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel3">تعديل مادة</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="{{route('matters.update',$m->id)}}" method="post" >
                                        @csrf
                                        @method('PUT')
                                          <div class="mb-3">
                                           <label for="">الاسم</label> <input type="text" name="Name" id="" value="{{$m->Nmae}}" class=" form-control">
                                            <label for="">العدد</label><input type="text" name="Count" id="" value="{{$m->Count}}" class=" form-control">
                                            <label for="">رقم المادة</label><input type="text" name="number" id="" value="{{$m->number}}" class=" form-control">
                                          <label for="">ملاحظات</label>  <textarea name="Notes" id="" cols="30" rows="10" class=" form-control">{{$m->Notes}}</textarea>
                                            <br><div class="form-group">
                                              <select class="form-control m-bot15" name="CategoryId" data-live-search="true">
                                                @if($category->count() > 0)
                                               @foreach($category as $c)
                                                <option value="{{$c->id}}">{{$c->Name}}</option>
                                               @endForeach
                                               @else
                                                No Record Found
                                                 @endif
                                             </select>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">إغلاق</button>
                                        <button type="submit" class=" btn btn-outline-success">تعديل</button>
                                      </div>
                                    </form>
                                  </div>
                             </td>
                            </tr>
                            @endforeach
                          </tbody>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
                $('#table_id').DataTable({

                    dom: 'Bfrtip',
                    responsive: true,
                    pageLength: 25,
                    // lengthMenu: [0, 5, 10, 20, 50, 100, 200, 500],

                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]

                });
            });
    </script>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
         <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>
