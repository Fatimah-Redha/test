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


<style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style>
<h1>الدورات التدريبيه التي يقدمها معهد البصائر و بشهادات معتمده من المؤسسه العامه للدريب التقني و المهني</h1>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم الدوره</th>
<th>مدتها بالأيام </th>
<th>عدد الساعات</th>
<th>رقم الاعتماد</th>
</tr>
<?php
global $wpdb;
$results = $wpdb->get_results("SELECT * FROM courses ORDER BY course_name ASC",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['days'];
echo"</td>";
echo"<td>";
echo $results[$i]['hours'];
echo"</td>";
echo"<td>";
echo $results[$i]['approved_ID'];
echo"</td>";
echo"</tr>";
}
?>
</tbody>
</table>
&nbsp;

<h1>اضافه مدربه جديده</h1>
لتسجيل مدربه جديده الرجاء ذكر جميع المعلومات الازمه المتعلقه بالمدربه

<form action="" method="post">
اسم المدربه
<input name="Trainers_name" type="text" value="" />
رقم السجل المدني

<input name="Trainers_ID" type="text" value="" />
رقم الجوال
<input name="Phone" type="text" value="" />
التخصص
<input name="Major" type="text" value="" />
<button name="submit" type="submit">SUBMIT</button>

</form>
<?php
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
$wpdb->query("INSERT INTO trainers (trainers_ID,trainers_name,phone,major) VALUES ('$trainers_ID', '$trainers_name', '$phone', '$major')"  );
 echo "<div style=  'border: 1px solid black;'><h1>تم اضافه مدربه جديده بنجاح</h1>"  . "</div><br />";
                                
			}

}
?>
<p style="text-align: center;"></p>
<p style="text-align: center;"><style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style></p>
<p style="text-align: center;"></p>
<h1 style="text-align: center;">قائمه بجميع المدربات المشتركات في معهد البصائر</h1>
<h2 style="text-align: center;">للبحث عن مدربه الرجاء ذكر السجل المدني او رقم الجوال</h2>
<form action="" method="post"><input name="search" type="text" placeholder="السجل المدني او رقم الجوال" />
<button name="submit" type="submit">بحث</button></form>
<h4 style="text-align: center;">نتائج البحث</h4>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم المدربه</th>
<th>السجل المدني</th>
<th>رقم الجوال</th>
<th>التخصص</th>
<th>الدورات</th>
<th>تحديث الجوال</th>
</tr>
<?php
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$trainers_search_ID = $_POST['search'];

$results = $wpdb->get_results("SELECT * FROM trainers WHERE trainers_ID= '$trainers_search_ID' OR phone = '$trainers_search_ID' ",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['trainers_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainers_ID'];
$id=$results[$i]['trainers_ID'];
echo"</td>";
echo"<td>";
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['major'];
echo"</td>";
echo"<td>";
echo $results[$i]['teaching_courses'];
echo"</td>";
echo"<td>";
echo"<form action='' method='post'>";
echo"<input  name='id' type='text' value=''/>";
echo"<button name='submit' type='submit'>";
echo"تحديث";
echo"</button>";
echo"</form>";
echo"</td>";
if ( isset( $_POST['submit'] ) )
{
$PHONE= $_POST['id'];
$wpdb->query("UPDATE  trainers SET phone= '$PHONE' WHERE trainers_ID= '$id' ");
}
echo"</tr>";
}
}
?>
</tbody>
</table>
<p style="text-align: center;"></p>

<h2 style="text-align: center;">قائمه المتدربات</h2>

<table style="width: 100%;">
<tbody>
<tr>
<th style="text-align: center;">الرقم</th>
<th style="text-align: center;">اسم المدربه</th>
<th style="text-align: center;">السجل المدني</th>
<th style="text-align: center;">رقم الجوال</th>
<th style="text-align: center;">التخصص</th>
<th style="text-align: center;">الدورات</th>

</tr>
<?php
global $wpdb;
$results = $wpdb->get_results("SELECT * FROM trainers ORDER BY trainers_name ASC",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['trainers_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainers_ID'];
echo"</td>";
echo"<td>";
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['major'];
echo"</td>";
echo"<td>";
echo $results[$i]['teaching_courses'];
echo"</td>";
echo"</tr>";
}
?>
</tbody>
</table>
&nbsp;

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
<?php>
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

