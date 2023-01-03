<table id="usuariosExcel" style="display:none !important;">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Género</th>
            <th>Fecha de registro</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $u)
        <tr>
            <td>{{$u["fullname"] ?? '--'}}</td>
            <td>{{$u["age"]?? '--'}}</td>
            <td>{{$u["email"] ?? '--'}}</td>                            
            <td>{{$u["gender"] ?? '--'}}</td>                            
            <td>{{$u["created_at"] ?? '--'}}</td>                            
        </tr>
    @endforeach
    </tbody>
</table>