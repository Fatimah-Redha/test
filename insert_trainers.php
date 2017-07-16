&nbsp;
<h1>اضافه مدربه جديده</h1>
لتسجيل مدربه جديده الرجاء ذكر جميع المعلومات الازمه المتعلقه بالمدربه

<form action="" method="post">
اسم المدربه
<input name="Trainers_name" type="text" value="" />
رقم السجل المدني
<div style='border: 1px solid red;'>
(في حاله عدم توفر السجل المدني الرجاء كتابه اي رقم عشوائي قصير و من ثم يتم تحديث رقم السجل المدني في صفحه قائمه المدربات)
</div>
<input name="Trainers_ID" type="text" value="" />
رقم الجوال
<input name="Phone" type="text" value="" />
التخصص
<input name="Major" type="text" value="" />
<button name="submit" type="submit">تسجيل</button>

</form>
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$trainers_ID = $_POST['Trainers_ID'];
$trainers_name= $_POST['Trainers_name'];
$phone= $_POST['Phone'];
$major= $_POST['Major'];
if ($trainers_ID == "") 
				{
					$errormessage = $errormessage . "السجل المدني مطلوب <br />";
                                          
				}
			else if ($trainers_name== "") 
				{
					$errormessage = $errormessage . "اسم المدربه مطلوب <br />";
                                        
				}
                         else if ($phone == "") 
				{
					$errormessage = $errormessage . "رقم الجوال مطلوب <br />";
                                        
				}
                           else if ($major== "") 
				{
					$errormessage = $errormessage . "التخصص مطلوب <br />";
                                        
				}


		if ($errormessage != "") 
			{
				echo "<div style='border: 2px solid red;'><h1>خطأ</h1>" . $errormessage . "</div><br />";
			}
		else
			{

$wpdb->query("INSERT INTO trainers (trainers_ID,trainers_ID_S,trainers_name,phone,major) VALUES ('$trainers_ID','$trainers_ID','$trainers_name', '$phone', '$major')"  )or die('هنالك مدربه مسجله مسبقاً بنفس السجل المدني');

 echo "<div style=  'border: 1px solid black;'><h1>تم اضافه مدربه جديده بنجاح</h1>"  . "</div><br />";
}
                                
}
?>