$wpdb->query("INSERT INTO trainee(trainee_ID,trainee_name,nationality,phone) VALUES ('$trainee_ID', '$trainee_name', '$nationality', '$phone')"  );
echo "<div style=  'border: 1px solid black;'><h1>تم اضافه المتدربه بنجاح</h1>"  . "</div><br />";
                                
			}
}
?>
<p style="text-align: center;"></p>
<p style="text-align: center;"><style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style></p>
<p style="text-align: center;"></p>
<h1 style="text-align: center;">قائمه بجميع المتدربات المشتركات في معهد البصائر</h1>
<h2 style="text-align: center;">للبحث عن متدربه الرجاء ذكر السجل المدني او رقم الجوال</h2>
<form action="" method="post"><input name="search" type="text" placeholder="السجل المدني او رقم الجوال" />
<button name="submit" type="submit">بحث</button></form>
<h4 style="text-align: center;">نتائج البحث</h4>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم المتدربه</th>
<th>السجل المدني</th>
<th>الجنسيه</th>
<th>رقم الجوال</th>
<th>الدورات المشاركه</th>
<th>تحديث الجوال</th>
</tr>
<?php>
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$trainee_search_ID = $_POST['search'];
$results = $wpdb->get_results("SELECT * FROM trainee WHERE trainee_ID = '$trainee_search_ID' OR phone = '$trainee_search_ID' ",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"<td>";
echo $results[$i]['trainee_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainee_ID'];
$id=$results[$i]['trainee_ID'];
echo"</td>";
echo"<td>";
echo $results[$i]['nationality'];
echo"</td>";
echo"<td>";
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['attending_courses'];
echo"</td>";
echo"<td>";
echo"<form action='' method='post'>";
echo"<input  name='id' type='text' value=''/>";
echo"<button name='submit' type='submit'>";
echo"تحديث";
echo"</button>";
echo"</form>";
echo"</td>";
if ( isset( $_POST['submit'] ) )
{
$PHONE= $_POST['id'];
$wpdb->query("UPDATE  trainee SET phone= '$PHONE' WHERE trainee_ID = '$id' ");
}
echo"</tr>";
}
}
?>
</tbody>
</table>
<h2 style="text-align: center;">قائمه المتدربات</h2>




<table style="width: 100%;">
<tbody>
<tr>
<th style="text-align: center;">الرقم</th>
<th style="text-align: center;">اسم المتدربه</th>
<th style="text-align: center;">السجل المدني</th>
<th style="text-align: center;">الجنسيه</th>
<th style="text-align: center;">رقم الجوال</th>
<th style="text-align: center;">الدورات المشاركه</th>
</tr>
<?php
global $wpdb;
$results = $wpdb->get_results("SELECT * FROM trainee ORDER BY trainee_name ASC",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['trainee_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainee_ID'];
echo"</td>";
echo"<td>";
echo $results[$i]['nationality'];
echo"</td>";
echo"<td>";
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['attending_courses'];
echo"</td>";

echo"</tr>";

}
?>
</tbody>
</table>

<h1>اقامه دوره جديده</h1>
لإقامه دوره جديده الرجاء ذكر جميع المعلومات الازمه المتعلقه بالدوره

<form action="" method="post">
اسم الدوره المُقامه
<input name="Posting_course_name" type="text" value="" />
اسم الدوره الرئيسيه
<?php
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
<?php
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


<button name="submit" type="submit">SUBMIT</button>
</form>
<?php
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$posting_course_name = $_POST['Posting_course_name'];
$approved_ID= $_POST['Approved_ID'];
$trainers_ID= $_POST['Trainers_ID'];
$date= $_POST['Date'];
$ages= $_POST['Ages'];
$price= $_POST['Price'];
$attendee= '11111111';
$wpdb->query("INSERT INTO posting_course (posting_course_name,approved_ID,trainers_ID, date, ages,price,attendee ) VALUES ('$posting_course_name', '$approved_ID','$trainers_ID', '$date', '$ages', '$price','$attendee')");

