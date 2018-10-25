<?php
/*
 *      getData.php
 *      
 *      Copyright 2012  <>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 *      
 *      
 */
  mysql_connect('localhost','abuelna','njcm1514');
 	#mysql_connect('localhost','root','root');
	mysql_select_db('iccna');
function getData($info)
{
	include("inc/mod22.php");
	
   	$status='A';
    $factura=$info['factura'];
   	$ALU_NOM=$info['name'].' '.$info['lname'];
    
    $query = mysql_query("SELECT * FROM Concepto WHERE idConcepto='".$info['concepto']."'");
    if (!$query) {
      echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
           "en la BD: " . mysql_error();
      exit;
    }
    $res = mysql_fetch_assoc($query);    
    $ALU_CONCEPTO=$res['concepto'];
   	$ALU_MONTO=$res['costo'];
   	$CLAVE_PAGO=$res['clave'];
    $ncontrol=$info['ncontrol'];

    if (ctype_digit($ncontrol)&&strlen($ncontrol)==8) {
      $query = mysql_query("INSERT INTO Asistente(nombre,apellidos,institucion,idConcepto,ncontrol) VALUES ('".$info['name']."','".$info['lname']."','".$info['insti']."',".$info['concepto'].",".$ncontrol.")");      
    }else
    {
      $query = mysql_query("INSERT INTO Asistente(nombre,apellidos,institucion,idConcepto) VALUES ('".$info['name']."','".$info['lname']."','".$info['insti']."',".$info['concepto'].")");  
    }


    
    if (!$query) {
      echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
      "en la BD: " . mysql_error();
      exit;
    }
    $res = mysql_fetch_assoc($query);
    
    $query = mysql_query("SELECT idAsistente FROM Asistente WHERE nombre='".$info['name']."' and apellidos='".$info['lname']."' and institucion='".$info['insti']."' ORDER BY idAsistente DESC LIMIT 1");
    if (!$query) {
      echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
      "en la BD: " . mysql_error();
      exit;
    }

    if (ctype_digit($ncontrol)&&strlen($ncontrol)==8&&$info['concepto']==1) {
      $ALU_CTR=$ncontrol;
    }else{

      $res = mysql_fetch_assoc($query);
      $num=$res['idAsistente'];
      $sz=strlen($num);
      $cad='';
      for ($i=0; $i < 8-$sz; $i++) { 
        $cad=$cad.'0';
      }
      $ALU_CTR=$cad.$num;
    }
		switch($status)
   {
	case 'A':
		?>
        <div class="container">
                <div class="container">
        <?php
		
            echo "<br /> CONVENIO SANTANDER 2092<b>";		
            echo "<br /> Nombre: <b>" .  $ALU_NOM . "</b>";
            echo "<br /> Concepto: <b>" . $ALU_CONCEPTO . "</b>";
            echo "<br /> Monto: <b> $" . $ALU_MONTO . ".00</b>";
            echo "<br /> Fecha limite de Pago: 5 de NOVIEMBRE 2018";
            $condensacioncita=$factura.$CLAVE_PAGO;
            $linea = mod22($ALU_CTR,$condensacioncita,$ALU_MONTO);
            echo "<br/><font size=\"5\"><b>Linea :".$linea . "</b></font>";
			echo "<br /> </b>";
			echo "<br /> </b>";
			
			?>
     </h4>
	 	 <br></br>
		   <h3><strong>Linea Referenciada Codigo Barra, puedes pagar en banco, cajeros automáticos santander o en ventanilla en la escuela con tarjeta debido o crédito 9am a 4pm </strong></h3>
        <img style="max-width:350px" alt="The Real David Tufts" src="code/barcode.php?text=<?php echo $linea;?>&size=40" />
    
        </div>
        
        <h2 class="container text-center"><strong>AVISO</strong></h2>
      </div>
      <div class="container text-center">
        <h3><strong>No. DE CONVENIO 2092</strong></h3>
        <h3> <strong>BANCO SANTANDER</strong></h3>
<div class="text-left">
<h4></h4>

<h4> 
</h4>
</div>

<h3 class="text-center"><strong>
* *  IMPORTANTE  * *</strong></h3>

<h3 class="text-center"><strong>
* *</strong></h3>
<div class="text-left">
<h4>
**Participantes que requieren FACTURA del servicio(R.F.C.).</h4>
<h4>
**Pagarán en el banco y enviarán al correo tesoreria@itmexicali.edu.mx en un lapso no mayor a 24 hrs hábiles foto de la ficha de depósito azul, junto con la cedula de identificación fiscal y un Correo Electrónico para su envió.
</h4>
 
<h4>
**Si haces caso omiso a las instrucciones y pagas la reinscripción, será tu responsabilidad, por lo que el Instituto Tecnológico de Mexicali no se hace responsable de hacer válida tu inscripción, ni de la devolución del dinero.
</h4>
</div>
<h3>
<strong>
Atentamente: Recursos Financieros. 
</strong>
</h3>
</div>
        
        <?php
	break;
	
	
	case 'X':
	  ?>
        <div class="container">
                <div class="container">
        <?php
		
           echo "<br /> CONVENIO SANTANDER 2092<b>";		
		    echo "<br /> Regulariza tu situación academica primeramente para poder hacer tu pago";
			echo "<br /> ";
			echo "<br /> Nombre del Alumno: <b>" .  $res['ALU_NOM'] . "</b>";           
            echo "<br /> </b>";
			echo "<br /> <font color=RED>Observación 1: <b> " . $res['ALU_DEP'] . ".</b></font>";
			echo "<br /> <font color=RED>Observación 2: <b> " . $res['ALU_ESC'] . ".</b></font>";
			echo "<br /> <font color=RED>Observación 3: <b> " . $res['ALU_FIN'] . ".</b></font>";
			echo "<br /> <font color=RED>Observación 4: <b> " . $res['ALU_EVADOC'] . ".</b></font>";
			echo "<br /> <font color=RED>Observación 5: <b> " . $res['BECA'] . ".</b></font>";
			?>
     </h4>
	 	 <br></br>
		   
           
        </div>
        
        <h2 class="container text-center"><strong>AVISO</strong></h2>
      </div>
      <div class="container text-center">
        <h3><strong>No. DE CONVENIO 2092</strong></h3>
        <h3> <strong>BANCO SANTANDER</strong></h3>
<div class="text-left">
<h4>**Vigencia: 9 al 13 octubre 2018</h4>

<h4> 
</h4>
</div>

<h3 class="text-center"><strong>
* *  IMPORTANTE  * *</strong></h3>

<h3 class="text-center"><strong>
* *</strong></h3>
<div class="text-left">
<h4>
**Alumnos que requieren FACTURA del servicio(R.F.C.).</h4>
<h4>
**Pagarán en el banco y deberán presentar en un lapso de 24 hrs hábiles en el departamento de Recursos Financieros la ficha de depósito azul, junto con la cedula de identificación fiscal y un Correo Electrónico para su envió.
</h4>
 
<h4>
**Si haces caso omiso a las instrucciones y pagas la reinscripción, será tu responsabilidad, por lo que el Instituto Tecnológico de Mexicali no se hace responsable de hacer válida tu inscripción, ni de la devolución del dinero.
</h4>
</div>
<h3>
<strong>
Atentamente: Recursos Financieros. 
</strong>
</h3>
</div>
        
        <?php
	break;

      default:  
	  echo "<br /> <font size=\"4\"><b>Teclea tu número de control correctamente"."</b></font>";	
	  echo "<br /> <font size=\"3\"><b>No puedes descargar tu línea de pago, acude a ventanilla para aclaraciones Adeudo Financieros"."</b></font>";	
	  echo "<br /> <font size=\"3\"><b>ó Excedes Semestres ó Baja temporal, Especiales Reprobados acude con tu coordinador para autorización"."</b></font>";	
	}	
}
?>
