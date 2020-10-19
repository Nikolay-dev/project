<!DOCTYPE html>
<html>
<head>
	<title>Не будь байдужим - повідом про корупцію!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/cor_new/style.css">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>


	
</head>
<body>
	<header>
		<div class="logo">
			<a href="#"><img src="/cor_new/image/mologo.png"></a>
			<img class="size_logo" src="/cor_new/image/headertext.png">
		</div>
	</header>
	<content >
		<div class="main">
			<script type="text/javascript">
	function getFileParam() { 			
		try { 				
			var file = document.getElementById('uploaded-file1').files[0]; 				
			
			if (file) { 					
				var fileSize = 0; 					
				
				if (file.size > 1024 * 1024) {
					 swal('Файл превышает размер 1 МБ');
					fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
				}else {
					fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
				}
					
				document.getElementById('file-name1').innerHTML = '<b>Ім’я файлу:</b> ' + file.name;
				document.getElementById('file-size1').innerHTML = '<b>Розмір файлу:</b> ' + fileSize;
				
				if (/\.(jpe?g|bmp|gif|png)$/i.test(file.name)) {		
					var elPreview = document.getElementById('preview1');
					elPreview.innerHTML = '';
					//var newImg = document.createElement('img'); добавляє картнку на екран
					//newImg.className = "preview-img";
					
					if (typeof file.getAsDataURL=='function') {
						if (file.getAsDataURL().substr(0,11)=='data:image/') {
							newImg.onload=function() {
								document.getElementById('file-name1').innerHTML+=' ('+newImg.naturalWidth+'x'+newImg.naturalHeight+' px)';
							}
							newImg.setAttribute('src',file.getAsDataURL());
							elPreview.appendChild(newImg);								
						}
					}else {
						var reader = new FileReader();
						reader.onloadend = function(evt) {
							if (evt.target.readyState == FileReader.DONE) {
								newImg.onload=function() {
									document.getElementById('file-name1').innerHTML+=' ('+newImg.naturalWidth+'x'+newImg.naturalHeight+' px)';
								}
							
								newImg.setAttribute('src', evt.target.result);
								elPreview.appendChild(newImg);
							}
						};
						
						var blob;		
						if (file.slice) {
							blob = file.slice(0, file.size);
						}else if (file.webkitSlice) {
								blob = file.webkitSlice(0, file.size);
							}else if (file.mozSlice) {
								blob = file.mozSlice(0, file.size);
							}
						reader.readAsDataURL(blob);
					}
				}
			}
		}catch(e) {
			var file = document.getElementById('uploaded-file1').value;
			file = file.replace(/\\/g, "/").split('/').pop();
			document.getElementById('file-name1').innerHTML = 'Ім’я файлу' + file;
		}
	}
	</script>
			<?php 
			//session_start();

//echo $_SESSION['number']."|".$_POST['keystring'];
//------------------------------------------------------------
//-------if message sent--------------------------------------
//------------------------------------------------------------

