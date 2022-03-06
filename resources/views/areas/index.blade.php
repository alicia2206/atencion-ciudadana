@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white shadows p-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOne">
                <i class="fa-solid fa-plus"></i>&nbsp; Nueva Area
            </button><br><br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-center table-responsive" id="areas-table"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Area</th>
                            <th>Cargos</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalOne" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Area</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="inputCargo" class="form-label">Nombre:</label>
                            <input type="text" id="name" class="form-control" id="inputCargo"
                                aria-describedby="inputCargo" required>
                        </div>
                        <input type="hidden" name="areaId" id="areaId" value="0">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveChange">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var modalOne = new bootstrap.Modal(document.getElementById('modalOne'))

        var areas_table = $('#areas-table').DataTable({
            language: {
                    url: '{{ asset("plugins/es_es.json") }}'
                },
            processing: true,
            serverSide: true,
            pageLength: 5,
            ajax: "{{ route('getAreas') }}",
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'positions',
                    name: 'positions'
                },
                {
                    data: 'actions',
                    name: 'actions'
                }

            ]
        });

        $('#modalOne').on('hidden.bs.modal', function() {
            $('#areaId').val(0);
            $('#name').val("");
        })

        $('body').on('click', '#editArea', function() {
            var id = $(this).data('id');
            var _url = 'areas/' + id;
            $.ajax({
                url: _url,
                type: "GET",
                success: function(response) {
                    if (response) {
                        $('#areaId').val(response.id);
                        $('#name').val(response.name);
                        modalOne.show();
                    }
                }
            });
        });

        $('body').on('click', '#deleteArea', function() {
            var id = $(this).data('id');

            if (confirm("Está seguro de eliminar este video! Se eliminarás los cargos también")) {
                $.ajax({
                    url: "areas/" + id,
                    type: 'DELETE',
                    success: function(response) {
                        areas_table.ajax.reload();
                        toastr["success"]("Area eliminada correctamente!");
                    }
                });
            }
        });


        $('#saveChange').click(function(e) {
            e.preventDefault();
            var areaId = $("#areaId").val();
            var name = $("#name").val();

            $.ajax({
                url: "{{ route('areas.store') }}",
                type: "POST",
                data: {
                    id: areaId,
                    name: name,
                },
                success: function(response) {
                    if (response) {
                        modalOne.hide();
                        areas_table.ajax.reload();
                        toastr["success"]("Gestión realizada correctamente!");
                    }
                }
            });

        })
    </script>
@endpush
