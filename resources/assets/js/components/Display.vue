<template>
    <div class="row">
        <div class="col-md-12">
            <h5>No Cuenta: <span class="status upper">{{ cuenta }}</span></h5>

            <div class="row">

                <div class="col-md-6">
                    <h5>Estatus: <span class="status">{{ estatus }}</span></h5>

                </div>

                <div class="col-md-6">
                    <h5>Recibio: <span class="status">{{ recibe }}</span></h5>
                </div>

            </div>

            <hr />

            <div class="row">

                <div class="col-md-6">
                    <h5>Ruta: <span class="status">{{ ruta }}</span></h5>
                </div>

                <div class="col-md-6">
                    <h5>Destinatario: <span class="resaltados">{{ destinatario }}</span></h5>
                </div>

            </div>


            <div class="row">

                <div class="col-md-6">
                    <h5>Departamento: <span class="resaltados">{{ departamento }}</span></h5>
                </div>

                <div class="col-md-6">
                    <h5>Municipio: <span class="resaltados">{{ municipio }}</span></h5>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <h5>Dirección: <span class="resaltados">{{ direccion }}</span></h5>
                </div>

                <div class="col-md-6">
                    <h5>Banco: <span class="resaltados">{{ banco }}</span></h5>
                </div>

            </div>

            <hr />

            <div class="row">
                <div class="col-md-6">
                    <h5>Fecha: <span class="resaltados">{{ fecha | formatDate }}</span></h5>
                </div>
            </div>


        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import moment from 'moment';

    export default{
        props: ['cuenta', 'destinatario', 'direccion', 'municipio', 'departamento', 'ruta', 'estatus', 'recibe', 'fecha', 'banco'],
        data(){
            return {}
        }
    }
</script>

<style>
    span { text-transform: uppercase; }
    .upper { font-size: 2rem }
    .status { color: darkred; }
    .resaltados { color: #0d3625; }
</style>