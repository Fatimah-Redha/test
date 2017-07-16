<h1>تسجيل رغبات</h1>
للرغبه في تسجيل في دوره الرجاء ذكر جميع المعلومات الازمه 

<form action="" method="post">
اسم الدوره المعتمده
	[xyz-ips snippet="displaycourses"]
الاسم
<input name="trainee_name" type="text" value="" />
الجوال
<input name="trainee_phone" type="text" value="" />
تاريخ تسجيل الرغبه
<input name="trainee_date" type="date" value="" />
<button name="submit" type="submit">تسجيل</button>
</form>
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$Approved_Id= $_POST['Approved_ID'];
$Trainee_name = $_POST['trainee_name'];
$Trainee_phone= $_POST['trainee_phone'];
$Trainee_date= $_POST['trainee_date'];
if ($Approved_Id== "") 
				{
					$errormessage = $errormessage . "اسم الدوره مطلوب <br />";
                                          
				}
			else if ($Trainee_name == "") 
				{
					$errormessage = $errormessage . "اسم المتدربه مطلوب <br />";
                                        
				}
else if ($Trainee_phone== "") 
				{
					$errormessage = $errormessage . "رقم الجوال مطلوب <br />";
                                        
				}
else if ($Trainee_date== "") 
				{
					$errormessage = $errormessage . "تاريخ تسجيل الرغبه مطلوب <br />";
                                        
				}
if ($errormessage != "") 
			{
				echo "<div style='border: 2px solid red;'><h1>خطأ</h1>" . $errormessage . "</div><br />";
			}
		else
			{
$wpdb->query("INSERT INTO desires(approved_ID,trainee_name,phone,desires_Date) VALUES ('$Approved_Id', '$Trainee_name ', '$Trainee_phone', '$Trainee_date')"  )or die('حصل خطأ اثناء تسجيل الرغبه، الرجاء المحاوله مره اخرى');
echo "<div style=  'border: 1px solid black;'><h1>تمت اضافه الرغبه بنجاح</h1>"  . "</div><br />";
                                
			}
}
?>
