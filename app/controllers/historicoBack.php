<?php
require_once("../models/BD.php");

session_start();
if(isset($_SESSION["administrador"]))
{ 
	
	if(count($_POST) > 0)
	{	
	$data = '';

	switch(@$_POST['funcion'])
	{
		case '1':
		{
			$page = @$_POST['pagina'];

			$limit = 0;

			$limit = (($limit > 0) ? $limit:100);

			$page = (($page > 0) ? $page:1);

			$fechai = @$_POST['fechai'];
		
			//$fechaf = @$_POST['fechaf'];
			
			$kueri='1';
		
			if($fechai!=''){
				//$an= '2020';
		
				//$mon='05';

				$an= substr($fechai, 0,4);
		
				$mon=substr($fechai, 5,9);
				
				//$fechai .= '/01';
				//$kueri = ' fecha < "'.$fechai.'" AND fecha >= "'.$fechai.'" + INTERVAL 1 MONTH ';
				$kueri = ' MONTH(fecha) = "'.$mon.'" AND YEAR(fecha) = "'.$an.'"';
			}
            
	
			$sqlCompleta = 
			"SELECT
				fecha,
				P430Estado,
				round(P430Litros,1) as P430Litros,
				P511Estado,
				round(P511Litros,1) as P511Litros,
				P840Estado,
				round(P840Litros,1) as P840Litros,
				round(LitrosAgua,1) as LitrosAgua,
				concentracion
				

			FROM 
				registrohistorico
            WHERE
			   ".$kueri."
			"."  AND abccLitros >= 0
			ORDER BY idRegistroHistorico DESC";
			

		//	echo $sqlCompleta;
		//break;
		
			//var_dump($sqlCompleta);
			$dah=1600;
			$sql = mysqli_query($con, $sqlCompleta);

			//var_dump($sql);

			if($sql->num_rows > 0)
			{	
				while($dato = $sql->fetch_assoc()) 
				{
					if($dato['P430Estado']=='1'){
						$dato['P430Estado'] = 'Activo';
					} else if($dato['P430Estado']=='0'){
						$dato['P430Estado'] = 'Inactivo';
					}
					if($dato['P511Estado']=='1'){
						$dato['P511Estado'] = 'Activo';
					} else if($dato['P511Estado']=='0'){
						$dato['P511Estado'] = 'Inactivo';
					}
					if($dato['P840Estado']=='1'){
						$dato['P840Estado'] = 'Activo';
					} else if($dato['P840Estado']=='0'){
						$dato['P840Estado'] = 'Inactivo';
					}

					//if($dato['abccEstado']=='1'){
					//	$dato['abccEstado'] = 'Activo';
					//} else if($dato['abccEstado']=='0'){
					//	$dato['abccEstado'] = 'Inactivo';
					//}
					$data .=  
					'<tr>
						<td>'.$dato['fecha'].'</td>
						<td>'.$dato['P430Estado'].'</td>
						<td>'.$dato['P430Litros'].' </td>
						<td>'.$dato['P511Estado'].'</td>
						<td>'.$dato['P511Litros'].'</td>
						<td>'.$dato['P840Estado'].'</td>
						<td>'.$dato['P840Litros'].'</td>
						<td>'.$dato['P840Estado'].'</td>
						<td>'.$dato['LitrosAgua'].'</td>
						<td>'.$dato['concentracion'].'% </td>
					</tr>';
				}		
			}//if


			$sqlCompleta2=
			"SELECT  
			  	sum(round(P430Litros,1)) as sumP430Litros,
				sum(round(P511Litros,1)) as sumP511Litros,
				sum(round(P840Litros,1)) as sumP840Litros,
				sum(round(LitrosAgua,1)) as sumLitrosAgua
			 FROM
			 	registrohistorico
		     WHERE
			 	".$kueri."
			 "."
			";

			$asd="";
			$asd2="Litros Real.: ";
			$asd3="Suma total solución: ";
			$asd4="Madera m^3: ";
			$asd5="Arrastro solución: ";
			$sql2=mysqli_query($con, $sqlCompleta2);
			
			if($sql->num_rows >0)
			{
				$data.=
				'<tr>	
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
			   </tr>';

			   while($dato =$sql2->fetch_assoc())
			   {
				   $sumita=$dato['sumP430Litros']+$dato['sumP511Litros']+$dato['sumP840Litros']+$dato['sumLitrosAgua'];
				   $data .=
				   '<tr>
						<td>'.$asd. '</td>		
						<td><b>'.$asd2. '</b></td>
						<td>'.$dato['sumP430Litros']. '</td>
						<td>'.$asd.'</td>
						<td>'.$dato['sumP511Litros']. '</td>
						<td>'.$asd. '</td>
						<td>'.$dato['sumP840Litros'].'</td>
						<td>'.$asd.'</td>
						<td>'.$dato['sumLitrosAgua'].'</td>
						<td>'.$asd.'</td>
					</tr>';

			   }

			   $data.=
				'<tr>	
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
				  <td>'.$asd. '</td>
			   </tr>';

			   $data .=  
				'<tr>
					<td>'.$asd. '</td>
					<td><b>'.$asd3. '</b></td>
					<td><b>'.$asd.'</b></td>
					<td>'.$asd. '</td>
					<td id="sum" name="sum">'.$sumita. '</td>
					<td>'.$asd.'</td>
					<td>'.$asd.'</td>
					<td>'.$asd.'</td>
					<td>'.$asd.'</td>
					<td>'.$asd.'</td>
				
				</tr>';

				$data .=  
				'<tr>
					<td>'.$asd. '</td>
					<td><b>'.$asd4. '</b></td>
					<td>'.$asd.'</td>
					td>'.$asd.'</td>
					<td>'.$asd. '</td>
					<td id="maderita">

					<input type="number" placeholder="0" id="mader" name="mader" style="width: 75%" max="999999" 
					style="text align: center" step="1000"> </> 
					
					</td>
					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
				</tr>';

				$data .=  
				'<tr>
					<td>'.$asd. '</td>
					<td><b>'.$asd5. '</b></td>
					<td>'.$asd.'</td>
				
					<td id="arrastre" name="arrastre">'.$asd. '</td>
					<td>
					<div class="d-print-none">
					<button type="button" class="btn btn-primary" id="calcu" name="calcu" >Calcular</button>
					</div>
					</td>

					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
					<td>'.$asd. '</td>
				</tr>';



				
			}



			
			
			
		} //case1
		break;
		
	} //switch
	echo $data;
	//require_once("../views/historico.php");
}
}else
{
    header("Location:../views/login.html");
}
?>