<template>
    <div class="container">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #464847; color:#FFF28E;">Track de cuentas</div>

                <div class="panel-body">
                    <p>Introduzca los datos de busqueda</p>

                    <form @submit.prevent="postValues"  class="form">

                        <div class="form-group">
                            <label for="codigo">Código de Banco</label>
                            <input v-model="codigo" type="number" class="form-control" id="codigo"
                                   placeholder="Código de Banco">
                        </div>

                        <div class="form-group">
                            <label for="cuenta">No. de Cuenta</label>
                            <input v-model="cuenta" type="number" class="form-control" id="cuenta"
                                   placeholder="No. de Cuenta">
                        </div>

                        <button type="submit" class="btn btn-primary" :disabled=isDisabled>
                            Buscar
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <div class="col-md-8" style="position: relative; margin-bottom: 12rem">

            <div class="loader" v-if="loader === true">
                <img src="/images/loading.gif" alt="loading"/>
            </div>

            <div id="contenido" v-if="step_1 === true">
                <img src="/images/SLIDER8.png" class="img-responsive" alt="SLIDER8.png">
            </div>

            <div id="contenido2" v-if="step_2 === true">
                <display
                        v-bind:cuenta="custom.cuenta"
                        v-bind:destinatario="custom.destinatario"
                        v-bind:direccion="custom.direccion"
                        v-bind:municipio="custom.municipio"
                        v-bind:departamento="custom.departamento"
                        v-bind:ruta="custom.ruta"
                        v-bind:estatus="custom.estatus"
                        v-bind:recibe="custom.recibe"
                        v-bind:banco="custom.banco"
                        v-bind:fecha="custom.fecha"
                        v-bind:observaciones="custom.observaciones"
                >
                </display>
            </div>

        </div>
        <div class="col-md-12">
            <div class="row">
                <hr />
                <div class="col-md-4">
                    <img src="/images/logo_sme2.jpg" alt="sme" class="img-responsive">
                </div>
                <div class="col-md-4">
                    <img src="/images/garantia.jpg" alt="sme" class="img-responsive">
                </div>
                <div class="col-md-4">
                    <img src="/images/logo2.jpg" alt="sme" class="img-responsive">
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import Vue from 'vue';
    import Display from './Display.vue';
    export default {

        data (){
            return {
                step_1: true,
                step_2: false,
                loader: true,
                codigo: '',
                cuenta: '',
                custom:{
                    'cuenta':'',
                    'destinatario':'',
                    'direccion':'',
                    'municipio':'',
                    'departamento':'',
                    'ruta':'',
                    'estatus':'',
                    'recibe':'',
                    'banco':'',
                    'observaciones':'',
                    'corte':'',
                    'fecha':''
                }
            }
        },

        mounted() {
            this.whenReady();
        },

        methods: {
            whenReady(){
                return this.loader = false;
            },

            changeToStepOne(){
                this.step_1 = true;
                this.step_2 = false;
            },

            postValues(){



                axios.get('/searchData/' + this.codigo + '/' + this.cuenta)
                    .then(resp => {

                       console.log(resp);

                        if(resp.data == 'Sin_datos'){
                            alert("No se encontraron datos");
                        } else {
                            this.loader = true;
                            this.step_1 = false;
                            this.step_2 = true;
                            this.custom.cuenta = resp.data.cuenta;
                             this.custom.destinatario = resp.data.destinatario;
                             this.custom.direccion = resp.data.direccion;
                             this.custom.municipio = resp.data.municipio;
                             this.custom.departamento = resp.data.departamento;
                             this.custom.ruta = resp.data.ruta;
                             this.custom.estatus = resp.data.status;
                             this.custom.recibe = resp.data.recibe;
                             this.custom.banco = resp.data.banco;
                             this.custom.observaciones = resp.data.observaciones;
                             this.custom.corte = resp.data.corte;
                             this.custom.fecha = resp.data.created_at;

                            setTimeout(function () {

                             this.loader = false

                             }.bind(this), 1000)
                        }


                    })
            }
        },

        computed: {
            isDisabled() {
                if(this.codigo == '' || this.cuenta == ''){
                    return true
                }
            }
        }
    }
</script>

<style>
    .contenido2{
        background-color: white;
    }

    .loader {
        width: 100%;
        height: 100%;
        position: absolute;
        background: #F5F8FA;
        z-index: 1;
    }

    .loader img {
        background: #F5F8FA;
        position: relative;
        top: 0%;
        left: 30%;
    }

</style>