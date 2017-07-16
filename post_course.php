
<h1>اقامه دوره جديده</h1>
لإقامه دوره جديده الرجاء ذكر جميع المعلومات الازمه المتعلقه بالدوره

<form action="" method="post">
اسم الدوره المُقامه

<div style='border: 1px solid red;'>
(الرجاء ذكر رقم بين قوسين بعد كتابه اسم الدوره ليتم التمييز بين كل دوره أقيمت بنفس الاسم، و يرجى القاء نظره اولاً على قائمه الدورات المقامه و اخذ آخر رقم  لنفس اسم الدوره ليتم تسلسل الأرقام بالرقم الصحيح)
</div>
<input name="Posting_course_name" type="text" value="" />
اسم الدوره المعتمده
<?
global $wpdb;
$results = $wpdb->get_results("SELECT approved_ID,course_name FROM courses ORDER BY course_name ASC",ARRAY_A);
echo "<select  name='Approved_ID'  value=''></option>"; 

foreach (($results) as $row)
{
echo "<option value=$row[approved_ID]->$row[course_name]</option>"; 
}
 echo "</select>";
 ?>
اسم المدربه
<?
global $wpdb;
$results = $wpdb->get_results("SELECT trainers_ID,trainers_name FROM trainers ORDER BY trainers_name ASC",ARRAY_A);
echo "<select  name='Trainers_ID'  value=''></option>"; 

foreach (($results) as $row)
{
echo "<option value=$row[trainers_ID]->$row[trainers_name]</option>"; 
}
 echo "</select>";
 ?>
تاريخ اقامه الدوره
<input name="Date" type="date" value="" />

الفئه العمريه
<input name="Ages" type="text" value="" />
رسوم الدوره
<input name="Price" type="text" value="" />


<button name="submit" type="submit">تسجيل</button>
</form>
	
<?
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$posting_course_name = $_POST['Posting_course_name'];
$approved_ID= $_POST['Approved_ID'];
$trainers_ID= $_POST['Trainers_ID'];
$date= $_POST['Date'];
$ages= $_POST['Ages'];
$price= $_POST['Price'];
if ($posting_course_name == "") 
				{
					$errormessage = $errormessage . "اسم الدوره المقامه مطلوب <br />";       
				}
			else if ($approved_ID== "") 
				{
					$errormessage = $errormessage . "اسم الدوره الرئيسيه مطلوب <br />";   
				}
else if ($trainers_ID== "") 
				{
					$errormessage = $errormessage . "اسم المدربه مطلوب <br />";   
				}
else if ($date == "") 
				{
					$errormessage = $errormessage . "تاريخ اقامه الدوره مطلوب <br />";   
				}
else if ($ages == "") 
				{
					$errormessage = $errormessage . "الفئه العمريه مطلوبه <br />";   
				}
else if ($price== "") 
				{
					$errormessage = $errormessage . "رسوم الدوره مطلوبه <br />";   
				}
if ($errormessage != "") 
			{
				echo "<div style='border: 2px solid red;'><h1>خطأ</h1>" . $errormessage . "</div><br />";
			}
		else
			{
$wpdb->query("INSERT INTO posting_course (posting_course_name,approved_ID,trainers_ID,date, ages,price) VALUES ('$posting_course_name', '$approved_ID','$trainers_ID','$date', '$ages', '$price')");

$wpdb->query("UPDATE  trainers SET teaching_courses = concat (ifnull(teaching_courses,''),'-','$posting_course_name') WHERE trainers_ID= '$trainers_ID' ");

echo "<div style=  'border: 1px solid black;'><h1>تم اضافه الدوره المقامه بنجاح</h1>"  . "</div><br />";
}
}
?>