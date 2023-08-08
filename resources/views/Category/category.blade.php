
@include('Layouts.Empty')
@section('content')
<div class="container">

                <div class="col-md-12">
                    <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModal" data-bs-whatever="@mdo">إضافة</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">أضافة صنف</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('categorys.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">اسم الصنف</label>
                                            <input type="text" class="form-control" id="recipient-name"
                                                name="name">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">إغلاق</button>
                                    <button type="submit" class="btn btn-primary">إضافة</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-hover" id="table_id">
                            <thead>
                                <tr>

                                    <th>الإسم</th>
                                    <th>حذف</th>
                                    <th data-priority="3">تعديل</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $c)
                                    <tr>
                                        <td>{{ $c->Name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-outline-danger"
                                                data-bs-toggle="modal" data-bs-target="#delete{{ $c->id }}"
                                                data-bs-whatever="@mdo">حذف</button>
                                            <div class="modal fade" id="delete{{ $c->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel2">رسالة
                                                                تحذير</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('categorys.destroy', $c->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <p>هل أنت متأكد من عملية الحذف؟</p>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <button type="button"
                                                                        class=" btn-outline-primary  m-1"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close">إغلاق</button>

                                                                    <button type="submit"
                                                                        class="btn  btn-outline-danger m-1">حذف</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success"
                                                data-bs-toggle="modal" data-bs-target="#edit{{ $c->id }}"
                                                data-bs-whatever="@mdo">تعديل</button>

                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit{{ $c->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">تعديل صنف</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action=" {{ route('categorys.update', $c->id) }} "
                                                        method="post">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label"> اسم
                                                                الصنف</label>
                                                            <input type="text" class="form-control" name="name"
                                                                value="{{ $c->Name }}">
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">إغلاق</button>
                                                    <button type="submit"
                                                        class=" btn btn-outline-success">تعديل</button>
                                                </div>
                                                </form>
                                            </div>
                                @endforeach
                            </tbody>

                            </tbody>
                        </table>

                    </div>

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
            var msg = '{{ Session::get('alert') }}';
            var exist = '{{ Session::has('alert') }}';
            if (exist) {
                alert(msg);
            }
        </script>



