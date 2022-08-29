@extends('backend.layouts.main_themplate')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    {{-- ///////////////////////////////////////////////// --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="mb-3 text-right">
                                    <a href="{{ route('products.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus"></i> Add Product</a>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-danger text-center mb-3">
                                            {{ $message }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">

                                    <div class="col-sm-12">


                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                                            role="grid" aria-describedby="example2_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        ImageProduct</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"
                                                        style="">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending"
                                                        style="">Product</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending"
                                                        style="">slug</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="">ราคา</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="">รูปภาพสินค้า</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="">รูปภาพสินค้า</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="">จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($products as $product)
                                                    {{-- $employees  คือตัวที่รับค่าจาก Model  $employee คือหนึ่งตัว --}}
                                                    <tr class="odd">
                                                        <td><img src="{{ asset('assets/backend/images/products') }}/{{ $product->image }}"
                                                                width="50"></td>
                                                        <td class="dtr-control sorting_1" tabindex="0">{{ $product->id }}
                                                        </td>
                                                        <td style="">{{ $product->name }}</td>
                                                        <td style="">{{ $product->slug }}</td>
                                                        <td style="">{{ $product->price }}</td>

                                                        <td>{{ $product->created_at ? \Carbon\Carbon::parse($product->created_at)->format('d/m/Y') : '' }}
                                                        </td>
                                                        <td>{{ $product->created_at ? \Carbon\Carbon::parse($product->updated_at)->format('d/m/Y') : '' }}
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="{{ route('products.show', $product->id) }}"
                                                                    class="btn btn-info">View</a>
                                                                {{-- <button type="button" class="btn btn-warning">Edit</button> --}}



                                                                <a href="{{ route('products.edit', $product->id) }}"
                                                                    class="btn btn-warning">Edit</a>


                                                                <form method="POST"
                                                                    action="{{ route('products.destroy', $product->id) }}">
                                                                    @csrf
                                                                    <button class="btn btn-danger"
                                                                        onclick="return confirm('Are you sure ?')">Delete</button>
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Rendering engine</th>
                                                    <th rowspan="1" colspan="1" style="">Browser</th>
                                                    <th rowspan="1" colspan="1" style="">Platform(s)</th>
                                                    <th rowspan="1" colspan="1" style="">Engine version</th>
                                                    <th rowspan="1" colspan="1" style="">CSS grade</th>
                                                    <th rowspan="1" colspan="1" style="">CSS grade</th>
                                                    <th rowspan="1" colspan="1" style="">CSS grade</th>
                                                    <th rowspan="1" colspan="1" style="">CSS grade</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="example2_info" role="status"
                                            aria-live="polite">
                                            Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        {{ $products->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->

    {{-- <script>
        $(function() {
            // $("#example1").DataTable({
            //   "responsive": true, "lengthChange": false, "autoWidth": false,
            //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script> --}}


    <!-- Page specific script -->
    <script>
        $(function() {

            $('#example2').DataTable({
                "paging": true,
                "pageLength": 25,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": [{
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 5, 6] ///คอลั่มที่อยากได้
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 5, 6] ///คอลั่มที่อยากได้
                        }
                    },
                    // {
                    //     extend: 'excelHtml5',
                    //     exportOptions: {
                    //         columns: [ 0, 1, 2, 3, 5, 6 ]
                    //     }
                    // },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 5, 6] ///คอลั่มที่อยากได้
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 5, 6] ///คอลั่มที่อยากได้
                        }
                    }, , "colvis",
                ],
                "columnDefs": [{
                    "targets": [4, 7],
                    "orderable": false
                }],
                "language": {
                    "info": "แสดง START ถึง END จาก TOTAL แถว",
                    "infoEmpty": "แสดงทั้งหมด 0 to 0 of 0 รายการ",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "search": "ค้นหา:",
                    "paginate": {
                        "first": "หน้าแรก",
                        "last": "หน้าสุดท้าย",
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                    "buttons": {
                        "collection": "ชุดข้อมูล",
                        "colvis": "การมองเห็นคอลัมน์",
                        "colvisRestore": "เรียกคืนการมองเห็น",
                        "copy": "คัดลอก",
                        "copyKeys": "กดปุ่ม Ctrl หรือ Command + C เพื่อคัดลอกข้อมูลบนตารางไปยัง Clipboard ที่เครื่องของคุณ",
                        "copySuccess": {
                            "_": "คัดลอกช้อมูลแล้ว จำนวน %d แถว",
                            "1": "คัดลอกข้อมูลแล้ว จำนวน 1 แถว"
                        },
                        "copyTitle": "คัดลอกไปยังคลิปบอร์ด",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "_": "แสดงข้อมูล %d แถว",
                            "-1": "แสดงข้อมูลทั้งหมด"
                        },
                        "pdf": "PDF",
                        "print": "สั่งพิมพ์"
                    },
                }
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

        });
    </script>
@endpush
