<table id="consultoresExcel" style="display:none !important;">
<thead>
                                    <tr>
                                        <th>Folio</th>
                                        <th>Nombre</th>
                                        <th>Edad</th>
                                        <th>Correo</th>
                                        <th>Categoria</th>
                                        <th>Género</th>
                                        <th>Ocupación</th>
                                        <th>Escolaridad</th>
                                        <th>Recomendado por:</th>
                                        <th>Precio x hr</th>
                                        <th>Dias por semana</th>
                                        <th>Horas por semana</th>
                                        <th>Fecha de registro</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($advisors as $a)
                                    <tr>
                                        <td>{{$a["id"] ?? '--'}}</td>
                                        <td>{{$a["fullname"] ?? '--'}}</td>
                                        <td>{{$a["age"]?? '--'}}</td>
                                        <td>{{$a["email"] ?? '--'}}</td>                            
                                        <td>{{$a["categories"] ?? '--'}}</td>                            
                                        <td>{{$a["gender"] ?? '--'}}</td>                            
                                        <td>{{$a["job"] ?? '--'}}</td>                            
                                        <td>{{$a["degree"] ?? '--'}}</td>                            
                                        <td>{{$a["recommended_by"] ?? '*'}}</td>                            
                                        <td>{{$a["cost"] ?? '--'}}</td>                            
                                        <td>{{$a["days"] ?? '--'}}</td>                            
                                        <td>{{$a["hours"] ?? '--'}}</td>                            
                                        <td>{{$a["created_at"] ?? '--'}}</td>                            
                                    </tr>
                                    @endforeach
                                </tbody>
</table>