if(isset($_POST['send_message'])){
	
				if (isset($_POST['name_anonim'])){
				
						$content_message .= htmlspecialchars($_POST['name_anonim'])."&nbsp;\n<br>&nbsp;\n<br>";
				}
				if (isset($_POST['adr_anonim'])){
				
						$content_message .= htmlspecialchars($_POST['adr_anonim'])."&nbsp;\n<br>&nbsp;\n<br>";
				}
				if (isset($_POST['mail_anonim'])){
				
						$content_message .= htmlspecialchars($_POST['mail_anonim'])."&nbsp;\n<br>&nbsp;\n<br>";
				}
				if (isset($_POST['phone_anonim'])){
				
						$content_message .= htmlspecialchars($_POST['phone_anonim'])."&nbsp;\n<br>&nbsp;\n<br>";
				}

    			
    			if ($_POST['name_corupt'] == ""){
      					print "<p class='heder3'> Ви не ввели  прізвище, ім’я, по-батькові особи, яка вчинила правопорушення!</center>";
    			}else{
    					$content_message .= htmlspecialchars($_POST['name_corupt'])."&nbsp;\n<br>&nbsp;\n<br>";
       					if($_POST['unit_corupt'] == "") {
								print "<p class='heder3'> Ви не ввели відомості про cтруктурний підрозділ Міністерства оборони України, Генерального штабу Збройних Сил України, підпорядкований орган військового управління, військова частина, військовий навчальний заклад, державне підприємство</center>";
	    				}else{
								$content_message .= htmlspecialchars($_POST['unit_corupt'])."&nbsp;\n<br>&nbsp;\n<br>";
    			 				if ($_POST['place_corupt'] == ""){
        		 		 				print "<p class='heder3'> Ви не ввели відомості про місце роботи особи, її посаду</center>";
    			 				}else{
										$content_message .= htmlspecialchars($_POST['place_corupt'])."&nbsp;\n<br>&nbsp;\n<br>";
    		 			    			if ($_POST['info_corupt'] == ""){
        	 		 							print "<p class='heder3'> Ви не ввели інформацію про факт вчинення корупційного або пов’язаного з корупцією правопорушення, іншого правопорушення Закону України «Про запобігання корупції»</center>";
    		 			    			}else{
												//$info_corupt = $_POST['info_corupt'];
												$info_corupt = nl2br(htmlspecialchars($_POST['info_corupt']));
												$content_message .= $info_corupt."&nbsp;\n<br>";
												//-------------------------------------------------------------		
												//-------------------------------------------------------------								
												if(htmlspecialchars($_POST['keystring'])==1111){
												//$_SESSION['number']
												//uzvk_mou@post.mil.gov.ua
												// Настройки для отправки писем
												$charset = 'utf-8'; // Кодировка письма
												$to = "nikolajmelnik513@gmail.com"; // Получатель$to = "uzvk_mou@post.mil.gov.ua"y_mel@post.mil.gov.ua
												// $subject = "Повідомлення про корупцію з офіційного сайту Міністерства оборни України"; // Тема письма
												$subject = 'Povidomlennia pro koruptsiiu z ofitsiinoho saitu Ministerstva oborony Ukrainy';
												$text = $content_message; // Контент письма
												$from = "nikolajmelnik513@gmail.com"; // Отправитель
												$fromName = "ВЕБ-повідомлення"; // Имя отправителя
												
												// Вот что такое заголовки
												/*$headers = null;
												$headers = "MIME-Version: 1.0\n";
												$headers .= "From: =?$charset?B?".base64_encode($fromName)."?= <$from>\n";
												$headers .= "Content-type: text/html; charset=$charset\n";
												$headers .= "Content-Transfer-Encoding: base64\n";*/

												$EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
											    $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.  
											   
											    $headers    = "MIME-Version: 1.0;$EOL";
											    $headers   .= "From: =?$charset?B?".base64_encode($fromName)."?= <$from>\r\n";   
											    $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";  
											 
											    $multipart  = "--$boundary$EOL";   
											    $multipart .= "Content-Type: text/html; charset=utf-8\n";   
											    $multipart .= "Content-Transfer-Encoding: base64$EOL";   
											    $multipart .= $EOL; // раздел между заголовками и телом html-части 
											    $multipart .= chunk_split(base64_encode($text));   

											    $multipart .= "$EOL--$boundary--$EOL";   

											
												
  // Если поле выбора вложения не пустое - закачиваем его на сервер 
  $picture = ""; 
  
  if (!empty($_FILES['mail_file']['tmp_name'])) 

  { 
  	$filesize = filesize($_FILES['mail_file']['tmp_name']);
    // Закачиваем файл 
    $path = $_FILES['mail_file']['name'];
    if (copy($_FILES['mail_file']['tmp_name'],'tmp/'.$path)) $picture = $path;

 
  }

  

  //$separator = "---"; // разделитель в письме

  // Отправляем почтовое сообщение 
  if(empty($path)){ 
  //echo $to."<br>".$subject."<br>".$text."<br>".$headers;
  		if (mail($to, $subject, $multipart, $headers)){
				echo "<p class='heder3'> Ваше повідомлення відправлено!!!</center>";
				unset($_POST);
		}else{
				echo "<p class='heder3'> Ваше повідомлення не відправлено з технічних причин.Спробуйте пізніше.</center>";
				unset($_POST);
		}
  }else{
       
		$path = 'tmp/'.$path;	
		$fileRead = fopen($path,"r");                             // открываем файл 
		if (!$fileRead){ 
			      print "Файл ".$path. " не может быть прочитан"; 
		} 
		$file = fread($fileRead, filesize($path));                // считываем его до конца
		fclose($fileRead);                                        // закрываем файл
		
		$name = basename($path);
	
    $EOL = "\r\n"; // ограничитель строк, некоторые почтовые сервера требуют \n - подобрать опытным путём
    $boundary     = "--".md5(uniqid(time()));  // любая строка, которой не будет ниже в потоке данных.  
   
    $headers    = "MIME-Version: 1.0;$EOL";
    $headers   .= "From: =?$charset?B?".base64_encode($fromName)."?= <$from>\r\n";   
    $headers   .= "Content-Type: multipart/mixed; boundary=\"$boundary\"$EOL";  
     

    $multipart  = "--$boundary$EOL";   
    $multipart .= "Content-Type: text/html; charset=utf-8\n";   
    $multipart .= "Content-Transfer-Encoding: base64$EOL";   
    $multipart .= $EOL; // раздел между заголовками и телом html-части 
    $multipart .= chunk_split(base64_encode($text));   

    $multipart .=  "$EOL--$boundary$EOL";   
    $multipart .= "Content-Type: application/octet-stream; name=\"$name\"$EOL";   
    $multipart .= "Content-Transfer-Encoding: base64$EOL";   
    $multipart .= "Content-Disposition: attachment; filename=\"$name\"$EOL";   
    $multipart .= $EOL; // раздел между заголовками и телом прикрепленного файла 
    $multipart .= chunk_split(base64_encode($file));  

    $multipart .= "$EOL--$boundary--$EOL"; 


			    if(mail($to, $subject, $multipart, $headers)) 
			    { 
					echo "<p class='heder3'> Ваше повідомлення відправлено c вложением!!!</center>";
					unset($_POST); 

			    }else{
					echo "<p class='heder3'> Ваше повідомлення не відправлено з технічних причин.Спробуйте пізніше.</center>";
					unset($_POST);
				}

}

												

											
												}else{
													
													print "<p class='heder3'> Ви не вірно ввели захисний код!!!</center>";
													
												}
												//echo $info_corupt;
												//-------------------------------------------------------------			
												//-------------------------------------------------------------			
												//-------------------------------------------------------------					
												
							
							
							
										}
								}
						}
				}	

}		

			 ?>
		<form method="post" action="" enctype="multipart/form-data">
			<?php if (isset($_GET['form']) && ($_GET['form'] == "anonim")): ?>
	<!--FORM1 START------>
