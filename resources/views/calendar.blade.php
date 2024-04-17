@extends('adminlte::page')


@section('content_header')
    <div class="header-container d-flex align-items-center justify-content-between">
        <h1 class="m-0 text-danger">CALENDARIO</h1>
        <a href="{{ route('admin.event.create') }}" class="btn-icon-plus btn btn-success">
            <i class="fas fa-plus"></i> NUEVA CITA
        </a>
    </div>
@stop

@section('css')
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
    <link href="styles/calendar.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <!-- Modal -->
                    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content text-white bg-success">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="modalTitle"></h4>
                                </div>
                                <div class="modal-body">
                                    <p id="modalBody"></p>
                                </div>
                                <div id="modalFooter" class="modal-footer">
                                    <button id="cerrar" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script>
        var routes = {
            destroy: "{{ route('admin.event.destroy', ['event' => '__id__']) }}",
            edit: "{{ route('admin.event.edit', ['event' => '__id__']) }}"
        };
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap5',
                initialView: 'timeGridWeek',
                locale: 'es',
                slotMinTime: '08:00',
                selectable: true,
                selectMirror: true,
                editable: true,
                nowIndicator: true,
                eventColor: '#28a745',
                eventBorderColor: '#000',
                events: @json($events),
            });
            calendar.on('eventClick', function(info) {
                const event = info.event;
                var destroyUrl = routes.destroy.replace('__id__', event.id);
                var editUrl = routes.edit.replace('__id__', event.id);
                var crud = `
                    <div class="d-flex align-items-center">
                        <form action="${destroyUrl}" method="POST" class="margin-custom  me-2">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                            <button class="btn btn-sm btn-danger btn-custom">
                                <i class="nav-icon fas fa-trash-alt"></i>
                            </button>
                        </form>
                            <a href="${editUrl}" class="btn btn-sm btn-warning btn-custom  me-2">
                                <i class="nav-icon fas fa-edit"></i>
                            </a>
                            <button id="cerrar" class="btn btn-sm btn-danger btn-custom" data-bs-dismiss="modal">Cerrar</button
                    </div>
                `;
                document.getElementById('modalTitle').textContent = event.title;
                document.getElementById('modalBody').textContent = 'Inicio: ' + event.start.toLocaleString();

                if (event.end) {
                    document.getElementById('modalBody').innerHTML += '<br>';
                    document.getElementById('modalBody').innerHTML += '<br>Fin: ' + event.end.toLocaleString();
                }

                if (event.extendedProps.description) {
                    document.getElementById('modalBody').innerHTML += '<br>';
                    document.getElementById('modalBody').innerHTML += '<br><p>Descripción: ' + event.extendedProps.description +'</p>';
                }

                document.getElementById('modalFooter').innerHTML = '';
                document.getElementById('modalFooter').innerHTML += crud;

                var eventModal = new bootstrap.Modal(document.getElementById('eventModal'), {
                    keyboard: true
                });
                eventModal.show();

                const close = document.getElementById('cerrar');
                close.addEventListener('click', () =>{
                    eventModal.hide();
                });
            });

            calendar.render();

        });
    </script>
@stop


