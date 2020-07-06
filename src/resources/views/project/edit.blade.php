@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card text-white bg-dark border-secondary">
            <div class="card-header">
                Edição
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <form method="post" action="{{ route('project.update', $project->id) }}">
                    @method('PATCH') 
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">    
                                <label for="title" class="text-muted">Título/tema</label>
                                <input type="text" class="form-control" name="title" value="{{ $project->title }}" />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">    
                                <label for="type" class="text-muted">Tipo</label>
                                <input type="text" class="form-control" name="type" value="{{ $project->type }}" />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">    
                                <label for="period" class="text-muted">Período</label>
                                <input type="text" class="form-control" name="period" value="{{ $project->period }}" />
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">    
                                <label for="status" class="text-muted">Situação</label>
                                <input type="text" class="form-control" name="status" value="{{ $project->status }}" />
                            </div>
                        </div>
                    </div>

                    <div class="row section">
                        <div class="col-12">
                            <div class="form-group">    
                                <label for="abstract" class="text-muted">Resumo</label>
                                <textarea class="form-control" id="abstract" name="abstract" rows="3">{{ $project->abstract }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
            

                    <div class="row">
                        <div class="col-4">
                            <p class="text-muted">Autoria</p>
                        </div>
                        <div class="col-4">
                            <p class="text-muted">Orientação</p>
                        </div>
                        <div class="col-4">
                            <p class="text-muted">Examinadores</p>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-4 text-left">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <img class="user-avatar rounded-circle" src="https://colorlib.com/polygon/sufee/images/admin.jpg" alt="User Avatar">
                                </div>
                                <div class="col-10">
                                    <p>Fernando Bevilacqua <br/><small class="text-muted">fernando.bevilacqua</small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Advisors -->
                    <div class="col-4 text-left">
                        <div class="container-fluid">                        
                            <div class="row align-items-center">
                                <div class="col-2">
                                    <img alt="image" class="user-avatar rounded-circle" src="https://colorlib.com/polygon/sufee/images/admin.jpg">
                                </div>
                                <div class="col-10">
                                    <p>
                                        Fernando Bevilacqua <br/>
                                        <small class="text-muted">fernando.bevilacqua</small><br />
                                        <span class="badge badge-danger">Não confirmado</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Examiners -->
                    <div class="col-4 text-left">
                        <div class="container-fluid" id="examiners"> 
                            @foreach ($examining as $participation)
                                <div class="row align-items-center" id="participation{{ $participation->id }}">
                                    <div class="col-2">
                                        <img alt="image" class="user-avatar rounded-circle" src="https://colorlib.com/polygon/sufee/images/admin.jpg">
                                    </div>
                                    <div class="col-9">
                                        <p>
                                            {{ $participation->user->name }} <br/>
                                            <small class="text-muted">{{ $participation->user->username }}</small><br />
                                            <span class="badge badge-danger">Não confirmado</span>
                                        </p>
                                    </div>
                                    <div class="col-1">
                                        <a href="javascript:void(0);" data-onclick="delete:participation:{{ $participation->id }}">R</a>
                                    </div>
                                </div> 
                            @endforeach

                            <div class="row align-items-center">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="examiner" name="examiner" value="" placeholder="Digite nome do examinador"/>
                                    </div>
                                    <div id="examiner-suggestions"></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div id="timeline-pre"></div>
        <div id="timeline">
            <div class="timeline-list">
                <div class="timeline-item">
                    <div class="timeline-icon status-outfordelivery">
                        <svg class="svg-inline--fa fa-shipping-fast fa-w-20" aria-hidden="true" data-prefix="fas" data-icon="shipping-fast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H112C85.5 0 64 21.5 64 48v48H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h272c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H40c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H8c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8h208c4.4 0 8 3.6 8 8v16c0 4.4-3.6 8-8 8H64v128c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"></path>
                        </svg>
                        <!-- <i class="fas fa-shipping-fast"></i> -->
                    </div>
                    <div class="timeline-date">Jul 20, 2018<span>08:58 AM</span></div>
                    <div class="timeline-content">Shipment is out for despatch by KLHB023.<span>KUALA LUMPUR (LOGISTICS HUB), MALAYSIA, MALAYSIA</span></div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon status-inforeceived">
                        <svg class="svg-inline--fa fa-clipboard-list fa-w-12" aria-hidden="true" data-prefix="fas" data-icon="clipboard-list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"></path>
                        </svg>
                        <!-- <i class="fas fa-clipboard-list"></i> -->
                    </div>
                    <div class="timeline-date">Jul 06, 2018<span>02:02 PM</span></div>
                    <div class="timeline-content">Shipment designated to MALAYSIA.<span>HONG KONG, HONGKONG</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

    <script type="text/javascript">
        TCCR.app.data.edit = @json($__data);
    </script>
    <script src="{{ asset('js/tccr.edit.js') }}" type="text/javascript" charset="utf-8"></script>

@endsection