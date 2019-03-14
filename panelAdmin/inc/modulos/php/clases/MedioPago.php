<?php
class MedioPago
{
	public function transaccion($ordenCompra,$tipo,$monto,$datosComprador)
	{
		
		$dir=explode('inc',dirname(__FILE__));
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		require_once($dir[0]."inc/modulos/php/webpay/webpay.php");
		require_once($dir[0]."inc/modulos/php/webpay/certificates/cert-normal.php");
		/** Configuracion parametros de la clase Webpay */
		$sample_baseurl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		$urlExito = $GLOBALS['Configuracion']['URLExitoWP'];
		$urlRechazo = $GLOBALS['Configuracion']['URLRechazoWP'];
		$pedido = new Pedido();
		$configuration = new Configuration();
		$configuration->setEnvironment($certificate['environment']);
		$configuration->setCommerceCode($certificate['commerce_code']);
		$configuration->setPrivateKey($certificate['private_key']);
		$configuration->setPublicCert($certificate['public_cert']);
		$configuration->setWebpayCert($certificate['webpay_cert']);
		$_SESSION['Pedido']['idMetodoPago'] = 1; 
		/** Creacion Objeto Webpay */
		$webpay = new Webpay($configuration);

		$action = isset($_GET["action"]) ? $_GET["action"] : 'init';

		$post_array = false;

		switch ($action) 
		{

		    default:

				$pedido->guardar($ordenCompra,$datosComprador);
				$_SESSION['idOrdenCompra'] = $ordenCompra;
				
				if(mysql_query("INSERT INTO WebpayTransacciones (`idTipoTransaccion`,`monto`,`fecha`,`idOrdenCompra`,`estado`) VALUES ('".$tipo."','".$monto."','".ExtraerFechaHoraDB()."','".$ordenCompra."','0')"))
				{
			        $tx_step = "Init";

			        /** Monto de la transacción */
			        $amount = $monto;

			        /** Orden de compra de la tienda */
			        $buyOrder = $ordenCompra;

			        /** Código comercio de la tienda entregado por Transbank */
			        $sessionId = uniqid();
			        
			        /** URL de retorno */
			        $urlReturn = $sample_baseurl."?action=getResult";
			        
			        /** URL Final */
					$urlFinal  = $sample_baseurl."?action=end";
					$transactionDetails = array(
						"amount"    => $amount,
						"sharesAmount" => null,
				        "sharesNumber" => null,
				        "commercecode" => $configuration->getCommerceCode(),
				        "buyOrder"  => $buyOrder,
					);
			        $request = array(
			        	"wSTransactionType" => "TR_NORMAL_WS",
			        	"commerceId" => null,
			            "buyOrder"  => $buyOrder,
			            "sessionId" => $sessionId,
			            "urlReturn" => $urlReturn,
			            "urlFinal"  => $urlFinal,
			            "transactionDetails" => $transactionDetails,
			        );

			        /** Iniciamos Transaccion */
			        $result = $webpay->getNormalTransaction()->initTransaction($amount, $buyOrder, $sessionId, $urlReturn, $urlFinal);
			        if($GLOBALS['Configuracion']['DebugWP'] == 1)
			        {
			        	echo '<pre>';
			        	print_r($request);
			        	echo '</pre>';
			        	echo '<pre>';
			        	print_r($result);
			        	echo '</pre>';
			        }
			        /** Verificamos respuesta de inicio en webpay */
			        if (!empty($result->token) && isset($result->token)) 
			        {
			            $message = "Sesion iniciada con exito en Webpay";
			            $token = $result->token;
			            $next_page = $result->url;
			            ?>
			            <form id="wpForm" name="FormWP" action="<?php echo $next_page; ?>" method="post">
    
						    <input type="hidden" name="token_ws" value="<?php echo ($token); ?>">
						   
						</form>
						
			            <?php



			        } else {
			        	// Enviamos al usuario a la pagina de exito, pero como no se pudo completar la transacción, se redirigirá a la de fracaso
			            ?>
			             <form id="wpForm" name="FormWP" action="<?php echo $urlExito; ?>" method="post">
			            	 <input type="hidden" name="idOrdenCompra" value="<?php echo $_SESSION['idOrdenCompra']; ?>">
				        </form>
				        <?php
			        }
					if($GLOBALS['Configuracion']['DebugWP'] == 0)
			    	{
			    		?>
			    		<script>
				          	document.forms["FormWP"].submit();
				       	</script>
				         <?php
					}

		        } else
		        {
			            ?>
			             <form id="wpForm" name="FormWP" action="<?php echo $urlRechazo; ?>" method="post">
			            	 <input type="hidden" name="idOrdenCompra" value="<?php echo $_SESSION['idOrdenCompra']; ?>">
				        </form>

				        <script>

				            <?php
							if($GLOBALS['Configuracion']['DebugWP'] == 0)
			    			{
			    				?>
				            	document.forms["FormWP"].submit();	
				            	<?php
							}
							?>
				            
				        </script>
			            <?php
			        
		        }
		        break;

		    case "getResult":
		        
		        $tx_step = "Get Result";

		        if (!isset($_POST["token_ws"]))
		            break;

		        /** Token de la transacción */
		        $token = filter_input(INPUT_POST, 'token_ws');
		        
		        $request = array(
		            "tokenInput" => filter_input(INPUT_POST, 'token_ws')
		        );
		        /** Rescatamos resultado y datos de la transaccion */
		        $result = $webpay->getNormalTransaction()->getTransactionResult($token);
		        if($GLOBALS['Configuracion']['DebugWP'] == 1)
			    {
			    	echo'<h2>getTransactionResult</h2>';
			       	echo '<pre>';
			       	print_r($request);
			       	echo '</pre>';
			       	echo '<pre>';
			       	print_r($result);
			       	echo '</pre>';
			    }
		        /** Verificamos resultado  de transacción */
		        if ($result->detailOutput->responseCode === 0) 
		        {
		        	mysql_query("UPDATE WebpayTransacciones SET cardNumber = '".$result->cardDetail->cardNumber."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET cardExpirationDate = '".$result->cardDetail->cardExpirationDate."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET authorizationCode = '".$result->detailOutput->authorizationCode."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET paymentTypeCode = '".$result->detailOutput->paymentTypeCode."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET amount = '".$result->detailOutput->amount."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET sharesNumber = '".$result->detailOutput->sharesNumber."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET commerceCode = '".$result->detailOutput->commerceCode."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET transactionDate = '".$result->transactionDate."' WHERE idOrdenCompra = '".$result->buyOrder."'");
		        	mysql_query("UPDATE WebpayTransacciones SET estado = '1' WHERE idOrdenCompra = '".$result->buyOrder."'");
		            $next_page = $result->urlRedirection;
		            $Carro = new Carro();
		            $pedido->emailConfirmacion($result->buyOrder);
		            $pedido->emailConfirmacionAdmin($result->buyOrder);
		            foreach($Carro->obtenerCarro() as $productoCarro)
					{
						mysql_query("UPDATE rel_ProductoAtributoDetalle_Producto SET Stock = Stock-".$productoCarro['cantidad']." WHERE idRel_ProductoAtributoDetalle_Producto = '".$productoCarro['modelo']."'");

					}
					mysql_query("UPDATE Pedido SET idEstadoPago = '2' WHERE idOrdenCompra = '".$result->buyOrder."'");
			            ?>

		            <form id="wpForm" name="FormWP" action="<?php echo $next_page; ?>" method="post">
		            	 <input type="hidden" name="token_ws" value="<?php echo ($token); ?>">
		            	 <input type="hidden" name="idOrdenCompra" value="<?php echo $result->buyOrder; ?>">
			        </form>

			        <script>

			           <?php
							if($GLOBALS['Configuracion']['DebugWP'] == 0)
			    			{
			    				?>
				            	document.forms["FormWP"].submit();	
				            	<?php
							}
							?>	
			            
			        </script>
		            <?php
		            
		        } else {
		        	mysql_query("UPDATE WebpayTransacciones SET estado = '2' WHERE idOrdenCompra = '".$result->buyOrder."'");
		            $message = "Pago RECHAZADO por webpay - " . utf8_decode($result->detailOutput->responseDescription);
		            ?>

		            <form id="wpForm" name="FormWP" action="<?php echo $urlExito; ?>" method="post">
		            	 <input type="hidden" name="idOrdenCompra" value="<?php echo $result->buyOrder; ?>">
			        </form>

			        <script>

			           <?php
							if($GLOBALS['Configuracion']['DebugWP'] == 0)
			    			{
			    				?>
				            	document.forms["FormWP"].submit();	
				            	<?php
							}
							?>	
			            
			        </script>
		            <?php
		        }

		        break;
		    
		    case "end":
		        
		        $post_array = true;
		        
		        $tx_step = "End";
		        $request = "";
		        $result = $_POST;
		        if($GLOBALS['Configuracion']['DebugWP'] == 1)
			    {
			       	echo '<pre>';
			       	print_r($request);
			       	echo '</pre>';
			       	echo '<pre>';
			       	print_r($result);
			       	echo '</pre>';
			    }
		        $token = $_POST['token_ws'];
		        ?>

		            <form id="wpForm" name="FormWP" action="<?php echo $urlExito; ?>/?idOrdenCompra=<?php echo $_SESSION['idOrdenCompra']; ?>" method="post">
			            	 <input type="hidden" name="idOrdenCompra" value="<?php echo $_SESSION['idOrdenCompra']; ?>">
				        </form>
				        <form id="wpForm" name="redirectpost1" action="<?php echo $sample_baseurl."?action=nullify"; ?>" method="post">
			            	 <input type="hidden" name="idOrdenCompra" value="<?php echo $_SESSION['idOrdenCompra']; ?>">
			            	 <input type="hidden" name="token_ws" value="<?php echo ($token); ?>">
				        </form>

			        <script>

			            <?php
							if($GLOBALS['Configuracion']['DebugWP'] == 0)
			    			{
			    				?>
				            	document.forms["FormWP"].submit();	
				            	<?php
							}
							?>
			            
			        </script>
		            <?php
		        
		        break;   

		    
		    case "nullify":

		        $tx_step = "nullify";
		        
		        $request = $_POST;
		        
		        /** Codigo de Comercio */
		        $commercecode = null;
		        $idOrdenCompra = $_SESSION['idOrdenCompra'];
		        /** Código de autorización de la transacción que se requiere anular */
		        $authorizationCode = $this->infoOrden($idOrdenCompra)['authorizationCode'];

		        /** Monto autorizado de la transacción que se requiere anular */
		        $amount =  $this->infoOrden($idOrdenCompra)['amount'];

		        /** Orden de compra de la transacción que se requiere anular */
		        $buyOrder =  $idOrdenCompra;
		        
		        /** Monto que se desea anular de la transacción */
		        $nullifyAmount = $amount;

		        $request = array(
		            "authorizationCode" => $authorizationCode, // Código de autorización
		            "authorizedAmount" => $amount, // Monto autorizado
		            "buyOrder" => $buyOrder, // Orden de compra
		            "nullifyAmount" => $nullifyAmount, // idsession local
		            "commercecode" => $configuration->getCommerceCode(), // idsession local
		        );
		        $result = $webpay->getNullifyTransaction()->nullify($authorizationCode, $amount, $buyOrder, $nullifyAmount, $commercecode);
		        if($GLOBALS['Configuracion']['DebugWP'] == 1)
			    {
			       	echo '<pre>';
			       	print_r($request);
			       	echo '</pre>';
			       	echo '<pre>';
			       	print_r($result);
			       	echo '</pre>';
			    }
		        /** Verificamos resultado  de transacción */
		        if (!isset($result->authorizationCode)) {
		            $message = "webpay no disponible";
		        } else {
		            $message = "Transaci&oacute;n Finalizada";
		            mysql_query("UPDATE WebpayTransacciones SET nullify_authorizationCode = '".$result->authorizationCode."' WHERE idOrdenCompra = '".$idOrdenCompra."'");
		            mysql_query("UPDATE WebpayTransacciones SET nullify_authorizationDate = '".$result->authorizationDate."' WHERE idOrdenCompra = '".$idOrdenCompra."'");
		            mysql_query("UPDATE WebpayTransacciones SET nullify_balance = '".$result->balance."' WHERE idOrdenCompra = '".$idOrdenCompra."'");
		            mysql_query("UPDATE WebpayTransacciones SET nullify_nullifiedAmount = '".$result->nullifiedAmount."' WHERE idOrdenCompra = '".$idOrdenCompra."'");
		            mysql_query("UPDATE WebpayTransacciones SET nullify_token = '".$result->token."' WHERE idOrdenCompra = '".$idOrdenCompra."'");
		            mysql_query("UPDATE WebpayTransacciones SET estado = '3' WHERE idOrdenCompra = '".$idOrdenCompra."'");

		        }

		        ?>
		        <form id="wpForm" name="FormWP" action="<?php echo $urlExito; ?>" method="post">
		            	 <input type="hidden" name="idOrdenCompra" value="<?php echo $_SESSION['idOrdenCompra']; ?>">
			        </form>

			        <script>

			            <?php
							if($GLOBALS['Configuracion']['DebugWP'] == 0)
			    			{
			    				?>
				            	document.forms["FormWP"].submit();	
				            	<?php
							}
							?>	
			            
			        </script>
		        <?php
		        
		        break;
		}
		?>
		<body style="background-image:url(https://webpay3g.transbank.cl/webpayserver/imagenes/background.gif)">

		</body>
		<?php
		if (!isset($request) || !isset($result) || !isset($message) || !isset($next_page)) {

		 
		    die;
		}
	}
	public function obtenerCostoEnvio($idCostoEnvio)
	{
		$sql = mysql_query("SELECT valor FROM CostoEnvio WHERE idCostoEnvio = '".seguridad_sql($idCostoEnvio)."'");
		$col = mysql_fetch_array($sql);
		return $col['valor'];
	}
	public function infoOrden($idOrdenCompra)
	{
		$sql = mysql_query("SELECT WebpayTransacciones.*,Pedido.idPedido FROM WebpayTransacciones inner join Pedido on Pedido.NumeroOrden = WebpayTransacciones.idOrdenCompra WHERE WebpayTransacciones.idOrdenCompra = '".$idOrdenCompra."'");
		$col = mysql_fetch_array($sql);
		return $col;
	}
}

?>