<!--	<tr><td><p class="heder2">Веб-інтерфейс для подальшого перенаправлення повідомлення на захищену електронну пошту <font color="#1636e9">uzvk_mou@post.mil.gov.ua</font></p></td></tr>
 -->
 
	<p>Обов’язкові реквізити для заповнення</p>
	<label>1. Прізвище, ім’я, по-батькові особи, яка вчинила правопорушення</label><br>
	<input type="text" name="name_corupt" value="<?php if(isset($_POST['name_corupt'])): echo $_POST['name_corupt'];?><?php endif; ?>"><br>
	<label>2. Структурний підрозділ Міністерства оборони України, Генерального штабу Збройних Сил України, підпорядкований орган військового управління, військова частина, військовий навчальний заклад, державне підприємство</label><br>
	<input type="text" name="unit_corupt" value="<?php if(isset($_POST['unit_corupt'])): echo $_POST['unit_corupt'];?><?php endif; ?>"><br>
	<label>3. Місце роботи особи, її посада</label><br>
	<input type="text" name="place_corupt" value="<?php if(isset($_POST['place_corupt'])): echo $_POST['place_corupt'];?><?php endif; ?>"><br>
	<label>4. Інформація про факт вчинення корупційного або пов’язаного з корупцією правопорушення, іншого правопорушення Закону України «Про запобігання корупції»<br>
	<textarea rows="10" name="info_corupt"><?php if(isset($_POST['info_corupt'])): echo $_POST['info_corupt'];?><?php endif; ?></textarea></label><br>
	<label for="uploaded-file1" class="file">Прикріпити файли до повідомлення</label><br>
	<input type="file" onchange="getFileParam();" id="uploaded-file1"   size="100" name="mail_file" value=""><?php/* if ($filesize > 1024 * 1024){
    echo "<p class='heder3' >Файл превышает размер 1 МБ</p>";
}*/
 ?>
		<div id="preview1"></div>
		<div id="file-name1"></div>
		<div id="file-size1"></div>
	<label>(Файли мають бути меншими ніж 1 Мб. Дозволені типи файлів: jpg, jpeg, png, pdf, doc, docx, odt, ppt, pptx, odx, xls, xlsx, ods, zip)</label><br>
	<button value="Переслати повідомлення" name="send_message" type="submit">Переслати повідомлення</button>
	<button  type="reset" name="B4">Очистити</button>


