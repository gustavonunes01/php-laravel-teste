@extends('adminlte::page')

@section('title', ':upd8')

@section('content_header')
    <h1>Novo cliente</h1>
@stop

@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form id="form_customer">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="name" placeholder="Nome do cliente">
                            </div>

                            <div class="form-group">
                                <label for="doc">CPF</label>
                                <input type="number" class="form-control" nome="doc" id="doc" placeholder="ex: 467.777.777-97">
                            </div>

                            <div class="form-group">
                                <label for="date_birth">Data Nascimento</label>
                                <input type="date" class="form-control" name="date_birth" id="date_birth">
                            </div>

                            <div class="form-group">
                                <label for="gender">Sexo</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="m" id="mascu">
                                    <label class="form-check-label" for="mascu">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="f" id="femin">
                                    <label class="form-check-label" for="femin">Femenino</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="rua logo ali, 1291">
                            </div>

                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="são paulo">
                            </div>

                            <div class="form-group">
                                <label for="address">Estado</label>
                                <select name="estado" id="state" class="form-control">
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

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" id="customer_save">Salvar</button>
                            <input type="reset" class="btn btn-default" id="customer_clean" value="Limpar"></input>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script>
        $(document).ready(function () {

            $( "#form_customer" ).submit(function( event ) {

                const data = {
                    "name": $("#name").val(),
                    "cpf": $("#doc").val(),
                    "gender": $("input[name='gender']:checked").val(),
                    "birthdate": $("#date_birth").val(),
                    "address": $("#address").val(),
                    "state": $("#state").val(),
                    "city": $("#city").val()
                }

                console.log("data send", data)

                if(data.name === "" || data.cpf === "" || data.gender === "" || data.birthdate === "" || data.address === "" || data.state === "" || data.city === ""){

                    alert("Preencha todos os campos");
                    event.preventDefault();
                    return;
                }

                $.ajax({
                    url: '/save_customer',
                    headers: {
                        "Content-Type": "application/json",
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    data: JSON.stringify(data),
                    success: function(response){
                        console.log("response", response);
                        alert("Cliente criado.");

                        $("#customer_clean").click()
                    }
                })


                event.preventDefault();
            });
        })
    </script>
@stop