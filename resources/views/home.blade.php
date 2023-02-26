@extends('adminlte::page')

@section('title', ':upd8')

@section('content_header')
    <h1>Listagem de customers</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Consultar cliente</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="CPF" id="doc">
                            </div>
                            <div class="col-3">
                                <input type="text" class="form-control" placeholder="NOME" id="name">
                            </div>
                            <div class="col-3">
                                <input type="date" class="form-control" id="date_birth">
                            </div>
                            <div class="col-3">
                                <div class="form-group form-inline align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" value="m">
                                        <label class="form-check-label">Masculino</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="gender" value="f">
                                        <label class="form-check-label">Femenino</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <input type="text" name="state" id="state" class="form-control" placeholder="Estado">
                            </div>
                            <div class="col-3">
                                <input type="text" name="city" id="city" class="form-control" placeholder="Cidade">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" id="search_send">Pesquisar</button>
                                <button class="btn btn-default" id="search_clean">Limpar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Resultado da pesquisa
                    </div>
                    <div class="card-body">
                        <table  class="table table-striped table-bordered table-hover" width="100%"  id="table-result">

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Customer edit</h4>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="edit_name" placeholder="Nome do cliente">
                        </div>

                        <div class="form-group">
                            <label for="doc">CPF</label>
                            <input type="number" class="form-control" nome="doc" id="edit_doc" placeholder="ex: 467.777.777-97">
                        </div>

                        <div class="form-group">
                            <label for="date_birth">Data Nascimento</label>
                            <input type="date" class="form-control" name="date_birth" id="edit_date_birth">
                        </div>

                        <div class="form-group">
                            <label for="gender">Sexo</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_gender" value="m" id="mascu">
                                <label class="form-check-label" for="mascu">Masculino</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="edit_gender" value="f" id="femin">
                                <label class="form-check-label" for="femin">Femenino</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" id="edit_address" name="address" placeholder="rua logo ali, 1291">
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="edit_city" name="city" placeholder="são paulo">
                        </div>

                        <div class="form-group">
                            <label for="address">Estado</label>
                            <select name="estado" id="edit_state" class="form-control">
                                <option ></option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_edit_modal" data-idEdModal="">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        var table;
        var isFiltering = false;
        $(document).ready(function () {
            // Inicializa a tabela do Datatables
            table = $('#table-result').DataTable({
                "sDom": 'lrtip',
                "responsive": true,
                "searching": true,
                "ajax": {
                    "url": "/list/clientes",
                    "dataSrc": function ( json ) {
                        console.log("dataTableJson:",json);
                        for ( var i=0, ien=json.length ; i<ien ; i++ ) {
                            json[i][0] = '<button id=edit data-id='+json[i][0]+' class=\'btn btn-warning\'>Editar</button>' + '<button id=delete data-id='+json[i][0]+' class=\'ml-2 btn btn-danger\'>Excluir</button>';
                        }
                        return json;
                    }
                },
                "aoColumns": [
                    {"sTitle": "Actions"},
                    {"sTitle": "Nome"},
                    {"sTitle": "CPF"},
                    {"sTitle": "Data Nasc."},
                    {"sTitle": "Estado"},
                    {"sTitle": "Cidade"},
                    {"sTitle": "Sexo"},
                ]
            });


            $("#search_send").click(function(){

                const data = {
                    cpf: $("#doc").val(),
                    name: $("#name").val(),
                    birthdate: $("#date_birth").val(),
                    gender: (typeof $("input[name='gender']:checked").val() === "undefined") ? "" :$("input[name='gender']:checked").val(),
                    state: $("#state").val(),
                    city: $("#city").val()
                }

                console.log("search", data);

                $.ajax({
                    url: '/search/customer',
                    headers: {
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: JSON.stringify(data),
                    success: function(response){

                        console.log("response", response);
                        table.clear().draw();
                        $.each(response, function (k, data) {
                            table.row.add([
                                '<button id=edit data-id=' + data.id + ' class=\'btn btn-warning\'>Editar</button>' + '<button id=delete data-id=' + data.id + ' class=\'ml-2 btn btn-danger\'>Excluir</button>',
                                data.name,
                                data.cpf,
                                data.birthdate,
                                data.state,
                                data.city,
                                data.gender
                            ]).draw(true);
                        });
                    }
                })

            });

            $('#table-result tbody').on('click', '#edit', function () {
                var t_id = $(this).data('id');

                $("#save_edit_modal").data("idEdModal", t_id);

                $("#editModal").modal("show");
                console.log("id", t_id);
            });

            $('#table-result tbody').on('click', '#delete', function () {
                var t_id = $(this).data('id');
                console.log("delete", t_id);

                var url = '/delete/customer/' + t_id;

                $.ajax({
                    url: url,
                    headers: {
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: null,
                    success: function(response){
                        console.log("response", response);
                        alert("Cliente deletado.");

                        window.location.reload();
                    }
                })
            });

            $("#save_edit_modal").click(function (){
                var t_id = $(this).data('idEdModal');

                console.log("save", t_id);

                const data = {
                    "id":t_id,
                    "name": $("#edit_name").val(),
                    "cpf": $("#edit_doc").val(),
                    "gender": $("input[name='edit_gender']:checked").val(),
                    "birthdate": $("#edit_date_birth").val(),
                    "address": $("#edit_address").val(),
                    "state": $("#edit_state").val(),
                    "city": $("#edit_city").val()
                }

                console.log("data send", data)

                if(data.name === "" || data.cpf === "" || data.gender === "" || data.birthdate === "" || data.address === "" || data.state === "" || data.city === ""){

                    alert("Preencha todos os campos");
                    event.preventDefault();
                    return;
                }

                $.ajax({
                    url: '/edit/customer',
                    headers: {
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: JSON.stringify(data),
                    success: function(response){
                        console.log("response", response);
                        alert("Cliente editado.");

                        window.location.reload();
                    }
                })

            });
        })
    </script>
@stop