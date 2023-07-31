@extends('auth/templateAuth')
@section('titleAuth')
    {{'Registrate'}}
@stop
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <form method="post" class="form-container">
            {{csrf_field()}}

                <div class="row">
                    <div class="font_center tipo2">
                        <h3 class="sub">¡Complete los campos para continuar con el registro!</h3>
                    </div>
                </div>

                <div class="row mt-3 sangria">
                    <input id="inpNombreUser" name="nombrePersona" type="text" class="form-control inputRegister" placeholder="Nombre(s)" required>
                </div>
                <div class="row mt-2 sangria">
                    <input id="inpApellido1" name="primerApellido" type="text" class="form-control inputRegister" placeholder="Apellido paterno" required>
                </div>
                <div class="row mt-2 sangria">
                    <input id="inpApellido2" name="segundoApellido" type="text" class="form-control inputRegister" placeholder="Apellido materno" required>
                </div>
                <div class="row mt-2 sangria">
                    <input id="inpMail" name="email" type="email" class="form-control inputRegister" placeholder="ejemplo@etesla.mx" required>
                </div>
                <div class="row mt-2 d-flex">
                    <div class="input-group inputPass sangria">
                        <input type="password" class="form-control" id="inpPasswd" name="contrasenia" placeholder="********" required>
                        <div class="input-group-prepend">
                            <button id="show_password" class="btn btn-azul2 btn-eye" type="button" name="showPassword" onclick="mostrarContrasenia()"><i class="uil uil-eye"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 sangria">
                    <select class="form-control inputRegister" name="oficina">
                        <option disabled selected value="-1">Selecciona sucursal a la que perteneces</option>
                        <option value="CDMX">CDMX</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Veracruz">Veracruz</option>
                    </select>
                </div>
                <div class="row mt-2 sangria">
                    <select class="form-control inputRegister" name="rol">
                        <option disabled selected value="-1">Seleccionar puesto que desempeñas</option>
                        <option value="5">Ventas</option>
                        <option value="2" disabled>Operaciones</option>
                        <option value="4" disabled>Ingenieria</option>
                        <option value="3">Gerente de ingenieria</option>
                    </select>
                </div>
                <div class="row font_center mt-3">
                    <input type="submit" id="btnRegistrar" value="Registrate" class="btn btn-estandar btn-verde">
                </div>
                <div class="row tipo2 font_center mt-1">
                    <label class="sub">¿Ya tienes una cuenta?<a href="/"> Inicia sesión</a></label>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        /*#region Register*/
        //Validación de listas desplegables vacias
        $(document).on('change','select',function(){
            listaSucursal = document.getElementsByTagName('select')[0].value;
            listaPuesto = document.getElementsByTagName('select')[1].value;

            if(listaSucursal !== -1){
                if(listaPuesto !== -1){
                    document.getElementById('btnRegistrar').disabled = false;
                }
            }
        });
        /*#endregion*/
    </script>
@endsection

