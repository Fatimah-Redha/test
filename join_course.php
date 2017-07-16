<h1>الانضمام الى دوره</h1>
للاضمام الى دوره مقامه الرجاء ذكر جميع المعلومات الازمه التاليه
<form action="" method="post">
اسم المتدربه
<?php
global $wpdb;
$results = $wpdb->get_results("SELECT trainee_ID,trainee_name FROM trainee ORDER BY trainee_name 
ASC",ARRAY_A);
echo "<select  name='Trainee_ID'  value=''></option>"; 

foreach (($results) as $row)
{
echo "<option value=$row[trainee_ID]->$row[trainee_name]</option>"; 
}
 echo "</select>";
?>
الدوره المرغوب التسجيل فيها
<?php>
global $wpdb;
$results = $wpdb->get_results("SELECT course_ID,posting_course_name FROM posting_course ORDER BY posting_course_name ASC",ARRAY_A);
echo "<select  name='Course_ID'  value=''></option>"; 

foreach (($results) as $row)
{
echo "<option value=$row[course_ID]->$row[posting_course_name]</option>"; 
}
 echo "</select>";
?>
المبلغ المدفوع
<input name="Paid" type="text" value="" />
المتبقي
<input name="Rest" type="text" value="" />
السند
<input name="Bill" type="text" value="" />
<button name="submit" type="submit">انضمام</button>
</form>
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$course_ID= $_POST['Course_ID'];
$trainee_ID= $_POST['search'];
$paid= $_POST['Paid'];
$rest= $_POST['Rest'];
$bill= $_POST['Bill'];
if ($course_ID== "") 
				{
					$errormessage = $errormessage . "اسم الدوره مطلوب <br />";
                                          
				}
			else if ($trainee_ID== "") 
				{
					$errormessage = $errormessage . "اسم المتدربه مطلوب <br />";
                                        
				}
else if ($paid== "") 
				{
					$errormessage = $errormessage . "المبلغ المدفوع مطلوب <br />";
                                        
				}
else if ($rest== "") 
				{
					$errormessage = $errormessage . "المتبقي مطلوب <br />";
                                        
				}
else if ($bill== "") 
				{
					$errormessage = $errormessage . "رقم السند مطلوب <br />";
                                        
				}
if ($errormessage != "") 
			{
				echo "<div style='border: 2px solid red;'><h1>خطأ</h1>" . $errormessage . "</div><br />";
			}
		else
			{

$wpdb->query("INSERT INTO  join_course(course_ID,trainee_ID, paid,rest,bill) VALUES ('$course_ID', '$trainee_ID', '$paid', '$rest', '$bill')");
$results = $wpdb->get_results("SELECT * FROM posting_course WHERE course_ID = '$course_ID' ",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
 $course_name = $results[$i]['posting_course_name'];
}
$wpdb->query("UPDATE  trainee SET attending_courses = concat (ifnull(attending_courses,''),'-', '$course_name') WHERE trainee_ID = '$trainee_ID'  ");
echo "<div style=  'border: 1px solid black;'><h1>تم الانضمام الى الدوره بنجاح</h1>"  . "</div><br />";
}
}
?>
