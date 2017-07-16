<h1>اضافه متدربه جديده</h1>
لتسجيل مدربه جديده الرجاء ذكر جميع المعلومات الازمه المتعلقه بالمدربه

<form action="" method="post">
اسم المتدربه
<input name="Trainee_name" type="text" value="" />
الجنسيه
<input name="Nationality" type="text" value="" />
رقم السجل المدني
<input name="Trainee_ID" type="text" value="" />
رقم الجوال
<input name="Phone" type="text" value="" />
<button name="submit" type="submit">SUBMIT</button>
</form>
<?

if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$trainee_name = $_POST['Trainee_name'];
$nationality= $_POST['Nationality'];
$trainee_ID= $_POST['Trainee_ID'];
$phone= $_POST['Phone'];
if ($trainee_name == "") 
				{
					$errormessage = $errormessage . "اسم المتدربه مطلوب <br />";
                                          
				}
			else if ($nationality== "") 
				{
					$errormessage = $errormessage . "جنسيه المتدربه مطلوبه <br />";
                                        
				}
                         else if ($trainee_ID== "") 
				{
					$errormessage = $errormessage . "رقم السجل المدني مطلوب <br />";
                                        
				}
                           else if ($phone== "") 
				{
					$errormessage = $errormessage . "رقم الجوال مطلوب <br />";
                                        
				}


		if ($errormessage != "") 
			{
				echo "<div style='border: 2px solid red;'><h1>خطأ</h1>" . $errormessage . "</div><br />";
			}
		else
			{

$wpdb->query("INSERT INTO trainee(trainee_ID,trainee_ID_S,trainee_name,nationality,phone) VALUES ('$trainee_ID','$trainee_ID','$trainee_name', '$nationality', '$phone')"  )or die('هنالك متدربه مسجله مسبقاً بنفس السجل المدني');
echo "<div style=  'border: 1px solid black;'><h1>تم اضافه المتدربه بنجاح</h1>"  . "</div><br />";
                                
			}
}
?>
