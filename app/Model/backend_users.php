<?php
$servername = "localhost";
$username = "root";
$password = "I3aD_2021*";
$dbname = "sgcote";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Receber a requisão da pesquisa 
$requestData= $_REQUEST;


//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
$columns = array( 
	0 =>'nome_usuario', 
	1 => 'id_acesso',
	2=> 'cpf',
	3=> 'id_usuario',
    4=> 'nome_acesso'
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT usuario.id_usuario, usuario.cpf, usuario.id_acesso, usuario.nome_usuario, acesso.nome_acesso FROM usuario LEFT JOIN acesso ON acesso.id_acesso = usuario.id_acesso;";
$resultado_user =mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT usuario.id_usuario, usuario.cpf, usuario.id_acesso, usuario.nome_usuario, acesso.nome_acesso FROM usuario LEFT JOIN acesso ON acesso.id_acesso = usuario.id_acesso WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND ( nome_usuario LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR nome_acesso LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR cpf LIKE '".$requestData['search']['value']."%' )";
}

$resultado_usuarios=mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);
//Ordenar o resultado
$result_usuarios.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);

// Ler e criar o array de dados
$dados = array();
while( $row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["nome_usuario"];
	$dado[] = $row_usuarios["nome_acesso"];
	$dado[] = $row_usuarios["cpf"];
	$dado[] = '<button class="btn" data-toggle="modal" data-target="#myModal"value="'.$row_usuarios["id_usuario"].'" onCLick="listaUsuarios('.$row_usuarios["id_usuario"].');"><i class="fa fa-pen"></i></button>'.'<button class="btn" data-toggle="modal" data-target="#myModalTrash"value="'.$row_usuarios["id_usuario"].'" onCLick="listaUsuarios('.$row_usuarios["id_usuario"].')"><i class="fa fa-trash"></i></button>';	
	$dados[] = $dado;
}


//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
