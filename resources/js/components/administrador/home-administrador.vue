<template>
    <div class="container">
        <div class="row mb-2" v-if="consulta == 'bibliotecarios'">
            <div class="col p-0 text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalNuevo" @click="limpiarBibliotecario">Nuevo</button>
            </div>
        </div>
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
                            <th v-if="consulta == 'bibliotecarios'">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item) in resultados" v-bind:key="item.nombre+item.email">
                            <td>{{ item.name }}</td>
                            <td>{{ item.email }}</td>
                            <td v-if="consulta == 'bibliotecarios'">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary">editar</button>
                                    <button type="button" class="btn btn-danger" @click="eliminarUsuario(item.id)">eliminar</button>
                                </div>
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
                        <tr v-for="(item,index) in resultados" v-bind:key="index+item.title">
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
        <div class="modal fade" id="ModalNuevo" tabindex="-1" aria-labelledby="ModalNuevoLabel" aria-hidden="true" v-if="consulta == 'bibliotecarios'">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalNuevoLabel">Nuevo Bibliotecario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="nombre-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre-name" v-model="nuevo_bibliotecario.name">
                            </div>
                            <div class="form-group">
                                <label for="email-text" class="col-form-label">email:</label>
                                <input type="email" class="form-control" id="email-text" v-model="nuevo_bibliotecario.email">
                            </div>
                            <div class="form-group">
                                <label for="password-text" class="col-form-label">password:</label>
                                <input type="password" class="form-control" id="password-text" v-model="nuevo_bibliotecario.password">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="limpiarBibliotecario">Cerrar</button>
                        <button type="button" class="btn btn-secondary" @click="limpiarBibliotecario">Limpiar</button>
                        <button type="button" class="btn btn-primary" @click="guardarBibliotecario">Guardar</button>
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
                nuevo_bibliotecario: {
                    name: '',
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            eliminarUsuario(id) {
                this.cargando = true;
                axios.delete('/'+this.consulta+'/' + id)
                .then(response => {
                    this.cargando = false;
                    this.consultaBd(this.consulta);
                })
                .catch(error => {
                    this.cargando = false;
                    console.log(error);
                });
            },
            guardarBibliotecario() {
                if ( !this.nuevo_bibliotecario.name || !this.nuevo_bibliotecario.email || !this.nuevo_bibliotecario.password ) {
                    alert('Todos los campos son obligatorios');
                    return;
                }
                this.cargando = true;
                axios.post('/bibliotecarios', this.nuevo_bibliotecario)
                .then(response => {
                    this.cargando = false;
                    this.nuevo_bibliotecario = {
                        name: '',
                        email: '',
                        password: ''
                    };
                    this.consultaBd('bibliotecarios');
                })
                .catch(error => {
                    this.cargando = false;
                    console.log(error);
                });
            },
            limpiarBibliotecario() {
                this.nuevo_bibliotecario.name = ''
                this.nuevo_bibliotecario.email = ''
                this.nuevo_bibliotecario.password = ''
            },
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
