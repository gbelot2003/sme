<template>
    <div class="container">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Track de cuentas</div>

                <div class="panel-body">

                    <p>Introdusca los datos de busqueda</p>

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

        <div class="col-md-8" style="position: relative">

            <div class="loader" v-if="loader === true">
                <img src="/images/loading.gif" alt="loading"/>
            </div>

            <div id="contenido" v-if="step_1 === true">
                <img src="/images/SLIDER8.png" class="img-responsive" alt="SLIDER8.png">
            </div>

            <div id="contenido2" v-if="step_2 === true">
                <display
                        cuenta="101000002260"
                        destinatario="AYRE TEGUCIGALPA SA"
                        direccion="BARRIO CONCEPCION"
                        municipio="COMAYAGUELA"
                        departamento="FRANCISCO MORAZAN"
                        ruta="C1"
                        estatus="ENTREGADO"
                        recibe="MIGUEL ANGEL MONCADA"
                        banco="8658"
                        fecha="2017-11-25 16:39:51"
                >
                </display>

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
                let toSend = {
                    codigo: this.codigo,
                    cuenta: this.cuenta,
                }

                this.loader = true;

                axios.get('/searchData')
                    .then(resp => {

                        this.step_1 = false;
                        this.step_2 = true;

                        console.log(resp);

                        setTimeout(function () {

                            this.loader = false

                        }.bind(this), 2000)
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