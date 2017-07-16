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
<th>رقم السند الأول</th>
<th>رقم السند الثاني</th>
</tr>
<?
	if ( isset( $_POST['submit'] ) )
{
global $wpdb;
$course_ID_name = $_POST['Course_ID'];

$results = $wpdb->get_results("SELECT  join_course.course_ID,join_course.trainee_ID,join_course.paid,join_course.rest, join_course.bill,join_course.bill_2,trainee.trainee_ID,trainee.trainee_name,trainee.phone FROM trainee  INNER JOIN join_course ON trainee.trainee_ID = join_course.trainee_ID WHERE join_course.course_ID = '$course_ID_name' ORDER BY trainee.trainee_name ASC",ARRAY_A);

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
echo"<td>";
echo $results[$i]['bill_2'];
echo"</td>";
echo"</tr>";

}
}
	?>
</tbody>
</table>