$wpdb->query("UPDATE  trainers SET teaching_courses = concat (ifnull(teaching_courses,'-'),'$posting_course_name') WHERE trainers_ID= '$trainers_ID' ");
}
?>
<style>
table, th, td {<br />    border: 1px solid black;<br />    border-collapse: collapse;<br />}<br /></style>
<h1>الدورات التدريبيه المقامه في معهد البصائر</h1>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم الدوره المقامه</th>
<th>اسم الدوره الرئيسي </th>
<th>اسم المدربه</th>
<th>تاريخ اقامه الدوره</th>
<th>الفئه العمريه</th>
<th>رسوم الدوره</th>
<th>خصائص</th>
</tr>
<?php
global $wpdb;
$results = $wpdb->get_results("SELECT posting_course.approved_ID, posting_course.posting_course_name, posting_course.date, posting_course.ages,posting_course.trainers_ID , posting_course.price, courses.course_name, trainers.trainers_name FROM courses INNER JOIN posting_course ON courses.approved_ID = posting_course.approved_ID INNER JOIN trainers ON posting_course.trainers_ID = trainers.trainers_ID ORDER BY posting_course_name ASC",ARRAY_A);
for ($i=0; $i<count($results); $i++) {
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['posting_course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainers_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['date'];
echo"</td>";
echo"<td>";
echo $results[$i]['ages'];
echo"</td>";
echo"<td>";
echo $results[$i]['price'];
echo"</td>";
echo"</tr>";
}
?>
</tbody>
</table>
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
<button name="submit" type="submit">SUBMIT</button>

</form>
<?php>
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$course_ID= $_POST['Course_ID'];
$trainee_ID= $_POST['Trainee_ID'];
$paid= $_POST['Paid'];
$rest= $_POST['Rest'];
$bill= $_POST['Bill'];
$wpdb->query("INSERT INTO  join_course(course_ID,trainee_ID, paid,rest,bill) VALUES ('$course_ID', '$trainee_ID', '$paid', '$rest', '$bill')");
$results = $wpdb->get_results("SELECT * FROM posting_course WHERE course_ID = '$course_ID' ",ARRAY_A);
for ($i=0; $i<count($results); $i++) 
{
 $course_name = $results[$i]['posting_course_name'];
}
$wpdb->query("UPDATE  trainee SET attending_courses = concat (ifnull(attending_courses,''),'-', '$course_name') WHERE trainee_ID = '$trainee_ID'  ");
}
?>
<h1>سجلات الدوره</h1>
لعرض قائمه بجميع المعلومات عن المتدربات المسجلين الدوره
<form action="" method="post">
الرجاء اختيار اسم الدوره المرغوب عرض سجلاتها
<?php
global $wpdb;
$results = $wpdb->get_results("SELECT course_ID,posting_course_name FROM posting_course ORDER BY posting_course_name ASC",ARRAY_A);
echo "<select  name='Course_ID'  value=''></option>"; 

foreach (($results) as $row)
{
echo "<option value=$row[course_ID]->$row[posting_course_name]</option>"; 
}
 echo "</select>";
?>
<button name="submit" type="submit">اختيار</button>
</form>
<table style="width: 100%;">
<tbody>
<tr>
<th>اسم الدوره المقامه</th>
<th>اسم الدوره الرئيسي </th>
<th>اسم المدربه</th>
<th>تاريخ اقامه الدوره</th>
<th>الفئه العمريه</th>
<th>رسوم الدوره</th>
</tr>
<?php
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$course_ID_name = $_POST['Course_ID'];
$results = $wpdb->get_results("SELECT posting_course.course_ID,posting_course.approved_ID, posting_course.posting_course_name, posting_course.date, posting_course.ages,posting_course.trainers_ID , posting_course.price, courses.course_name, trainers.trainers_name FROM courses INNER JOIN posting_course ON courses.approved_ID = posting_course.approved_ID INNER JOIN trainers ON posting_course.trainers_ID = trainers.trainers_ID WHERE posting_course.course_ID = '$course_ID_name' ",ARRAY_A);
for ($i=0; $i<count($results); $i++) {
echo"<tr>";
echo"<td>";
echo $results[$i]['posting_course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['course_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['trainers_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['date'];
echo"</td>";
echo"<td>";
echo $results[$i]['ages'];
echo"</td>";
echo"<td>";
echo $results[$i]['price'];
echo"</td>";
echo"</tr>";
}
}
?>
</tbody>
</table>
<table style="width: 100%;">
<tbody>
<tr>
<th>الرقم</th>
<th>اسم المتدربه</th>
<th>رقم الجوال </th>
<th>المدفوع</th>
<th>الباقي</th>
<th>رقم السند</th>
</tr>
<?php
if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$course_ID_name = $_POST['Course_ID'];

$results = $wpdb->get_results("SELECT  join_course.course_ID,join_course.trainee_ID,join_course.paid,join_course.rest, join_course.bill,trainee.trainee_ID,trainee.trainee_name,trainee.phone FROM trainee  INNER JOIN join_course ON trainee.trainee_ID = join_course.trainee_ID WHERE join_course.course_ID = '$course_ID_name' ORDER BY trainee.trainee_name ASC",ARRAY_A);

for ($i=0; $i<count($results); $i++) 
{
echo"<tr>";
echo"<td>";
echo $i+1;
echo"</td>";
echo"<td>";
echo $results[$i]['trainee_name'];
echo"</td>";
echo"<td>";
echo $results[$i]['phone'];
echo"</td>";
echo"<td>";
echo $results[$i]['paid'];
echo"</td>";
echo"<td>";
echo $results[$i]['rest'];
echo"</td>";
echo"<td>";
echo $results[$i]['bill'];
echo"</td>";
echo"</tr>";

}
}
?>
</tbody>
</table>
