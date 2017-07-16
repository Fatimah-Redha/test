<h1>تسجيل دوره جديده</h1>
لتسجيل دوره جديده الرجاء ذكر جميع المعلومات الازمه المتعلقه بالدوره

<form action="" method="post">
اسم الدوره
<input name="Course_name" type="text" value="" />
مدتها بالأيام
<input name="Days" type="text" value="" />
عدد الساعات
<input name="Hours" type="text" value="" />
رقم الاعتماد
<input name="Approved_ID" type="text" value="" />
<button name="submit" type="submit">SUBMIT</button>

</form>
<?php
if ( isset( $_POST['submit'] ) )
{
global $wpdb;

$course_name = $_POST['Course_name'];
$days= $_POST['Days'];
$hours= $_POST['Hours'];
$approved_ID= $_POST['Approved_ID'];
if ($course_name == "") 
				{
					$errormessage = $errormessage . "اسم الدوره مطلوب <br />";
                                          
				}
			else if ($days == "") 
				{
					$errormessage = $errormessage . "عدد الأيام مطلوب <br />";
                                        
				}
                         else if ($hours == "") 
				{
					$errormessage = $errormessage . "عدد الساعات مطلوب <br />";
                                        
				}
                           else if ($approved_ID== "") 
				{
					$errormessage = $errormessage . "رقم الاعتماد مطلوب <br />";
                                        
				}


		if ($errormessage != "") 
			{
				echo "<div style='border: 2px solid red;'><h1>خطأ</h1>" . $errormessage . "</div><br />";
			}
		else
			{
				$wpdb->query("INSERT INTO courses (approved_ID,course_name,days, hours) VALUES ('$approved_ID', '$course_name','$days', '$hours'  )");
                                echo "<div style=  'border: 1px solid black;'><h1>تم تسجيل الدوره بنجاح</h1>"  . "</div><br />";
                                
			}


}
?>
