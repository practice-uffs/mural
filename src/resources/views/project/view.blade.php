@extends('layouts.main')

@section('headsup')

<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Atenção</h4>
            <p>Esse horário é preliminar. Ele foi decidido e homologado pelo Colegiado do Curso, então há baixas chances que ele seja alterado. Entretanto, ele pode sofrer alterações conforme demandas da Coordenação Acadêmica em virtude de alocações fora do controle da Coordenação do Curso.</p>
            <hr>
            <p class="mb-0">Dúvidas? Escreva para <a href="mailto:computacao.ch@uffs.edu.br">computacao.ch@uffs.edu.br</a></p>
        </div>
    </div>
</div>

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card text-white bg-dark border-secondary">
            <div class="card-header">
                Informações
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p class="text-muted">Título/tema</p>
                        <p class="">Uso de Realidade Aumentada para auxiliar o ensino de Geometria na disciplina de Computação Gráfica na UFFS</p>
                    </div>
                    <div class="col-2">
                        <p class="text-muted">Tipo</p>
                        <p class="">Projeto (TCC I)</p>
                    </div>
                    <div class="col-2">
                        <p class="text-muted">Período</p>
                        <p class="">2019/2</p>
                    </div>
                    <div class="col-2">
                        <p class="text-muted">Situação</p>
                        <p class="">Em andamento</p>
                    </div>
                </div>

                <div class="row section">
                    <div class="col-12">
                        <p class="text-muted">Resumo</p>
                        <p class="text-muted small text-justify">A associação dos conceitos matemáticos com a realidade é um desafio para a maioria dos

estudantes. A tecnologia atual fornece ferramentas para criar opções que aproximam essa per-
cepção. À vista disso, essa pesquisa mostra o potencial que a Realidade Aumentada tem quando

associada a Teoria da Carga Cognitiva e a Visualização, na elaboração de uma ferramenta que
auxilie os estudantes na concepção e aprendizado de conceitos matemáticos que são utilizados

na disciplina de Computação Gráfica na UFFS. São apresentados os referenciais teóricos em-
pregados nessa pesquisa, bem como o processo de criação do protótipo de uma aplicação de

Realidade Aumentada contendo demonstrações sobre vetores em uma aula de Computação Grá-
fica. A pesquisa demonstra a importância da Realidade Aumentada como auxílio nos processos

práticos pedagógicos, através da avaliação das respostas e opiniões coletadas na fase de testes e
validação do protótipo desenvolvido.</p>
                    </div>
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