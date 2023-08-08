
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <!-- Datatable Dependency start -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

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


   <div class="container">

        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>Data Table Export</h4>
                    <p>Data table with print, pdf, csv</p>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-hover" id="table_id">
                        <thead>
                            <tr>
                                <th data-priority="1">#</th>
                                <th>الاسم</th>
                                  <th>حذف</th>
                                <th >تعديل</th>
                                

                            </tr>   
                        </thead>
                        <tbody>
                         {{-- @foreach($category as $c) --}}
                            <tr>
                              {{-- <td>{{$c->Name}}</td> --}}
                              <td>
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2" data-bs-whatever="@mdo">حذف</button>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel2">رسالة تحذير</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                        <form  method="post">
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
                              <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-whatever="@mdo">تعديل</button>
                              <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel3">New message</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="    " method="post">
                                      @csrf
                                      @method('PUT')
                                        <div class="mb-3">
                                          <label for="recipient-name" class="col-form-label"> اسم الصنف</label>
                                          <input type="text" class="form-control" id="recipient-name" name="name" value="{{}}">
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
                            {{-- @endforeach --}}
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