<!--FORM1 END---------->

<?php else: ?>

<!--FORM2 START-------------->
<!--	<tr><td><p class="heder2">Веб-інтерфейс для подальшого перенаправлення повідомлення на захищену електронну пошту <font color="#1636e9">uzvk_mou@post.mil.gov.ua</font></p></td></tr>
 --><br>
 	<label>1. Прізвище, ім’я, по-батькові заявника<br>
	<input type="text" name="name_anonim" value=""></label><br>
	<label>2. Контактні дані заявника</label><br>
		<label>Поштова адреса<br>
		<input type="text" name="adr_anonim" value=""></label><br>
		<label>Електронна  адреса<br>
		<input type="text" name="mail_anonim" value=""></label><br>
		<label>Номер телефону<br>
		<input type="text" name="phone_anonim" value=""></label><br>
	<label>3.Обов’язкові реквізити для заповнення</label><br>
	<label>3.1. Прізвище, ім’я, по-батькові особи, яка вчинила правопорушення<br>
	<input type="text" name="name_corupt" value="<?php if(isset($_POST['name_corupt'])): echo $_POST['name_corupt'];?><?php endif; ?>"></label><br>
	<label>3.2. Структурний підрозділ Міністерства оборони України, Генерального штабу Збройних Сил України, підпорядкований орган військового управління, військова частина, військовий навчальний заклад, державне підприємство<br>
	<input type="text" name="unit_corupt" value="<?php if(isset($_POST['unit_corupt'])): echo $_POST['unit_corupt'];?><?php endif; ?>"></label><br>		
	<label>3.3. Місце роботи особи, її посада<br>
	<input type="text" name="place_corupt" value="<?php if(isset($_POST['place_corupt'])): echo $_POST['place_corupt'];?><?php endif; ?>"></label><br>
	<label>3.4. Інформація про факт вчинення корупційного або пов’язаного з корупцією правопорушення, іншого правопорушення Закону України «Про запобігання корупції»<br>
	<textarea rows="10" name="info_corupt"><?php if(isset($_POST['info_corupt'])): echo $_POST['info_corupt'];?><?php endif; ?></textarea></label><br>
	<div></div>	
	<label class="file" for="uploaded-file1">Прикріпити файли до повідомлення</label><br>
	<input type="file" onchange="getFileParam();" id="uploaded-file1" size="100" name="mail_file" value=""><?php /*if ($filesize > 1024 * 1024){
    echo "<p class='heder3' >Файл превышает размер 1 МБ</p>";
}*/
 ?>
		<div id="preview1"></div>
		<div id="file-name1"></div>
		<div id="file-size1"></div>
	<label>(Файли мають бути меншими ніж 1 Мб. Дозволені типи файлів: jpg, jpeg, png, pdf, doc, docx, odt, ppt, pptx, odx, xls, xlsx, ods, zip)</label><br>
	<button value="" class="mess_iput" name="send_message"  type="submit">Переслати повідомлення</button>
	<button  type="reset" name="B4">Очистити</button>
	<?php endif; ?>
	<label class="size_lab" ><?php echo "<p>Введіть код з картинки (<b>цифри</b>)<!--<img src='/image.php' border=0>-->&nbsp;&nbsp;<input type='text' class='size_lab'  value='' name='keystring'>"; ?> </label>

		</form>
		</div>
	</content>
</body>
</html>