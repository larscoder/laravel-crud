<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Laravel CRUD</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-dm-8 mx-auto">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    - {{ $error }}  <br />
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="form row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" placeholder="Nombre" class="form-control" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" placeholder="Contraseña" class="form-control">
                                </div>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input
                                            type="submit"
                                            value="Eliminar"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar...?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>