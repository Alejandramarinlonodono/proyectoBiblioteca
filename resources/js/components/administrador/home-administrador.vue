<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-2 p-0">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <button type="button" class="btn btn-link btn-block rounded-0" :class="{'active border-info': consulta == 'bibliotecarios'}" @click="cambiarConsulta('bibliotecarios')">Bibliotecarios</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link btn-block rounded-0" :class="{'active border-info': consulta == 'estudiantes'}" @click="cambiarConsulta('estudiantes')">Estudiantes</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-link btn-block rounded-0" :class="{'active border-info': consulta == 'libros'}" @click="cambiarConsulta('libros')">Libros</button>
                    </li>
                </ul>
            </div>
            <div id="admin-contenedor" class="col p-0">
                <table class="table text-center table-bordered p-0" v-if="consulta == 'bibliotecarios' || consulta == 'estudiantes'" v-show="cargando == false">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item,index in resultados" v-bind:key="index+item.nombre">
                            <td>{{ item.name }}</td>
                            <td>{{ item.email }}</td>
                            <td>
                                accion
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table text-center table-bordered p-0" v-else v-show="cargando == false">
                    <thead class="thead-dark">
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item,index in resultados" v-bind:key="index+item.title">
                            <td>{{ item.title }}</td>
                            <td>{{ item.author }}</td>
                            <td>{{ item.editorial }}</td>
                            <td>
                                accion
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center m-5">
                    <div class="spinner-border text-info" role="status" v-show="cargando == true">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</template>

<script>
    export default {
        data() {
            return {
                cargando: false,
                resultados: [],
                consulta: 'bibliotecarios',
            }
        },
        methods: {
            cambiarConsulta(consulta) {
                this.consulta = consulta;
                this.consultaBd(consulta);
            },
            consultaBd(tipo){
                this.cargando = true;
                axios.get('/'+tipo)
                .then(response => {
                    this.resultados = response.data;
                    this.cargando = false;
                })
                .catch(error => {
                    console.log(error);
                });
            }
        },
        mounted() {
            this.consultaBd('bibliotecarios');
        }
    }
</script>

<style lang="scss" scoped>
    #admin-contenedor {
        table {
            background-color: #eee;
        }
    }
</style>
