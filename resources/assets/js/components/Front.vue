<template>
    <div class="container">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #464847; color:#FFF28E;">Track de cuentas</div>

                <div class="panel-body">
                    <p>Introduzca los datos de busqueda</p>

                    <form @submit.prevent="postValues" class="form">

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

                    <hr/>

                    <img src="/images/garantia.jpg" alt="sme" class="img-responsive hidden-xs hidden-sm">
                </div>
            </div>
        </div>

        <div class="col-md-8" style="position: relative; margin-bottom: 12rem">

            <div class="loader" v-if="loader === true">
                <img src="/images/loading.gif" alt="loading"/>
            </div>

            <div id="contenido" v-if="step_1 === true">
                <img src="/images/back1.jpg" class="img-responsive" alt="SLIDER8.png">
            </div>

            <div id="contenido2" v-if="step_2 === true">
                <display v-for="custom in custom" :key="custom.id"
                        v-bind:cuenta="custom.cuenta"
                        v-bind:destinatario="custom.destinatario"
                        v-bind:direccion="custom.direccion"
                        v-bind:municipio="custom.municipio"
                        v-bind:departamento="custom.departamento"
                        v-bind:ruta="custom.ruta"
                        v-bind:estatus="custom.status"
                        v-bind:recibe="custom.recibe"
                        v-bind:banco="custom.banco"
                        v-bind:fecha="custom.fecha"
                        v-bind:corte="custom.corte"
                        v-bind:observaciones="custom.observaciones"
                >
                </display>
            </div>

        </div>
        <div class="col-md-12">
            <div class="row">
                <hr/>

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
                custom: [],
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



                        if (resp.data == 'Sin_datos') {
                            alert("No se encontraron datos");
                        } else {
                            this.loader = true;
                            this.step_1 = false;
                            this.step_2 = true;

                            setTimeout(function () {

                                this.loader = false
                                this.custom = resp.data;
                                console.log(this.custom);
                            }.bind(this), 1000)
                        }


                    })
            }
        },

        computed: {
            isDisabled() {
                if (this.codigo == '' || this.cuenta == '') {
                    return true
                }
            }
        }
    }
</script>

<style>
    .contenido2 {
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