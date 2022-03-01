<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="p-5">
                                <form id="frmLogin" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username"
                                            name="username" aria-describedby="emailHelp" placeholder="Ingrese usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" placeholder="Ingrese contraseña">
                                    </div>
                                    <div class="alert alert-danger d-none text-center" id="alerta" role="alert">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit"
                                        onclick="frmLogin(event)">
                                        Login
                                    </button>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>